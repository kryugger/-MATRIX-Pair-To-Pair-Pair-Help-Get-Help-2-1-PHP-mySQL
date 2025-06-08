<?php
require_once('function.php');
connectdb();
session_start();



$email = mysql_real_escape_string($_POST["email"]);
$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$email."'"));
if($count[0]!=0){

echo "<b style='color:red;'><i class='fa fa-times'></i> Email Already Exist! Please Use another Email.</b>";

}

?>


