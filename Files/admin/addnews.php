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
                    <h3 class="page-title"> Add New News<small></small>

  <a href="listnews.php" class="btn btn-success btn-lg pull-right"> <i class="fa fa-desktop"></i> ALL NEWS</a>

                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>

					
					
					
					
					
			<div class="row">
			<div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body form">
               <form class="form-horizontal" action="" method="post" role="form" enctype="multipart/form-data">
                                        <div class="form-body">

		   
<?php



if($_POST)
{

$ttl = mysql_real_escape_string($_POST["ttl"]);
$btext = mysql_real_escape_string($_POST["btext"]);

$err1=0;
$err2=0;
$err3=0;


if(trim($ttl)==""){
$err1=1;
}

if(trim($btext)==""){
$err2=1;
}

$error = $err1+$err2+$err3;


if ($error == 0){
	
$res = mysql_query("INSERT INTO news SET ttl='".$ttl."', btext='".$btext."', tm='".time()."'");
if($res){
notification("Added Successfully!", "", "success", false, "btn-primary", "OKAY");
}else{
notification("Some Problem Occurs!", "Please Try Again...", "error", false, "btn-primary", "OKAY");
}
} else {
	
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Title Can Not be Empty!!!

</div>";
}		
	
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

News Text Can Not be Empty!!!

</div>";
}		

}




}

?>										
										
										
										
										
										
										
					<div class="form-group">
                    <label class="col-md-12"><strong>News Title</strong></label>
                    <div class="col-md-12">
                     <input class="form-control input-lg" name="ttl" placeholder="Head Line ....." type="text">
                    </div>
                    </div>
                     
										
					 
					 
					<div class="form-group">
                    <label class="col-md-12"><strong>Details News</strong></label>
                    <div class="col-md-12">
                    <textarea id="shaons" class="form-control" rows="15" name="btext"></textarea>
                    </div>
                    </div>

 

 
 
 
 <div style="margin-top:60px;"></div>
 
 

					 
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