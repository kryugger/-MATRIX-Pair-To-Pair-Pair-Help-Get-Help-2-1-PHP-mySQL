<?php
Include('include-global.php');
$pagename = "Phone Verification";
$title = "$pagename - $basetitle";
Include('include-header.php');
?>
</head>
<body class="stretched" data-loader="<?php echo $baseloader; ?>" data-loader-color='<?php echo "#$basecolor"; ?>'>
<?php
Include('include-navbar-verify.php');
Include('include-subhead.php');
?>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">


<div class="row">
<div class="col-md-12 col-sm-12">






<?php 

/*

echo "<div class=\"alert alert-warning alert-dismissable\">

If you do not get the verification SMS on your MTN line, it means you are subscribed to \"Do Not Disturb\" (DND). to unsubscribe kindly send Allow to 2442 and resend verification code. You can subscribe again by sending Stop to 2442.

</div>";

*/

if(isset($_POST['verify'])){

$code = mysql_real_escape_string($_POST["code"]);
$original = mysql_fetch_array(mysql_query("SELECT verifycode FROM users WHERE id='".$uid."'"));
if($code==$original[0]){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Account Verified Successfully!!!
</div>";

$res = mysql_query("UPDATE users SET verify='1' WHERE id='".$uid."'");
echo "<meta http-equiv=\"refresh\" content=\"3; url=$baseurl/dashboard\" />";

///////////////////------------------------------------->>>>>>>>>Send phone
$deta = mysql_fetch_array(mysql_query("SELECT phone, fname, lname FROM users WHERE id='".$uid."'"));
$txt = "Your $basetitle Account Verified Successfully.";
abirsms($deta[0], $txt);
///////////////////------------------------------------->>>>>>>>>Send phone 












$rb = mysql_fetch_array(mysql_query("SELECT refbonus FROM general_setting WHERE id='1'"));


$udt = mysql_fetch_array(mysql_query("SELECT ref, plan FROM users WHERE id='".$uid."'"));
$ref = $udt[0];

if ($rb[0]>0 && $udt[0]>0) {
//////////////-------------------->>>>>>COMMISION TO REFF
$currentBalanceOfSponsor = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE id='".$ref."'"));
$updatedBalanceOfSponsor = $currentBalanceOfSponsor[0]+$rb[0];
mysql_query("UPDATE users SET mallu='".$updatedBalanceOfSponsor."' WHERE id='".$ref."'");
$des = "Commision For Reffering $user";
////------------------------------>>>>>>>>>TRX
mysql_query("INSERT INTO trx SET usid='".$ref."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='".$rb[0]."'");
////------------------------------>>>>>>>>>TRX
///////////////////------------------------------------->>>>>>>>>Send phone
$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, phone, email FROM users WHERE id='".$ref."'"));
$txt = "This is a soft notification that you just got $rb[0] $basecurrency Commision For Reffering $user.";
abiremail($userContact[3], "You Got Commision", "$userContact[0] $userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send phone
//////////////-------------------->>>>>>COMMISION TO REFF
}



////------------------------------------>>>>>>>>>>> ASSIGN
if ($udt[1]>0) {
	$plan = $udt[1];
$dcount = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM donation WHERE status='0' AND pkg='".$plan."'"));
if ($dcount[0]==0) {
$did = mysql_fetch_array(mysql_query("SELECT did FROM general_setting WHERE id='1'"));
$packdata = mysql_fetch_array(mysql_query("SELECT name, amount FROM packs WHERE id='".$plan."'"));
mysql_query("INSERT INTO donation SET payto='".$did[0]."', pos='1', pkg='".$plan."', amount='".$packdata[1]."', payby='".$uid."', ctm='".time()."', atm='".time()."', status='1'");
}else{
$donate = mysql_fetch_array(mysql_query("SELECT id, payto FROM donation WHERE status='0' AND pkg='".$plan."' ORDER BY ctm ASC"));
mysql_query("UPDATE donation SET payby='".$uid."',  atm='".time()."',  status='1' WHERE id='".$donate[0]."'");
///////////////////------------------------------------->>>>>>>>>Send phone
$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, phone, phone FROM users WHERE id='".$donate[1]."'"));
$txt = "This is a soft notification that An User Just Merged to You For Pay. Please Login For Details";
abirphone($userContact[3], "An User Just Merged to You", "$userContact[0] $userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send phone
}
 mysql_query("UPDATE users SET plan='0' WHERE id='".$uid."'");
}

////------------------------------------>>>>>>>>>>> ASSIGN
















}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
WRONG CODE !!!
</div>";
}


}


if(isset($_POST['again'])){

$num = mysql_real_escape_string($_POST["num"]);
$exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE phone='".$num."' AND id<>$uid"));

if($exist[0]>="1"){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Mobile Number Already Exist in our Database... Please Use another Mobile Number!!
</div>";
}else{

if($num[0]==0){
$numMod = $num;
$sendnn = substr($num, 1);
}else{
$numMod = "0$num";
$sendnn = $num;
}
$sendto = "234$sendnn";





$lastsent = mysql_fetch_array(mysql_query("SELECT vsent FROM users WHERE id='".$uid."'"));

$tmPass = time()-$lastsent[0];

if ($tmPass>1000) {


$mvcode = rand(100000,999999);
$res = mysql_query("UPDATE users SET verifycode='".$mvcode."', phone='".$numMod."' , vsent='".time()."' WHERE id='".$uid."'");
if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
CODE Sent Successfully To $sendto !.
</div>";

///////////////////------------------------------------->>>>>>>>>Send SMS
$deta = mysql_fetch_array(mysql_query("SELECT phone, fname, lname FROM users WHERE id='".$uid."'"));
$txt = "Your $basetitle Verification Code is $mvcode. Please Enter To Verify.";
abirsms($sendto, $txt);
///////////////////------------------------------------->>>>>>>>>Send SMS 

}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Some Problem Occurs, Please Try Again. 
</div>";
}
}else{

$ll = timeleft(1000-$tmPass);

echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
PLEASE WAIT <b> $ll </b> TO SEND THE CODE AGAIN :) 
</div>";

}




}


}

?>
















<div class="row">


<div class="col-md-6 col-sm-12">
  
<form action="" method="post">
<?php
echo "<strong style='text-transform: uppercase;'>Input The Code To Verify Your Account</strong>";
?> 
<br><br><input type="text" class="form-control input-lg"  name="code" placeholder="CODE" required><br>
<input type="hidden" name="verify" value="1">
<button type="submit" class="btn btn-success btn-block btn-lg">VERIFY ME</button><br>
</form>
</div>








<div class="col-md-6 col-sm-12">
  
<form action="" method="post">
<?php
$num = mysql_fetch_array(mysql_query("SELECT phone FROM users WHERE id='".$uid."'"));
echo "<strong style='text-transform: uppercase;'>Don't Have a Code? Request Code Again</strong>";
?> 
<br>
<span>Phone Number(NO COUNTRY CODE, Only Number and  No Space)</span>

<input type="hidden" name="again" value="1">
<br><br><input type="text" class="form-control input-lg"  name="num" value="<?php echo $num[0]; ?>" placeholder="Your phone" required><br>
<button type="submit" class="btn btn-primary btn-block btn-lg">SEND CODE TO ABOVE PHONE NUMBER</button><br>
</form>
</div>



</div>
</div>
</div><!-- row -->


</div>
</div>
</section>
<?php 
include('include-footer.php');
?>
</body>
</html>
