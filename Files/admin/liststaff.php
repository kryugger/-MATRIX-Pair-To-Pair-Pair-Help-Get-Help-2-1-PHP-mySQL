<?php
include ('include/header.php');
if($usid[2]!=100){
redirect('home.php');
}
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
                    <h3 class="page-title"> View Staffs <small></small></h3>
					<hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    
<?php

if(isset($_GET['id'])) {
	
$id = $_GET['id']; 
$act = $_GET['act']; 

mysql_query("UPDATE users SET hide='".$act."' WHERE id='".$id."'");
//echo mysql_error();
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
<th> ID# </th>
<th> Username </th>
<th> Full Name </th>
<th> Email </th>
<th> Phone </th>
<th> Role </th>
<th> Action </th>
</tr>

</thead><tbody>

<?php
$ddaa = mysql_query("SELECT id, username, fullname, email, phone, pwr, hide FROM admin WHERE id<>2 ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
		
if($data[6]!=0){
$hidebtn = "<a href=\"?id=$data[0]&amp;act=0\"><button class=\"btn green btn-xs\"> <i class=\"fa fa-unlock\"></i> UNBLOCK </button></a>";	
}else{
$hidebtn = "<a href=\"?id=$data[0]&amp;act=1\"><button class=\"btn red btn-xs\"> <i class=\"fa fa-lock\"></i> BLOCK </button></a>";
}	

if($data[5]==100){
$rr = "<p class=\"btn green btn-outline sbold uppercase btn-xs\"> Full Controller </p>";	
}else{
$rr = "<p class=\"btn blue btn-outline sbold uppercase btn-xs\"> Support Ticket and User Verification </p>";	
}	
		
 echo "                                
 <tr id='$data[0]'>
 
   <td>$data[0]</td>
   <td>$data[1]</td>
   <td>$data[2]</td>
   <td>$data[3]</td>
   <td>$data[4]</td>
   <td>$rr</td>
   <td>

   <a href=\"editstaff.php?id=$data[0]\"><button class=\"btn purple btn-sm\"> <i class=\"fa fa-edit\"></i> EDIT</button></a>

   <a href=\"staffpass.php?id=$data[0]\"><button class=\"btn btn-info btn-sm\"> <i class=\"fa fa-edit\"></i> CHANGE PASSWORD</button></a>



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
            
            
			
			
			




<!-- Modal for DELETE -->
<div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-    labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
</div>

<div class="modal-body">
<strong>Are you sure you want to Delete ?</strong>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="delete_product btn btn-danger" data-did="0" data-dismiss="modal">DELETE</button>
</div>


</div>
</div>
</div>





<!-- Modal for DEL SUCCESS -->
<div class="modal fade" id="DelDone" tabindex="-1" role="dialog" aria-    labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete!</h4>
</div>

<div class="modal-body">      
<b class="msg"></b>         
</div>

<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
</div>


</div>
</div>
</div>





			
			
			
			
			
			
			
			
		
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







<script>
    $(document).ready(function(){
        



        
$(document).on( "click", '.delete_button',function(e) {
        var id = $(this).data('id');
        $('.delete_product').data('did', id);

    });






        $('.delete_product').click(function(e){
            
            e.preventDefault();


        var pid = $(this).data('did');

        $.post( 
                  "delete.php",
                  { 
          delete: pid,
          frm: "admin"
          },
                  function(data) {
            
        $("#"+pid).fadeOut("slow");
        $(".msg").text(data);
        $("#DelDone").modal('show');          
                  }
               );



        });


        
    });
</script>
 </body>
</html>