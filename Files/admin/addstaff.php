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
                    <h3 class="page-title"> Add New Staff
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

$name = $_POST["name"];
$fnm = $_POST["fnm"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$pass = $_POST["pass"];
$powr = $_POST["powr"];


$err1=0;
$err2=0;
$err3=0;
$err4=0;
$err5=0;




if(trim($name)==""){
$err1=1;
}

if(trim($email)==""){
$err2=1;
}

if(strlen($pass)<=3){
$err3=3;
}

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) from admin WHERE username='".$name."'"));
if($count[0]>=1){
$err4=1;
}

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) from admin WHERE email='".$email."'"));
if($count[0]>=1){
$err5=1;
}





$error = $err1+$err2+$err3+$err4+$err5;


if ($error == 0){
$passmd = MD5($pass);

$res = mysql_query("INSERT INTO admin SET username='".$name."', fullname='".$fnm."', email='".$email."', phone='".$phone."', pwr='".$powr."', password='".$passmd."'");
echo mysql_error();
if($res){
	
	
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Added Successfully! 

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

Username Can Not be Empty!!!

</div>";
}		
	
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Email Can Not be Empty!!!

</div>";
}		
	
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Password Can Not be less than 4 char!!!

</div>";
}		
	
if ($err4 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Username Already Exist!!!

</div>";
}		
	
if ($err5 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Email Already Exist!!!

</div>";
}		

}




}

?>										
										
										
										
										
										
										
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Username</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="name" placeholder="Unique - Required for Login" type="text">
                    </div>
                    </div>
                     
										
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Full Name</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="fnm" placeholder="Ex: Abir Khan, Shaon Zaman" type="text">
                    </div>
                    </div>
           							
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Email</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="email" placeholder="Valid Email - Required for Password Reset" type="text">
                    </div>
                    </div>
           							
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Phone</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="phone" placeholder="Ex: 8801XXXXXXXXX" type="text">
                    </div>
                    </div>
           							
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Password</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="pass" placeholder="Make it strong" type="password">
                    </div>
                    </div>
           							
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Role</strong></label>
                    <div class="col-md-6">
                    
<select class="form-control input-lg" name="powr">
<option value="0">Support Ticket and User Verification</option>
<option value="100">Full Controller</option>

</select>

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