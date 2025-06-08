<?php
require_once('function.php');
connectdb();
session_start();



$phone = mysql_real_escape_string($_POST["phone"]);
$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE phone='".$phone."'"));
if($count[0]!=0){

echo "<b style='color:red;'><i class='fa fa-times'></i> Phone Number Already Exist! Please Use Another </b>";

}

?>


