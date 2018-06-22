<?php
$dbhost = "eu-cdbr-west-02.cleardb.net";
$dbuser = "bd5dd53124316c";
$dbpass = "a647b2ba";
$banco = "heroku_bee20642cbe8919";

$conexao = mysqli_connect($dbhost, $dbuser, $dbpass, $banco) or die (mysql_error());


?>