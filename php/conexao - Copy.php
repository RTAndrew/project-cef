<?php
//Passar Caracteres especiais
header('Content-type: text/html; charset=UTF-8');

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$banco = "site";

$conexao = mysqli_connect($dbhost, $dbuser, $dbpass, $banco) or die (mysql_error());


?>

