<?php
	session_start();
	
	$USN1 = $_POST['USN'];
	$password = $_POST['PASSWORD'];
	$confirm = $_POST['repassword'];
	
	$connect = mysql_connect("127.0.0.1", "root", ""); // Establishing Connection with Server
    mysql_select_db("placement") or die("Cant Connect to database"); // Selecting Database from Server
	
	if($password == $confirm) {
		if($sql = mysql_query("UPDATE `placement`.`hlogin` SET `Password` ='$password' WHERE `hlogin`.`Username` = '$USN1'"));
		echo "<center>Password Reset Complete</center>";
		session_unset();
	} else
	echo "Update Failed";
?>