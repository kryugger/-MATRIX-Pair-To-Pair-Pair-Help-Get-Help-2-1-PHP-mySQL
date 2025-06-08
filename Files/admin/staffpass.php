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
                    <h3 class="page-title"> Change Staff Password
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

$err1=0;
$err2=0;
$err3=0;
$err4=0;


$newword = $_POST["pass"];
$newwword = $_POST["pass2"];

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
$res = mysql_query("UPDATE admin SET password='".$passmd."' WHERE id='".$iidd."'");

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
                    <label class="col-md-3 control-label"><strong>Password</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="pass" type="password">
                    </div>
                    </div>
                                    							
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Password Again</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="pass2" type="password">
                    </div>
                    </div>
           							

                   



<div class="row">
<div class="col-md-offset-3 col-md-6">
<button type="submit" class="btn blue btn-lg btn-block">Change Now</button>
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