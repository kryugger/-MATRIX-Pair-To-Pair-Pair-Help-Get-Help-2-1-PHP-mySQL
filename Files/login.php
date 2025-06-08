<?php
Include('include-global.php');
$pagename = "Login";
$title = "$pagename - $basetitle";
Include('include-header.php');
if (is_user()) {
redirect("$baseurl/dashboard");
}
?>
<style>
  
.slow-spin {
  -webkit-animation: fa-spin 2s infinite linear;
  animation: fa-spin 2s infinite linear;
}

</style>

</head>
<body class="stretched" data-loader="<?php echo $baseloader; ?>" data-loader-color='<?php echo "#$basecolor"; ?>'>

<?php
Include('include-navbar.php');
Include('include-subhead.php');
?>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">





<div class="row">


<div class="col-md-6 col-md-offset-3">

<div class="well well-lg nobottommargin">
<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">

<h3>Login to your Account</h3>

<div class="col_full">
<label for="login-form-username">Username:</label>
<a href="<?php echo $baseurl; ?>/ForgotUsername" class="fright">Forgot Username?</a>
<input id="username" name="username" class="form-control input-lg" type="text">
</div>

<div class="col_full">
<label for="login-form-password">Password:</label>
<a href="<?php echo $baseurl; ?>/ForgotPassword" class="fright">Forgot Password?</a>
<input id="password" name="password" class="form-control input-lg" type="password">
</div>

<div class="col_full nobottommargin">
<button class="button button-3d btn-block nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
</div>

</form>
<div id="working"></div>
<div id="error">
</div>


</div>


<p style="text-align: center; font-weight: bold;">
Don't Have An Account? <a href="<?php echo $baseurl; ?>/register"> Register Now </a> 
</p>


</div><!-- row -->


</div>
</div>
</section>
<?php
Include('include-footer.php');
?>




<script>
  


$('document').ready(function()
{ 
     /* validation */
  $("#login-form").validate({
      rules:
   {
   password: {
   required: true,
   },
   username: {
            required: true,

            },
    },
       messages:
    {
            password:{
                      required: ""
                     },
            username: "",
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* login submit */
    function submitForm()
    {  
   var data = $("#login-form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : '<?php echo $baseurl; ?>/checklogin.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#working").html('<br><br><div class="alert alert-info" style=" text-align: center;"><strong class="block" style="font-weight: bold;">  <i class = "fa fa-spinner fa-2x slow-spin"></i>  Validating Your Data.... </strong></div>');
   },
   success :  function(response)
      {      
     if(response=="ok"){
         
      $("#working").html('<br><br><div class="alert alert-success alert-dismissable"><strong class="block"> <i class="fa fa-check"></i> &nbsp; Success! Redirecting to Dashboard...</strong></div>');
      setTimeout(' window.location.href = "checkpoint"; ',3000);
     }
     else{
         
      $("#error").fadeIn(1000, function(){      
    $("#error").html('<br><br><div class="alert alert-danger"> <i class="fa fa-times"></i> &nbsp; '+response+' !</div>');
           $("#working").html('');
         });
     }
     }
   });
    return false;
  }
    /* login submit */
});

</script>



</body>
</html>