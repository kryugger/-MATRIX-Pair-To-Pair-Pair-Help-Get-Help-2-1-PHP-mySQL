<?php
Include('include-global.php');
$pagename = "NEWS";
$title = "$pagename - $basetitle";
Include('include-header.php');
?>
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

$ddaa = mysql_query("SELECT ttl, btext, tm, id FROM news ORDER BY id DESC");
    while ($data = mysql_fetch_array($ddaa))
    {
$dt = date("l, jS F Y  | h:i A", $data[2]);
$mainnewstxt = strip_tags(implode(' ', array_slice(explode(' ', $data[1]), 0, 60)));
?>


<strong class="btn btn-primary btn-xs pull-right"><?php echo $dt; ?></strong>
<div class="promo promo-border bottommargin">

<h3><i class="fa fa-file"></i> <span >    <?php echo $data[0]; ?></span></h3>

<span style="font-weight: bold;">
<?php echo $mainnewstxt; ?>.....
<button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".modal-lg<?php echo $data[3];?>">Read More...</button></span>
</div>

















<div class="modal fade modal-lg<?php echo $data[3];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"><?php echo $data[0]; ?></h4> <strong class="pull-right"><?php echo $dt; ?></strong>
</div>
<div class="modal-body">


<?php echo $data[1]; ?>

</div>
</div>
</div>
</div>
</div>






<?php 
}
 ?>


</div><!-- row -->


</div>
</div>
</section>






<?php 
include('include-footer.php');
?>
</body>
</html>
