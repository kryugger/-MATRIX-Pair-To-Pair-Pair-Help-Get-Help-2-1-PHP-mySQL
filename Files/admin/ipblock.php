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
<h3 class="page-title"> View Blocked IP <small></small></h3>
<hr>



					
<div class="row">
<div class="col-md-12">





<form action="" method="post">
<div class="row">
<div class="col-md-9"> <input type="text" name="ip" class="form-control input-lg" placeholder="ADD NEW IP"></div>
<div class="col-md-3"> <button type="submit" class="btn btn-lg btn-block btn-primary"> BLOCK THIS IP</button></div>
</div>
</form>

<br><br><br><br>





<?php

if(isset($_POST['ip'])) {
$ip = $_POST["ip"];

$res = mysql_query("INSERT INTO blockip SET ip='".$ip."'");
if($res){
notification("Added Successfully!", "", "success", false, "btn-primary", "OKAY");
}else{
notification("Some Problem Occurs!", "Please Try Again...", "error", false, "btn-primary", "OKAY");
}

}

        
//------------------------------------------->>> DELETE       

if(isset($_GET['drop'])) {
$did = $_GET["drop"];
$exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM blockip WHERE ip='".$did."'"));
if($exist[0]>=1){
$res = mysql_query("DELETE FROM blockip WHERE ip='".$did."'");

if($res){
notification("DELETED Successfully!", "", "success", false, "btn-primary", "OKAY");
}else{
notification("Some Problem Occurs!", "Please Try Again...", "error", false, "btn-primary", "OKAY");
}
}else{
//notification("NOT FOUND IN DATABASE ", "MAY ALREADY DELETED.", "error", false, "btn-primary", "OKAY");
} 
}
//------------------------------------------->>> DELETE     
      
?>

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
<th> IP </th>
<th> ACTION </th>
</tr>

</thead><tbody>

<?php
$ddaa = mysql_query("SELECT id,ip FROM blockip ORDER BY id");
while ($data = mysql_fetch_array($ddaa)){


 echo "                                
 <tr>
 
   <td>$data[1]</td>
   <td><a href=\"?drop=$data[1]\" class=\"btn green btn-xs\"> <i class=\"fa fa-unlock\"></i> UNBLOCK </a></td>

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