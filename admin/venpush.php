<?php
require_once('../main/connect.php');

$level = 'USER';
$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$addr = $_POST['addr'];
$len  = 5;
$keys = '';
$key = '';
$keys = range(0, 9);

for ($i = 0; $i < $len; $i++) {
  $key .= $keys[array_rand($keys)];
}
$uuid = "VEN".$key;
$chk = mysql_query("SELECT * FROM vendor where email = '$email'");
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
  $qr = mysql_query("INSERT INTO vendor(vendorID,companyName,email,address,tel) VALUES ('$uuid','$name','$email','$addr','$tel')");
  if(!$qr){
    die ("error". mysql_error());
  }else {
    echo "<script>alert('Register Success');
    window.location='vendor.php'</script>";
  }
}

 ?>
