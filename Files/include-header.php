<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="THESOFTKING.COM" />
	<meta name="description" content="<?php echo $metatag; ?>">
	<meta name="keywords" content="<?php echo $keytag; ?>">
	<meta property="og:title" content="<?php echo $title; ?>"/>
	<meta property="og:site_name" content="<?php echo $basetitle; ?>"/>
	<meta property="og:description" content="<?php echo $metatag; ?>"/>
	<meta property="og:image" content="<?php echo $ogimg; ?>"/>


    <link rel="shortcut icon" href="<?php echo $baseurl; ?>/asset/images/favicon.png" type="image/x-icon">



<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Montserrat:400,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/swiper.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/custom.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/animate.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/magnific-popup.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/fonts.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/responsive.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/colors.php?color=<?php echo $gen[2]; ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/font-awesome/css/font-awesome.min.css">



	<title><?php echo "$title"; ?></title>




<style>
  
.panel > .panel-heading {
    background: #<?php echo $basecolor; ?>;
    color: white;
}
.panel-primary{
border: 3px solid #<?php echo $basecolor; ?>;
}
.panel-warning{
border: 3px solid #<?php echo $basecolor; ?>;
}
.panel-danger{
border: 3px solid #<?php echo $basecolor; ?>;
}
.panel-info{
border: 3px solid #<?php echo $basecolor; ?>;
}
.panel-success{
border: 3px solid #<?php echo $basecolor; ?>;
}


.pricing-title {
	padding: 15px 0;
	background-color: #<?php echo $basecolor; ?>;
	border-radius: 3px 3px 0 0;
	border-bottom: 1px solid rgba(0,0,0,0.05);
	color:#fff;
}


.pricing-box {
	position: relative;
	border: 3px solid #<?php echo $basecolor; ?>;
	border-radius: 3px;
	text-align: center;
	box-shadow: 0 1px 1px rgba(0,0,0,0.1);
	background-color: #F5F5F5;
	margin: 10px;
}

</style>





<?php 
$ct = mysql_fetch_array(mysql_query("SELECT chtxt FROM general_setting WHERE id='1'"));
echo $ct[0];
?>


