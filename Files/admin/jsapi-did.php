<?php

require_once('../function.php');
connectdb();
session_start();


$username = mysql_real_escape_string($_POST["username"]);


$exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$username."'"));

if($exist[0]==0){
echo "<b style='color:red;'><i class='fa fa-times'></i> Username $username Not Found in Database</b>";
}elseif (!valid_username($username)){
echo "<b style='color:red;'><i class='fa fa-times'></i>  Username is invalid. Please Use Only [a-z0-9_-] And NO SPACE</b>";
}else{

$udata = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='".$username."'"))
?>
   <div class="panel-body" style="text-align: center;">

<h1 style="font-weight: bold;"><?php echo $udata['fname']; ?>  <?php echo $udata['lname']; ?></h1>
<div style="background: red; height: 2px;"></div>
<h4 style="">Bank Name: <strong><?php echo $udata['bank_name']; ?></strong></h4>
<h4 style="">Account Name: <strong><?php echo $udata['bank_acname']; ?></strong></h4>
<h4 style="">Account Number: <strong><?php echo $udata['bank_acno']; ?></strong></h4>
<h4 style="">Phone Number: <strong><?php echo $udata['phone']; ?></strong></h4>
</div>

<?php





}



?>


