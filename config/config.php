<?php
/*
******************************** Website Database Connection *************************88
*/

// $db_host="localhost"; //Hostname
$db_user="root"; //Database User
$db_pass=""; //Database User Password
// $db_name="qrcode_db"; //database Name

try {
	$db= new pdo('mysql:host=localhost;dbname=qrcode_db',$db_user,$db_pass);
} catch (PDOException $e) {
	echo "Connection Error".$e->getMessage();
}

?>