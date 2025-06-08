<!-- REPORT TO ADMIN -->
<?php 
if (isset($_POST['report'])) {

$iidd = mysql_real_escape_string($_POST['iid']);
$details = mysql_real_escape_string($_POST['details']);

$err1 = 0;
$err2 = 0;

if ($iidd=="") {
$err1 = 1;
}


$newddd = mysql_fetch_array(mysql_query("SELECT payto, payby, status, pkg, amount FROM donation WHERE id='".$iidd."'"));
if ($newddd[0]!=$uid || $newddd[2]!='2') {
$err2 = 1;
}


$error = $err1+$err2;
if ($error == 0){

$res = mysql_query("UPDATE donation SET  details='".$details."', report='1' WHERE id='".$iidd."'");
if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Reported Successfully !
</div>";

}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Some Problem Occurs! Please Try Again...
</div>";
}
}else{

if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Some Problem Occurs! Please Try Again...
</div>";
} 

if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
YOU ALREADY TAKE ACTION :P
</div>";
} 

}



}



?>

<!-- REPORT TO ADMIN-->

<!-- HE PAID -->
<?php 
if (isset($_POST['done'])) {

$iidd = mysql_real_escape_string($_POST['iid']);

$err1 = 0;
$err2 = 0;

if ($iidd=="") {
$err1 = 1;
}


$newddd = mysql_fetch_array(mysql_query("SELECT payto, payby, status, pkg, amount FROM donation WHERE id='".$iidd."'"));
if ($newddd[0]!=$uid || $newddd[2]!='1') {
$err2 = 1;
}


$error = $err1+$err2;
if ($error == 0){

$res = mysql_query("UPDATE donation SET  aptm='".time()."', status='3' WHERE id='".$iidd."'");
if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Information Updated Successfully !
</div>";

////////////////------------->>>>>>>>>>MAKE ELIGIBLE
$tm1 = time()+600000;
$res = mysql_query("INSERT INTO donation SET payto='".$newddd[1]."', pos='1', pkg='".$newddd[3]."', amount='".$newddd[4]."', payby='0', ctm='".time()."', atm='0', status='0'");

$res = mysql_query("INSERT INTO donation SET payto='".$newddd[1]."', pos='2', pkg='".$newddd[3]."', amount='".$newddd[4]."', payby='0', ctm='".$tm1."', atm='0', status='0'");
////////////////------------->>>>>>>>>>MAKE ELIGIBLE



$des = "Donation";
////------------------------------>>>>>>>>>TRX
mysql_query("INSERT INTO trx SET usid='".$uid."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='".$newddd[4]."'");
mysql_query("INSERT INTO trx SET usid='".$newddd[1]."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='-".$newddd[4]."'");
////------------------------------>>>>>>>>>TRX


///////////////////------------------------------------->>>>>>>>>Send Email
$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, phone, email FROM users WHERE id='".$newddd[1]."'"));
$txt = "This is a soft notification that Your Payment is Approved";
abiremail($userContact[3], "Your Payment is Approved", "$userContact[0] $userContact[1]", $txt);

$txt = "This is a soft notification that You Are Eligible For Get Donation";
abiremail($userContact[3], "You Are Eligible For Get Donation", "$userContact[0] $userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send Email

}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Some Problem Occurs! Please Try Again...
</div>";
}
}else{

if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Some Problem Occurs! Please Try Again...
</div>";
} 

if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
YOU ALREADY TAKE ACTION :P
</div>";
} 

}



}



?>

<!-- HE PAID-->



<!-- HE CANNOT PAY -->
<?php 
if (isset($_POST['rmv'])) {

$iidd = mysql_real_escape_string($_POST['iid']);

$err1 = 0;
$err2 = 0;
$err3 = 0;

if ($iidd=="") {
$err1 = 1;
}


$newddd = mysql_fetch_array(mysql_query("SELECT payto, payby, status, pkg, amount, atm FROM donation WHERE id='".$iidd."'"));
if ($newddd[0]!=$uid || $newddd[2]!='1') {
$err2 = 1;
}

$allow = ($tms[1]*3600)+$newddd[5];
$tmrmv = $allow-time();
if ($tmrmv>0) {
$err3 = 1;
}

$error = $err1+$err2+$err3;
if ($error == 0){

$res = mysql_query("UPDATE donation SET  payby='0', atm='0', status='0' WHERE id='".$iidd."'");
if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Information Updated Successfully !
</div>";

////////////////------------->>>>>>>>>>BLOCK
mysql_query("UPDATE users SET block='1' WHERE id='".$newddd[1]."'");

///////////////////------------------------------------->>>>>>>>>Send Email
$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, phone, email FROM users WHERE id='".$newddd[1]."'"));
$txt = "This is a soft notification that You Can Not Pay. And Your Account Is Blocked ";
abiremail($userContact[3], "Your Account Is Blocked", "$userContact[0] $userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send Email
////////////////------------->>>>>>>>>>BLOCK
}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Some Problem Occurs! Please Try Again...
</div>";
}
}else{

if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Some Problem Occurs! Please Try Again...
</div>";
} 

if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
YOU ALREADY TAKE ACTION :P
</div>";
} 

if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Please Wait for the time
</div>";
} 

}



}



?>

<!-- HE CANNOT PAY-->




<?php 
$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payto='".$uid."' AND (status='0' OR status='1' OR  status='2')"));
if ($count[0]>0) {
?>

<div class="promo promo-border promo-center bottommargin">
<h3><span style="text-transform: uppercase;">Your Awaiting Donations</span></h3>

<br><br><br>
<div class="row">

<?php
$oop = mysql_query("SELECT payto, pos, pkg, amount, payby, ctm, atm, status, id, ptyp, nameslip, img, ptm, report FROM donation WHERE payto='".$uid."' AND (status='0' OR status='1' OR  status='2') ORDER BY id ASC");

while ( $details = mysql_fetch_array($oop)) {


$udata = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$details[4]."'"));

if ($details[7]==0) {

$sln = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE ctm<'".$details[5]."' AND pkg='".$details[2]."' AND status='0'"));



$qt = mysql_fetch_array(mysql_query("SELECT qtxt FROM general_setting WHERE id='1'"));
$num = $sln[0]+1;
$a = "<span>$num</span>";
$qttt = str_replace("{{number}}",$a,$qt[0]);    

?>


<div class="col-md-6">


<div class="panel panel-warning">
<div class="panel-heading" style='background:#fff; color:#<?php echo $basecolor; ?>; border-bottom: 3px solid #<?php echo $basecolor; ?>;'>
<h3 class="panel-title"><strong>WAITING TO BE MATCHED</strong> </h3> </div>
<div class="panel-body" style="text-align: center;">
<h1 style="font-weight: bold;"> AMOUNT  <span><?php echo "$basecurrency $details[3]"; ?></span></h1>



<h2 style="font-weight: bold; text-transform: uppercase;"><br><?php echo $qttt; ?></h2>










</div>
</div>
</div>


<?php
}

if ($details[7]==1) {
?>


<div class="col-md-6">



<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>AWAITING PAYMENT</strong> </h3> </div>
<div class="panel-body" style="text-align: center;">
<h1 style="font-weight: bold;"> AMOUNT  <span><?php echo "$details[3] $basecurrency"; ?></span></h1>

<div class="row">
<div class="col-md-12 col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>CONTACT INFORMATION</strong> </h3> </div>
<div class="panel-body" style="text-align: center;">

<h4>NAME: <span><?php echo $udata['fname']; ?> <?php echo $udata['lname']; ?></span></h4>
<h4>EMAIL: <span><?php echo $udata['email']; ?></span></h4>
<h4>PHONE: <span><?php echo $udata['phone']; ?></span></h4>


</div>
</div>
</div>
</div>




<div class="row">
<div class="col-md-5 col-md-offset-1">
<?php 

$coucd[] ="";
$allow = ($tms[1]*3600)+$details[6];
$tmrmv = $allow-time();
if ($tmrmv>0) {
$coucd[] ="$tmrmv/rmv$details[8]";
echo '<button class="btn btn-lg disabled button-rounded btn-block">REMOVE THIS USER</button>';

echo "
<br>
<br>
<strong> BUTTON WILL VISIBLE IN
<span style='color:#$basecolor; text-transform: uppercase;'>
<div id=\"rmv$details[8]\"></div>
</span></strong>
";
}else{

echo '<button class="btn btn-lg btn-danger btn-block" data-toggle="modal" data-target=".modal-rmv'.$details[8].'">REMOVE THIS USER</button>';
}


 ?>


</div>
<div class="col-md-5">
<button class="btn btn-block btn-lg btn-success button-rounded" data-toggle="modal" data-target=".modal-paid<?php echo $details[8]; ?>">MARK AS PAID</button>
</div>
</div>




<!-- MODAL	 -->
<div class="modal fade modal-rmv<?php echo $details[8]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">REMOVE THIS USER</h4>
</div>
<div class="modal-body">
<form action="" method="post">
<input type="hidden" name="iid" value="<?php echo $details[8]; ?>">
<input type="hidden" name="rmv" value="<?php echo $details[8]; ?>">


<h3 style="text-align: center;">
<br><br><span>ARE YOU SURE THE USER IS FAILED TO PAY??</span><br><br><br>
</h3>

<br><br>
<div class="row">
<div class="col-md-6">
<button type="button" class="btn btn-lg btn-block btn-info" data-dismiss="modal" aria-hidden="true">NO !</button>
</div>

<div class="col-md-6">
<button type="submit" class="btn btn-lg btn-block btn-success"> YES, I AM SURE </button>
</div>
</div>

</form>

</div>
</div>
</div>
</div>
</div>
<!-- MODAL END  -->




<!-- MODAL	 -->
<div class="modal fade modal-paid<?php echo $details[8]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">PAYMENT RECEIVED?</h4>
</div>
<div class="modal-body">
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="iid" value="<?php echo $details[8]; ?>">
<input type="hidden" name="done" value="<?php echo $details[8]; ?>">


<h3 style="text-align: center;">
<br><br><span>please do not confirm if have not seen the alert</span><br><br><br>
</h3>
<br><br>
<div class="row">
<div class="col-md-6">
<button type="button" class="btn btn-lg btn-block btn-warning" data-dismiss="modal" aria-hidden="true">NOT YET</button>
</div>

<div class="col-md-6">
<button type="submit" class="btn btn-lg btn-block btn-success"> YES I GOT IT </button>
</div>
</div>

</form>

</div>
</div>
</div>
</div>
</div>
<!-- MODAL END  -->




</div>
</div>
</div>


<?php
}
if ($details[7]==2) {
?>

<?php 
if ($details[13]==1) {
?>


<div class="col-md-6">


<div class="panel panel-warning">
<div class="panel-heading">
<h3 class="panel-title"><strong>REPORTED TO ADMIN</strong> </h3> </div>
<div class="panel-body" style="text-align: center;">
<h1 style="font-weight: bold;"> AMOUNT  <span><?php echo "$details[3] $basecurrency"; ?></span></h1>

<h2 style="font-weight: bold; text-transform: uppercase;"><span>PLEASE BE PATIENT, ADMIN WILL TAKE ACTION SOON.</span></h2>

</div>



<?php

}else{
?>


<div class="col-md-6">



<div class="panel panel-success">
<div class="panel-heading">
<h3 class="panel-title"><strong>AWAITING CONFIRMATION</strong> </h3> </div>
<div class="panel-body" style="text-align: center;">
<h1 style="font-weight: bold;"> AMOUNT  <span><?php echo "$details[3] $basecurrency"; ?></span></h1>




<div class="table-responsive">
<table class="table table-bordered table-striped">
<colgroup>
<col class="col-xs-4">
<col class="col-xs-4">
<col class="col-xs-4">
</colgroup>

<tbody>
<tr>
<td><h4>NAME</h4></span></td>
<td><h4>PHONE</h4></span></td>
<td><h4>EMAIL</h4></span></td>
</tr>
<tr>
<td><strong><span><?php echo $udata['fname']; ?>  <?php echo $udata['lname']; ?></strong></span></td>
<td><strong><span><?php echo $udata['phone']; ?></strong></span></td>
<td><strong><span><?php echo $udata['email']; ?></strong></span></td>
</tr>
</tbody>
</table>

</div>




<h4 style="">PAID:

<span><?php
$sec = time()-$details[12];
timeago($sec);
 ?></span></h4>

</div>

<div class="row">
<div class="col-md-5 col-md-offset-1">
<button class="btn btn-block  btn-warning button-rounded" data-toggle="modal" data-target=".modal-info<?php echo $details[8]; ?>">PAYMENT INFORMATION</button>
</div>
<div class="col-md-5">
<button class="btn btn-block btn-success button-rounded" data-toggle="modal" data-target=".modal-paid<?php echo $details[8]; ?>">MARK AS PAID</button>
</div>
</div>



<div class="row">
<br><br>
<div class="col-md-8 col-md-offset-2">
<button class="btn btn-block  btn-danger button-rounded" data-toggle="modal" data-target=".modal-report<?php echo $details[8]; ?>">REPORT</button>
</div>
</div>
<?php 
}
?>



<br>
</div>
</div>


<!-- MODAL	 -->
<div class="modal fade modal-report<?php echo $details[8]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">REPORT</h4>
</div>
<div class="modal-body">
<form action="" method="post">
<input type="hidden" name="iid" value="<?php echo $details[8]; ?>">
<input type="hidden" name="report" value="<?php echo $details[8]; ?>">


<br>
<div class="row">
<div class="col-md-12">
<label>Reason Of Report:</label>

<textarea name="details" rows="3" class="form-control input-lg" placeholder="Description" ></textarea>
</div>
</div>
<br>



<div class="row">
<div class="col-md-6">
<button type="button" class="btn btn-lg btn-block btn-secondary" data-dismiss="modal" aria-hidden="true">CANCEL</button>
</div>

<div class="col-md-6">
<button type="submit" class="btn btn-lg btn-block btn-success"> SUBMIT </button>
</div>
</div>

</form>

</div>
</div>
</div>
</div>
</div>
<!-- MODAL END  -->



<!-- MODAL	 -->
<div class="modal fade modal-paid<?php echo $details[8]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">PAYMENT RECEIVED?</h4>
</div>
<div class="modal-body">
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="iid" value="<?php echo $details[8]; ?>">
<input type="hidden" name="done" value="<?php echo $details[8]; ?>">


<h3 style="text-align: center;">
<br><br><span>please do not confirm if have not seen the alert</span><br><br><br>
</h3>
<br><br>
<div class="row">
<div class="col-md-6">
<button type="button" class="btn btn-lg btn-block btn-warning" data-dismiss="modal" aria-hidden="true">NOT YET</button>
</div>

<div class="col-md-6">
<button type="submit" class="btn btn-lg btn-block btn-success"> YES I GOT IT </button>
</div>
</div>

</form>

</div>
</div>
</div>
</div>
</div>
<!-- MODAL END  -->

<!-- MODAL	 -->
<div class="modal fade modal-info<?php echo $details[8]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">PAYMENT INFORMATION</h4>
</div>
<div class="modal-body">



<h3 style="text-align: center;">
Payment Type: <span><?php echo $details[9]; ?></span><br>
Name On Pay Slip: <span><?php echo $details[10]; ?></span><br>
PAYMENT IMAGE: <br>
</h3>
<img src="<?php echo $baseurl; ?>/asset/paymentimages/<?php echo $details[11]; ?>" alt="*" style='width: 100%;'>
<br>
<br>
<br>
<br>

<br><br>



</div>
</div>
</div>
</div>
</div>
<!-- MODAL END  -->




<?php 
}
}

echo "</div>";
}
?>
