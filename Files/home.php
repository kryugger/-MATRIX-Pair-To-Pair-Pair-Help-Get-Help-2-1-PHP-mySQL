<?php
Include('include-global.php');
$pagename = "Dashboard";
$title = "$pagename - $basetitle";
Include('include-header.php');
?>
<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/filestyle.css" type="text/css" />
<!--Start of Tawk.to Script-->
<!--End of Tawk.to Script-->
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
$cc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM logins WHERE usid='".$uid."'"));
if($cc[0]>1){

$ll = mysql_fetch_array(mysql_query("SELECT ip, location, ua, tm FROM logins WHERE usid='".$uid."' ORDER BY id DESC LIMIT 1,1"));
$ltm = date("F jS, Y  - h:i A", $ll[3]);

?>


<div class="promo promo-border bottommargin">
<h3>Your Last Login From <span> <?php echo $ll[0]; ?> </span> Near <span> <?php echo $ll[1]; ?> </span></h3>
<span> <strong>Using</strong> <?php echo $ll[2]; ?> <strong>@ <?php echo $ltm; ?></strong> </span>
<a href="<?php echo $baseurl; ?>/MyLogins" class="button button-xlarge button-rounded"> <i class="fa fa-desktop"></i> VIEW ALL</a>
</div>



<?php
}
 
$ccn = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM news"));
if($ccn[0]>0){
$data = mysql_fetch_array(mysql_query("SELECT ttl, btext, tm, id FROM news ORDER BY id DESC LIMIT 0,1"));
$dt = date("l, jS F Y  | h:i A", $data[2]);
?>
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>NEWS</strong>  
<a class="btn btn-info btn-sm pull-right" href="<?php echo $baseurl;?>/News">ALL NEWS</a>
</h3>
</div>
<div class="panel-body" style="text-align: left;">
<h4><span ><?php echo $data[0]; ?></span>
<b style="font-size:14px;"> @ <?php echo $dt; ?></b>
</h4>
<?php echo $data[1]; ?>
</div>
</div>





<?php
}

$popst = mysql_fetch_array(mysql_query("SELECT pop FROM general_setting WHERE id='1'"));

if ($popst[0]==1) {
Include('home-wannapay.php');
Include('home-getpaid.php');
}else{
Include('home-wannapay-1.php');
Include('home-getpaid-1.php');
}




Include('home-recycle.php');
?>




</div><!-- row -->


</div>
</div>
</section>















<?php 
include('include-footer.php');
?>
<script type="text/javascript" src="<?php echo $baseurl; ?>/asset/js/filestyle.js"></script>

	<script  type="text/javascript">
		$(document).on('ready', function() {

		$("#input-8").fileinput({
				mainClass: "input-group-lg",
				showUpload: true,
				previewFileType: "image",
				browseClass: "btn btn-success",
				browseLabel: "Pick Image",
				browseIcon: "<i class=\"fa fa-file-image-o\"></i> ",
				removeClass: "btn btn-danger",
				removeLabel: "Delete",
				removeIcon: "<i class=\"fa fa-trash\"></i> ",
				uploadClass: "hidden",
				uploadLabel: "",
				uploadIcon: ""
			});



		});

	</script>

<?php 
if (isset($coucd)) {
foreach ($coucd as $aa) {
$a = explode("/", $aa);
if ( ! isset($a[1])) {
   $a[1] = null;
}

tmcount($a[0],$a[1]);
}
}
?>


</body>
</html>
