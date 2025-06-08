<?php
require_once('../function.php');
connectdb();
session_start();

if (!is_user()) {
redirect('index.php');
}

$general = mysql_fetch_array(mysql_query("SELECT sitetitle FROM general_setting WHERE id='1'"));

$user = $_SESSION['username'];
$sid = $_SESSION['sid'];

$usid = mysql_fetch_array(mysql_query("SELECT id, sid, pwr FROM admin WHERE username='".$user."'"));
$uid = $usid[0];

if($sid!=$usid[1]){
redirect('signout.php');
}


	
	if ($_REQUEST['delete']) {
		
		$iidd = $_REQUEST['delete'];
		$frm = $_REQUEST['frm'];


       $stmt = mysql_query("DELETE FROM $frm WHERE id ='".$iidd."'");
		if ($stmt) {
			echo "Deleted Successfully";
		}
		
	}

	?>

