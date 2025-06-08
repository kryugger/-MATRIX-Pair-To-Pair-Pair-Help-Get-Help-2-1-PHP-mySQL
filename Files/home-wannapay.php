<!-- I PAID  -->

<?php 
if (isset($_POST['paid'])) {

$iidd = mysql_real_escape_string($_POST['iid']);
$nameslip = mysql_real_escape_string($_POST['nameslip']);
$ptyp = mysql_real_escape_string($_POST['ptyp']);

$err1 = 0;
$err2 = 0;
$err3 = 0;
$err4 = 0;
$err5 = 0;
$err6 = 0;

if ($iidd=="") {
$err3 = 1;
}

if ($nameslip=="") {
$err4 = 1;
}

if ($ptyp=="") {
$err5 = 1;
}

// IMAGE UPLOAD //////////////////////////////////////////////////////////
    $folder = "asset/paymentimages/";
    $extention = strrchr($_FILES['img']['name'], ".");

$size = $_FILES['img']['size']/1024;
$ex = strtoupper($extention);

if ($size>512) {
$err1 = 1;
}elseif ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") {
    $new_name = $txn_id;
    $img = $new_name.$extention;
    $uploaddir = $folder . $img;
move_uploaded_file($_FILES['img']['tmp_name'], $uploaddir);
}else{
$err2 = 1;
}
// //////////////////////////////////////////////////////////////////////////

$newddd = mysql_fetch_array(mysql_query("SELECT payto, payby, status FROM donation WHERE id='".$iidd."'"));

if ($newddd[1]!=$uid || $newddd[2]!='1') {
$err6 = 1;
}


$error = $err1+$err2+$err3+$err4+$err5+$err6;
if ($error == 0){

$res = mysql_query("UPDATE donation SET img='".$img."', nameslip='".$nameslip."', ptyp='".$ptyp."', ptm='".time()."', status='2' WHERE id='".$iidd."'");
if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Information Updated Successfully !
</div>";
///////////////////------------------------------------->>>>>>>>>Send Email
$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, phone, email FROM users WHERE id='".$newddd[0]."'"));
$txt = "This is a soft notification that An User Just Say that S/He Pay You. Please Login For Details";
abiremail($userContact[3], "You Got Payment", "$userContact[0] $userContact[1]", $txt);
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
IMAGE SIZE MUST BE LESS THAN 512KB !
</div>";
} 

if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
IMAGE TYPE NOT ALLOWD !!
</div>";
} 

if ($err3 == 1 || $err4 == 1 || $err5 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
PLEASE WRITE EVERYTHING !!
</div>";
} 

if ($err6 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
YOU ALREADY TAKE ACTION :P
</div>";
} 

}



}



?>

<!-- I PAID  -->




<!-- CAN NOT PAY -->

<?php 
if (isset($_POST['cannot'])) {

$iidd = mysql_real_escape_string($_POST['iid']);

$err1 = 0;
$err2 = 0;

if ($iidd=="") {
$err1 = 1;
}


$newddd = mysql_fetch_array(mysql_query("SELECT payto, payby, status FROM donation WHERE id='".$iidd."'"));
if ($newddd[1]!=$uid || $newddd[2]!='1') {
$err2 = 1;
}


$error = $err1+$err2;
if ($error == 0){

$res = mysql_query("UPDATE donation SET payby='0', atm='0', status='0' WHERE id='".$iidd."'");
if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Information Updated Successfully !
</div>";
$al = time()+3*24*60*60;
mysql_query("UPDATE users SET wt='".$al."' WHERE id='".$uid."'");

///////////////////------------------------------------->>>>>>>>>Send Email
// $userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, phone, email FROM users WHERE id='".$newddd[0]."'"));
// $txt = "This is a soft notification that An User Just Say that S/He Pay You. Please Login For Details";
// abiremail($userContact[3], "You Got Payment", "$userContact[0] $userContact[1]", $txt);
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



<!-- CAN NOT PAY -->
















<?php 
$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payby='".$uid."' AND (status='1' OR  status='2')"));
if ($count[0]>0) {
$details = mysql_fetch_array(mysql_query("SELECT payto, pos, pkg, amount, payby, ctm, atm, status, id, ptyp, nameslip, img, ptm FROM donation WHERE payby='".$uid."' AND (status='1' OR  status='2')"));

$udata = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$details[0]."'"));

if ($details[7]==1) {
?>


<div class="promo promo-border promo-center bottommargin">
<h3><span style="text-transform: uppercase;">YOU HAVE BEEN MERGED TO DONATE</span></h3>
<span><strong>Please Pay The Person Below To Get Paid</strong></span>
<br><br><br>

<?php 
$coucd[] ="";
$allow = ($tms[0]*3600)+$details[6];
$tmrmv = $allow-time();
if ($tmrmv>0) {
$coucd[] ="$tmrmv/rmv$details[8]";

echo "
<h1 style='color:red;'>

<strong>YOU HAVE
<span style='color:#$basecolor; text-transform: uppercase;'>
<div id=\"rmv$details[8]\"></div>
</span>TO MAKE PAYMENT
</strong>
</h1>
";

}


 ?>
<br><br><br>


<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>AWAITING PAYMENT</strong> </h3> </div>
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
<td><h4>BANK NAME</h4></span></td>
<td><h4>ACCOUNT NAME</h4></span></td>
<td><h4>ACCOUNT NAME</h4></span></td>
</tr>
<tr>
<td><h4><span><?php echo $udata['bank_name']; ?></span></h4></span></td>
<td><h4><span><?php echo $udata['bank_acname']; ?></span></h4></span></td>
<td><h4><span><?php echo $udata['bank_acno']; ?></span></h4></span></td>
</tr>
</tbody>
</table>
</div>




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
<td><strong><?php echo $udata['fname']; ?>  <?php echo $udata['lname']; ?></strong></span></td>
<td><strong><?php echo $udata['phone']; ?></strong></span></td>
<td><strong><?php echo $udata['email']; ?></strong></span></td>
</tr>
</tbody>
</table>

</div>









</div>
</div>

<button class="button button-xlarge button-rounded" data-toggle="modal" data-target=".modal-payment">MARK AS PAID</button>

<button class="button button-red button-xlarge button-rounded" data-toggle="modal" data-target=".modal-cant">I CANNOT PAY</button>

</div>



<!-- MODAL	 -->
<div class="modal fade modal-payment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">I SEND THE MONEY</h4>
</div>
<div class="modal-body">

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="iid" value="<?php echo $details[8]; ?>">
<input type="hidden" name="paid" value="<?php echo $details[8]; ?>">
<div class="row">
<div class="col-md-12">
<label>Payment Type:</label>
<input name="ptyp" class="form-control input-lg" type="text" required="">
</div>
</div>
<br>
<div class="row">
<div class="col-md-12">
<label>Name On Pay Slip:</label>
<input name="nameslip" class="form-control input-lg" type="text" required="">
</div>
</div>
<br>

<div class="row">
<div class="col-md-12 bottommargin">
<label>PAYMENT IMAGE:</label><br>
<input id="input-8" type="file" accept="image/*" name="img" class="file-loading" data-allowed-file-extensions='["jpg", "jpeg", "png", "gif"]'>
</div>
</div>



<div class="row">
<div class="col-md-12">
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
<div class="modal fade modal-cant" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">I CANNOT SEND THE MONEY</h4>
</div>
<div class="modal-body">

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="iid" value="<?php echo $details[8]; ?>">
<input type="hidden" name="cannot" value="<?php echo $details[8]; ?>">


<h3 style="text-align: center;">
<span>ARE YOU SURE??</span>
</h3>


<div class="row">
<div class="col-md-6">
<button type="button" class="btn btn-lg btn-block btn-info" data-dismiss="modal" aria-hidden="true">CANCEL</button>
</div>

<div class="col-md-6">
<button type="submit" class="btn btn-lg btn-block btn-danger"> YES</button>
</div>
</div>

</form>

</div>
</div>
</div>
</div>
</div>
<!-- MODAL END  -->








<?php
}

if ($details[7]==2) {
?>


<div class="promo promo-border promo-center bottommargin">
<h3><span style="text-transform: uppercase;">PLEASE WAIT FOR CONFIRMATION</span></h3>
<span><strong>System will Automatically Update You As Soon As You Get Confirmation From <span><?php echo $udata['fname']; ?>  <?php echo $udata['lname']; ?></span></strong></span>


<?php 
/*
$coucd[] ="";
$allow = ($tms[0]*3600)+$details[6];
$tmrmv = $allow-time();
if ($tmrmv>0) {
$coucd[] ="$tmrmv/rmv$details[8]";

echo "
<h1 style='color:red;'>

<strong>YOU HAVE
<span style='color:#$basecolor; text-transform: uppercase;'>
<div id=\"rmv$details[8]\"></div>
</span>TO MAKE PAYMENT<br>
PAY BEFORE THIS TIME TO ENJOY DONATIONS
</strong>
</h1>
";

}
*/

 ?>
<br><br><br>


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
<td><h4>BANK NAME</h4></span></td>
<td><h4>ACCOUNT NAME</h4></span></td>
<td><h4>ACCOUNT NAME</h4></span></td>
</tr>
<tr>
<td><h4><span><?php echo $udata['bank_name']; ?></span></h4></span></td>
<td><h4><span><?php echo $udata['bank_acname']; ?></span></h4></span></td>
<td><h4><span><?php echo $udata['bank_acno']; ?></span></h4></span></td>
</tr>
</tbody>
</table>
</div>




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




<div class="table-responsive">
<table class="table table-bordered table-striped">
<colgroup>
<col class="col-xs-3">
<col class="col-xs-3">
<col class="col-xs-3">
<col class="col-xs-3">
</colgroup>

<tbody>
<tr>
<td><h4>PAID</h4></span></td>
<td><h4>PAYMENT TYPE</h4></span></td>
<td><h4>NAME ON SLIP</h4></span></td>
<td><h4>IMAGE</h4></span></td>
</tr>
<tr>
<td><strong><span><?php
$sec = time()-$details[12];
timeago($sec);
 ?></span></strong></td>


<td><strong><?php echo $details[9]; ?></strong></td>
<td><strong><?php echo $details[10]; ?></strong></td>
<td>
<img src="<?php echo $baseurl; ?>/asset/paymentimages/<?php echo $details[11]; ?>" alt="*" style='width: 100%;'></td>
</tr>
</tbody>
</table>

</div>













</div>
</div>

</div>





<?php 
}
}
?>

