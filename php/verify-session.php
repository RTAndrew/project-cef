<?php

include "conexao.php";
session_start();

$login = $_SESSION['login'];
$password = $_SESSION['password'];


$sql = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '$login'");

  while ($line = mysqli_fetch_array($sql)) {
        $senha_user = $line['password'];
        $perfil_user = $line['perfil'];
    }

    if ($password == $senha_user && $perfil_user = "Aluno") {
      header("Location: ../painel-aluno");
    } elseif ($password == $senha_user && $perfil_user = "professor") {
    	 code...#
    } else {
      header('Location: ../login.php');
    }


?>