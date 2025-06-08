<!-- <footer id="footer" class="dark" style="background: url('<?php echo $baseurl; ?>/asset/images/footer-bg.jpg') repeat fixed; background-size: 100% 100%;">

 -->

<footer id="footer" class="dark" style="background: url('<?php echo $baseurl; ?>/asset/images/footer-bg.jpg') repeat fixed; background-size: 100% 100%;">

<div class="container">




<div class="footer-widgets-wrap clearfix">
<div class="row">

<div class="col-md-3 col-sm-12">
<img src="<?php echo $baseurl; ?>/asset/images/logo.png" alt="" class="alignleft" style="width: 100%; padding-right: 18px; border-right: 1px solid #4A4A4A; filter: brightness(0) invert(1);">
</div>

<div class="col-md-9 col-sm-12">
<p style="text-align: justify;">
<?php 
$about = mysql_fetch_array(mysql_query("SELECT about FROM general_setting WHERE id='1'"));
echo $about[0];
?>
</p>
</div>


</div><!-- row -->
</div><!-- .footer-widgets-wrap end -->





</div><!-- container -->




<!-- Copyrights ============================================= -->
<div id="copyrights" >
<div class="container clearfix">


<div class="col-md-6">
Copyright © <?php echo date("Y"); ?>  <a href="#"><?php echo $gen[0];?></a>
</div>


<div class="col-md-6">

<div class="pull-right" style="text-transform: uppercase; color: #fff;">
TECHNOLOGY BY <a href="http://thesoftking.com/donation" target="_blank"> THESOFTKING </a>
</div>

</div>
</div>
<!-- Copyrights ============================================= -->





		</footer>







	</div><!-- #wrapper end -->

	<div id="gotoTop" class="fa fa-angle-up"></div>

	<script type="text/javascript" src="<?php echo $baseurl; ?>/asset/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>/asset/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>/asset/js/functions.js"></script>
	<script src="<?php echo $baseurl; ?>/asset/js/jquery.countdown.js"></script>