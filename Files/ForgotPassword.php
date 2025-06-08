<?php
Include('include-global.php');
$pagename = "Forgot Password";
$title = "$pagename - $basetitle";
Include('include-header.php');
if (is_user()) {
redirect("$baseurl/dashboard");
}
?>
<style>
  
.slow-spin {
  -webkit-animation: fa-spin 2s infinite linear;
  animation: fa-spin 2s infinite linear;
}

</style>

</head>
<body class="stretched" data-loader="<?php echo $baseloader; ?>" data-loader-color='<?php echo "#$basecolor"; ?>'>

<?php
Include('include-navbar.php');
Include('include-subhead.php');
?>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">





<div class="row">



<?php







///////////---------------->>>>>echo "$fstform"

$fstform = '

<div class="col-md-6 col-md-offset-3">
<div class="well well-lg nobottommargin">
<form id="login-form" name="login-form" class="nobottommargin" action="" method="post">
<h3>Reset Your Password</h3>

<div class="col_full">
<label for="login-form-username">Username:</label>
<input id="username" name="username" class="form-control input-lg" type="text">
</div>

<div class="col_full nobottommargin">
<button class="button button-3d btn-block nomargin" type="submit">NEXT STEP</button>
</div>

</form>
</div>
</div>
';



///////////---------------->>>>>echo "$fstform"












if(isset($_POST['vcode']))
{
$code= $_POST["vcode"];
$username = $_POST["user"];

$codeOnDB = mysql_fetch_array(mysql_query("SELECT forgotcode FROM users WHERE username='".$username."'"));


if($codeOnDB[0]==$code){

$aa = date("YDlJH:i:s");
$md = MD5($aa);
$newpass  = substr($md, 0, 6);
$mdpass = md5($newpass);

mysql_query("UPDATE users SET password='".$mdpass."', forgotcode='' WHERE username='".$username."'");


echo "<div class=\"alert alert-success alert-dismissable\">
Password Reset Completed Successfully !!
</div>";

echo "<h1 class='center'>YOUR TEMPORARY PASSWORD IS: <span> $newpass </span> Change It As Soon As Possible! </h1>";

echo "<b style=\"color:green; font-size: 20px;\"> </b><br/><br/>";

echo "$fstform";

}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
Your Reset Code is Wrong !!!
</div>";
  
echo "$fstform";
}
}elseif(isset($_POST['username']))
{
$username = $_POST["username"];

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$username."'"));

if($count[0]>=1){
$cde = rand(100000,999999);
mysql_query("UPDATE users SET forgotcode='".$cde."' WHERE username='".$username."'");



///////////////////------------------------------------->>>>>>>>>Send Email

$txt = "
You are request for password reset for your account (Username: $username). To Make sure that you really want to reset your password, Here is the Reset Code :
<br><br>
<h2 style='font-size: 40px; text-align: center; font-weight: bold;'>$cde</h2>
<br><br>
If you are not request for password reset, please ignore this email.
<br><br>
<b style='color:red;'>Please Do Not Share The Code With Others .</b> 
<br>
";

$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, phone, email FROM users WHERE username='".$username."'"));
abiremail2($userContact[3], "PASSWORD RESET CODE", "$userContact[0] $userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send Email



echo "<div class=\"alert alert-success alert-dismissable\">
Reset Code Sent to  $userContact[3]
</div>";

?>



<div class="col-md-6 col-md-offset-3">
<div class="well well-lg nobottommargin">
<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
<h3>Reset Your Password</h3>

<div class="col_full">
<label for="login-form-username">Reset Code:</label>
<input id="username" name="vcode" class="form-control input-lg" type="text">
</div>

<input type="hidden" name="user" value="<?php echo $username; ?>">

<div class="col_full nobottommargin">
<button class="button button-3d btn-block nomargin" type="submit">Reset</button>
</div>

</form>
</div>
</div>
</div>

<?php
}else{

echo "<div class=\"alert alert-danger alert-dismissable\">
 NO ACCOUNT FOUND WITH THIS USERNAME.
</div>";

echo "$fstform";

}
}else{


echo $fstform;

}
?>


<div class="col-md-6 col-md-offset-3">
<p style="text-align: center; font-weight: bold; text-transform: uppercase;">
<a href="<?php echo $baseurl; ?>/ForgotUsername"> Forgot Username </a> |
<a href="<?php echo $baseurl; ?>/register"> Register NOW</a> |
<a href="<?php echo $baseurl; ?>/login"> Login Now</a> 
</p>
</div>

</div><!-- row -->


</div>
</div>
</section>
<?php
Include('include-footer.php');
?>
</body>
</html>