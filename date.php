<?php
session_start();
$_SESSION['email']=htmlspecialchars($_SESSION['email']);
setcookie('payer', 'non', time()+15552000);
echo "<script>
if(localStorage.getItem('paye')){
localStorage.removeItem('status');
localStorage.removeItem('paye');
}
else{
 localStorage.setItem('status','nonp');
}
</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Rubik:ital,wght@0,300..900;1,300..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="date.css">
</head>
<body>
<div class="header">
<h1>PRODUCT MANAGEMENT SYSTEM</h1>
<h2 class="spn1">The free trial period for the service has ended</h2>
<h2>
To<span class="spn1"> continue benefiting</span> from this service, we invite you <span class="spn1">to pay a nominal monthly </span> amount <span class="spn2">estimated at only:</span></h2>
<h3>1.5 $ / Month</h3>

</div>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="ayislam990@gmail.com">
        <input type="hidden" name="item_name" value="Monthly Subscription">
        <input type="hidden" name="amount" value="1.00">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="custom" value="<?php echo htmlspecialchars($_SESSION['email']); ?>">
        <input type="hidden" name="return" value="https://aa36-160-177-34-239.ngrok-free.app/login.php?succ='oui'"> <!-- رابط العودة بعد الدفع الناجح -->
        <input type="hidden" name="cancel_return" value="https://aa36-160-177-34-239.ngrok-free.app/date.php">
         <!-- رابط العودة في حالة إلغاء الدفع -->
          <div class="imp">
          <i class="fa-solid fa-triangle-exclamation"></i>
            <p>When you complete the payment, an interface will appear confirming the success of the payment process, and you must wait for 10 seconds to complete in order for the payment to be processed well and better. <br>Thank you for your understanding</p>
          </div>
          <div class="pay">
          <span>To pay, you can click here :</span>
     <input type="image" src="payment.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" class="img">
   
     </div>
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
    <script>
  
                // منع العودة إلى الصفحة السابقة
                window.history.pushState(null, document.title, window.location.href);
        window.addEventListener('popstate', function(event) {
            window.history.pushState(null, document.title, window.location.href);
        });

    </script>

    <ul>
        <li>Important points related to the service:</li>
        <li>The product information in your account remains only on the device. If you change the device, the product information will disappear.</li>
        <li>If you forget your password, you can create another account and your products will remain as they are in the new account.</li>
        <li>Every account you open, you must ensure that you perform your monthly dues in order for the service to continue working.</li>
        <li>If you find any problems, you can contact us via the email below to solve them.</li>
    </ul>

    <footer>
        <span>All rights reserved @ 2024</span>
        <span>If you need to purchase the service or have any inquiries, you can contact us in this email : <span class="icon"><i class="fa-solid fa-envelope"></i> ay.bouguern@gmail.com</span></span>

    </footer>
</body>
</html>




