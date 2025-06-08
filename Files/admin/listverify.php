<?php
include ('include/header.php');
?>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
	
<?php
include ('include/sidebar.php');
?>


<div class="page-content-wrapper">
<div class="page-content">
<h3 class="page-title"> AWAITING VERIFICATION Users <small></small></h3>
<hr>


<?php

if (isset($_POST['approve'])) {
$cats = $_POST['cats'];
foreach ($cats as $cat){
mysql_query("UPDATE users SET verify='1' WHERE id='".$cat."'");
} 
}


if (isset($_POST['delete'])) {
$cats = $_POST['cats'];
foreach ($cats as $cat){
mysql_query("DELETE FROM users WHERE id='".$cat."'");

} 
}


?>					
					
					
<div class="row">
<div class="col-md-12">


<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet light bordered">

<div class="portlet-body">


										
										



<form class="form-horizontal" action="" method="post" role="form" enctype="multipart/form-data">
<div class="form-body">


<div class="checkbox-list">


<?php           
  $ddaa = mysql_query("SELECT id, fname, lname, phone, email, regip FROM users WHERE verify='0' ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {          
echo "<label><input id=\"cats\" name=\"cats[]\" value=\"$data[0]\" type=\"checkbox\">

<strong> NAME: </strong> $data[1] $data[2] ||
<strong> EMAIL: </strong> $data[4] ||
<strong> PHONE: </strong> $data[3] ||
<strong> IP: </strong> $data[5]
</label> <br/>
";

 }
?>

</div>


<div style="margin-top:60px;"></div>

<input type="hidden" name="1" value="1">


<div class="row">
<div class="col-md-6"><button type="submit" name="approve" class="btn btn-lg blue btn-block">APPROVE</button></div>
<div class="col-md-6"><button type="submit" name="delete" class="btn btn-lg red btn-block">DELETE</button></div>
</div>
</div>
</form>


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
</body>
</html>