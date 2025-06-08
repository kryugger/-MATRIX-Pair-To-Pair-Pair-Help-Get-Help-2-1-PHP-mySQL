<?php
require_once('function.php');
connectdb();
session_start();



if(isset($_POST["username"]) or isset($_POST["password"])){

sleep(1);


$username = $_POST["username"];
$password = $_POST["password"];
$mdpass = md5($password);

$data = mysql_fetch_array(mysql_query("SELECT password, block FROM users WHERE username='".$username."'"));
if ($data[1]==1) {
echo "Your Account is Currently Blocked From Login";

}elseif ($data[0] == $mdpass) {
//$return_arr["status"]=1;

//-------------------------------------------------->>>>>>>>>>>>>>>>>>>> Make Auth
$tm = time();
$si = "$username$tm";
$sid = md5($si);
$_SESSION['sid'] = $sid;
$_SESSION['username'] = $username;
mysql_query("UPDATE users SET sid='".$sid."' WHERE username='".$username."'");
//-------------------------------------------------->>>>>>>>>>>>>>>>>>>> Make Auth

 echo "ok"; // log in

}else{
//$return_arr["status"]=0;
echo "Combination of Username And Password is Wrong";

}  //end else





//		echo json_encode($return_arr); // return value 





exit();
}
?>