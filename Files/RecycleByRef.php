<?php
Include('include-global.php');
$pagename = "Recycle By Referral Bonus";
$title = "$pagename - $basetitle";
Include('include-header.php');
?>
<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/filestyle.css" type="text/css" />

</head>
<body class="stretched" data-loader="<?php echo $baseloader; ?>" data-loader-color='<?php echo "#$basecolor"; ?>'>
<?php
Include('include-navbar-user.php');
Include('include-subhead.php');

$mallu = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE id='".$uid."'"));
?>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">


<div class="row">
<?php

$count1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payto='".$uid."' AND (status='0' OR status='1' OR  status='2')"));
$count2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payby='".$uid."' AND (status='1' OR  status='2')"));
$count = $count1[0]+$count2[0];
if ($count==0) {




if (isset($_POST['pack'])) {
$plan = $_POST['pack'];



////------------------------------------>>>>>>>>>>> ASSIGN
$packdata = mysql_fetch_array(mysql_query("SELECT name, amount FROM packs WHERE id='".$plan."'"));

if ($packdata[1]<=$mallu[0]) {



//////////////-------------------->>>>>>CUT THE BAL
$newbal = $mallu[0]-$packdata[1];
mysql_query("UPDATE users SET mallu='".$newbal."' WHERE id='".$uid."'");
$des = "Recycle By Commision";
////------------------------------>>>>>>>>>TRX
mysql_query("INSERT INTO trx SET usid='".$uid."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='-".$packdata[1]."'");
////------------------------------>>>>>>>>>TRX
//////////////-------------------->>>>>>CUT THE BAL

////////////////------------->>>>>>>>>>MAKE ELIGIBLE

$res = mysql_query("INSERT INTO donation SET payto='".$uid."', pos='1', pkg='".$plan."', amount='".$packdata[1]."', payby='0', ctm='".time()."', atm='0', status='0'");

$res = mysql_query("INSERT INTO donation SET payto='".$uid."', pos='2', pkg='".$plan."', amount='".$packdata[1]."', payby='0', ctm='".time()."', atm='0', status='0'");
////////////////------------->>>>>>>>>>MAKE ELIGIBLE
}


////------------------------------------>>>>>>>>>>> ASSIGN




redirect("$baseurl/dashboard");

}else{

?>




<div class="row">

<h1 class="center"><span>YOUR REFERRALS BONUS BALANCE <?php echo "$mallu[0] $basecurrency"; ?></span></h1>

<div class="pricing bottommargin clearfix">

<?php
$ddaa = mysql_query("SELECT name, amount, id FROM packs");
while ($data = mysql_fetch_array($ddaa)) {
$returns = $data[1]*2;

if ($data[1]>=$mallu[0]) {
$dis ="disabled";
}else{
$dis ="";
}

?>


<div class="col-md-4">
<div class="pricing-box">
<div class="pricing-title">
<h3><?php echo $data[0]; ?></h3>
</div>
<div class="pricing-price">
<span class="price-unit"><?php echo $basecurrency; ?> <?php echo $data[1]; ?></span>
</div>
<div class="pricing-features">
<ul>


<li><br> <br> <h4 style="color: #<?php echo $basecolor; ?>"><?php echo $basecurrency; ?> <?php echo $returns; ?> 
<span style="text-transform: uppercase;"><h5>Return Investment</h5></span></h4></li>




</ul>
</div>
<div class="pricing-action">

<form action="" method="post">
<input type="hidden" name="pack" value="<?php echo $data[2]; ?>">

<button type="submit"  class="btn btn-block btn-lg" style="color: #fff; background: #<?php echo $basecolor; ?>" <?php echo $dis; ?>> Recycle Now </button>


</form>


</div>
</div>
</div>
<?php 
}
?>

</div>





</div>

<?php

}
}else{

echo '<h1 class="center"><span>PLEASE COMPLETE YOUR CYCLE AND TRY AGAIN !</span></h1>';

}
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
