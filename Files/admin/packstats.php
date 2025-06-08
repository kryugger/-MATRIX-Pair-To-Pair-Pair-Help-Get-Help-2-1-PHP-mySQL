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
                <div class="page-content" style="height: 5000px !important;">
                    <!-- BEGIN PAGE HEADER-->
                   
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Dashboard
                        <small>Statistics</small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>


<?php

$numuser = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users"));
$numuserB = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE block='1'"));
$to = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM ticket_main WHERE status='0' OR status='2'"));

$packs = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM packs"));

?>



<!-- START -->
<a href="listuser.php">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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
<a href="ticket-req.php">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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
<a href="packege.php">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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




<!-- Panel -->


<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>AWAITING PAYMENT</strong></h3> </div>
<div class="panel-body" style="text-align: center;">
<div class="row">

<!-- START -->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="dashboard-stat green-sharp">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo 500; ?>"><?php echo 500; ?></span>
</div>
<div class="desc"># PAYMENT</div>
</div>
</div>
</div>
<!-- END -->

<!-- START -->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="dashboard-stat grey-mint">
<div class="visual">
<i class="fa fa-dollar"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo 50000; ?>"><?php echo 50000; ?> </span> 
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


<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>TODAY</strong><span class="pull-right">(Last 24 Hours)</span></h3> </div>
<div class="panel-body" style="text-align: center;">
<div class="row">

<!-- START -->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="dashboard-stat green-sharp">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo 500; ?>"><?php echo 500; ?></span>
</div>
<div class="desc"># PAYMENT</div>
</div>
</div>
</div>
<!-- END -->

<!-- START -->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="dashboard-stat grey-mint">
<div class="visual">
<i class="fa fa-dollar"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo 50000; ?>"><?php echo 50000; ?> </span> 
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


<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>THIS WEEK</strong> <span class="pull-right">(Last 7 days)</span></h3> </div>
<div class="panel-body" style="text-align: center;">
<div class="row">

<!-- START -->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="dashboard-stat green-sharp">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo 500; ?>"><?php echo 500; ?></span>
</div>
<div class="desc"># PAYMENT</div>
</div>
</div>
</div>
<!-- END -->

<!-- START -->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="dashboard-stat grey-mint">
<div class="visual">
<i class="fa fa-dollar"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo 50000; ?>"><?php echo 50000; ?> </span> 
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






































<?php
$ddaa = mysql_query("SELECT id, name, amount FROM packs");
while ($data = mysql_fetch_array($ddaa)) {

?>

<!-- Panel -->


<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="panel panel-success border-purple-seance">
<div class="panel-heading">
<h3 class="panel-title"><strong>THI00S WEEK</strong> <span class="pull-right">LIFETIME</span></h3> </div>
<div class="panel-body" style="text-align: center;">
<div class="row">

<!-- START -->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="dashboard-stat purple">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo 500; ?>"><?php echo 500; ?></span>
</div>
<div class="desc">PAYMENT AWAITING</div>
</div>
</div>
</div>
<!-- END -->

<!-- START -->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="dashboard-stat grey-mint">
<div class="visual">
<i class="fa fa-dollar"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo 50000; ?>"><?php echo 50000; ?> </span> 
<?php echo $basecurrency; ?>
</div>
<div class="desc">AMOUNT AWAITING</div>
</div>
</div>
</div>
<!-- END -->



<!-- START -->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="dashboard-stat purple">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo 500; ?>"><?php echo 500; ?></span>
</div>
<div class="desc">PAYMENT AWAITING</div>
</div>
</div>
</div>
<!-- END -->

<!-- START -->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="dashboard-stat grey-mint">
<div class="visual">
<i class="fa fa-dollar"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="<?php echo 50000; ?>"><?php echo 50000; ?> </span> 
<?php echo $basecurrency; ?>
</div>
<div class="desc">AMOUNT AWAITING</div>
</div>
</div>
</div>
<!-- END -->

</div>
</div>
</div>
</div>
<!-- panel end -->


<?php 
}
 ?>
























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