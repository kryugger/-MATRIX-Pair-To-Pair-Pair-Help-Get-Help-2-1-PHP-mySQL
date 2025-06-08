<?php
Include('include-global.php');
$pagename = "Forgot Username";
$title = "$pagename - $basetitle";
Include('include-header.php');
if (is_user()) {
redirect("$baseurl/dashboard");
}
?>
<style>
  
.slow-spin {
  -webkit-animation: fa-spin 2s infinite linear;
  animation: fa-spin 2s infinite linear;
}

</style>

</head>
<body class="stretched" data-loader="<?php echo $baseloader; ?>" data-loader-color='<?php echo "#$basecolor"; ?>'>

<?php
Include('include-navbar.php');
Include('include-subhead.php');
?>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">





<div class="row">


<?php 



if(isset($_POST['username']))
{
$username = $_POST["username"];

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$username."'"));

if($count[0]>=1){

$sendToEmail = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE email='".$username."'"));

echo "<h1 class='center'> Your Username is: <span>$sendToEmail[0]</span></h2> ";


}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
 NO ACCOUNT FOUND WITH THIS EMAIL.
</div>";
}
}
 ?>


<div class="col-md-6 col-md-offset-3">

<div class="well well-lg nobottommargin">
<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">

<h3>What is My Username</h3>

<div class="col_full">
<label for="login-form-username">My Email Was:</label>

<input id="username" name="username" class="form-control input-lg" type="text">
</div>



<div class="col_full nobottommargin">
<button class="button button-3d btn-block nomargin" type="submit">Find My Username</button>
</div>

</form>
</div>

<p style="text-align: center; font-weight: bold; text-transform: uppercase;">

<a href="<?php echo $baseurl; ?>/ForgotPassword"> Forgot Password </a> |
<a href="<?php echo $baseurl; ?>/register"> Register NOW</a> |
<a href="<?php echo $baseurl; ?>/login"> Login Now</a> 


</p>
</div>






</div><!-- row -->


</div>
</div>
</section>
<?php
Include('include-footer.php');
?>
</body>
</html>