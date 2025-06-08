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
                    <h3 class="page-title"> Make User Eligible 
                        <small> Let the user get paid  without Donating other user</small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>

					
					
					
					
					
			<div class="row">
			<div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body form">
                                  

		   
<?php
if($_POST){
$dnm = mysql_real_escape_string($_POST["dnm"]);
$top = mysql_real_escape_string($_POST["top"]);




///-------------------------------->>GRAB PACKS
$savepack = "";
$packs = $_POST['packs'];
foreach ($packs as $pnum){
$savepack = "$savepack,$pnum";
}
$savepack = substr($savepack, 1);
///-------------------------------->>GRAB PACKS

$err1=0;
$err2=0;

$exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$dnm."'"));
if($exist[0]==0){
$err1 = 1;
}

if(trim($savepack)==""){
$err2=1;
}

$error = $err1+$err2;
if ($error == 0){

$did = mysql_fetch_array(mysql_query("SELECT id FROM users WHERE username='".$dnm."'"));


if ($top==1) {
$low = mysql_fetch_array(mysql_query("SELECT MIN(ctm) FROM donation"));
$ctm = $low[0]-1;

        if($ctm < 1){
        $ctm = 1;
        }
        
}else{
$ctm = time();
}





$ttl = 0;
$packs = $_POST['packs'];
foreach ($packs as $pnum){
$packdata = mysql_fetch_array(mysql_query("SELECT name, amount FROM packs WHERE id='".$pnum."'"));

$ttl = $ttl+$packdata[1];
$res = mysql_query("INSERT INTO donation SET payto='".$did[0]."', pos='1', pkg='".$pnum."', amount='".$packdata[1]."', payby='0', ctm='".$ctm."', atm='0', status='0'");

$res = mysql_query("INSERT INTO donation SET payto='".$did[0]."', pos='2', pkg='".$pnum."', amount='".$packdata[1]."', payby='0', ctm='".$ctm."', atm='0', status='0'");


echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Success Attempt For <strong> $packdata[0] - $packdata[1] $basecurrency X 2 </strong> 
</div>";

}

$gttl = $ttl*2;

echo "<div class=\"alert alert-info alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
<strong> $dnm is Eligible For  Total $gttl $basecurrency </strong> 
</div>";


if($res){
notification("Operation Successfull !", "", "success", false, "btn-primary", "OKAY");
}else{
notification("Some Problem Occurs!", "Please Try Again...", "error", false, "btn-primary", "OKAY");
}

} else {
	
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Username $dnm Not Found in Database
</div>";
}

if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Please Select Packs
</div>";
}		
}
}
?>			





			

<div class="row">




<div class="col-md-12">

<form class="form-horizontal" action="" method="post" role="form">
<div class="form-body"> 

<input type="text" name="dnm" id="dnm" class="form-control input-lg" placeholder="Write Username">



<br><br><div id="usernaameerr"><br><br><br><br></div><br><br>




 <div class="form-group">
<label class="col-md-2"><strong>ELIGIBLE FOR</strong></label>
<div class="col-md-10">
<div class="checkbox-list">
<?php                                           
        $ddaa = mysql_query("SELECT id, name, amount FROM packs ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {                                       
echo "<label class=\"checkbox-inline\"><input id=\"packs\" name=\"packs[]\" value=\"$data[0]\" type=\"checkbox\"><strong>$data[1] - $data[2] $basecurrency</strong></label>
";

    }
?>

</div></div></div>
 
 <div style="margin-top:60px;"></div>



 <div class="form-group">
<label class="col-md-3"><strong>TAKE TO FIRST OF THE QUEUE</strong></label>
<div class="col-md-6">


<label class="checkbox-inline"><input id="top" value="1" name="top" type="checkbox"><strong>FIRST OF THE QUEUE</strong></label>

</div></div> 
 <div style="margin-top:60px;"></div>




<button type="submit" class="btn blue btn-lg btn-block">SUBMIT</button>
</div>
</form>
</div>





</div>		






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



<script type='text/javascript'>

jQuery(document).ready(function(){

$('#dnm').on('input', function() {
var username = $("#dnm").val();
$.post( 
       "jsapi-did.php",
        { 
        username : username
          },
    function(data) {
    $("#usernaameerr").html(data);
      }
               );
});








  
});
</script>
</body>
</html>