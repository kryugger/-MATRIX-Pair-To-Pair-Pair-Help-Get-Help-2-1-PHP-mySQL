<?php
require_once('function.php');
connectdb();
session_start();

/*


$dd = mysql_query("SELECT id FROM donation WHERE id>4 AND id<10");
while ($da = mysql_fetch_array($dd)) {


$max = mysql_fetch_array(mysql_query("SELECT MAX(id) FROM donation"));
$new = $max[0]+1;
mysql_query("UPDATE donation SET  id='".$new."' WHERE id='".$da[0]."'");

mysql_query("INSERT INTO donation SET id='".$da[0]."', payto='16628', pos='1', pkg='4', amount='100000', payby='0', ctm='".time()."', atm='0', status='0'");



echo "$da[0]-- $new <br>";

}

?>
