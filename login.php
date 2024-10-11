<?php
    session_start(); 
    $conn = new PDO('mysql:host=localhost;dbname=cruds','root','');

      

  if(isset($_SESSION['email'])){
      $checkUsersPayments=$conn->prepare('SELECT payment from payments where email=?');
    $checkUsersPayments->execute([htmlspecialchars($_SESSION['email'])]);
        $check=$checkUsersPayments->fetch(PDO::FETCH_ASSOC);
        if($check && $check['payment']=="oui"){

          setcookie('payer', 'non', time() - 3600);
          echo "<script>
          if(localStorage.getItem('status') ){
       localStorage.removeItem('status');
          localStorage.removeItem('paye');
        }
      </script>";
      
        }
        else {
          echo "<script>
if(localStorage.getItem('status') ){
      localStorage.removeItem('paye');
        }
         </script>";
    
        }
     
    
  
    };
  
 
  
 
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
 <link rel="stylesheet" href="login.css">

</head>
<body>
  
<form method="post"  class="form">
  
  <h1>PRODUCT MANAGEMENT SYSTEM</h1>
  <div class="card">
  <?php
  
  
  if (isset($_GET['succ'])) {
    // طباعة كود جافا سكريبت داخل كتلة <script>
 
    
    echo "<script>
    if(localStorage.getItem('status') ){
      
        localStorage.setItem('paye','oui');
  }
function startCountdown(duration) {
        var timer = duration, minutes, seconds;
        var countdownDiv = document.getElementById('alert');
        var display = document.getElementById('timer');
        
        var interval = setInterval(function () {
            minutes = Math.floor(timer / 60); // حساب الدقائق
            seconds = timer % 60; // حساب الثواني

            // تنسيق العرض بإضافة صفر أمام الأرقام الأقل من 10
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            // تحديث العرض
            display.textContent = minutes + ':' + seconds;

            // إذا انتهى الوقت
            if (--timer < 0) {
                clearInterval(interval);
                countdownDiv.style.display = 'none';
          
                
                // إخفاء div بعد انتهاء الوقت
            }
        }, 1000);
    }


    </script>";


  
  ?>
<div id="alert">
<h2 class="red">We are processing the payment, please Wait for the end of time and then log in:<br><br>
<span class="green">
If you try to enter several times and do not succeed, this means that the payment process was not completed.

If you encounter any problem, you can contact us via email:
<br>
ay.bouguern@gmail.com</span></h2>
<div id="timer">03:50</div>
</div>

<?php 

echo '<script>
startCountdown(210);</script>'; 


};
?>
<?php
if(!isset($_GET['succ']) && isset($_COOKIE['payer'])){
  echo "<script>
  function startCountdown(duration) {
      var timer = duration, minutes, seconds;
      var countdownDiv = document.getElementById('alert');
      var display = document.getElementById('timer');
      countdownDiv.style.display='block';
      var interval = setInterval(function () {
          minutes = Math.floor(timer / 60); // حساب الدقائق
          seconds = timer % 60; // حساب الثواني

          // تنسيق العرض بإضافة صفر أمام الأرقام الأقل من 10
          minutes = minutes < 10 ? '0' + minutes : minutes;
          seconds = seconds < 10 ? '0' + seconds : seconds;

          // تحديث العرض
          display.textContent = minutes + ':' + seconds;
console.log('test')
          // إذا انتهى الوقت
          if (--timer < 0) {
              clearInterval(interval);
              countdownDiv.style.display = 'none';
        
              
              // إخفاء div بعد انتهاء الوقت
          }
      }, 1000);
  }
  </script>";
?>
<div id="alert">
<h2 class="red">We are processing the payment, please Wait for the end of time and then log in:<br><br>
<span class="green">
If you try to enter several times and do not succeed, this means that the payment process was not completed.

If you encounter any problem, you can contact us via email:
<br>
ay.bouguern@gmail.com</span></h2>
<div id="timer">03:50</div>
</div>
<?php 
echo '<script>
console.log("test")
startCountdown(210);</script>'; 
};
?>
    <span> Log In</span>
    <div id="alert2">
  <span id="span"><span class="red">The password or email address is incorrect.</span> If you encounter a problem logging in, you can contact us via email to solve it:
 <span class="green"> ay.bouguern@gmail.com</span> </span><br><br>
  <button type="button" id="btnalert">OK</button>
</div>
    <input class="inp"  type="email" placeholder="email" name="email" required>
    <div class="pass">
    <input class="inp" type="password" id="pass" placeholder="password" name="pass" required>
    <div>
    <i class="fa-regular fa-eye" id="eye"></i>
    <i class="fa-regular fa-eye-slash" id="eye2"></i>
    </div>
    </div>
    <input class="sub" id="ent" type="submit" value="Log In" name="enter in your acount" name="mod">
    <a href="add.php" >Create Account</a>
    </div>
    
  
</form>


  
      <?php

  echo "<script>
  if(localStorage.getItem('paye')){
    var card=document.getElementById('alert');
     var span=document.getElementById('span');
     
    card.style.display='flex';
 
  
  
      
  }
  
  </script>";


 
      $conn = new PDO('mysql:host=localhost;dbname=cruds','root','');
      if(isset($_POST['email']) && isset($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['pass'])){ 
        
        $email=$conn->prepare('SELECT * from users where email=?');
        $email->execute([htmlspecialchars($_POST['email'])]);
        $emails=$email->fetch(PDO::FETCH_ASSOC);
        $isPasswordValid = password_verify(htmlspecialchars($_POST['pass']),$emails['pass']);
        if($emails){
        
          if($isPasswordValid && $emails['email']==$_POST['email']  ){
            $datee=date("Y-m-d");
            $date=date_create($datee);
            echo date_format($date,"Y-m-d");
            date_add($date,date_interval_create_from_date_string("2 days"));




    $checkUsersPayments=$conn->prepare('SELECT * from payments where email=?');
    $checkUsersPayments->execute([htmlspecialchars($_POST['email'])]);
        $check=$checkUsersPayments->fetch(PDO::FETCH_ASSOC);

if(!$check){
  $insert = $conn->prepare('INSERT INTO payments (date_entre,date_payments,email,payment,visite) values (?,?,?,?,?)');
$insert->execute([date("Y-m-d"),date_format($date,"Y-m-d"),htmlspecialchars($_POST['email']),"non","p"]);
$_SESSION['email']=htmlspecialchars($_POST['email']);
echo "<script>
     if (window.location.search) {
                // قم بإزالة المعاملات من عنوان URL
                history.replaceState(null, null, window.location.pathname);
            }</script>";
header('Refresh:0;url=Ncruds.html');
}

else{

if($check["date_payments"]>date("Y-m-d") && $check['visite']=="p" && $check['payment']=="non"){
  $_SESSION['email']=htmlspecialchars($_POST['email']);
  echo "<script>
     if (window.location.search) {
                // قم بإزالة المعاملات من عنوان URL
                history.replaceState(null, null, window.location.pathname);
            }</script>";
  header('Refresh:0;url=Ncruds.html');
}

else if($check["date_payments"]<=date("Y-m-d") && $check['visite']=="p" && $check['payment']=="non"){
  $insert = $conn->prepare('UPDATE payments SET payment=?,visite=? where email=?');
  $insert->execute(["non","d",htmlspecialchars($_POST['email'])]);
  $_SESSION['email']=htmlspecialchars($_POST['email']);

  header('Refresh:0;url=date.php');
  
}




else if($check['visite']=="d" && $check["date_payments"]<=date("Y-m-d") && $check['payment']=="oui"){
  $datee=$check["date_payments"];
  $date=date_create($datee);
  date_add($date,date_interval_create_from_date_string("30 days"));
  $insert = $conn->prepare('UPDATE payments SET date_payments=?,payment=? where email=?');
$insert->execute([date_format($date,"Y-m-d"),"non",htmlspecialchars($_POST['email'])]);
$_SESSION['email']=htmlspecialchars($_POST['email']);
echo "<script>
     if (window.location.search) {
                // قم بإزالة المعاملات من عنوان URL
                history.replaceState(null, null, window.location.pathname);
            }</script>";
header('Refresh:0;url=Ncruds.html');
}
else if($check['visite']=="d" && $check["date_payments"]<=date("Y-m-d") && $check['payment']=="non"){
  $_SESSION['email']=htmlspecialchars($_POST['email']);
 
  header('Refresh:0;url=date.php');
}






else if( $check["date_payments"] > date("Y-m-d")){  
  $_SESSION['email']=htmlspecialchars($_POST['email']);
  echo "<script>
     if (window.location.search) {
                // قم بإزالة المعاملات من عنوان URL
                history.replaceState(null, null, window.location.pathname);
            }</script>";
  header('Refresh:0;url=Ncruds.html');
}

}

  

        

          }
          else{
            echo "<script>
             var countdownDiv = document.getElementById('alert2');
             countdownDiv.style.display='block';
             var button=document.getElementById('btnalert');
             button.onclick=function(){ var lien=document.createElement('a');

    lien.href='login.php';
    lien.click();;
}
             </script>";
                  }
          
        }
 
      }
      
      
      ?>
     
<script>
  var eye=document.getElementById('eye');
  var eye2=document.getElementById('eye2');
  var pass=document.getElementById('pass');


 pass.onkeyup=function(){
  if(pass.value.length==1 && eye2.style.display!="block"){
    eye.style.display="block";
  }
  
  else if(pass.value.length==0){
    eye.style.display="none";
    pass.type="password";
    eye2.style.display="none";
  }
  
 
  
 }
  eye.onclick=function(){
pass.type="text";
eye.style.display="none"
eye2.style.display="block";
  }
  eye2.onclick=function(){
pass.type="password";
eye2.style.display="none";
eye.style.display="block";
  }
</script>   
</body>
</html>