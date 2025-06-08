<?php
Include('include-global.php');
$pagename = "Phone Verification";
$title = "$pagename - $basetitle";
Include('include-header.php');
?>
</head>
<body class="stretched" data-loader="<?php echo $baseloader; ?>" data-loader-color='<?php echo "#$basecolor"; ?>'>
<?php
Include('include-navbar-verify.php');
Include('include-subhead.php');
?>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">


<div class="row">
<div class="col-md-12 col-sm-12">

<h3 style="text-align: center; text-transform: uppercase; color:red;"><br><br><br>YOUR ACCOUNT IS NOT VERIFIED YET</h3>

<h3 style="text-align: center; text-transform: uppercase;"> <span>PLEASE WAIT FOR THE VERICATION PROCESS</span></h3>





</div>
</div><!-- row -->


</div>
</div>
</section>
<?php 
include('include-footer.php');
?>
</body>
</html>
