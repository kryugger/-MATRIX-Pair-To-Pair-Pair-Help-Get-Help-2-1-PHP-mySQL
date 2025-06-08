<?php
include ('include/header.php');
if($usid[2]!=100){
redirect('home.php');
}
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
                    <h3 class="page-title"> Packege Manageent


<button type="button" class="btn btn-success btn-lg pull-right edit_button" 
data-toggle="modal" data-target="#myModal"
data-act="Add New"
data-name=""
data-id="0">
<i class="fa fa-plus"></i>  ADD NEW
</button> 

                     </h3>
					<hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
   


<div class="row">
<div class="col-md-12">

<?php

if(isset($_GET['act'])) {
$id = $_GET['id']; 
$act = $_GET['act']; 
mysql_query("UPDATE packs SET tm='0', st='1' WHERE id='".$id."'");
}
?>  


   
<?php

if(isset($_POST['tm'])){

$id = mysql_real_escape_string($_POST["id"]);
$tm = mysql_real_escape_string($_POST["tm"]);

$ttm = time()+($tm*3600);

$res = mysql_query("UPDATE packs SET st='0', tm='".$ttm."' WHERE id='".$id."'");
if($res){
notification("Updated Successfully!", "", "success", false, "btn-primary", "OKAY");
}else{
notification("Some Problem Occurs!", "Please Try Again...", "error", false, "btn-primary", "OKAY");
}

}


if(isset($_POST['name'])){

$id = mysql_real_escape_string($_POST["id"]);
$name = mysql_real_escape_string($_POST["name"]);
$amount = mysql_real_escape_string($_POST["amount"]);

$err1=0;
$err2=0;

if($name==""){
$err1=1;
}
if($amount<1){
$err2=1;
}


$error = $err1+$err2;


if ($error == 0){

if ($id==0) {
$res = mysql_query("INSERT INTO packs SET name='".$name."', amount='".$amount."'");
if($res){
notification("Added Successfully!", "", "success", false, "btn-primary", "OKAY");
}else{
notification("Some Problem Occurs!", "Please Try Again...", "error", false, "btn-primary", "OKAY");
}
}else{
$res = mysql_query("UPDATE packs SET name='".$name."', amount='".$amount."' WHERE id='".$id."'");
if($res){
notification("Updated Successfully!", "", "success", false, "btn-primary", "OKAY");
}else{
notification("Some Problem Occurs!", "Please Try Again...", "error", false, "btn-primary", "OKAY");
}
}


} else {
  
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Name Can Not be Empty!!!
</div>";
} 
if ($err1 == 2){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Amount Must Be a Positive Number!!!
</div>";
} 


}
}

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
<th> ID# </th>
<th> Name </th>
<th> Amount </th>
<th> MANAGEMET </th>
<th> Action </th>
</tr>

</thead><tbody>

<?php
$ddaa = mysql_query("SELECT id, name, amount, st, tm FROM packs ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {

if ($data[3]==1) {
$st = "<b class='btn btn-success btn-sm'>ACTIVE</b>";
$blockbtn = "



<button type=\"button\" class=\"btn red btn-sm inc_button\" 
data-toggle=\"modal\" data-target=\"#inactive\"
data-id=\"$data[0]\">
MAKE INACTIVE
</button> 


";
$tl = "";
}else{

$st = "<b class='btn btn-danger btn-sm'>INACTIVE</b>";
$blockbtn = "<a href=\"?id=$data[0]&amp;act=1&amp;block=TSK\" class=\"btn green btn-sm\"> <i class=\"fa fa-unlock\"></i> Make Active </a>"; 

$tl=timeleft($data[4]-time());
}



 echo "                                
 <tr id='$data[0]'>
 
   <td>$data[0]</td>
   <td>$data[1]</td>
   <td>$data[2] $basecurrency</td>
   <td>$st $blockbtn $tl</td>
   <td>


<button type=\"button\" class=\"btn purple btn-sm edit_button\" 
data-toggle=\"modal\" data-target=\"#myModal\"
data-act=\"Edit\"
data-amount=\"$data[2]\"
data-name=\"$data[1]\"
data-id=\"$data[0]\">
<i class=\"fa fa-edit\"></i> EDIT
</button> 
    

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


<!-- Modal for Edit button -->
<div class="modal fade" id="inactive" tabindex="-1" role="dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"> Packege Management</h4>
</div>
<form method="post" action="">
<div class="modal-body">
<div class="form-group">
<input class="form-control abirid" type="hidden" name="id">

<div class="input-group mb15">
<input class="form-control input-lg" name="tm" placeholder="FOR" required>
<span class="input-group-addon">HOUR</span>
</div>


</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
</div>
</div>






<!-- Modal for Edit button -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"> <b class="abir_act"></b> Packege</h4>
</div>
<form method="post" action="">
<div class="modal-body">
<div class="form-group">
<input class="form-control abir_id" type="hidden" name="id">
<input class="form-control input-lg abir_name" name="name" placeholder="Name" required>
<br>
<div class="input-group mb15">
<input class="form-control input-lg abir_amount" name="amount" placeholder="Amount" required>
<span class="input-group-addon"><?php echo $basecurrency; ?></span>
</div>



</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
</div>
</div>



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
        
$(document).on( "click", '.edit_button',function(e) {

        var name = $(this).data('name');
        var id = $(this).data('id');
        var act = $(this).data('act');
        var amount = $(this).data('amount');

        $(".abir_id").val(id);
        $(".abir_name").val(name);
        $(".abir_act").text(act);
        $(".abir_amount").val(amount);

    });



$(document).on( "click", '.inc_button',function(e) {


        var id = $(this).data('id');

        $(".abirid").val(id);
            });


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
          frm: "packs"
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