<?php
include ('include/header.php');
?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->


</head>
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
                    <h3 class="page-title"> View Menu


<a href="addmenu.php" class="btn btn-lg btn-primary pull-right"><i class="fa fa-plus"></i> Add NEW Menu </a>

                     </h3>
					<hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
   


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
<th> Name </th>
<th> Action </th>
</tr>

</thead><tbody>

<?php
$ddaa = mysql_query("SELECT id, name FROM menus ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
		
	
 echo "                                
 <tr id='$data[0]'>
 
   <td>$data[0]</td>
   <td>$data[1]</td>
   <td>

<a href=\"editmenu.php?id=$data[0]\"><button class=\"btn purple btn-sm\"> <i class=\"fa fa-edit\"></i> EDIT</button></a>


    

        <button type=\"button\" class=\"btn btn-danger btn-sm delete_button\" 
        data-toggle=\"modal\" data-target=\"#DelModal\"
        data-id=\"$data[0]\">
        <i class=\"fa fa-times\"></i>  DELETE
        </button>




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
<div class="modal fade" id="DelModal" tabindex="-1" role="dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
</div>
<div class="modal-body">
<strong>Are you sure, You want to  Delete ?</strong>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
<button type="button" class="delete_product btn btn-danger" data-did="0" data-dismiss="modal">DELETE</button>
</div>
</div>
</div>


			
		
<?php
include ('include/footer.php');
?>
<script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
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
                  "<?php echo $adminurl; ?>/delete.php",
                  { 
          delete: pid,
          frm: "menus"
          },
              function(data) {
            
        $("#"+pid).fadeOut("slow");
        $(".msg").text(data);

                swal({
          title: data,
          text: "",
          type: "success",
          showCancelButton: false,
          confirmButtonClass: 'btn-primary',
          confirmButtonText: 'Okay'
        });


                  }
               );



        });


        
    });


</script>
</body>
</html>