<?php

require_once('function.php');
connectdb();
session_start();


$username = mysql_real_escape_string($_POST["username"]);


//-------------------COUNT
$count = strlen($username);
$exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$username."'"));

if ($count<4) {
echo "<b style='color:red;'><i class='fa fa-times'></i> Username Must Be 4 Char Or More</b>";
}elseif($exist[0]!=0){
echo "<b style='color:red;'><i class='fa fa-times'></i> Username $username Already Taken. Try With Different Username</b>";
}elseif (!valid_username($username)){
echo "<b style='color:red;'><i class='fa fa-times'></i>  Username is invalid. Please Use Only [a-z0-9_-] And NO SPACE</b>";
}else{
echo "<b style='color:green;'><i class='fa fa-check'></i> Username is Valid !</b>";
}



?>


