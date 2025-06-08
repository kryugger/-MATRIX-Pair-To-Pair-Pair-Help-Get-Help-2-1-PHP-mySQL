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
                    <h3 class="page-title"> Set Notification Email Crediential 
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

$emailtemp = mysql_real_escape_string($_POST["emailtemp"]);
$notimail = mysql_real_escape_string($_POST["notimail"]);


$err1=0;
$err2=0;






$error = $err1+$err2;


if ($error == 0){
	
$res = mysql_query("UPDATE general_setting SET emailtemp='".$emailtemp."', notimail='".$notimail."' WHERE id='1'");
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

$old = mysql_fetch_array(mysql_query("SELECT emailtemp, notimail FROM general_setting WHERE id='1'"));
?>										
										
							<div class="col-md-12">
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet box green">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-bookmark"></i>Short Code</div>

</div>
<div class="portlet-body">
<div class="table-scrollable">
<table class="table table-striped table-hover">
<thead>
<tr>
<th> # </th>
<th> CODE </th>
<th> DESCRIPTION </th>
</tr>
</thead>
<tbody>


<tr>
<td> 1 </td>
<td> <pre>{{message}}</pre> </td>
<td> Details Text From Script</td>
</tr>

<tr>
<td> 2 </td>
<td> <pre>{{name}}</pre> </td>
<td> Users Name. Will Pull From Database and Use in EMAIL text</td>
</tr>



</tbody>
</table>
</div>
</div>
</div>
<!-- END SAMPLE TABLE PORTLET-->
</div>			

    <div class="form-group">
    <label class="col-md-12"><strong>Notification From Email</strong></label>
    <div class="col-md-12">
    <input class="form-control input-lg" name="notimail" required="" value="<?php echo $old[1]; ?>" type="text" >
    </div>
    </div>
	
						

     
     
    <div class="form-group">
    <label class="col-md-12"><strong>EMAIL TEMPLATE</strong></label>
    <div class="col-md-12">
    <textarea id="shaons" class="form-control" rows="20" name="emailtemp"><?php echo $old[0]; ?></textarea>
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