<?php
include ('include/header.php');
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
<h3 class="page-title"> SEARCH DONATION
<small></small>
</h3>
<!-- END PAGE TITLE-->

<hr>






<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
<div class="row">
<form action="" method="post">
<div class="col-md-8">
<input type="number" name="donation" class=" form-control input-lg" placeholder="DONATION ID">
</div>

<div class="col-md-4">
<button type="submit" class="btn btn-primary btn-block btn-lg">SHOW DETAILS</button>
</div>

</form>
</div>
</div>











<div class="portlet light bordered">

<div class="row">
<?php 
if (isset($_POST['donation'])) {
$did = $_POST['donation'];

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE id='".$did."'"));

if ($count[0]==0) {
echo "<h1 style='text-align: center; font-weight: bold; color: red;'>NO DONATION FOUND WITH THE DONATION ID $did</h1>";
}else{
$data = mysql_fetch_array(mysql_query("SELECT `id`, `payto`, `pos`, `pkg`, `amount`, `payby`, `ctm`, `atm`, `ptm`, `aptm`, `ptyp`, `nameslip`, `img`, `status` FROM donation WHERE id='".$did."'"));

$payto = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$data[1]."'"));
$payby = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$data[5]."'"));

if ($data[6]!=0) {
$ctm = date("F jS, Y  - h:i A", $data[6]);
}else{
$ctm = "AWAITING";
}

if ($data[7]!=0) {
$atm = date("F jS, Y  - h:i A", $data[7]);
}else{
$atm = "AWAITING";
}

if ($data[8]!=0) {
$ptm = date("F jS, Y  - h:i A", $data[8]);
}else{
$ptm = "AWAITING";
}

if ($data[9]!=0) {
$aptm = date("F jS, Y  - h:i A", $data[9]);
}else{
$aptm = "AWAITING";
}


if ($data[13]==0) {
$statusaa = '<b class="btn btn-lg btn-block btn-warning">AWAITING MARGE</b>';
}elseif ($data[13]==1) {
$statusaa = '<b class="btn btn-lg btn-block btn-primary">AWAITING PAYMENT</b>';
}elseif ($data[13]==2) {
$statusaa = '<b class="btn btn-lg btn-block btn-success">AWAITING CONFIRMATION</b>';
}elseif ($data[13]==3) {
$statusaa = '<b class="btn btn-lg btn-block btn-info">CONFIRMED</b>';
}


?>




<!-- Panel -->
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="panel panel-success">
<div class="panel-heading">
<h3 class="panel-title"><strong>PAY TO</strong> <span class="pull-right"></span></h3> </div>
<div class="panel-body" style="text-align: center;">
<h1 style="font-weight: bold;"> AMOUNT  <span><?php echo "$data[4] $basecurrency"; ?></span></h1>
<h4 style="">Pay To Name: <span><?php echo $payto['fname']; ?>  <?php echo $payto['lname']; ?></span></h4>
<h4 style="">Bank Name: <span><?php echo $payto['bank_name']; ?></span></h4>
<h4 style="">Account Name: <span><?php echo $payto['bank_acname']; ?></span></h4>
<h4 style="">Account Number: <span><?php echo $payto['bank_acno']; ?></span></h4>
<h4 style="">Phone Number: <span><?php echo $payto['phone']; ?></span></h4>
<h4 style="">Email: <span><?php echo $payto['email']; ?></span></h4>
</div>
</div>
</div>
<!-- panel end -->


<!-- Panel -->
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="panel panel-warning">
<div class="panel-heading">
<h3 class="panel-title"><strong>PAY BY</strong> <span class="pull-right"></span></h3> </div>
<div class="panel-body" style="text-align: center;">
<h1 style="font-weight: bold;"> AMOUNT  <span><?php echo "$data[4] $basecurrency"; ?></span></h1>
<h4 style="">Pay To Name: <span><?php echo $payby['fname']; ?>  <?php echo $payby['lname']; ?></span></h4>
<h4 style="">Bank Name: <span><?php echo $payby['bank_name']; ?></span></h4>
<h4 style="">Account Name: <span><?php echo $payby['bank_acname']; ?></span></h4>
<h4 style="">Account Number: <span><?php echo $payby['bank_acno']; ?></span></h4>
<h4 style="">Phone Number: <span><?php echo $payby['phone']; ?></span></h4>
<h4 style="">Email: <span><?php echo $payby['email']; ?></span></h4>
</div>
</div>
</div>
<!-- panel end -->

<!-- Panel -->
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>STATUS</strong> <span class="pull-right"></span></h3> </div>
<div class="panel-body">
<?php 
echo $statusaa;
 ?>

</div>
</div>

<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>TIMES</strong> <span class="pull-right"></span></h3> </div>
<div class="panel-body">
<h4 style=""><strong>CREATED:</strong> <span><?php echo $ctm; ?> </span></h4>
<h4 style=""><strong>ASSIGNED:</strong> <span><?php echo $atm; ?></span></h4>
<h4 style=""><strong>PAID:</strong> <span><?php echo $ptm; ?></span></h4>
<h4 style=""><strong>CONFIRMED:</strong> <span><?php echo $aptm; ?></span></h4>
</div>
</div>


</div>
<!-- panel end -->


<?php 
if($data[13]==3){
?>

<!-- Panel -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="panel border-purple">
<div class="panel-heading bg-purple bg-font-purple">
<h3 class="panel-title"><strong>PAYMENT DETAILS</strong> <span class="pull-right"></span></h3> </div>
<div class="panel-body">

<h2 style="text-align: center;">
<strong>Payment Type: </strong><span style="color: green; font-weight: bolder;"><?php echo $data[10]; ?></span> || || 
<strong>Name On Pay Slip: </strong><span style="color: green; font-weight: bolder;"><?php echo $data[11]; ?></span><br><br>

</h2>
<img src="<?php echo $baseurl; ?>/asset/paymentimages/<?php echo $data[12]; ?>" alt="*" style='width: 100%;'>
<br>


</div>
</div>


</div>
<!-- panel end -->

<?php
}
}
}
?>
</div>




</div>  




</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->


<?php
 include ('include/footer.php');
?>
</body>
</html>