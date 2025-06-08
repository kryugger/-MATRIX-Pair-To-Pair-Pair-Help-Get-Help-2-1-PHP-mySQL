<?php
Include('include-global.php');
$pagename = "Open New Support Ticket";
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


<div class="panel panel-primary">
<div class="panel-heading"> <h3 style="color:#fff;">Open New Ticket</h3></div>
<div class="panel-body">

<div class="row">


<form action="" method="post">
<div class="col-md-12 product-service md-margin-bottom-30">


<?php 

if($_POST){

$btext = mysql_real_escape_string($_POST['btext']);
$subject = mysql_real_escape_string($_POST['subject']);

$err1 = 0;
$err2 = 0;



if($btext==""){
    $err1 = 1;
}

if($subject==""){
    $err2 = 1;
}






$error = $err1+$err2;

if ($error == 0){


$prefix = "ST";
$uniqid = $prefix . uniqid();
$tid = strtoupper($uniqid);

$res = mysql_query("INSERT INTO ticket_main SET tid='".$tid."', usid='".$uid."', subject='".$subject."', btext='".$btext."', tm='".time()."', status='0'");


if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
New Support Ticket Created. Ticket ID: $tid 
</div>";


echo "<meta http-equiv=\"refresh\" content=\"0; url=$baseurl/ViewTicket/$tid\" />";


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
?>








<div class="row">

<div class="col-md-12">
<div class="form-group">
<input class="form-control input-lg" placeholder="Subject" name="subject" type="text" required="">
</div>
</div>

</div>







<div class="row">

<div class="col-md-12">
<div class="form-group">
<textarea name="btext" class="form-control input-lg" placeholder="Message Body" required="" rows="10"></textarea>
</div>
</div>
</div>

<button type="submit" class="btn btn-primary btn-block btn-lg"> SUBMIT </button>


</div>
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
