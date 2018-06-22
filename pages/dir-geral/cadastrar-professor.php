<?php

//Desativar or erros que seram apresentados na tela, ja que tudo esta a funcionar correctamente
error_reporting(E_ERROR);


include "../../php/conexao.php";
session_start();
//Checkar se existe uma sessao
    if(!$_SESSION['login']){
       header("location: ../../login.php");
       die;
    } elseif ($_SESSION['perfil'] != 'director geral' AND $_SESSION['perfil'] != 'administrador') {
      header( "refresh:2; url=../../login.php" );
      header( "Location: ../../login.php" );
      echo "<center> <h1> Acesso Restrito </h1> </center>";
      die();
      exit();
    }

$id = $_SESSION['id_login'];
$login = $_SESSION['login'];
$password = $_SESSION['password'];

//In-Page DATA
  $sql = mysqli_query($conexao, "SELECT * FROM funcionario WHERE Id_Login = '$id'");
      while ($line = mysqli_fetch_array($sql)) {
        //Pegar o Nome
          $getCredential_Nome_Funcionario = $line['Nome_Funcionario'];
      }


?>



<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ProjectoBD</title>

    <link rel="stylesheet" href="../../css/foundation.css">
    <link rel="stylesheet" href="../../css/app.css">
    <!-- Estilizacao CSS -->
    <link rel="stylesheet" href="../../css/css.css">
    <link rel="stylesheet" href="../../css/diretor-geral/professor-curso-disciplina.css">
      <!-- Professor -->
      
    <!-- Font Awesome -->
        <link rel="stylesheet" href="../../font/font-awesome/css/font-awesome.min.css">
  </head>
  <body>








<div class="grid-y medium-grid-frame">

  <div class="cell medium-auto medium-cell-block-container">
    <div class="grid-x grid-padding-x">
      <div class="cell small-5 medium-4 large-3 medium-cell-block-y sidebar">

                                <ul class="multilevel-accordion-menu vertical menu align-left grid-padding-x espacamento-nav" data-accordion-menu>
                                  <li class="logo"> <img src="../../img/logo.svg" alt="CEF" height = "100" width = "100"> </li>
                                  <li>
                                    <a href="../../painel-geral"> <i class="fa fa-home" aria-hidden="true"> </i> Home <span class="subitem"> </span> </a>
                                  </li>
                                  <li>
                                    <a href="#"> <i class="fa fa-file" aria-hidden="true"> </i> Secretariado  <span class="subitem"> </span> </a>
                                    <ul class="menu vertical sublevel-1">
                                      <!-- <li><a class="subitem" href="#">Registrar Alunos</a></li> -->
                                      <li><a class="subitem" href="matricula">Matrícula</a></li>
                                      <!-- <li><a class="subitem" href="#">Confirmação</a></li> -->
                                      <li><a class="subitem" href="lista-nominal">Lista Nominal </a></li>
                                      <!-- <li><a class="subitem" href="#">Emitir Declaração</a></li> -->
                                      <!-- <li><a class="subitem" href="#">Pagamento de Propinas</a></li> -->
                                    </ul>
                                  </li>
                                  <li>
                                    <a href="#"> <i class="fa fa-usd" aria-hidden="true"> </i> Direcção Académica  <span class="subitem"> </span> </a>
                                    <ul class="menu vertical sublevel-1">
                                      <li><a class="subitem" href="criar-afectar-disciplina">Criar / Afectar Disciplina </a></li>
                                      <li><a class="subitem" href="cadastrar-turma">Cadastrar Turma</a></li>
                                      <li><a class="subitem active" href="cadastrar-professor">Cadastrar Professor</a></li>
                                    </ul>
                                  <li>
                                    <a href="cadastrar-funcionario"> <i class="fa fa-users" aria-hidden="true"> </i> Cadastrar Funcionário <span class="subitem"> </span> </a>
                                  <li>
                                    <a href="professor-curso-disciplina"> <i class="fa fa-book" aria-hidden="true"> </i> Afectar Professor / Disciplina <span class="subitem"> </span> </a>
                                  </li>
                                  
                                  
                                </ul>




      </div>
      <div class="cell small-7 medium-8 large-9 medium-cell-block-y">

        <div class="grid-x grid-margin-x panel">
          <div class="cell small-12 medium-6 large-8 nome-escola">
            <h1> Colegio Elizangela Filomena </h1>
          </div>

          <div class="cell small-6 medium-6 large-4 medium-cell-block-y usuario-log">
                  <!--  <img align="right" src="img/burundi.png" alt="usuario" float= "right" height = "52" width = "72">  -->
             <ul class="">
                <li class="img-user img-user-d">  
                  <?php 
                    If ($_SESSION['perfil'] != 'director geral'){
                      echo "Adminstrador do Sistema";
                    } else {
                      echo"$getCredential_Nome_Funcionario"; 
                    }
                  ?>   
                </li>
                <li class="img-user"> Admin. Geral | <a href="../../php/logout.php"> Log Out <i class="fa fa-sign-out"></i> </a> </li> 
              </ul>
          </div>
        </div>

        <!-- Painel Actual em que se encontra o usuario-->
        <div class="grid-x grid-margin-x controle-panel status-panel">
            <h1> Painel Geral</h1>
        </div>


       

















         

        <form action="../../php/cadastrar-professor-dir-geral.php" method="POST">
                <div class="grid-container">
                  <div class="grid-x grid-padding-x"> 
                    <div class="small-12 medium-12 cell">
                      <h1> Cadastro de Professor </h1>
                      <?php
                            @$v = $_GET['valor'];
                            @$s = $_GET['erro'];
                            @$sucesso = $_GET['sucesso'];
                            if($v){
                              echo "<center> <span class='erro'> ** Todos os campos devem ser preenchidos ** </span> </center>";
                            } elseif ($s) {
                              echo "<center> <span class='erro'> Já existe um registro com o mesmo Nome ou Identificação </span> </center>";
                            }elseif ($sucesso) {
                              echo "<center> <span class='sucesso'> Professor Cadastrado </span> </center>";
                            }
                      ?>
                    </div>
                    <div class="small-12 medium-12 cell">
                      <label>Nome Completo
                        <input type="text" placeholder="Nome Completo" name="nome">
                      </label>
                    </div>
                    
                    <div class="small-12 medium-4 cell">
                      <label>Nascido aos
                        <input type="date" placeholder="Data de Nascimento" name="data_nascimento">
                      </label>
                    </div>
                    <div class="small-12 medium-4 cell">
                      <label>Portador do BI
                        <input type="text" placeholder="Número de Identificação" name="identificacao">
                      </label>
                    </div>
                    <div class="small-12 medium-4 cell">
                      <label>Grau Académico
                        <input type="text" placeholder="Grau Académico" name="grau_academico">
                      </label>
                    </div>
                    <div class="small-12 medium-12 cell">
                      <h5> Endereço*</h5>
                    </div>
                    <div class="small-12 medium-3 cell">
                      <label>Rua
                        <input type="text" placeholder="Rua" name="rua">
                      </label>
                    </div>

                    <div class="small-12 medium-3 cell">
                      <label>Bairro
                        <input type="text" placeholder="Bairro" name="bairro">
                      </label>
                    </div>
                    <div class="small-12 medium-3 cell">
                      <label>Município
                        <input type="text" placeholder="Município" name="municipio">
                      </label>
                    </div>
                    <div class="small-12 medium-3 cell">
                      <label>Cidade
                        <input type="text" placeholder="Cidade" name="cidade">
                      </label>
                    </div>
                    <div class="small-12 medium-3 cell">
                      <label>Provincia
                        <input type="text" placeholder="Provincia" name="provincia">
                      </label>
                    </div>
                    <div class="small-12 medium-12 cell">
                      <h5> Contactos*</h5>
                    </div>
                    <div class="small-12 medium-6 cell">
                      <label>Telefone Principal
                        <input type="number" placeholder="Telefone" name="primaryTele">
                      </label>
                    </div>
                    <div class="small-12 medium-6 cell">
                      <label>E-Mail
                        <input type="text" placeholder="exemplo@site.com" name="email">
                      </label>
                    </div> 
                    <div class="small-12 medium-12 cell">
                      <label>
                        <input class="button cell small-12 medium-12 large-12" type="submit" value="Cadastrar"/>
                      </label>
                    </div>
                  </div>
                </div>
              </form>




















        <!-- Espacamento Body -->
        <div class="grid-x espacamento">  </div>

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
