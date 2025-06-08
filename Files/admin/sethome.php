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
                    <h3 class="page-title"> Set Home Page 
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

$hometxt = mysql_real_escape_string($_POST["hometxt"]);
$about = mysql_real_escape_string($_POST["about"]);


$err1=0;
$err2=0;






$error = $err1+$err2;


if ($error == 0){
	
$res = mysql_query("UPDATE general_setting SET hometxt='".$hometxt."', about='".$about."' WHERE id='1'");
echo mysql_error();
if($res){
notification("Updated Successfully!", "", "success", false, "btn-primary", "OKAY");
}else{
notification("Some Problem Occurs!", "Please Try Again...", "error", false, "btn-primary", "OKAY");
}

} else {
	
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Name Can Not be Empty!!!
</div>";
}		
}
}

$old = mysql_fetch_array(mysql_query("SELECT hometxt, about FROM general_setting WHERE id='1'"));
?>										
										
										
						
						
						

     
     
    <div class="form-group">
    <label class="col-md-12"><strong>Home Page Text</strong></label>
    <div class="col-md-12">
    <textarea id="shaons" class="form-control" rows="20" name="hometxt"><?php echo $old[0]; ?></textarea>
    </div>
    </div>



     <br>     <br>     <br>     <br>
     
    <div class="form-group">
    <label class="col-md-12"><strong>ABOUT [FOOTER]</strong></label>
    <div class="col-md-12">
    <textarea class="form-control" rows="4" name="about"><?php echo $old[1]; ?></textarea>
    </div>
    </div>


<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn blue btn-lg btn-block">Update</button>
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