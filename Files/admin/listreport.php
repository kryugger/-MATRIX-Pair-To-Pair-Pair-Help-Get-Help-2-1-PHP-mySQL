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
<h3 class="page-title"> View Reported Donations <small></small></h3>
<hr>
					
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
$oop = mysql_query("SELECT `id`, `payto`, `pos`, `pkg`, `amount`, `payby`, `ctm`, `atm`, `ptm`, `aptm`, `ptyp`, `nameslip`, `img`, `status` FROM donation WHERE report='1' ORDER BY id ASC");

while ( $data = mysql_fetch_array($oop)) {

$payto = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$data[1]."'"));
$payby = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$data[5]."'"));


  
 echo "                                
 <tr>
 
<td>$data[0]</td>
<td>$payby[fname] $payby[lname]</td>
<td>$payto[fname] $payto[lname]</td>
<td><b> $data[4] $basecurrency </b></td>
<td><a href=\"reportdetails.php?id=$data[0]\" class='btn btn-primary btn-sm'> <i class='fa fa-desktop'></i> VIEW DETAILS</a></td>
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