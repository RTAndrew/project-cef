<?php
include "php/conexao.php";
session_start();
//Checkar se existe uma sessao
    if(!$_SESSION['login']){
       header("location: login.php");
       die;
    } elseif ($_SESSION['perfil'] != 'aluno') {
      header( "refresh:2; url=login.php" );
      header( "Location: login.php" );
      echo "<center> <h1> Acesso Restrito </h1> </center>";
      die();
      exit();
    }

$id = $_SESSION['id_login'];
$login = $_SESSION['login'];
$password = $_SESSION['password'];

//In-Page DATA
  $sql = mysqli_query($conexao, "SELECT * FROM aluno WHERE Id_Login = '$id'");
      while ($line = mysqli_fetch_array($sql)) {
        //Pegar o Nome
          $getCredential_Nome_Aluno = $line['Nome_Aluno'];
      }

/*
$sql = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '$login'");

  while ($line = mysqli_fetch_array($sql)) {
        $senha_user = $line['password'];
        $perfil_user = $line['perfil'];
    }

    if ($password == $senha_user && $perfil_user = "Aluno") {
    } else {
      header('Location: ../login.php');
    }
*/

?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ProjectoBD</title>

    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <!-- Estilizacao CSS -->
    <link rel="stylesheet" href="css/css.css">
      <!-- Professor -->
      
    <!-- Font Awesome -->
        <link rel="stylesheet" href="font/font-awesome/css/font-awesome.min.css">
  </head>
  <body>








<div class="grid-y medium-grid-frame">

  <div class="cell medium-auto medium-cell-block-container">
    <div class="grid-x grid-padding-x">
      <div class="cell small-5 medium-4 large-2 medium-cell-block-y sidebar">

                                <ul class="multilevel-accordion-menu vertical menu align-left grid-padding-x" data-accordion-menu>
                                  <li class="logo"> <img src="img/logo.svg" alt="CEF" height = "100" width = "100"> </li>
                                  <li>
                                    <a class="active" href="#"> <i class="fa fa-home" aria-hidden="true"> </i> Home <span class="subitem"> </span> </a>
                                  </li>
                                  <li>
                                    <a href="pages/aluno/avaliacao"> <i class="fa fa-book" aria-hidden="true"> </i> Avaliações  <span class="subitem"> </span> </a>
                                  </li>
                                  <li>
                                    <a href="pages/aluno/conta"> <i class="fa fa-lock" aria-hidden="true"> </i> Conta <span class="subitem"> </a>
                                  </li>
                                </ul>



      </div>
      <div class="cell small-7 medium-8 large-10 medium-cell-block-y">

        <div class="grid-x grid-margin-x panel">
          <div class="cell small-12 medium-6 large-8 nome-escola">
            <h1> Colegio Elizangela Filomena </h1>
          </div>

          <div class="cell small-6 medium-6 large-4 medium-cell-block-y usuario-log">
                  <!--  <img align="right" src="img/burundi.png" alt="usuario" float= "right" height = "52" width = "72">  -->
             <ul class="">
                <li class="img-user img-user-d"> <?php  echo"$getCredential_Nome_Aluno";  ?> </li>
                <li class="img-user"> Aluno (a) | <a href="php/logout.php" name="submit"> Log Out <i class="fa fa-sign-out"></i> </a> </li> 
              </ul>
          </div>
        </div>

        <!-- Painel Actual em que se encontra o usuario-->
        <div class="grid-x grid-margin-x controle-panel status-panel">
            <h1> Painel do Aluno </h1>
        </div>

      </div>
    </div>
   
  </div>
   <div class="grid-y footer"> 
    <div class="cell small-10 medium-9 large-10 small-offset-2 medium-offset-3 large-offset-2">
        <center>
          © 2016 dominio-do-site, Todos os direitos reservados <br>
          Powered / Made By: Grupo 2
        </center>
    </div>
  </div>
  
    </div>





  


















    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
