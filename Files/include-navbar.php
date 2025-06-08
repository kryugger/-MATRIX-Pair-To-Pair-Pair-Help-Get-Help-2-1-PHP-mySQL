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
<nav id="primary-menu" class="style-3">

<ul class="sf-js-enabled">

<li><a href="<?php echo $baseurl; ?>"><div>Home</div></a></li>
<?php
$ddaa = mysql_query("SELECT id, name FROM menus ORDER BY id");
while ($data = mysql_fetch_array($ddaa))
{
$uri = urlmod($data[1]);
echo "<li><a href=\"$baseurl/menu/$data[0]/$uri\">$data[1]</a></li>";
}
?>


<li><a href="<?php echo $baseurl; ?>/login"><div> <i class="fa fa-sign-in"  style="margin-top: 5px;"></i> LOGIN</div></a></li>
<li><a href="<?php echo $baseurl; ?>/register"><div> <i class="fa fa-edit"  style="margin-top: 5px;"></i> REGISTER</div></a></li>








</ul>




</nav><!-- #primary-menu end -->

</div>

</div>

</header>

