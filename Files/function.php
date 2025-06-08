<?php


include("config.php");


function connectdb()
{
    global $dbname, $dbuser, $dbhost, $dbpass;
    $conms = @mysql_connect($dbhost,$dbuser,$dbpass); //connect mysql
    if(!$conms) return false;
    $condb = @mysql_select_db($dbname);
    if(!$condb) return false;
    return true;
}

function attempt($username, $password)
{
$mdpass = md5($password);
$data = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$username."' and password='".$mdpass."'"));

	if ($data[0] == 1) {
		# set session
		$_SESSION['username'] = $username;
		return true;
	} else {
		return false;
	}
}



function attemptadmin($username, $password)
{
$mdpass = md5($password);
$data = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM admin WHERE username='".$username."' and password='".$mdpass."'"));

	if ($data[0] == 1) {
		# set session
		$_SESSION['username'] = $username;
		return true;
	} else {
		return false;
	}
}



function you_valid($usssr)
{

$aa = mysql_fetch_array(mysql_query("SELECT verstat FROM users WHERE mid='".$usssr."'"));

	if ($aa[0]==0){
		return true;
	}
}




function is_user()
{
	if (isset($_SESSION['username']))
		return true;
}

function redirect($url)
{
echo "<meta http-equiv=\"refresh\" content=\"0; url=$url\" />";
exit;
}
function valid_username($str){
	return preg_match('/^[a-zA-Z0-9_-]{4,16}$/', $str);
}


function urlmod($txt){

$string = strtolower($txt);
//Make alphanumeric (removes all other characters)
$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
//Clean up multiple dashes or whitespaces
$string = preg_replace("/[\s-]+/", " ", $string);
//Convert whitespaces and underscore to dash
$string = preg_replace("/[\s_]/", "-", $string);
$url = $string;


return $url;
}


function notification($title, $text, $type, $cc, $btnst, $btntxt){
echo "
<script>
swal({
title: '$title',
text: '$text',
type: '$type',
showCancelButton: '$cc',
confirmButtonClass: '$btnst',
confirmButtonText: '$btntxt'
});
</script>
";
}


function timeago($sec){
$seconds =$sec;
$hours   = floor($seconds / 3600);
$minutes = floor(($seconds - ($hours * 3600))/60);
$seconds = floor(($seconds - ($hours * 3600) - ($minutes*60)));
echo "$hours Hour  $minutes Minutes $seconds Seconds Ago";
}



function timeleft($sec){
$seconds =$sec;
$hours   = floor($seconds / 3600);
$minutes = floor(($seconds - ($hours * 3600))/60);
$seconds = floor(($seconds - ($hours * 3600) - ($minutes*60)));
$a = "$hours Hour  $minutes Minutes $seconds Seconds";
return $a;
}

function tmcount($sec, $iid){
echo "

    <script>
        $(function () {
            var etm = $sec;
            var $iid = $('#$iid'),
           ts = (new Date()).getTime() + etm * 1000;

            $('#countdown').countdown({
                timestamp: ts,
                callback: function (days, hours, minutes, seconds) {

                    var message = \"\";
                    if (days>0) {
                    message += days + \" Days\" + \" \";
                }
                    message += hours + \" Hrs\" + \" \";
                    message += minutes + \" Mins\" + \" \";
                    message += seconds + \" Secs\" + \" \";


                    $iid.html(message);
                }
            });

        });


    </script>
";

}





?>