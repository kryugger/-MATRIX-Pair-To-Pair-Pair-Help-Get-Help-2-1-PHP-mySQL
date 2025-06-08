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
                    <h3 class="page-title"> USERS DONATIONS


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
<th> DONATION FROM </th>
<th> DONATION TO </th>
<th> AMOUNT </th>
<th> STATUS </th>
</tr>

</thead><tbody>

<?php
$iidd = $_GET['userid'];


$oop = mysql_query("SELECT `id`, `payto`, `pos`, `pkg`, `amount`, `payby`, `ctm`, `atm`, `ptm`, `aptm`, `ptyp`, `nameslip`, `img`, `status` FROM donation WHERE payto='".$iidd."' OR payby='".$iidd."' ORDER BY id ASC");

while ( $data = mysql_fetch_array($oop)) {

$payto = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$data[1]."'"));
$payby = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$data[5]."'"));

if ($data[13]==0) {
$stat = "AWAITING MARGE";
$stclass = "warning";
}elseif ($data[13]==1) {
$stat = "AWAITING PAYMENT";
$stclass = "primary";
}elseif ($data[13]==2) {
$stat = "AWAITING CONFIRMATION";
$stclass = "success";
}

	
 echo "                                
 <tr class='$stclass'>
 
<td>$data[0]</td>
<td>$payby[fname] $payby[lname]</td>
<td>$payto[fname] $payto[lname]</td>
<td><b> $data[4] $basecurrency </b></td>
<td>$stat</td>
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


</body>
</html>