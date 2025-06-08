<?php
Include('include-global.php');
$pagename = "View Ticket";
$title = "$pagename - $basetitle";
Include('include-header.php');
?>
</head>
<body class="stretched" data-loader="<?php echo $baseloader; ?>" data-loader-color='<?php echo "#$basecolor"; ?>'>
<?php
Include('include-navbar-user.php');
Include('include-subhead.php');

$tid = mysql_real_escape_string($_GET['tid']);

$unms = mysql_fetch_array(mysql_query("SELECT fname, lname FROM users WHERE id='".$uid."'"));

if(isset($_POST['act'])){
mysql_query("UPDATE ticket_main SET status='9' WHERE tid='".$tid."'");
}



$tdetails = mysql_fetch_array(mysql_query("SELECT id, subject, tm, status, btext, usid FROM ticket_main WHERE tid='".$tid."'"));

if($tdetails[5]!=$uid){

echo "<div style='margin-top:200px;'></div>";


echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
You DO not have Permission to view this !
</div>";

echo "</div></div></div>";
echo "<div style='margin-top:200px;'></div>";
include("include-footer.php");
echo "</body></html>";

exit;
}
?>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">


<div class="row">



<?php 

if($tdetails[3]!=9){

echo "<form action='' method='post'>
<input type='hidden' name='act' value='1'>
<button type='submit' class='btn btn-warning btn-block'> CLOSE NOW - You can ReOpen This anytime by reply </button>
</form><br><br>";


}

if(isset($_POST['btext'])){
$btext = mysql_real_escape_string($_POST['btext']);

$err1 = 0;
$err2 = 0;



if($btext==""){
    $err1 = 1;
}

$error = $err1+$err2;

if ($error == 0){


$res = mysql_query("INSERT INTO ticket_reply SET tid='".$tdetails[0]."', btext='".$btext."', tm='".time()."', typ='1'");


if($res){

mysql_query("UPDATE ticket_main SET status='2' WHERE id='".$tdetails[0]."'");

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Reply Added !! 
</div>";
}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Some Problem Occurs, Please Try Again. 
</div>";
}



} else {
    
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Subject Can Not Be Empty !!!
</div>";
}       
    
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Message Body Can Not Be Empty !!!
</div>";
}       
    


    
}

}






$tdetails = mysql_fetch_array(mysql_query("SELECT id, subject, tm, status, btext, usid FROM ticket_main WHERE tid='".$tid."'"));

$dtm = date("F jS, Y  - h:i A", $tdetails[2]);

if($tdetails[3]==0){
    $sts = "<b class='btn btn-info'> OPEN </b>";
}elseif($tdetails[3]==1){
    $sts = "<b class='btn btn-success'> ANSWERED </b>";
}elseif($tdetails[3]==2){
    $sts = "<b class='btn btn-warning'> USER REPLY </b>";
}elseif($tdetails[3]==9){
    $sts = "<b class='btn btn-danger'> CLOSED </b>";
}

?>







<div class="panel panel-primary">
<div class="panel-heading"> <strong style="color:#fff; font-size: 20px;">#<?php echo $tid; ?> - <?php echo $tdetails[1]; ?> 
<span class="pull-right"><?php echo $sts; ?></span> </strong> </div>

<div class="panel-body">

<div class="row">


<div class="col-md-12 product-service md-margin-bottom-30">


<ol class="commentlist noborder nomargin nopadding clearfix">





<div class="row">
<div class="col-md-10">

<li class="comment even thread-even depth-1" id="li-comment-1">
<div id="comment-1" class="comment-wrap clearfix">
<div class="comment-meta">
<div class="comment-author vcard">
<span class="comment-avatar clearfix">
<img alt="" src="<?php echo $baseurl; ?>/asset/images/user.png" class="avatar avatar-60 photo avatar-default" width="60" height="60"></span>
</div>
</div>
<div class="comment-content clearfix">
<div class="comment-author"><?php echo "$unms[0] $unms[1]"; ?><span><?php echo $dtm; ?></span></div>
<p><?php echo nl2br($tdetails[4]); ?></p>
</div>
<div class="clear"></div>
</div>
</li>

</div>
</div>

<?php 
$ddaa = mysql_query("SELECT btext, tm, typ FROM ticket_reply WHERE tid='".$tdetails[0]."' ORDER BY id ASC");
echo mysql_error();
while ($data = mysql_fetch_array($ddaa))
{

$dtm = date("F jS, Y  - h:i A", $data[1]);

$txt = nl2br($data[0]);

if($data[2]==1){

echo "
<div class=\"row\">
<div class=\"col-md-10\">

<li class=\"comment even thread-even depth-1\" id=\"li-comment-1\">
<div id=\"comment-1\" class=\"comment-wrap clearfix\">
<div class=\"comment-meta\">
<div class=\"comment-author vcard\">
<span class=\"comment-avatar clearfix\">
<img alt=\"\" src=\"$baseurl/asset/images/user.png\" class=\"avatar avatar-60 photo avatar-default\" width=\"60\" height=\"60\"></span>
</div>
</div>
<div class=\"comment-content clearfix\">
<div class=\"comment-author\">$unms[0] $unms[1]<span>$dtm;</span></div>
<p>$txt</p>
</div>
<div class=\"clear\"></div>
</div>
</li>
</div>
</div>
";
}else{
echo "
<div class=\"row\">
<div class=\"col-md-10 col-md-offset-2\">


<li class=\"comment byuser comment-author-_smcl_admin even thread-odd thread-alt depth-1\" id=\"li-comment-2\">
<div class=\"comment-wrap clearfix\">
<div class=\"comment-meta\">
<div class=\"comment-author vcard\">
<span class=\"comment-avatar2 clearfix\">
<img alt=\"\" src=\"$baseurl/asset/images/logo.png\" class=\"avatar avatar-60 photo\" width=\"60\" height=\"60\"></span>
</div>
</div>
<div class=\"comment-content clearfix\">
<div class=\"comment-author\">$basetitle Staff:<span>$dtm;</span></div>
<p>$txt</p>


</div>
<div class=\"clear\"></div>
</div>
</li>


</div>
</div>
";

}




}

 ?>

</ol>



</div>

				<form action="" method="post">
				<div class="col-md-12 product-service md-margin-bottom-30">

				<div class="row">

				<div class="col-md-12">
				<div class="form-group">
				<textarea name="btext" class="form-control input-lg" placeholder="Your Reply" required="" rows="4"></textarea>
				</div>
				</div>

				</div>

				<button type="submit" class="btn btn-success btn-block"> SUBMIT </button>


				</div>
		




				</form>


</div>
</div></div>








</div><!-- row -->


</div>
</div>
</section>
<?php 
include('include-footer.php');
?>
</body>
</html>
