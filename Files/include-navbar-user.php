<?php

if (!is_user()) {
redirect("$baseurl/login");
}

$user = $_SESSION['username'];
$sid = $_SESSION['sid'];

$userdetails = mysql_fetch_array(mysql_query("SELECT id, sid, block, verify, wt FROM users WHERE username='".$user."'"));

$uid = $userdetails[0];

if($sid!=$userdetails[1]){
redirect("$baseurl/signout");
}
if($userdetails[2]==1){
redirect("$baseurl/signout");
}
if($userdetails[3]==0){
redirect("$baseurl/verify");
}



mysql_query("UPDATE users SET last='".time()."' WHERE id='".$uid."'");




$count1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payto='".$uid."' AND (status='0' OR status='1' OR  status='2')"));
$count2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payby='".$uid."' AND (status='1' OR  status='2')"));
$count = $count1[0]+$count2[0];
if ($count==0) {
if($userdetails[4]==0){
$al = time()+($tms[2]*3600);
mysql_query("UPDATE users SET wt='".$al."' WHERE id='".$uid."'");
}
}else{
if($userdetails[4]!=0){
mysql_query("UPDATE users SET wt='0' WHERE id='".$uid."'");
}

}



$cctm = time()-($tms[2]*3600);
$dd = mysql_query("SELECT id FROM users WHERE wt<$cctm AND wt!='0'");
while ($da = mysql_fetch_array($dd)) {

////////////////------------->>>>>>>>>>BLOCK
mysql_query("UPDATE users SET block='1', wt='0' WHERE id='".$da[0]."'");
///////////////////------------------------------------->>>>>>>>>Send Email
$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, phone, email FROM users WHERE id='".$da[0]."'"));
$txt = "This is a soft notification that You Was not Recycle In Time. And Your Account Is Blocked ";
abiremail($userContact[3], "Your Account Is Blocked", "$userContact[0] $userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send Email
////////////////------------->>>>>>>>>>BLOCK

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