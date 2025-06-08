<?php
Include('include-global.php');
$title = "$basetitle";
Include('include-header.php');
?>
</head>
<body  class="stretched">
<?php
Include('include-navbar.php');
?>



<?php
$ddaa = mysql_query("SELECT * FROM users ORDER BY id");
while ($data = mysql_fetch_array($ddaa)) {

echo "+234$data[phone]<br>";

}

?>

<?php
Include('include-footer.php');
?>

</body>
</html>