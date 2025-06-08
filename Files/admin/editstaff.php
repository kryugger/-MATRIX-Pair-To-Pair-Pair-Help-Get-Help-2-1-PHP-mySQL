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
                    <h3 class="page-title"> Edit Staff
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

$iidd = $_GET['id'];
if ($iidd!=2) {


if($_POST)
{

$fnm = $_POST["fnm"];
$email = $_POST["email"];
$phone = $_POST["phone"];


$err1=0;
$err2=0;
$err3=0;




if(trim($fnm)==""){
$err1=1;
}

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) from admin WHERE email='".$email."' AND id<>'".$iidd."'"));
if($count[0]>=1){
$err2=1;
}

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) from admin WHERE phone='".$phone."' AND id<>'".$iidd."'"));
if($count[0]>=1){
$err3=1;
}






$error = $err1+$err2+$err3;


if ($error == 0){
$res = mysql_query("UPDATE admin SET fullname='".$fnm."', email='".$email."', phone='".$phone."' WHERE id='".$iidd."'");
echo mysql_error();
if($res){
	
	
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

UPDATED Successfully! 

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

Full Name Can Not be Empty!!!

</div>";
}		
	

	
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Email Already Exist!!!

</div>";
}		
	
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Phone Already Exist!!!

</div>";
}		


}




}

$old = mysql_fetch_array(mysql_query("SELECT username, fullname, email, phone FROM admin WHERE id='".$iidd."'"));
}
?>										
										
										
										
										
										
										
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Username</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="name" value="<?php echo $old[0]; ?>" disabled type="text">
                    </div>
                    </div>
                     
										
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Full Name</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="fnm" value="<?php echo $old[1]; ?>" type="text">
                    </div>
                    </div>
           							
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Email</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="email" value="<?php echo $old[2]; ?>" type="text">
                    </div>
                    </div>
           							
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Phone</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="phone" value="<?php echo $old[3]; ?>" type="text">
                    </div>
                    </div>
           							
                   


					 
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-6">
                                                    <button type="submit" class="btn blue btn-block">Submit</button>
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