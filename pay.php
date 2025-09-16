<?php
session_start(); 
// إعدادات قاعدة البيانات
$paypalUrl = "https://ipnpb.paypal.com/cgi-bin/webscr"; // URL لـ Sandbox
$req = 'cmd=_notify-validate';
$conn = new PDO('mysql:host=localhost;dbname=cruds','root','');
// إعداد الاتصال بقاعدة البيانات

foreach ($_POST as $key => $value) {
    $value = urlencode($value);
    $req .= "&$key=$value";
}


// قراءة البيانات المرسلة من PayPal

    // التحقق بنجاح

    // بيانات PayPal المستلمة
  // تسجيل البيانات الواردة من PayPal



$ch = curl_init($paypalUrl);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

// تنفيذ الطلب والحصول على الاستجابة
$res = curl_exec($ch);
curl_close($ch);


        // تحديث قاعدة البيانات لحالة الدفع المكتملة
        if (strcmp($res, "VERIFIED") == 0 && isset($_POST['custom'])) { 
            $payment_status = $_POST['payment_status'];
           
            if ($payment_status == "Completed") {
                try{
          $insert = $conn->prepare('UPDATE payments SET payment=?,visite=? where email=?');
$insert->execute(["oui","d",htmlspecialchars($_POST['custom'])]);


                }catch (PDOException $e) {
                    // تسجيل أي خطأ يحدث أثناء عملية التحديث
                    error_log("Database Error: " . $e->getMessage());
                }

            }
            else if($payment_status == "Pending"){
                try{
                    $insert = $conn->prepare('UPDATE payments SET payment=?,visite=? where email=?');
          $insert->execute(["oui","d",htmlspecialchars($_POST['custom'])]);
          
          
                          }catch (PDOException $e) {
                              // تسجيل أي خطأ يحدث أثناء عملية التحديث
                              error_log("Database Error: " . $e->getMessage());
                          }
            }
         

        }
        else {
            // استجابة غير صحيحة
            error_log("IPN verification failed: " . $res);
        }


    
    

?>
