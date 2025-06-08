<?php
include ('include/header.php');
?>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
		
		
		
		</head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        
		
	
<?php
include ('include/sidebar.php');
?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Ticket <small> Response Required</small></h3>
					<hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    
<?php

if(isset($_GET['id'])) {
	
$id = $_GET['id']; 
$act = $_GET['act']; 

mysql_query("UPDATE users SET hide='".$act."' WHERE id='".$id."'");
}
?>					
					
					
                    <div class="row">
                        <div class="col-md-12">
                            
							
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <!--i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">AAA</span-->
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>

										
										
<tr>
<th> Ticket ID# </th>
<th> Username </th>
<th> Subject </th>
<th> Raised On </th>
<th> Status </th>
<th> View </th>
</tr>

</thead><tbody>

<?php
$ddaa = mysql_query("SELECT tid, subject, tm, status, usid, id FROM ticket_main WHERE status='0' OR status='2' ORDER BY id DESC");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
		
$dtm = date("Y-m-d H:i:s", $data[2]);

if($data[3]==0){
    $sts = "<b style='color:green;'> OPEN </b>";
}elseif($data[3]==1){
    $sts = "<b style='color:blue;'> ANSWERED </b>";
}elseif($data[3]==2){
    $sts = "<b style='color:orange;'> USER REPLY </b>";
}elseif($data[3]==9){
    $sts = "<b style='color:red;'> CLOSED </b>";
}

$unm = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE id='".$data[4]."'"));
		
 echo "                                
 <tr>
 
   <td>$data[0]</td>
   <td>$unm[0]</td>
   <td>$data[1]</td>
   <td>$dtm</td>
   <td>$sts</td>
   <td>
   <a href=\"ticket-details.php?id=$data[5]\"  class=\"btn purple btn-xs\"> <i class='fa fa-desktop'></i> VIEW</a>

   </td>
   


</tr>";
	
	}
?>
				
			

                                            

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                            
                        </div>
                    </div><!-- ROW-->
					
					
					
					
					
			
			
		
					
					
					
					
					
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
            
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
      <?php
 include ('include/footer.php');
 ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
		
		 <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
 
 </body>
</html>