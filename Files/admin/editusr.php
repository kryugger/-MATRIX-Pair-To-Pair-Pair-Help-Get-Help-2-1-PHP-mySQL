<?php
include ('include/header.php');
if($usid[2]!=100){
redirect('home.php');
}
?>

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo">


<?php
include ('include/sidebar.php');
?>




<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
<!-- BEGIN PAGE HEADER-->

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">EDIT USER
<small></small>
</h3>
<!-- END PAGE TITLE-->

<hr>






<div class="row">
<div class="col-md-12">
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">

<div class="portlet-body form">
<form class="form-horizontal" action="" method="post" role="form">
<div class="form-body">


<?php
$iidd = $_GET['userid'];


if($_POST)
{


$firstname = mysql_real_escape_string($_POST["fnm"]);
$lastname = mysql_real_escape_string($_POST["lnm"]);
$email = mysql_real_escape_string($_POST["email"]);
$phone = mysql_real_escape_string($_POST["phone"]);

$bname = mysql_real_escape_string($_POST["bname"]);
$acname = mysql_real_escape_string($_POST["acname"]);
$acno = mysql_real_escape_string($_POST["acno"]);
$mallu = mysql_real_escape_string($_POST["mallu"]);




$res = mysql_query("UPDATE users SET  fname='".$firstname."', lname='".$lastname."', phone='".$phone."', email='".$email."', bank_name='".$bname."', bank_acname='".$acname."', bank_acno='".$acno."', mallu='".$mallu."' WHERE id='".$iidd."'");

if($res){
notification("Updated Successfully!", "", "success", false, "btn-primary", "OKAY");
}else{
notification("Some Problem Occurs!", "Please Try Again...", "error", false, "btn-primary", "OKAY");
}



}


$old = mysql_fetch_array(mysql_query("SELECT id, ref, username, fname, lname, email, phone, bank_name, bank_acname, bank_acno, mallu FROM users WHERE id='".$iidd."'"));

$refBy = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE id='".$old[1]."'"));

?>										






<div class="form-group">
<label class="col-md-3 control-label"><strong>User Name</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" value="<?php echo $old[2];?>" type="text" disabled="">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"><strong>Reff. By</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" value="<?php echo $refBy[0];?>" type="text" disabled="">
</div>
</div>




<hr>






<div class="form-group">
<label class="col-md-3 control-label"><strong>First Name</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="fnm" value="<?php echo $old[3];?>" type="text">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"><strong>Last Name</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="lnm" value="<?php echo $old[4];?>" type="text">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"><strong>Email</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="email" value="<?php echo $old[5];?>" type="text">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label"><strong>Phone</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="phone" value="<?php echo $old[6];?>" type="text">
</div>
</div>





<div class="form-group">
<label class="col-md-3 control-label"><strong>Bank Name</strong></label>
<div class="col-md-6">
<input name="bname" class="form-control input-lg" value="<?php echo $old[7]; ?>" type="text" required="">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label"><strong>Account Name</strong></label>
<div class="col-md-6">
<input name="acname" class="form-control input-lg" value="<?php echo $old[8]; ?>" type="text" required="">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label"><strong>Account Number</strong></label>
<div class="col-md-6">
<input name="acno" class="form-control input-lg" value="<?php echo $old[9]; ?>" type="text" required="">
</div>
</div>




<div class="form-group">
<label class="col-md-3 control-label"><strong>Bonus Account Balance</strong></label>
<div class="col-md-6">
<input name="mallu" class="form-control input-lg" value="<?php echo $old[10]; ?>" type="text" required="">
</div>
</div>







<div class="row">
<div class="col-md-offset-3 col-md-6">
<button type="submit" class="btn blue btn-block">UPDATE</button>
</div>
</div>

</div>
</form>
</div>
</div>
</div>		
</div><!---ROW-->		













</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->




<?php
include ('include/footer.php');
?>


</body>
</html>