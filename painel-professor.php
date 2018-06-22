<?php

include "php/conexao.php";
session_start();

//Checkar se existe uma sessao
    if(!$_SESSION['login']){
       header("location: login.php");
       die;
    } elseif ($_SESSION['perfil'] != 'professor') {
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
  $sql = mysqli_query($conexao, "SELECT * FROM professor WHERE Id_Login = '$id'");
      while ($line = mysqli_fetch_array($sql)) {
        //Pegar o Nome
          $getCredential_Id_Professor = $line['Id_Professor'];
          $getCredential_Nome_Professor = $line['Nome_Professor'];
      }



      //Funcoes para retornar O NUMERO DE ESTUDANTES, DISCIPLINAS, TURMAS

        //Retornar Numero de Alunos
          $sqlGetAlunos = mysqli_query($conexao, "SELECT aluno.Id_Aluno, aluno.Nome_Aluno, disciplina.Nome_Disciplina
  FROM professor_curso_disciplina
  INNER JOIN professor ON (professor.Id_Professor = professor_curso_disciplina.Id_Professor)
  INNER JOIN curso_disciplina ON (curso_disciplina.Id_Curso_Disciplina = professor_curso_disciplina.Id_Curso_Disciplina)
  INNER JOIN aluno ON (aluno.Id_Turma = professor_curso_disciplina.Id_Turma)
  INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
  WHERE professor.Id_Professor = $getCredential_Id_Professor");
         
               $sqlGetNumAlunos = mysqli_num_rows($sqlGetAlunos);


        //Retornar Numero de Alunos
          $sqlGetDisciplinas = mysqli_query($conexao, "SELECT professor.Nome_Professor, disciplina.Nome_Disciplina, curso_disciplina.Cod_Disciplina, ano.Nome_Ano
    from professor_curso_disciplina
    INNER JOIN professor ON (professor_curso_disciplina.Id_Professor = professor.Id_Professor)
    INNER JOIN curso_disciplina ON (professor_curso_disciplina.Id_Curso_Disciplina = curso_disciplina.Id_Curso_Disciplina) 
    INNER JOIN disciplina ON (curso_disciplina.Id_Disciplina = disciplina.Id_Disciplina)
    INNER JOIN ano ON (curso_disciplina.Id_Ano = ano.Id_Ano)
    WHERE professor.Id_Professor = $getCredential_Id_Professor");
         
               $sqlGetNumDisciplinas = mysqli_num_rows($sqlGetDisciplinas);



          //Retornar Numero de Turmas
              $sqlGetTurmas = mysqli_query($conexao, "SELECT professor.Id_Professor, professor.Nome_Professor, turma.Nome_Turma
                FROM professor_curso_disciplina
                INNER JOIN professor ON (professor.Id_Professor = professor_curso_disciplina.Id_Professor)
                INNER JOIN turma ON (turma.Id_Turma = professor_curso_disciplina.Id_Turma)
                  WHERE professor.Id_Professor = $getCredential_Id_Professor");
             
                   $sqlGetNumTurmas = mysqli_num_rows($sqlGetTurmas);






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
      <link rel="stylesheet" href="css/css-professor.css">
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
                                    <a href="pages/professor/lista-nominal"> <i class="fa fa-users" aria-hidden="true"> </i> Lista Nominal  <span class="subitem"> </span> </a>
                                  </li>
                                  <li>
                                    <a href="pages/professor/lancamento-notas"> <i class="fa fa-book" aria-hidden="true"> </i> Lançamento de Notas  <span class="subitem"> </a>
                                  </li>
                                  <li>
                                    <a href="pages/professor/conta"> <i class="fa fa-lock" aria-hidden="true"> </i> Conta <span class="subitem"> </span> </a>
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
                <li class="img-user img-user-d"> <?php  echo"$getCredential_Nome_Professor";  ?>  </li>
                <li class="img-user"> Docente | <a href="php/logout"> Log Out <i class="fa fa-sign-out"></i> </a> </li> 
              </ul>
          </div>
        </div>

        <!-- Painel Actual em que se encontra o usuario-->
                                    <div class="grid-x grid-margin-x controle-panel status-panel">
                                        <h1> Painel do Docente </h1>
                                    </div>

                                    <div class="grid-x grid-margin-x grid-margin-y grid-margin-x stats">
                                        <div class="cell small-6 medium-4">
                                            <div class="dashboard-nav-card" id="estudante">
                                                  <i class="dashboard-nav-card-icon fa fa-users" aria-hidden="true"></i>
                                                  <h3 class="dashboard-nav-card-title">Estudantes: <?php echo "$sqlGetNumAlunos"; ?> </h3>
                                            </div>
                                          </div>
                                        
                                        <div class="cell small-6 medium-4">

                                                <div class="dashboard-nav-card" id="disciplina">
                                                  <i class="dashboard-nav-card-icon fa fa-book" aria-hidden="true"></i>
                                                  <h3 class="dashboard-nav-card-title">Disciplinas: <?php echo "$sqlGetNumDisciplinas"; ?> </h3> 
                                                </div>

                                        </div>
                                        
                                        <div class="cell auto medium-4">

                                                <div class="dashboard-nav-card" id="sala">
                                                  <i class="dashboard-nav-card-icon fa fa-book" aria-hidden="true"></i>
                                                  <h3 class="dashboard-nav-card-title">Turmas: <?php echo "$sqlGetNumTurmas"?></h3>
                                                </div>
                                        </div>

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
