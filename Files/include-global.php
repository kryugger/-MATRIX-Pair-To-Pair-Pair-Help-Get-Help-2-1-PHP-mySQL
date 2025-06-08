<?php
require_once('function.php');
require_once("anotifier.php");
connectdb();
session_start();

$gen = mysql_fetch_array(mysql_query("SELECT sitetitle, currency, colorcode, lid FROM general_setting WHERE id='1'"));
$basetitle = $gen[0];
$basecurrency = $gen[1];
$basecolor = $gen[2];

$metatag = "$basetitle";
$keytag = "$basetitle";
$ogimg = "";


$a1 = date("ymdH", time());
$a2 = rand(1000,9999);
$txn_id = "$a1$a2";




$tms = mysql_fetch_array(mysql_query("SELECT hr, rmv, recy FROM general_setting WHERE id='1'"));
$cctm = time()-($tms[0]*3600);
$dd = mysql_query("SELECT id, payby FROM donation WHERE atm<$cctm AND status='1'");
while ($da = mysql_fetch_array($dd)) {
mysql_query("UPDATE donation SET  payby='0', atm='0', status='0' WHERE id='".$da[0]."'");
////////////////------------->>>>>>>>>>BLOCK
$wtm = time()+3*24*3600;
mysql_query("UPDATE users SET wt='".$wtm."' WHERE id='".$da[1]."'");
///////////////////------------------------------------->>>>>>>>>Send Email
$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, phone, email FROM users WHERE id='".$da[1]."'"));
$txt = "This is a soft notification that You Can Not Pay In Time. And Your Account Is Blocked ";
abiremail($userContact[3], "Your Account Is Blocked", "$userContact[0] $userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send Email
////////////////------------->>>>>>>>>>BLOCK
}




$ttt = time();
mysql_query("UPDATE packs SET st='1' WHERE tm<$ttt");


$baseloader = $gen[3];




////////// LETS MAKE  IP BLOCK WORKING :D
$myip = $_SERVER['REMOTE_ADDR'];
$isBlocked = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM blockip WHERE ip='".$myip."'"));
if ($isBlocked[0]>0) {
exit;
}





?>
