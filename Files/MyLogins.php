<?php
Include('include-global.php');
$pagename = "My Logins";
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
<th> TIME </th>
<th> IP </th>
<th> LOCATION </th>
<th> Browser </th>
</tr>
</thead>

<tbody>



<?php


$i = 1;



$ddaa = mysql_query("SELECT ip, location, ua, tm FROM logins WHERE usid='".$uid."' ORDER BY id DESC");
while ($data = mysql_fetch_array($ddaa))
{

$sl = str_pad($i, 4, '0', STR_PAD_LEFT);
$ltm = date("F jS, Y  - h:i A", $data[3]);



echo "                                
<tr>

<td>$sl</td>
<td>$ltm</td>
<td>$data[0]</td>
<td>$data[1]</td>
<td>$data[2]</td>



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
