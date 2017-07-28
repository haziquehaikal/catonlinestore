<?php

//start session
session_start();
//kill the session :)
if(session_destroy())
{
//redirect to login page if logout 
header("Location:../customerLogin.php");
}

?>
