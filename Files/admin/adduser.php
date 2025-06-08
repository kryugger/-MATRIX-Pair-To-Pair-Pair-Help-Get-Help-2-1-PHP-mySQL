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
                    <h3 class="page-title"> Add New USER
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>

					
					
					
					
					
			<div class="row">
			<div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="" method="post" role="form">
                                        <div class="form-body">

		   

<?php
if($_POST){


$firstname = mysql_real_escape_string($_POST["fname"]);
$lastname = mysql_real_escape_string($_POST["lname"]);
$email = mysql_real_escape_string($_POST["email"]);
$phone = mysql_real_escape_string($_POST["phone"]);

$bname = mysql_real_escape_string($_POST["bname"]);
$acname = mysql_real_escape_string($_POST["acname"]);
$acno =  mysql_real_escape_string($_POST["acno"]);

$username = mysql_real_escape_string($_POST["username"]);
$password = mysql_real_escape_string($_POST["pass"]);
$password2 = mysql_real_escape_string($_POST["pass2"]);
$plan = mysql_real_escape_string($_POST["plan"]);


$err1=0;
$err2=0;
$err3=0;
$err4=0;
$err5=0;
$err6=0;
$err7=0;
$err8=0;
$err9=0;
$err10=0;
$err11=0;
$err12=0;
$err13=0;
$err14=0;



if(trim($firstname)==""){
$err1=1;
}

if(trim($lastname)==""){
$err2=1;
}

if(trim($email)==""){
$err3=1;
}

$eee = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$email."'"));
if($eee[0]!=0){
$err4=1;
}

if(trim($phone)==""){
$err5=1;
}

$mob = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE phone='".$phone."'"));
if($mob[0]!=0){
$err6=1;
}

if(trim($username)==""){
$err7=1;
}
$uuu = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$username."'"));
if($uuu[0]!=0){
$err8=1;
}

if($password!=$password2){
$err9=1;
}

if(strlen($password)<="5"){
$err10=1;
}

if(trim($plan)==""){
$err11=1;
}

$captcha = $_SESSION['captcha'];
if($captcha != $capv){
//$err12=1;
}


$bb = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE bank_acno='".$acno."'"));
if($bb[0]!=0){
$err13=1;
}


$plan = mysql_fetch_array(mysql_query("SELECT st FROM packs WHERE id='".$plan."'"));
if($plan[0]!=1){
$err14=1;
}



$error = $err1+$err2+$err3+$err4+$err5+$err6+$err7+$err8+$err9+$err10+$err11+$err12+$err13+$err14;


if ($error == 0){

$passmd = md5($password);
$verifycode = rand(100000,999999);


$res = mysql_query("INSERT INTO users SET username='".$username."', password='".$passmd."', fname='".$firstname."', lname='".$lastname."', phone='".$phone."', email='".$email."', bank_name='".$bname."', bank_acname='".$acname."', bank_acno='".$acno."',  regtm='".time()."', ref='".$ref."', block='0', verify='1', verifycode='".$verifycode."'");

if($res){
  echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  

Registration Completed Successfully! <br>
<strong>Redirecting to Dashboard...</strong>
</div>";

$getMid = mysql_fetch_array(mysql_query("SELECT id FROM users WHERE username='".$username."'"));
mysql_query("UPDATE users SET mainacc='".$getMid[0]."' WHERE id='".$getMid[0]."'");




// //-------------------------------------------------->>>>>>>>>>>>>>>>>>>> Make Auth
// $tm = time();
// $si = "$username$tm";
// $sid = md5($si);
// $_SESSION['sid'] = $sid;
// $_SESSION['username'] = $username;
// mysql_query("UPDATE users SET sid='".$sid."' WHERE username='".$username."'");
// //-------------------------------------------------->>>>>>>>>>>>>>>>>>>> Make Auth
// echo "<meta http-equiv=\"refresh\" content=\"2; url=$baseurl/checkpoint\" />";




// if ($data[3]>0 && $ref>0) {
// //////////////-------------------->>>>>>COMMISION TO REFF
// $currentBalanceOfSponsor = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE id='".$ref."'"));
// $updatedBalanceOfSponsor = $currentBalanceOfSponsor[0]+$data[3];
// mysql_query("UPDATE users SET mallu='".$updatedBalanceOfSponsor."' WHERE id='".$ref."'");
// $des = "Commision For Reffering $username";
// ////------------------------------>>>>>>>>>TRX
// mysql_query("INSERT INTO trx SET usid='".$ref."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='".$data[3]."'");
// ////------------------------------>>>>>>>>>TRX
// ///////////////////------------------------------------->>>>>>>>>Send Email
// $userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, phone, email FROM users WHERE id='".$ref."'"));
// $txt = "This is a soft notification that you just got $data[3] $basecurrency Commision For Reffering $username.";
// abiremail($userContact[3], "You Got Commision", "$userContact[0] $userContact[1]", $txt);
// ///////////////////------------------------------------->>>>>>>>>Send Email
// //////////////-------------------->>>>>>COMMISION TO REFF
// }

// ////------------------------------------>>>>>>>>>>> ASSIGN
// $dcount = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE status='0' AND pkg='".$plan."'"));
// if ($dcount[0]==0) {
// $did = mysql_fetch_array(mysql_query("SELECT did FROM general_setting WHERE id='1'"));
// $packdata = mysql_fetch_array(mysql_query("SELECT name, amount FROM packs WHERE id='".$plan."'"));
// mysql_query("INSERT INTO donation SET payto='".$did[0]."', pos='1', pkg='".$plan."', amount='".$packdata[1]."', payby='".$getMid[0]."', ctm='".time()."', atm='".time()."', status='1'");
// }else{
// $donate = mysql_fetch_array(mysql_query("SELECT id, payto FROM donation WHERE status='0' AND pkg='".$plan."' ORDER BY id ASC"));
// mysql_query("UPDATE donation SET payby='".$getMid[0]."',  atm='".time()."',  status='1' WHERE id='".$donate[0]."'");
// ///////////////////------------------------------------->>>>>>>>>Send Email
// $userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, phone, email FROM users WHERE id='".$donate[1]."'"));
// $txt = "This is a soft notification that An User Just Merged to You For Pay. Please Login For Details";
// abiremail($userContact[3], "An User Just Merged to You", "$userContact[0] $userContact[1]", $txt);
// ///////////////////------------------------------------->>>>>>>>>Send Email
// }
// ////------------------------------------>>>>>>>>>>> ASSIGN



///////////////////------------------------------------->>>>>>>>>Send Email

$txt = "Thank you for joining us.<br/><br/><br/>
<b>Your account credentials:</b><br/><br/>
Username: $username <br/>
Password: $password <br/>
<b style='color:red;'> Important: Please do not share your username and/or password with anyone!</b><br/><br/>
We are looking forward a long and mutually prosperous relationship.<br/>";
$namess = "$firstname $lastname";
abiremail($email, "Registration Completed Successfully", $namess, $txt);

///////////////////------------------------------------->>>>>>>>>Send Email



}else{
  echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  

Some Problem Occurs, Please Try Again. 

</div>";
}
} else {
  
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
First Name Can Not be Empty!!!
</div>";
}   
  
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Last Name Can Not be Empty!!!
</div>";
}   
  
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Email Can Not be Empty!!!
</div>";
}   


  
if ($err4 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Email Already Exist in our database... Please Use another Email!!
</div>";
}   


  
if ($err5 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Mobile Can Not be Empty!!!
</div>";
}   


  
if ($err6 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Mobile Number Already Exist in our database... Please Use another Mobile Number!!
</div>";
}   
  

if ($err7 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Username Can Not be Empty!!!
</div>";
}   
 
if ($err8 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Username Already Exist in our database... Please Use another Username!!
</div>";
}   
  

 
if ($err9 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Password and Confirm Password not match!!!
</div>";
}   
   

  
if ($err10 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Password must be minimum 6 Char!!!
</div>";
}   
  
 

 
if ($err11 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Please Select A Plan !!!
</div>";
}   
  
 
if ($err12 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Please solve the CAPCHA
</div>";
}   
  
 
if ($err13 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Bank Account Already Exist!!
</div>";
}   
  
 
if ($err14 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Pack Is Not Valid!!
</div>";
}   
  



}







}

?>












<div class="row">
<div class="col-md-12">



<hr>


    <form action="" method="post" autocomplete="off">


<div class="row">

<div class="col-md-6">
<label>First Name:</label>
<input name="fname" class="form-control input-lg" type="text" required="">
</div>

<div class="col-md-6">
<label>Last Name:</label>
<input name="lname" class="form-control input-lg" type="text" required="">
</div>

</div>
<br>


<div class="row">

<div class="col-md-6">
<label>Email Address:</label>
<input id="email" name="email" class="form-control input-lg" type="email" required="">
<div id="emailerr"></div>
</div>

<div class="col-md-6">
<label>Phone Number:</label>
<input id="phone" name="phone" class="form-control input-lg" type="text" required="">
<div id="phoneerr"></div>
</div>

</div>
<br><hr>


<div class="row">

<div class="col-md-4">
<label>Bank Name:</label>
<input name="bname" class="form-control input-lg" type="text" required="">
</div>
<div class="col-md-4">
<label>Account Name:</label>
<input name="acname" class="form-control input-lg" type="text" required="">
</div>
<div class="col-md-4">
<label>Account Number:</label>
<input name="acno" class="form-control input-lg" type="text" required="">
</div>


</div>


<br><hr><br>


<div class="row">

<div class="col-md-12">
<label>Choose a Username:</label>
<input type="text" name="username" id="username" class="form-control input-lg" required="">
<div id="usernaameerr"></div>
</div>

</div>

<br>


<div class="row">

<div class="col-md-6">
<label>Choose Password:</label>
<input name="pass" class="form-control input-lg" type="password" required="">
</div>
<div class="col-md-6">
<label>Re-enter Password:</label>
<input name="pass2" class="form-control input-lg" type="password" required="">
</div>



</div>
<br><br><br>

<div class="row">

<div class="col-md-6">
<label>SELECT A PLAN:</label>

<select name="plan" class="form-control input-lg" required="">
  <option value="">Please Select A Plan</option>

<?php
$plans = mysql_query("SELECT id, name, amount FROM packs WHERE st='1'");
while ($plan = mysql_fetch_array($plans)) {
echo   "<option value='$plan[0]'>$plan[1] - $plan[2] $basecurrency</option>";
}

$captcha = rand(000000,999999);
$_SESSION['captcha'] = $captcha;
?>


</select>
</div>






</div>
<br><br>






<div class="col_full nobottommargin">
<button class="btn btn-success btn-block btn-lg" id="register-form-submit" name="register-form-submit" value="register">ADD NEW USER </button>
</div>

            </form>

          </div>
          </div>
          </div>
          </div>
          </div>
   



					
			
					
					
					
					
					
					
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
			


<?php
 include ('include/footer.php');
 ?>



</body>
</html>