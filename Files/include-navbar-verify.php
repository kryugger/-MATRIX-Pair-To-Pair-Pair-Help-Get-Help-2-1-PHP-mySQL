<?php

if (!is_user()) {
redirect("$baseurl/login");
}

$user = $_SESSION['username'];
$sid = $_SESSION['sid'];

$userdetails = mysql_fetch_array(mysql_query("SELECT id, sid, block, verify FROM users WHERE username='".$user."'"));

$uid = $userdetails[0];

if($sid!=$userdetails[1]){
redirect("$baseurl/signout");
}
if($userdetails[2]==1){
redirect("$baseurl/signout");
}
if($userdetails[3]==1){
redirect("$baseurl/dashboard");
}



?>
<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">


<header id="header" class="full-header dark">

<div id="header-wrap" class="">

<div class="container clearfix">

<div id="primary-menu-trigger"><i class="fa fa-reorder"></i></div>

<!-- Logo
============================================= -->
<div id="logo">
<a href="<?php echo $baseurl; ?>" class="standard-logo"><img src="<?php echo $baseurl; ?>/asset/images/logo.png" alt="Logo"></a>
<a href="<?php echo $baseurl; ?>" class="retina-logo"><img src="<?php echo $baseurl; ?>/asset/images/logo.png" alt="Logo"></a>
</div><!-- #logo end -->


<!-- Primary Navigation
============================================= -->
<nav id="primary-menu" class="style-4">
<ul>
<li><a href="<?php echo $baseurl; ?>/dashboard"><div>Dashboard</div></a></li>
<li><a href="<?php echo $baseurl; ?>/Transactions"><div>Transactions</div></a></li>
<li><a href="<?php echo $baseurl; ?>/Referrals"><div>Referrals</div></a></li>
<li><a href="<?php echo $baseurl; ?>/GetSupport"><div>Support</div></a></li>



<li><a href="#"><div> <i class="fa fa-user" style="margin-top: 5px;"></i>	<?php echo $user; ?></div></a>
<ul>

<li><a href="<?php echo $baseurl; ?>/Profile"><div> <i class="fa fa-edit"></i> Edit Profile</div></a></li>
<li><a href="<?php echo $baseurl; ?>/ChangePassword"><div> <i class="fa fa-cog"></i> Change Password</div></a></li>
<li><a href="<?php echo $baseurl; ?>/signout"><div> <i class="fa fa-sign-out"></i> LOGOUT</div></a></li>
</ul>
</li>
</ul>


</nav><!-- #primary-menu end -->



</div>
</div>
</header><!-- #header end -->