<?php
Include('include-global.php');
$pagename = "Transaction History";
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
<th> Transaction Number </th>
<th> Transacted on </th>
<th> Description </th>
<th> Amount </th>
</tr>
</thead>

<tbody>



<?php


$i = 1;
$ddaa = mysql_query("SELECT trx, tm, description, amount  FROM trx WHERE usid='".$uid."' ORDER BY id DESC");
echo mysql_error();
while ($data = mysql_fetch_array($ddaa))

{


$sl = str_pad($i, 4, '0', STR_PAD_LEFT);
$dtm = date("Y-m-d H:i:s", $data[1]);

if($data[3]<0){
	$amo = "<b class='btn btn-danger btn-sm'> $data[3] $basecurrency </b>";
}else{
	$amo = "<b class='btn btn-success btn-sm'> $data[3] $basecurrency </b>";
}



echo "                                
<tr>

<td>$sl</td>
<td>$data[0]</td>
<td>$dtm</td>
<td>$data[2]</td>
<td>$amo</td>




</tr>";

$i++;
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
