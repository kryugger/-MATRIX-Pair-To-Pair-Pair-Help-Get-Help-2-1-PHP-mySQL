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


<div class="page-content-wrapper">
<div class="page-content">
<h3 class="page-title"> View Blocked Users <small></small></h3>
<hr>


<?php

if(isset($_GET['block'])) {
$id = $_GET['id']; 
$act = $_GET['act']; 
mysql_query("UPDATE users SET block='".$act."' WHERE id='".$id."'");
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
<th> Name </th>
<th> Mobile </th>
<th> Email </th>
<th> UNBLOCK </th>
</tr>

</thead><tbody>

<?php
$ddaa = mysql_query("SELECT id, fname, lname, phone, email, block FROM users WHERE block='1' ORDER BY id");
while ($data = mysql_fetch_array($ddaa)){

if($data[5]!=0){
$blockbtn = "<a href=\"?id=$data[0]&amp;act=0&amp;block=TSK\" class=\"btn green btn-xs\"> <i class=\"fa fa-unlock\"></i> UNBLOCK </a>"; 
}else{
$blockbtn = "<a href=\"?id=$data[0]&amp;act=1&amp;block=TSK\" class=\"btn red btn-xs\"><i class=\"fa fa-lock\"></i> BLOCK </a>";
}    


 echo "                                
 <tr>
 
   <td>$data[0]</td>
   <td>$data[1] $data[2]</td>
   <td>$data[3]</td>
   <td>$data[4]</td>
   <td>$blockbtn</td>

</tr>

";
	
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