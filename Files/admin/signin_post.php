<?php

require_once('../function.php');
connectdb();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if (attemptadmin($_POST['username'], $_POST['password'])) {

$uu = $_POST['username'];	
$tm = time();
$si = "$uu$tm";
$sid = md5($si);
$_SESSION['sid'] = $sid;

mysql_query("UPDATE admin SET sid='".$sid."' WHERE username='".$uu."'");
redirect('home.php');
		
	}
	else {
		redirect('index.php?error=' . urlencode('Wrong username or password'));
	}
}

?>