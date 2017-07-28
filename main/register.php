<?php
require_once('connect.php');

$level = 'USER';
$name = $_POST['name'];
$uname = $_POST['uname'];
$email = $_POST['email'];
$pass = $_POST['password'];
$pass2 = $_POST['password2'];
$stat = 1;
$len  = 7;
$keys = '';
$key = '';
$keys = range(0, 9);

for ($i = 0; $i < $len; $i++) {
  $key .= $keys[array_rand($keys)];
}
$msg = '';
$chk = mysql_query("SELECT * FROM users where email = '$email'");
$test = mysql_num_rows($chk);
if ($test == 1){
  echo "<script>alert('Email Already been Registered');
  window.location='../customerLogin.php'</script>";
}
else if ($pass != $pass2 ) {
  echo "<script>alert('Password Not match!');
  window.location='../customerLogin.php'</script>";
}
else {
  $qr = mysql_query("INSERT INTO users (fname,username,email,password,memid,level,status) VALUES ('$name','$uname','$email','$pass','$key','$level','$stat')");
  if(!$qr){
    die ("error". mysql_error());
  }else {
    echo "<script>alert('Register Success');
    window.location='../customerLogin.php'</script>";
  }
}

 ?>
