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
                    <h3 class="page-title"> Dashboard
                        <small>Statistics</small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>




                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                
            <div class="row">
            <div class="col-md-12">
<?php

$numuser = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users"));
$numuserB = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE block='1'"));
$numuserV = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE verify='0'"));
$to = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM ticket_main WHERE status='0' OR status='2'"));
$packs = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM packs"));



$report = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE report='1'"));
$a5 = time()-5*60;
$a24 = time()-24*3600;

$ac5 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE last>$a5"));
$ac24 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE last>$a24"));




$apn = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE status='0' OR status='1' OR status='2'"));
$apa = mysql_fetch_array(mysql_query("SELECT SUM(amount) FROM donation WHERE status='0' OR status='1' OR status='2'"));

$cpn = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE status='3'"));
$cpa = mysql_fetch_array(mysql_query("SELECT SUM(amount) FROM donation WHERE status='3'"));

$wk = time()-7*24*60*60;
$weekn = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE aptm BETWEEN '".$wk."' AND '".time()."' AND status='3'"));
$weeka = mysql_fetch_array(mysql_query("SELECT SUM(amount) FROM donation WHERE (aptm BETWEEN '".$wk."' AND '".time()."') AND status='3'"));


$mo = time()-30*24*60*60;
$mon = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE (aptm BETWEEN '".$mo."' AND '".time()."') AND status='3'"));
$moa = mysql_fetch_array(mysql_query("SELECT SUM(amount) FROM donation WHERE (aptm BETWEEN '".$mo."' AND '".time()."') AND status='3'"));


?>

<!-- START -->
<a href="listuser.php">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
<div class="dashboard-stat blue">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">



<div class="number">
<span data-counter="counterup" data-value="<?php echo $numuser[0]; ?>"><?php echo $numuser[0]; ?></span>
</div>
<div class="desc"> TOTAL  USERS </div>
</div>
</div>
</div>
</a>
<!-- END -->




<!-- START -->
<a href="listblock.php">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"  style="margin-bottom: 20px;">
<div class="dashboard-stat red">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number"> 
<span data-counter="counterup" data-value="<?php echo $numuserB[0]; ?>"><?php echo $numuserB[0]; ?></span>
</div>
<div class="desc">TOTAL BLOCKED USER </div>
</div>
</div>
</div>
</a>
<!-- END -->



<!-- START -->
<a href="listverify.php">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"  style="margin-bottom: 20px;">
<div class="dashboard-stat yellow">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number"> 
<span data-counter="counterup" data-value="<?php echo $numuserV[0]; ?>"><?php echo $numuserV[0]; ?></span>
</div>
<div class="desc">AWAITING VERIFICATION </div>
</div>
</div>
</div>
</a>
<!-- END -->




<!-- START -->
<a href="packege.php">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"  style="margin-bottom: 20px;">
<div class="dashboard-stat purple">
<div class="visual">
<i class="fa fa-th"></i>
</div>
<div class="details">
<div class="number"> 
<span data-counter="counterup" data-value="<?php echo $packs[0]; ?>"><?php echo $packs[0]; ?></span>
</div>
<div class="desc">Packege </div>
</div>
</div>
</div>
</a>
<!-- END -->


<!-- START -->
<a href="listreport.php">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"  style="margin-bottom: 20px;">
<div class="dashboard-stat dark">
<div class="visual">
<i class="fa fa-th"></i>
</div>
<div class="details">
<div class="number"> 
<span data-counter="counterup" data-value="<?php echo $report[0]; ?>"><?php echo $report[0]; ?></span>
</div>
<div class="desc">REPORTED DONATION </div>
</div>
</div>
</div>
</a>
<!-- END -->



<!-- START -->
<a href="ticket-req.php">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"  style="margin-bottom: 20px;">
<div class="dashboard-stat blue">
<div class="visual">
<i class="fa fa-ticket"></i>
</div>
<div class="details">
<div class="number"> 
<span data-counter="counterup" data-value="<?php echo $to[0]; ?>"><?php echo $to[0]; ?></span>
</div>
<div class="desc">TICKET - RESPONSE REQUIRED</div>
</div>
</div>
</div>
</a>
<!-- END -->

<!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"  style="margin-bottom: 20px;">
<div class="dashboard-stat green">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number"> 
<span data-counter="counterup" data-value="<?php echo $ac5[0]; ?>"><?php echo $ac5[0]; ?></span>
</div>
<div class="desc">ACTIVE USER NOW</div>
</div>
</div>
</div>

<!-- END -->

<!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"  style="margin-bottom: 20px;">
<div class="dashboard-stat blue">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number"> 
<span data-counter="counterup" data-value="<?php echo $ac24[0]; ?>"><?php echo $ac24[0]; ?></span>
</div>
<div class="desc">ACTIVE USER TODAY</div>
</div>
</div>
</div>

<!-- END -->







<!-- Panel -->


<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="panel panel-warning">
<div class="panel-heading">
<h3 class="panel-title"><strong>AWAITING PAYMENT</strong></h3> </div>
<div class="panel-body" style="text-align: center;">
<div class="row">

<!-- START -->
<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
<div class="dashboard-stat green-sharp">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo $apn[0]; ?>"><?php echo $apn[0]; ?></span>
</div>
<div class="desc"># PAYMENT</div>
</div>
</div>
</div>
<!-- END -->

<!-- START -->
<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
<div class="dashboard-stat grey-mint">
<div class="visual">
<i class="fa fa-dollar"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo $apa[0]; ?>"><?php echo $apa[0]; ?> </span> 
<?php echo $basecurrency; ?>
</div>
<div class="desc">AMOUNT</div>
</div>
</div>
</div>
<!-- END -->

</div>
</div>
</div>
</div>
<!-- panel end -->




<!-- Panel -->


<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="panel panel-success">
<div class="panel-heading">
<h3 class="panel-title"><strong>COMPLETED PAYMENTS</strong><span class="pull-right"></span></h3> </div>
<div class="panel-body" style="text-align: center;">
<div class="row">

<!-- START -->
<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
<div class="dashboard-stat green-sharp">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo $cpn[0]; ?>"><?php echo $cpn[0]; ?></span>
</div>
<div class="desc"># PAYMENT</div>
</div>
</div>
</div>
<!-- END -->

<!-- START -->
<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
<div class="dashboard-stat grey-mint">
<div class="visual">
<i class="fa fa-dollar"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo $cpa[0]; ?>"><?php echo $cpa[0]; ?> </span> 
<?php echo $basecurrency; ?>
</div>
<div class="desc">AMOUNT</div>
</div>
</div>
</div>
<!-- END -->

</div>
</div>
</div>
</div>
<!-- panel end -->




<!-- Panel -->


<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>COMPLETED THIS WEEK</strong> <span class="pull-right">(Last 7 days)</span></h3> </div>
<div class="panel-body" style="text-align: center;">
<div class="row">

<!-- START -->
<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
<div class="dashboard-stat green-sharp">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo $weekn[0]; ?>"><?php echo $weekn[0]; ?></span>
</div>
<div class="desc"># PAYMENT</div>
</div>
</div>
</div>
<!-- END -->

<!-- START -->
<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
<div class="dashboard-stat grey-mint">
<div class="visual">
<i class="fa fa-dollar"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo $weeka[0]; ?>"><?php echo $weeka[0]; ?> </span> 
<?php echo $basecurrency; ?>
</div>
<div class="desc">AMOUNT</div>
</div>
</div>
</div>
<!-- END -->

</div>
</div>
</div>
</div>
<!-- panel end -->








<!-- Panel -->


<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>COMPLETED THIS MONTH</strong> <span class="pull-right">(Last 30 days)</span></h3> </div>
<div class="panel-body" style="text-align: center;">
<div class="row">

<!-- START -->
<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
<div class="dashboard-stat green-sharp">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo $mon[0]; ?>"><?php echo $mon[0]; ?></span>
</div>
<div class="desc"># PAYMENT</div>
</div>
</div>
</div>
<!-- END -->

<!-- START -->
<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
<div class="dashboard-stat grey-mint">
<div class="visual">
<i class="fa fa-dollar"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo $moa[0]; ?>"><?php echo $moa[0]; ?> </span> 
<?php echo $basecurrency; ?>
</div>
<div class="desc">AMOUNT</div>
</div>
</div>
</div>
<!-- END -->

</div>
</div>
</div>
</div>
<!-- panel end -->













                            </div>
                        </div>      
                        </div><!---ROW-->   


<?php 
$old = mysql_fetch_array(mysql_query("SELECT did FROM general_setting WHERE id='1'"));
$udata = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$old[0]."'"));
?>

<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>CURRENT DEFAULT ID</strong> 
<span class="pull-right"> <a href="setdid.php" class="btn btn-xs green-jungle">CHANGE NOW</a></span>
</h3> </div>
<div class="panel-body" style="text-align: center;">
<h3><?php echo $udata['fname']; ?>  <?php echo $udata['lname']; ?></h3>
<strong>Bank Name: <?php echo $udata['bank_name']; ?></strong> &nbsp; | &nbsp; | 
<strong>Account Name: <?php echo $udata['bank_acname']; ?></strong> &nbsp; | &nbsp; | 
<strong>Account Number: <?php echo $udata['bank_acno']; ?></strong> &nbsp; | &nbsp; | 
<strong>Phone Number: <?php echo $udata['phone']; ?></strong>
<h3>THIS ID WILL GET PAYMENT WHEN NO USER IS ELIGIBLE TO GET PAID</h3>
</div>
</div>
</div>

</div>


    
                    
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->


<?php
 include ('include/footer.php');
 ?>

<!-- BEGIN PAGE LEVEL PLUGINS -->


<script src="assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>

<script src="assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>



</body>
</html>