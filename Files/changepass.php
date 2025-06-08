<?php
Include('include-global.php');
$pagename = "Chnage Password";
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
if($_POST){
$oldword = $_POST["oldword"];
$newword = $_POST["newword"];
$newwword = $_POST["newwword"];
$oldmd = MD5($oldword);
$cpass = mysql_fetch_array(mysql_query("SELECT password FROM users WHERE id='".$uid."'"));


$err1 = 0;
$err2 = 0;
$err3 = 0;
$err4 = 0;


///////////////////////-------------------->> CURRENT PASS THIK ACHE TO?
if ($cpass[0]!=$oldmd){
$err1=1;
}

///////////////////////-------------------->> 2 bar ki same?
if ($newword!=$newwword){
$err2=1;
}

///////////////////////-------------------->> Pass ki faka??

 if(trim($newword)=="")
      {
$err3=1;
}

 if(strlen($newword)<=7)
      {
$err4=1;
}

$error = $err1+$err2+$err3+$err4;


if ($error == 0){
$passmd = MD5($newword);
$res = mysql_query("UPDATE users SET password='".$passmd."' WHERE id='".$uid."'");
if($res){
	echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Password Updated Successfully!
</div>";
}else{
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Some Problem Occure. Please Try Again Later !
</div>";
}
} else {
	
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Your Current Password Does Not Match.
</div>";
}		
if ($err2 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
You Enter Different Password in two field. Please enter same password in both field.
</div>";

}		
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Password Can Not Be Empty!!!
</div>";
echo"<h1></h1>";
}		
if ($err4 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Password Must be 8 or more char.
</div>";
}	

	
}



} 
	?>
			



<form action="" method="post">


<div class="row">
<div class="col-md-12">
<label>Current Password:</label>
<input name="oldword" class="form-control input-lg" type="password" required="">
</div>
</div>

<br>
<div class="row">
<div class="col-md-12">
<label>New Password:</label>
<input name="newword" class="form-control input-lg" type="password" required="">
</div>
</div>

<br>
<div class="row">
<div class="col-md-12">
<label>New Password Again:</label>
<input name="newwword" class="form-control input-lg" type="password" required="">
</div>
</div>

<br>


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
