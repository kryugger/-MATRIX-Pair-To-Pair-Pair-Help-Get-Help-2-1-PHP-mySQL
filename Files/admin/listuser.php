<?php
include ('include/header.php');
?>





</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">


<?php


        
// //------------------------------------------->>> DELETE       

// if(isset($_GET['did'])) {
// $did = $_GET["did"];
// $exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE id='".$did."'"));
// if($exist[0]>=1){
  
// $res = mysql_query("DELETE FROM users WHERE id='".$did."'");

// if($res){
// mysql_query("UPDATE donation SET status='4' WHERE payto='".$did."' AND (status='0' OR status='1' OR status='2')");
// mysql_query("UPDATE donation SET status='0', payby='0', atm='0', ptm='0' WHERE payby='".$did."' AND (status='0' OR status='1' OR status='2')");

// notification("DELETED Successfully!", "", "success", false, "btn-primary", "OKAY");
// }else{
// notification("Some Problem Occurs!", "Please Try Again...", "error", false, "btn-primary", "OKAY");
// }
// }else{
// notification("NOT FOUND IN DATABASE ", "MAY ALREADY DELETED.", "error", false, "btn-primary", "OKAY");
// } 
// }
// //------------------------------------------->>> DELETE     
      





if(isset($_GET['block'])) {
$id = $_GET['id']; 
$act = $_GET['act']; 
mysql_query("UPDATE users SET block='".$act."' WHERE id='".$id."'");

if ($act == 1) {
mysql_query("UPDATE donation SET status='4' WHERE payto='".$id."' AND (status='0' OR status='1' OR status='2')");
mysql_query("UPDATE donation SET status='0', payby='0', atm='0', ptm='0' WHERE payby='".$id."' AND (status='0' OR status='1' OR status='2')");
}


}
?>			

<?php
include ('include/sidebar.php');



//--------------------->> Page Number
$page= $_GET["page"];
if($page<="0" || $page==""){
$page = 1;
}
$start = $page*30-30;
//--------------------->> Page Number
$ttl = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users"));
$tpg = ceil($ttl[0]/30);
?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
<!-- BEGIN PAGE HEADER-->

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"><i class="fa fa-users"></i> View All USERS <small></small></h3>
<hr>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->



<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="form-group">
<form action="listuser.php" method="post">
<label class="control-label col-md-3">Search By Username:</label>
<div class="col-md-5">
<input class="form-control" name="uid" type="text"> </div>
<div class="col-md-4"><button name="user" value="tru" class="btn btn-success btn-block">Search</button></div>				
</div>				
</form>
</div>
</div>

<hr>                 



<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="form-group">
<form action="listuser.php" method="post">
<label class="control-label col-md-3">Search By Mobile:</label>
<div class="col-md-5">
<input class="form-control" name="number" type="text"> </div>
<div class="col-md-4"><button name="mob" value="tru" class="btn btn-success btn-block">Search</button></div>				
</div>				
</form>
</div>
</div>

<hr>   


<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="form-group">
<form action="listuser.php" method="post">
<label class="control-label col-md-3">Search By Email:</label>
<div class="col-md-5">
<input class="form-control" name="email" type="text"> </div>
<div class="col-md-4"><button name="ema" value="tru" class="btn btn-success btn-block">Search</button></div>				
</div>				
</form>
</div>
</div>

<hr>                 



<div class="row">
<div class="col-md-12">


<?php
if(isset($_POST['email']))
{

$email = $_POST["email"];
?>		



<div class="portlet box blue">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-file"></i>Showing For Email: <?php echo $email; ?></div>
</div>

<div style="display: block;" class="portlet-body">
<div class="table-responsive">
<table class="table table-bordered">

<thead>

<tr>
<th> Member ID# </th>
<th> UserName </th>
<th> Ref By </th>
<th> Email </th>
<th> Phone </th>
<th> BLOCK </th>
<th> ATION </th>
</tr>

</thead><tbody>

<?php
$ddaa = mysql_query("SELECT id, ref, username, email, phone FROM users WHERE email='".$email."'");
echo mysql_error();
while ($data = mysql_fetch_array($ddaa)){

if($data[5]!=0){
$blockbtn = "<a href=\"?id=$data[0]&amp;act=0&amp;block=TSK\" class=\"btn green btn-md\"> <i class=\"fa fa-unlock\"></i> UNBLOCK </a>"; 
}else{
$blockbtn = "<a href=\"?id=$data[0]&amp;act=1&amp;block=TSK\" class=\"btn red btn-md\"><i class=\"fa fa-lock\"></i> BLOCK </a>";
}  

$refBy = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE id='".$data[1]."'"));
echo "                                
<tr>
	<td>$data[0]</td>
	<td>$data[2]</td>
	<td>$refBy[0]</td>
	<td>$data[3]</td>
	<td>$data[4]</td>
	<td>$blockbtn</td>
	<td>
	<a href='editusr.php?userid=$data[0]' class='btn btn-primary btn-md'>EDIT</a>
	<a href='donation-user.php?userid=$data[0]' class='btn btn-info btn-md'>DONATIONS</a>
	</td>
</tr>";

}
?>

</tbody> </table>
</div>
</div>
</div>

<?php
}elseif(isset($_POST['mob'])){

$number = $_POST["number"];
?>

<div class="portlet box blue">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-file"></i>Showing For Mobile: <?php echo $number; ?></div>
</div>

<div style="display: block;" class="portlet-body">
<div class="table-responsive">
<table class="table table-bordered">


<thead>

<tr>
<th> Member ID# </th>
<th> UserName </th>
<th> Ref By </th>
<th> Email </th>
<th> Phone </th>
<th> BLOCK </th>
<th> ATION </th>
</tr>

</thead><tbody>

<?php
$ddaa = mysql_query("SELECT id, ref, username, email, phone, block FROM users WHERE phone='".$number."'");
echo mysql_error();
while ($data = mysql_fetch_array($ddaa)){

if($data[5]!=0){
$blockbtn = "<a href=\"?id=$data[0]&amp;act=0&amp;block=TSK\" class=\"btn green btn-md\"> <i class=\"fa fa-unlock\"></i> UNBLOCK </a>"; 
}else{
$blockbtn = "<a href=\"?id=$data[0]&amp;act=1&amp;block=TSK\" class=\"btn red btn-md\"><i class=\"fa fa-lock\"></i> BLOCK </a>";
}  

$refBy = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE id='".$data[1]."'"));
echo "                                
<tr>
	<td>$data[0]</td>
	<td>$data[2]</td>
	<td>$refBy[0]</td>
	<td>$data[3]</td>
	<td>$data[4]</td>
	<td>$blockbtn</td>
	<td>
	<a href='editusr.php?userid=$data[0]' class='btn btn-primary btn-md'>EDIT</a>
	<a href='donation-user.php?userid=$data[0]' class='btn btn-info btn-md'>DONATIONS</a>
	</td>
</tr>";

}
?>

</tbody> </table>
</div>
</div>
</div>



<?php
}elseif(isset($_POST['user'])){

$uuid = $_POST["uid"];
?>

<div class="portlet box blue">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-file"></i>Showing  For USERNAME:  <?php echo $uuid; ?></div>
</div>

<div style="display: block;" class="portlet-body">
<div class="table-responsive">
<table class="table table-bordered">


<thead>

<tr>
<th> Member ID# </th>
<th> UserName </th>
<th> Ref By </th>
<th> Email </th>
<th> Phone </th>
<th> BLOCK </th>
<th> ATION </th>
</tr>

</thead><tbody>

<?php
$ddaa = mysql_query("SELECT id, ref, username, email, phone, block FROM users WHERE username='".$uuid."'");
echo mysql_error();
while ($data = mysql_fetch_array($ddaa)){

if($data[5]!=0){
$blockbtn = "<a href=\"?id=$data[0]&amp;act=0&amp;block=TSK\" class=\"btn green btn-md\"> <i class=\"fa fa-unlock\"></i> UNBLOCK </a>"; 
}else{
$blockbtn = "<a href=\"?id=$data[0]&amp;act=1&amp;block=TSK\" class=\"btn red btn-md\"><i class=\"fa fa-lock\"></i> BLOCK </a>";
}  
$refBy = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE id='".$data[1]."'"));
echo "                                
<tr>
	<td>$data[0]</td>
	<td>$data[2]</td>
	<td>$refBy[0]</td>
	<td>$data[3]</td>
	<td>$data[4]</td>
	<td>$blockbtn</td>
	<td>
	<a href='editusr.php?userid=$data[0]' class='btn btn-primary btn-md'>EDIT</a>
	<a href='donation-user.php?userid=$data[0]' class='btn btn-info btn-md'>DONATIONS</a>
	</td>
</tr>";

}
?>

</tbody> </table>
</div>
</div>
</div>



<?php
}else{
?>






<div class="portlet box blue">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-file"></i>PAGE # <?php echo $page; ?> OF <?php echo $tpg; ?> </div>
</div>

<div style="display: block;" class="portlet-body">
<div class="table-responsive">
<table class="table table-bordered">

<thead>

<tr>
<th> Member ID# </th>
<th> UserName </th>
<th> Ref By </th>
<th> Email </th>
<th> Phone </th>
<th> BLOCK </th>
<th> ATION </th>
</tr>

</thead><tbody>

<?php
$ddaa = mysql_query("SELECT id, ref, username, email, phone, block FROM users ORDER BY id DESC LIMIT ".$start.",30");
while ($data = mysql_fetch_array($ddaa)){
$refBy = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE id='".$data[1]."'"));

if($data[5]!=0){
$blockbtn = "<a href=\"?id=$data[0]&amp;act=0&amp;block=TSK\" class=\"btn green btn-md\"> <i class=\"fa fa-unlock\"></i> UNBLOCK </a>"; 
}else{
$blockbtn = "<a href=\"?id=$data[0]&amp;act=1&amp;block=TSK\" class=\"btn red btn-md\"><i class=\"fa fa-lock\"></i> BLOCK </a>";
}  


echo "                                
<tr>
	<td>$data[0]</td>
	<td>$data[2]</td>
	<td>$refBy[0]</td>
	<td>$data[3]</td>
	<td>$data[4]</td>
	<td>$blockbtn</td>
	<td>
	<a href='editusr.php?userid=$data[0]' class='btn btn-primary btn-md'>EDIT</a>
	<a href='donation-user.php?userid=$data[0]' class='btn btn-info btn-md'>DONATIONS</a>
	</td>
</tr>";

}
?>



</tbody> </table>
</div>
</div>
</div>



<div class="row">								
<div class="col-md-8 col-md-offset-2">								
<?php
//-----------------------previous	
$prevnum=$page-1;
$prev ="<a class=\"btn btn-success btn-md\" href=\"?page=$prevnum\">PREV</a>&nbsp;&nbsp;&nbsp;";
if($page<="1"){
$prev ="";
}
//-----------------------previous

//-----------------------NEXT	
$nextnum=$page+1;
$next ="&nbsp;&nbsp;&nbsp;<a class=\"btn btn-success btn-md\" href=\"?page=$nextnum\">NEXT</a>";
$stlast = $start+30;
if($stlast>=$ttl[0]){
$next ="";
}
//-----------------------NEXT

echo " <div class=\"row\">  ";
echo " <div class=\"col-md-2\">  ";

echo "$prev";

echo " </div><div class=\"col-md-2\">  ";

echo "<b class=\"pull-right\">JUMP TO:</b> 
</div><div class=\"col-md-3\"> 
<form action=\"listuser.php\" method=\"get\">
<input type=\"number\" class=\"form-control\" placeholder=\"Page Number\" name=\"page\">
</div><div class=\"col-md-2\"> 
<button type=\"submit\" class=\"btn btn-primary btn-md\">go</button>
</form>

";
echo " </div><div class=\"col-md-2\">  ";

echo "$next";
echo " </div>";
echo " </div>";
}
?>







</div>									
</div>									
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

</body>
</html>