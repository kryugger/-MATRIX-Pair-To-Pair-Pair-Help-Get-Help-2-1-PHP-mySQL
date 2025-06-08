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
                    <h3 class="page-title"> SET DEFAULT ID 
                        <small> THIS ID WILL GET PAYMENT WHEN NO USER IS ELIGIBLE TO GET PAID</small>
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

$err1=0;
$err2=0;

$exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$dnm."'"));
if($exist[0]==0){
$err1 = 1;
}

$error = $err1+$err2;
if ($error == 0){

$did = mysql_fetch_array(mysql_query("SELECT id FROM users WHERE username='".$dnm."'"));

$res = mysql_query("UPDATE general_setting SET did='".$did[0]."' WHERE id='1'");
if($res){
notification("Updated Successfully!", "", "success", false, "btn-primary", "OKAY");
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
}
}

$old = mysql_fetch_array(mysql_query("SELECT did FROM general_setting WHERE id='1'"));
$udata = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$old[0]."'"));
?>			





			

<div class="row">





<div class="col-md-6">



<div class="panel panel-primary">
 <div class="panel-heading">
  <h3 class="panel-title"><strong>CURRENT SELECTED ID</strong> <span class="pull-right"><?php echo $udata['username']; ?></span></h3> </div>

   <div class="panel-body" style="text-align: center;">


<h1 style="font-weight: bold;"><?php echo $udata['fname']; ?>  <?php echo $udata['lname']; ?></h1>
<div style="background: red; height: 2px;"></div>
<h4 style="">Bank Name: <strong><?php echo $udata['bank_name']; ?></strong></h4>
<h4 style="">Account Name: <strong><?php echo $udata['bank_acname']; ?></strong></h4>
<h4 style="">Account Number: <strong><?php echo $udata['bank_acno']; ?></strong></h4>
<h4 style="">Phone Number: <strong><?php echo $udata['phone']; ?></strong></h4>


    </div>

</div>




</div>


<div class="col-md-6">

<form class="form-horizontal" action="" method="post" role="form">
<div class="form-body"> 

<input type="text" name="dnm" id="dnm" class="form-control input-lg" placeholder="Write Username">



<br><br><div id="usernaameerr"><br><br><br><br></div><br><br>


<button type="submit" class="btn blue btn-lg btn-block">SET AS DEFAULT</button>
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