<?php
Include('include-global.php');
$pagename = "Support Ticket";
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
<div class="col-md-4 col-md-offset-4">
<a href="<?php echo $baseurl; ?>/OpenTicket" class="btn btn-success btn-md btn-block">
<i class="fa fa-plus"></i>
OPEN NEW TICKET</a>
</div>
</div>
<div class="row">



<div class="table-responsive">

<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th> SL# </th>
<th> Ticket ID </th>
<th> Subject </th>
<th> Raised On </th>
<th> Status </th>
<th> View </th>
</tr>
</thead>

<tbody>



<?php


$i = 1;
$ddaa = mysql_query("SELECT tid, subject, tm, status FROM ticket_main WHERE usid='".$uid."' ORDER BY id DESC");
while ($data = mysql_fetch_array($ddaa))
{


$sl = str_pad($i, 4, '0', STR_PAD_LEFT);

$dtm = date("Y-m-d H:i:s", $data[2]);

if($data[3]==0){
$sts = "<b class='btn btn-info'> OPEN </b>";
}elseif($data[3]==1){
$sts = "<b class='btn btn-success'> ANSWERED </b>";
}elseif($data[3]==2){
$sts = "<b class='btn btn-warning'> USER REPLY </b>";
}elseif($data[3]==9){
$sts = "<b class='btn btn-danger'> CLOSED </b>";
}




echo "                                
<tr>

<td>$sl</td>
<td>$data[0]</td>
<td>$data[1]</td>
<td>$dtm</td>
<td>$sts</td>
<td><a href=\"$baseurl/ViewTicket/$data[0]\" class='btn btn-primary'> 
<i class='fa fa-desktop'></i> VIEW</a></td>




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
