<?php 
$count1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payto='".$uid."' AND (status='0' OR status='1' OR  status='2')"));
$count2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE payby='".$uid."' AND (status='1' OR  status='2')"));

$count = $count1[0]+$count2[0];
if ($count==0) {
?>

<div class="promo promo-border promo-center bottommargin">
<h3><span style="text-transform: uppercase;">Your Cycle of Donations is complete</span></h3>
<span><strong>You Can Recycle Now !</strong></span>
<br><br><br>


<?php 



$uudd = mysql_fetch_array(mysql_query("SELECT wt FROM users WHERE id='".$uid."'"));
$lefffttt = $uudd[0]-time();

$coucd[] ="";
$coucd[] ="$lefffttt/rmv$uid";

echo "
<h1 style='color:red;'>
<strong> YOUR ACCOUNT WILL BLOCKED IN
<span style='color:#$basecolor; text-transform: uppercase;'>
<div id=\"rmv$uid\"></div>
</span>
IF YOU DON'T RECYCLE
</strong>
</h1>
";

?>





<div class="row">



<div class="pricing bottommargin clearfix">

<?php
$ddaa = mysql_query("SELECT id, name, amount, st, tm FROM packs");
while ($data = mysql_fetch_array($ddaa)) {
$returns = $data[2]*2;


if ($data[3]==0) {
$btn="disabled";
$tml = $data[4]-time();
$coucd[] ="$tml/wc$data[0]";
}else{
	$btn='';
}

?>


<div class="col-md-4">
<div class="pricing-box">
<div class="pricing-title">
<h3><?php echo $data[1]; ?></h3>
</div>
<div class="pricing-price">
<span class="price-unit"><?php echo $basecurrency; ?> <?php echo $data[2]; ?></span>
</div>
<div class="pricing-features">
<ul>


<li><br> <br> <h4 style="color: #<?php echo $basecolor; ?>"><?php echo $basecurrency; ?> <?php echo $returns; ?> 
<span style="text-transform: uppercase;"><h5>Return Investment</h5></span></h4></li>




</ul>
</div>
<div class="pricing-action">


 <strong style="color: #<?php echo $basecolor; ?>; text-transform: uppercase;"><div id="wc<?php echo $data[0]; ?>"></div>
 



<form action="<?php echo $baseurl; ?>/recycle" method="post">
<input type="hidden" name="pack" value="<?php echo $data[0]; ?>">

<button type="submit"   class="btn btn-block btn-lg" style="color: #fff; background: #<?php echo $basecolor; ?>" <?php echo $btn; ?>> Recycle Now </button>


</form>


</div>
</div>
</div>
<?php 
}
?>

</div>





</div>
</div>


<?php 
}
?>