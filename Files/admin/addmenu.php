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
                    <h3 class="page-title"> Add New Menu
<a href="listmenu.php" class="btn btn-lg btn-primary pull-right"><i class="fa fa-desktop"></i> View All Menu </a>
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

$name = mysql_real_escape_string($_POST["name"]);
$btext = mysql_real_escape_string($_POST["btext"]);


$err1=0;
$err2=0;




if(trim($name)=="")
      {
$err1=1;
}




$error = $err1+$err2;


if ($error == 0){
	
$res = mysql_query("INSERT INTO menus SET name='".$name."', btext='".$btext."'");
if($res){
notification("Added Successfully!", "", "success", false, "btn-primary", "OKAY");
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

?>										
										
										
										
										
										
										
					<div class="form-group">
                    <label class="col-md-12"><strong>Menu Name</strong></label>
                    <div class="col-md-12">
                     <input class="form-control input-lg" name="name" placeholder="" type="text">
                    </div>
                    </div>

                     
                    <div class="form-group">
                    <label class="col-md-12"><strong>Content</strong></label>
                    <div class="col-md-12">
                    <textarea id="shaons" class="form-control" rows="20" name="btext"></textarea>
                    </div>
                    </div>

					 
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn blue btn-lg btn-block">Submit</button>
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