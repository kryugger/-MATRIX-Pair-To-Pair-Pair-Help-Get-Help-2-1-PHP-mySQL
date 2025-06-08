<?php
Include('include-global.php');
$pagename = "MY DONATIONS";
$title = "$pagename - $basetitle";
Include('include-header.php');
?>

<link rel="stylesheet" href="<?php echo $baseurl; ?>/asset/css/datatable.css" type="text/css" />

</head>
<body class="stretched" data-loader="<?php echo $baseloader; ?>" data-loader-color='<?php echo "#$basecolor"; ?>'>
<?php
Include('include-navbar-user.php');
Include('include-subhead.php');
?>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">


<div class="row">



<div class="table-responsive">

<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>

<tr>
<th> SL# </th>
<th> DONATION FROM </th>
<th> DONATION TO </th>
<th> AMOUNT </th>
</tr>
</thead>

<tbody>



<?php


$i = 1;

$oop = mysql_query("SELECT `id`, `payto`, `pos`, `pkg`, `amount`, `payby`, `ctm`, `atm`, `ptm`, `aptm`, `ptyp`, `nameslip`, `img`, `status` FROM donation WHERE payto='".$uid."' OR payby='".$uid."'  ORDER BY id ASC");

while ( $data = mysql_fetch_array($oop)) {

$payto = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$data[1]."'"));
$payby = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$data[5]."'"));

if ($data[13]==0) {
$stclass = "warning";
}elseif ($data[13]==1) {
$stclass = "primary";
}elseif ($data[13]==2) {
$stclass = "success";
}elseif ($data[13]==3) {
$stclass = "info";
}



$sl = str_pad($i, 4, '0', STR_PAD_LEFT);


echo "                                
<tr class=\"$stclass\">
<td>$sl</td>
<td>$payby[fname] $payby[lname]</td>
<td>$payto[fname] $payto[lname]</td>
<td><b> $data[4] $basecurrency </b></td>


</tr>";

$i++;


/*
<td><button class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\".modal-$data[0]\"> <i class='fa fa-desktop'></i>   VIEW DETAILS</button></td>
*/


?>



<!-- MODAL	 -->
<div class="modal fade modal-<?php echo $data[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">DONATION DETAILS</h4>
</div>
<div class="modal-body">


<h3 style="text-align: center;"><span> <?php echo " $data[4] $basecurrency"; ?></span></h3>




</div>
</div>
</div>
</div>
</div>
<!-- MODAL END  -->








<?php

}


?>       
</tbody>
</table>

</div>



</div><!-- row -->


</div>
</div>
</section>
<?php 
include('include-footer.php');
?>

<script type="text/javascript" src="<?php echo $baseurl; ?>/asset/js/datatable.js"></script>
<script>

$(document).ready(function() {
$('#datatable1').dataTable();
});

</script>
</body>
</html>
