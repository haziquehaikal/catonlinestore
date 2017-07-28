<?php

//Hide mysql deprecated error
 error_reporting( ~E_ALL & ~E_DEPRECATED &  ~E_NOTICE );

//define variable for mysql connect
 define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', 'wolwolf96');
 define('DBNAME', 'mode_db');

//perform mysql connection
 $conn = mysql_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysql_select_db(DBNAME);

//check if Connection is OK or not 
 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }

 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }
