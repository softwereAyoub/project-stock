
   <?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Rubik:ital,wght@0,300..900;1,300..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 <link rel="stylesheet" href="login.css">

</head>
<body>
  
<form method="post"  class="form">
<div id="alert2">
  <span id="span">This email is already exist in this application , you have to change the Email</span>
  <button type="button" id="btnalert">OK</button>
</div>
  <div class="card">
    <span> Account</span>
    <div class="fontaw">
    <i class="fa-solid fa-triangle-exclamation"></i>
    <p>It is preferable to write down the email and password on your device</p>
    </div>
    <input class="inp" type="email" placeholder="email" name="email" id="email" pattern="[a-zA-Z0-9\.]{2,20}@[a-zA-Z0-9\.]{2,12}\.[a-z]{1,4}" required title=" example : xxxx@xxxx.yyy">
    <div class="pass">
    <input class="inp" type="password" id="pass" placeholder="password" name="pass" required pattern="[a-zA-Z0-9]{5,18}" title="The password must be between 5 and 18 elements, and only letters and numbers are allowed.">
    <div>
    <i class="fa-regular fa-eye" id="eye"></i>
    <i class="fa-regular fa-eye-slash" id="eye2"></i>
    </div>
    </div>
    <input class="inp" type="password" id="pass2" placeholder="Confirm your password" name="pass2" required>
  

   
    <input  value="Create" type="button"  class="sub" id="crt">
    <a href="login.php" > Page login</a>
    </div>
    
  
</form>


<?php
  

       $conn = new PDO('mysql:host=localhost;dbname=cruds','root','');
      if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['pass2']) && !empty($_POST['email']) && !empty($_POST['pass']) && !isset($_COOKIE['payer'])) { 
        $email=$conn->prepare('SELECT * from users where email=?');
        $email->execute([htmlspecialchars($_POST['email'])]);
        $emails=$email->fetchALL(PDO::FETCH_ASSOC);
       
$_SESSION['email']=htmlspecialchars($_POST['email']);
$_SESSION['pass']=htmlspecialchars($_POST['pass']);
if(!$emails){
   
    $requet=$conn->prepare('INSERT INTO users (email,pass) value (?,?)');
    $requet->execute([htmlspecialchars($_POST['email']),password_hash(htmlspecialchars($_POST['pass']),PASSWORD_DEFAULT)]);
    $_SESSION['email']=htmlspecialchars($_POST['email']);
    echo 'email';
header('location:login.php');
    
    }
    else{
      echo 'exist';
      echo "<script>
      var card=document.getElementById('alert2');
      card.style.display='flex';
var button=document.getElementById('btnalert');
button.onclick=function(){card.style.display='none';
}
      </script>";
    }
}
else if(isset($_COOKIE['payer'])){
  echo "<script>
  if(!localStorage.getItem('paye')){
  var card=document.getElementById('alert2');
   var span=document.getElementById('span');
   span.innerHTML='To create an account, you must pay the monthly fee first. If you encounter any problem, you can contact us via our email to solve it : ay.bouguern@gmail.com.';
  card.style.display='flex';
var button=document.getElementById('btnalert');
button.onclick=function(){ var lien=document.createElement('a');
    lien.href='login.php';
    lien.click();;
}
}
  </script>";
}
?>
    
    <script>
  var eye=document.getElementById('eye');
  var eye2=document.getElementById('eye2');
  var pass=document.getElementById('pass');
  var pass2=document.getElementById('pass2');
  var create=document.getElementById('crt');


 pass.onkeyup=function(){
  if(pass.value.length==1 && eye2.style.display!="block"){
    eye.style.display="block";
  }
  
  else if(pass.value.length==0){
    eye.style.display="none";
    pass.type="password";
    eye2.style.display="none";
  }
 
  if(pass.value == pass2.value && pass2.value!= ''){
    pass2.style.backgroundColor='#8ac926';
  }
  else if(pass.value != pass2.value && pass2.value!= ''){
    pass2.style.backgroundColor='#e63946'; 
  }
  else{
    pass2.style.backgroundColor='white'; 
  }

 }
 pass2.onkeyup=function(){
  if(pass.value == pass2.value && pass2.value!= ''){
    pass2.style.backgroundColor='#8ac926';
  }
  else if(pass.value != pass2.value && pass2.value!= ''){
    pass2.style.backgroundColor='#e63946'; 
  }
  else{
    pass2.style.backgroundColor='white'; 
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

  create.onclick=function(){
    if(pass2.value==pass.value){
create.type="submit";
    }
    else{
      create.type="button";
      console.log(pass.value);
      
      pass2.style.backgroundColor='#e63946'; 
     
    }
  }
</script>   
     
</body>
</html>