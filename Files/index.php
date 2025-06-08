<?php
Include('include-global.php');
$title = "$basetitle";
Include('include-header.php');
?>
</head>
<body class="stretched" data-loader="<?php echo $baseloader; ?>" data-loader-color='<?php echo "#$basecolor"; ?>'>
<?php
Include('include-navbar.php');
?>








		<!-- Slider
		============================================= -->
		<section id="slider" class="swiper_wrapper full-screen clearfix" data-loop="true" data-autoplay="5000">

			<div class="swiper-container swiper-parent">
				<div class="swiper-wrapper">

<?php 

$ddaa = mysql_query("SELECT img, btxt, stxt FROM slider_home ORDER BY id");
    while ($data = mysql_fetch_array($ddaa))
    {

?>

					<div class="swiper-slide" style="background-image: url('<?php echo $baseurl; ?>/asset/images/slider/<?php echo $data[0]; ?>');">
						<div class="container clearfix">
							<div class="slider-caption" style="max-width: 700px;">
								<h2 data-caption-animate="flipInX"><span style="color: #fff;"><?php echo $data[1]; ?></span></h2>
								<p data-caption-animate="flipInX" data-caption-delay="500" style="color: #fff;"><?php echo $data[2]; ?></p>


								<b style="color: #fff;" class="hidden-sm hidden-md hidden-lg"><?php echo $data[2]; ?></b>
							</div>
						</div>
					</div>

<?php 
}
 ?>



				</div>

			</div>

		</section><!-- #slider end -->











<!-- Content
============================================= -->
<section id="content">
<div class="content-wrap">
<div class="container clearfix">


<div class="row">
<?php 
$old = mysql_fetch_array(mysql_query("SELECT hometxt FROM general_setting WHERE id='1'"));
echo $old[0];
?>
</div>


</div>
</div>




<?php 
$donation = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation"));
$users = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users"));
$ttlll = mysql_fetch_array(mysql_query("SELECT SUM(amount) FROM donation"));

$a24 = time()-24*3600;
$ac24 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE last>$a24"));


?>














<div class="row clearfix bottommargin-lg common-height">



<?php 
$sh = mysql_fetch_array(mysql_query("SELECT ttl FROM general_setting WHERE id='1'"));
if ($sh[0]==1) {
?>






<div class="col-md-3 col-sm-12 dark center col-padding" style="background-color: #<?php echo $basecolor; ?>; opacity: 0.9; height: 326px;">
<div>
<div class="counter counter-lined"><span data-from="100" data-to="<?php echo $users[0]; ?>" data-refresh-interval="50" data-speed="2000"><?php echo $users[0]; ?></span></div>
<h5>USERS</h5>
</div>
</div>

<div class="col-md-3 col-sm-12 dark center col-padding" style="background-color: #<?php echo $basecolor; ?>; height: 326px;">
<div>
<div class="counter counter-lined"><span data-from="3000" data-to="<?php echo $ac24[0]; ?>" data-refresh-interval="100" data-speed="2500"><?php echo $ac24[0]; ?></span></div>
<h5>ONLINE TODAY</h5>
</div>
</div>

<div class="col-md-3 col-sm-12 dark center col-padding" style="background-color: #<?php echo $basecolor; ?>; opacity: 0.9; height: 326px;">
<div>
<div class="counter counter-lined"><span data-from="3000" data-to="<?php echo $donation[0]; ?>" data-refresh-interval="100" data-speed="2500"><?php echo $donation[0]; ?></span></div>
<h5>Payments Made</h5>
</div>
</div>


<div class="col-md-3 col-sm-12 dark center col-padding" style="background-color: #<?php echo $basecolor; ?>; height: 326px;">
<div>
<div class="counter counter-lined"><?php echo $basecurrency; ?><span data-from="100" data-to="<?php echo $ttlll[0]; ?>" data-refresh-interval="95" data-speed="3500"><?php echo $ttlll[0]; ?></span></div>
<h5>Amount Donated</h5>
</div>
</div>

<?php 
}else{

	/*
?>




<div class="col-md-4 col-sm-12 dark center col-padding" style="background-color: #<?php echo $basecolor; ?>; opacity: 0.9; height: 326px;">
<div>
<div class="counter counter-lined"><span data-from="100" data-to="<?php echo $users[0]; ?>" data-refresh-interval="50" data-speed="2000"><?php echo $users[0]; ?></span></div>
<h5>USERS</h5>
</div>
</div>

<div class="col-md-4 col-sm-12 dark center col-padding" style="background-color: #<?php echo $basecolor; ?>; height: 326px;">
<div>
<div class="counter counter-lined"><span data-from="3000" data-to="<?php echo $ac24[0]; ?>" data-refresh-interval="100" data-speed="2500"><?php echo $ac24[0]; ?></span></div>
<h5>ONLINE TODAY</h5>
</div>
</div>

<div class="col-md-4 col-sm-12 dark center col-padding" style="background-color: #<?php echo $basecolor; ?>; opacity: 0.9; height: 326px;">
<div>
<div class="counter counter-lined"><span data-from="3000" data-to="<?php echo $donation[0]; ?>" data-refresh-interval="100" data-speed="2500"><?php echo $donation[0]; ?></span></div>
<h5>Payments Made</h5>
</div>
</div>




<?php 
*/
}
?>







</div>















<div class="content-wrap">
<div class="container clearfix">








<h3 style="text-align: center; text-transform: uppercase; margin-top: -40px;">
<span> Select a package below</span></h3>

<div class="pricing bottommargin clearfix">

<?php
$ddaa = mysql_query("SELECT id, name, amount, st, tm FROM packs order by amount");
while ($data = mysql_fetch_array($ddaa)) {
$returns = $data[2]*2;


if ($data[3]==0) {
$btn="disabled";
$tml = $data[4]-time();
$coucd[] ="$tml/wc$data[0]";
}else{
	$btn='';
}



?>


<div class="col-md-4">
<div class="pricing-box">
<div class="pricing-title">
<h3><?php echo $data[1]; ?></h3>
</div>
<div class="pricing-price">
<span class="price-unit"><?php echo $basecurrency; ?> <?php echo $data[2]; ?></span>
</div>
<div class="pricing-features">
<ul style="color: #<?php echo $basecolor; ?>; text-transform: uppercase; font-weight:bold;">


<li><i class="fa fa-check"></i> 2:1 Matrix</li>
<li><i class="fa fa-check"></i> Auto Assign</li>
<li><i class="fa fa-check"></i> Referral Bonus</li>


<li><br> <br> <h4 style="color: #<?php echo $basecolor; ?>"><?php echo $basecurrency; ?> <?php echo $returns; ?> 
<span style="text-transform: uppercase;"><h5>Return Investment</h5></span></h4></li>








</ul>
</div>
<div class="pricing-action">
 <strong style="color: #<?php echo $basecolor; ?>; text-transform: uppercase;">

<?php
if($data[3]==0){
echo "will open in ";
}
?>


<div id="wc<?php echo $data[0]; ?>"></div>
 
<a href="<?php echo $baseurl; ?>/register" class="btn btn-block btn-lg" style="color: #fff; background: #<?php echo $basecolor; ?>" <?php echo $btn; ?>>Sign Up</a>
</div>
</div>
</div>
<?php 
}
?>

</div>





<h3 style="text-align: center; text-transform: uppercase; margin-top: 40px;">
<span> TESTIMONIALS </span></h3>

<ul class="testimonials-grid grid-3 clearfix">


<?php 
$ddaa = mysql_query("SELECT id, name, txt FROM testimonial ORDER BY id");
while ($data = mysql_fetch_array($ddaa)){
?>

<li style="height: 198px;">
<div class="testimonial">
<div class="testi-content">
<p style="text-transform: lowercase; font-weight: normal;"><?php echo $data[2] ;?></p>
<div class="testi-meta">
<?php echo $data[1] ;?>
</div>
</div>
</div>
</li>

<?php
}
?>



</ul>





</div>
</div>
</section><!-- #content end -->


<?php
Include('include-footer.php');
?>
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