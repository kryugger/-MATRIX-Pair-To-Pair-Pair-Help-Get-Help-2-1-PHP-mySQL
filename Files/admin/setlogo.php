<?php
include ('include/header.php');
if($usid[2]!=100){
redirect('home.php');
}
?>

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo">


<?php
include ('include/sidebar.php');
?>

 

		
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                   
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Set Logo
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>





    <?php
    
if($_POST)
{

// IMAGE UPLOAD //////////////////////////////////////////////////////////
    $folder = "../asset/images/";
    $extention = strrchr($_FILES['bgimg']['name'], ".");
    $new_name = "logo";
    $bgimg = $new_name.'.png';
    $uploaddir = $folder . $bgimg;
  $a =  move_uploaded_file($_FILES['bgimg']['tmp_name'], $uploaddir);
//////////////////////////////////////////////////////////////////////////
if ($a) {
notification("Logo Changed Successfully!", "", "success", false, "btn-primary", "OKAY");
}else {
notification("ERROR!", "Please Select new Logo", "error", false, "btn-primary", "OKAY");
}

}

$color = mysql_fetch_array(mysql_query("SELECT colorcode FROM general_setting WHERE id='1'"));


?>

<div class="row">
<div class="col-md-6">

<form action="" method="post" enctype="multipart/form-data" >
                 
            <div class="form-group">
              <div class="col-sm-12"><input name="bgimg" type="file" id="bgimg" /></div>
              <input name="abir" type="hidden" value="bgimg" />
              <br>
              <br>
              <div class="col-sm-6"> <button type="submit" class="btn btn-primary btn-block">UPLOAD</button></div>
            </div>
                
          </form>

</div>

          
        <div class="col-md-6" style="background: #<?php echo $color[0]; ?>;">  
        
Current Image : <br/><br/><br/><img src="../asset/images/logo.png"  alt="IMG" style="width:100%;">
</div></div>


<?php
include ('include/footer.php');
?>


</body>
</html>