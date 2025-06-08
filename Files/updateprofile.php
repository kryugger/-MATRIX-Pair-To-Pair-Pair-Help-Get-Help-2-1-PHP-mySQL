<?php
Include('include-global.php');
$pagename = "Update Profile";
$title = "$pagename - $basetitle";
Include('include-header.php');
?>
</head>
<body class="stretched" data-loader="<?php echo $baseloader; ?>" data-loader-color='<?php echo "#$basecolor"; ?>'>
<?php
Include('include-navbar-user.php');
Include('include-subhead.php');
?>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">


<div class="row">


<?php

$count1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payto='".$uid."' AND (status='0' OR status='1' OR  status='2')"));
$count2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payby='".$uid."' AND (status='1' OR  status='2')"));
$count2 = $count1[0]+$count2[0];

if($_POST)
{


$firstname = mysql_real_escape_string($_POST["fname"]);
$lastname = mysql_real_escape_string($_POST["lname"]);
$email = mysql_real_escape_string($_POST["email"]);
$phone = mysql_real_escape_string($_POST["phone"]);
//$phone2 = mysql_real_escape_string($_POST["phone2"]);

$bname = mysql_real_escape_string($_POST["bname"]);
$acname = mysql_real_escape_string($_POST["acname"]);
$acno = mysql_real_escape_string($_POST["acno"]);


$err1=0;
$err2=0;
$err3=0;
$err4=0;
$err5=0;
$err6=0;
$err7=0;


if(trim($firstname)==""){
$err1=1;
}

if(trim($lastname)==""){
$err2=1;
}

if(trim($email)==""){
$err3=1;
}

$eee = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$email."' AND id<>$uid"));
if($eee[0]!=0){
$err4=1;
}

if(trim($phone)==""){
//$err5=1;
}

$mob = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE phone='".$phone."' AND id<>$uid"));
if($mob[0]!=0){
$err6=1;
}

$eee = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE bank_acno='".$acno."' AND id<>$uid"));
if($eee[0]!=0){
$err7=1;
}


$error = $err1+$err2+$err3+$err4+$err5+$err6+$err7;


if ($error == 0){


if ($count2==0) {
$res = mysql_query("UPDATE users SET fname='".$firstname."', lname='".$lastname."', email='".$email."', bank_name='".$bname."', bank_acname='".$acname."', bank_acno='".$acno."'  WHERE id='".$uid."'");
}else{
$res = mysql_query("UPDATE users SET fname='".$firstname."', lname='".$lastname."', email='".$email."' WHERE id='".$uid."'");
}



if($res){
  echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Updated Successfully!
</div>";

}else{
  echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Some Problem Occurs, Please Try Again. 
</div>";
}
} else {
  
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
First Name Can Not be Empty!!!
</div>";
}   
  
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Last Name Can Not be Empty!!!
</div>";
}   
  
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Email Can Not be Empty!!!
</div>";
}   


  
if ($err4 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Email Already Exist in our database... Please Use another Email!!
</div>";
}   


  
if ($err5 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Mobile Can Not be Empty!!!
</div>";
}   


  
if ($err6 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Mobile Number Already Exist in our database... Please Use another Mobile Number!!
</div>";
}   
  
if ($err7 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Account Number Already Exist in our database... Please Use another Account Number!!
</div>";
}   



}



}


$old = mysql_fetch_array(mysql_query("SELECT fname, lname, email, phone, bank_name, bank_acname, bank_acno, phone2 FROM users WHERE id='".$uid."'"));
echo mysql_error();

if ($count2==0) {
$sty = "";
}else{
$sty = "disabled";
}

?>









<form action="" method="post">


<div class="row">

<div class="col-md-6">
<label>Frist Name:</label>
<input name="fname" class="form-control input-lg" value="<?php echo $old[0] ?>" type="text" required="">
</div>

<div class="col-md-6">
<label>Last Name:</label>
<input name="lname" class="form-control input-lg" value="<?php echo $old[1]; ?>" type="text" required="">
</div>

</div>
<br>


<div class="row">

<div class="col-md-6">
<label>Email Address:</label>
<input id="email" name="email" class="form-control input-lg" value="<?php echo $old[2]; ?>" type="email" required="">
</div>

<div class="col-md-6">
<label>Phone Number:</label>
<input id="phone" name="phone" class="form-control input-lg" value="<?php echo $old[3]; ?>" type="text" disabled>
</div>


</div>
<br><hr>


<div class="row">

<div class="col-md-4">
<label>Bank Name:</label>
<input name="bname" class="form-control input-lg" value="<?php echo $old[4]; ?>" type="text" required="" <?php echo $sty; ?>>
</div>
<div class="col-md-4">
<label>Account Name:</label>
<input name="acname" class="form-control input-lg" value="<?php echo $old[5]; ?>" type="text" required="" <?php echo $sty; ?>>
</div>
<div class="col-md-4">
<label>Account Number:</label>
<input name="acno" class="form-control input-lg" value="<?php echo $old[6]; ?>" type="text" maxlength="10" required="" <?php echo $sty; ?>>
</div>


</div>

<br><br><br><br>






<div class="col_full nobottommargin">
<button class="btn btn-primary btn-lg btn-block nomargin" id="register-form-submit" name="register-form-submit" value="register">Update Now</button>
</div>

            </form>















</div><!-- row -->


</div>
</div>
</section>
<?php 
include('include-footer.php');
?>
</body>
</html>
