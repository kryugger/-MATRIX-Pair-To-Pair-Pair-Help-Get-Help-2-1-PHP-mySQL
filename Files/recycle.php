<?php
Include('include-global.php');
$pagename = "Recycle";
$title = "$pagename - $basetitle";
Include('include-header.php');
?>
<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/filestyle.css" type="text/css" />

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

$count1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payto='".$uid."' AND (status='0' OR status='1' OR  status='2')"));
$count2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payby='".$uid."' AND (status='1' OR  status='2')"));
$count = $count1[0]+$count2[0];
if ($count==0) {



if (isset($_POST['pack'])) {
$plan = $_POST['pack'];


$count1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payto='".$uid."' AND (status='0' OR status='1' OR  status='2')"));
$count2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payby='".$uid."' AND (status='1' OR  status='2')"));
$count = $count1[0]+$count2[0];
if ($count==0) {



////------------------------------------>>>>>>>>>>> ASSIGN
$dcount = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE status='0' AND pkg='".$plan."' AND payto!='".$uid."'"));
if ($dcount[0]==0) {
$did = mysql_fetch_array(mysql_query("SELECT did FROM general_setting WHERE id='1'"));
$packdata = mysql_fetch_array(mysql_query("SELECT name, amount FROM packs WHERE id='".$plan."'"));
mysql_query("INSERT INTO donation SET payto='".$did[0]."', pos='1', pkg='".$plan."', amount='".$packdata[1]."', payby='".$uid."', ctm='".time()."', atm='".time()."', status='1'");
}else{
$donate = mysql_fetch_array(mysql_query("SELECT id, payto FROM donation WHERE status='0' AND pkg='".$plan."' AND payto!='".$uid."' ORDER BY ctm ASC"));
mysql_query("UPDATE donation SET payby='".$uid."',  atm='".time()."',  status='1' WHERE id='".$donate[0]."'");
///////////////////------------------------------------->>>>>>>>>Send Email
$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, phone, email FROM users WHERE id='".$donate[1]."'"));
$txt = "This is a soft notification that An User Just Merged to You For Pay. Please Login For Details";
abiremail($userContact[3], "An User Just Merged to You", "$userContact[0] $userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send Email
}
////------------------------------------>>>>>>>>>>> ASSIGN

}
}

redirect("$baseurl/dashboard");

}else{
redirect("$baseurl/dashboard");
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
