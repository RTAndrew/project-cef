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


  //Query
        //Pegar o ID e Nome dos Cursos
          $queryCurso = "SELECT Id_Curso, Nome_Curso FROM curso";

            $resultCurso = mysqli_query($conexao, $queryCurso);
            $rowCurso = mysqli_fetch_all($resultCurso, MYSQLI_ASSOC);
            mysqli_free_result($resultCurso);

        //Pegar o ID e Nome dos Anos
          $queryAno = "SELECT * FROM ano";

            $resultAno = mysqli_query($conexao, $queryAno);
            $rowAno = mysqli_fetch_all($resultAno, MYSQLI_ASSOC);
            mysqli_free_result($resultAno);



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
                                      <li><a class="subitem active" href="cadastrar-turma">Cadastrar Turma</a></li>
                                      <li><a class="subitem" href="cadastrar-professor">Cadastrar Professor</a></li>
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


       

















         <form action="../../php/criar-turma-dir-geral.php" method="POST">
                <div class="grid-container">
                  <div class="grid-x grid-padding-x"> 
                    <div class="small-12 medium-12 cell">
                      <h1> Cadastro de Turma </h1>
                      <?php
                            @$v = $_GET['valor'];
                            @$s = $_GET['erro'];
                            @$sucesso = $_GET['sucesso'];
                            if($v){
                              echo "<center> <span class='erro'> ** Todos os campos devem ser preenchidos ** </span> </center>";
                            } elseif ($s) {
                              echo "<center> <span class='erro'> Já existe um registro com os mesmos dados </span> </center>";
                            }elseif ($sucesso) {
                              echo "<center> <span class='sucesso'> Turma Cadastrada </span> </center>";
                            }
                      ?>
                    </div>
                    <div class="small-12 medium-6 cell">
                      <label> Curso
                        <select name="curso">
                          <?php foreach ($rowCurso as $rowCurso) : ?> 
                            <option value="<?php echo $rowCurso['Id_Curso']; ?>"> <?php echo $rowCurso['Nome_Curso']; ?> </option>
                          <?php endforeach; ?>
                        </select>
                      </label>
                    </div>
                    
                    <div class="small-12 medium-6 cell">
                      <label> Ano Lectivo
                        <select name="ano">
                          <?php foreach ($rowAno as $rowAno) : ?> 
                            <option value="<?php echo $rowAno['Id_Ano']; ?>"> <?php echo $rowAno['Nome_Ano']; ?> </option>
                          <?php endforeach; ?>
                        </select>
                      </label>
                    </div>
                    <div class="small-12 medium-4 cell">
                      <label>Turmo
                        <select name="turno">
                          <option value="AM"> Manhã </option>
                          <option value="AT"> Tarde </option>
                          <option value="AN"> Noite </option>
                        </select>
                      </label>
                    </div>
                    <div class="small-12 medium-4 cell">
                      <label>Letra do Alfabeto
                        <input type="text" placeholder="A,B,C,D,F" name="turma">
                      </label>
                    </div>
                    <div class="small-12 medium-4 cell">
                      <label>Capacidade de Alunos
                        <input type="text" placeholder="Capacidade" name="capacidade">
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
