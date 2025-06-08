<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Software Setup Wizard</title>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>



<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">

<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="" style="text-transform: uppercase; color: #fff;">Setup Wizard</a>
</div>


<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav pull-right">

<li><a href="http://www.codelist.cc" target="_blank"  style="text-transform: uppercase; color: #fff;">Get Support</a></li>

</ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>

<br><br><br>

<div class="container">
<div class="row">
<div class="col-md-12">
<h1 style="font-weight:bold; font-size:40px; text-align:center; text-decoration:underline; color:#27ae60; text-transform: uppercase;">Setup Wizard </h1>
<br><br><br>
</div>
</div>


<div class="row">
<div class="col-md-6 col-md-offset-3">

<?php
$base_url = home_base_url();
if (substr("$base_url", -1=="/")) {
$base_url = substr("$base_url", 0, -1);
}


if ($_POST) {



$db_name = $_POST['db_name'];
$db_host = $_POST['db_host'];
$db_user = $_POST['db_user'];
$db_pass = $_POST['db_pass'];




////Prog

if(importDatabase($db_host,$db_name,$db_user,$db_pass)){

echo '<div style="text-align:center;">
<h1>Installed Successfully </h1>
<a href="'.$base_url.'" class="btn btn-success btn-sm">Go to Website</a> 
<br><br><b style="color:red;">Please Delete The Install Folder</b><br><br><br></div>';



////////////////////// UPDATE CONFIG


$output = '<?php

$baseurl = "'.$base_url.'"; ////// Member Panel URL
$adminurl = "'.$base_url.'/admin"; ////// Admin Panel URL
$purchaseCode = "'.$code.'"; ////// Envato purchase Code
date_default_timezone_set("Asia/Dhaka");
$tm = time();
error_reporting(E_ALL);

$dbname = "'.$db_name.'";
$dbhost = "'.$db_host.'";
$dbuser = "'.$db_user.'";
$dbpass = "'.$db_pass.'";
?>
';

$file = fopen('../config.php', 'w');
fwrite($file, $output);
fclose($file);


////////////////////// UPDATE CONFIG








}else{
	echo '<b style="color:red;">Error Occured. Please Enter Valid Database Information </b>';
}








} //post

function importDatabase($mysql_host,$mysql_database,$mysql_user,$mysql_password){
	$db = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);
	$query = file_get_contents("database.sql");
	$stmt = $db->prepare($query);
	if ($stmt->execute())
		 return true;
	else 
		 return false;
}


function home_base_url(){   
	$base_url = (isset($_SERVER['HTTPS']) &&
	$_SERVER['HTTPS']!='off') ? 'https://' : 'http://';
	$tmpURL = dirname(__FILE__);
	$tmpURL = str_replace(chr(92),'/',$tmpURL);
	$tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);
	$tmpURL = ltrim($tmpURL,'/');
	$tmpURL = rtrim($tmpURL, '/');
	$tmpURL = str_replace('install','',$tmpURL);
	$base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL;
	return $base_url; 
}

?>


<div class="well">
<h4>APP URL</h4>

<form action="" method="post">
<input class="form-control" name="app_url" value="<?php echo $base_url; ?>" type="text"><br>

<hr style="background: #27ae60; height: 2px;">
<h2 style="text-align:center; text-transform: uppercase;">NULLED</h2>


<hr style="background: #27ae60; height: 2px;">
<h2 style="text-align:center; text-transform: uppercase;">Database Details</h2>


<input class="form-control input-lg" name="db_name" placeholder="Database Name" type="text" required=""><br>
<input class="form-control input-lg" name="db_host" placeholder="Database Host" type="text" required=""><br>
<input class="form-control input-lg" name="db_user" placeholder="Dabatabe User" type="text" required=""><br>
<input class="form-control input-lg" name="db_pass" placeholder="Password" type="text" required=""><br>

<input type="submit" class="btn btn-success btn-block" value="SETUP">
</form>
</div>




</div>


</div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>