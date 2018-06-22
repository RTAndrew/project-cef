<?php


//Desativar or erros que seram apresentados na tela, ja que tudo esta a funcionar correctamente
error_reporting(E_ERROR);



include "../../php/conexao.php";
session_start();
//Checkar se existe uma sessao
    if(!$_SESSION['login']){
       header("location: ../../login.php");
       die;
    } elseif ($_SESSION['perfil'] != 'professor') {
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
  $sql = mysqli_query($conexao, "SELECT * FROM professor WHERE Id_Login = '$id'");
      while ($line = mysqli_fetch_array($sql)) {
        //Pegar o Nome
          $getCredential_Id_Professor = $line['Id_Professor'];
          $getCredential_Nome_Professor = $line['Nome_Professor'];
      }


  //Query
    //Pegar o Nome e ID das Turmas
      $queryTurma = "SELECT DISTINCT professor.Id_Professor, professor.Nome_Professor, turma.Id_Turma, turma.Nome_Turma
      FROM professor_curso_disciplina
      INNER JOIN professor ON (professor.Id_Professor = professor_curso_disciplina.Id_Professor)
      INNER JOIN turma ON (turma.Id_Turma = professor_curso_disciplina.Id_Turma)
        WHERE professor.Id_Professor = $getCredential_Id_Professor";

        $resultTurma = mysqli_query($conexao, $queryTurma);
        $rowTurma = mysqli_fetch_all($resultTurma, MYSQLI_ASSOC);
        mysqli_free_result($resultTurma);

        


    //Pegar o Nome e ID das Disciplinas
      $queryDisciplina = "SELECT DISTINCT professor.Nome_Professor, disciplina.Id_Disciplina, disciplina.Nome_Disciplina, curso_disciplina.Cod_Disciplina, ano.Nome_Ano
      FROM professor_curso_disciplina
      INNER JOIN professor ON (professor_curso_disciplina.Id_Professor = professor.Id_Professor)
      INNER JOIN curso_disciplina ON (professor_curso_disciplina.Id_Curso_Disciplina = curso_disciplina.Id_Curso_Disciplina) 
      INNER JOIN disciplina ON (curso_disciplina.Id_Disciplina = disciplina.Id_Disciplina)
      INNER JOIN ano ON (curso_disciplina.Id_Ano = ano.Id_Ano)
      WHERE professor.Id_Professor = $getCredential_Id_Professor";

        $resultDisciplina = mysqli_query($conexao, $queryDisciplina);
        $rowDisciplina = mysqli_fetch_all($resultDisciplina, MYSQLI_ASSOC);
        mysqli_free_result($resultDisciplina);

        


    //Pegar todos os DADOS do PROFESSOR
      $queryProfessor = "SELECT * from professor WHERE Id_Professor = $getCredential_Id_Professor";

        $resultProfessor = mysqli_query($conexao, $queryProfessor);
        $rowProfessor = mysqli_fetch_all($resultProfessor, MYSQLI_ASSOC);
        mysqli_free_result($resultProfessor);

        
          foreach ($rowProfessor as $rowProfessor) {

            $Id_Professor = $rowProfessor['Id_Professor'];
            
            $Nome_Professor = $rowProfessor['Nome_Professor'];
            
            $Grau_Academico = $rowProfessor['Grau_Academico'];
            
            $Bi_Professor = $rowProfessor['Bi_Professor'];
            
            $Data_Nascimento = $rowProfessor['Data_Nascimento'];
            
            $Telefone = $rowProfessor['telefone1'];
            
            $Email = $rowProfessor['Email_Professor'];
            
            $rua = $rowProfessor['rua'];
            
            $bairro = $rowProfessor['bairro'];
            
            $municipio = $rowProfessor['municipio'];

            $cidade = $rowProfessor['cidade'];
            
            
            $provincia = $rowProfessor['provincia'];



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
      <!-- Professor -->
      <link rel="stylesheet" href="../../css/professor/lista-nominal.css">
      <link rel="stylesheet" href="../../css/professor/conta.css">
    <!-- Font Awesome -->
        <link rel="stylesheet" href="../../font/font-awesome/css/font-awesome.min.css">
  </head>
  <body>








<div class="grid-y medium-grid-frame">

  <div class="cell medium-auto medium-cell-block-container">
    <div class="grid-x grid-padding-x">
      <div class="cell small-5 medium-4 large-2 medium-cell-block-y sidebar">

                                <ul class="multilevel-accordion-menu vertical menu align-left grid-padding-x" data-accordion-menu>
                                  <li class="logo"> <img src="../../img/logo.svg" alt="CEF" height = "100" width = "100"> </li>
                                  <li>
                                    <a href="../../painel-professor"> <i class="fa fa-home" aria-hidden="true"> </i> Home <span class="subitem"> </span> </a>
                                  </li>
                                  <li>
                                    <a href="lista-nominal"> <i class="fa fa-users" aria-hidden="true"> </i> Lista Nominal  <span class="subitem"> </span> </a>
                                  </li>
                                  <li>
                                    <a href="lancamento-notas"> <i class="fa fa-book" aria-hidden="true"> </i> Lançamento de Notas  <span class="subitem"> </a>
                                  </li>
                                  <li>
                                    <a class="active" href="#"> <i class="fa fa-lock" aria-hidden="true"> </i> Conta   <span class="subitem"> </span> </a>
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
             <ul>
                <li class="img-user img-user-d"> <?php  echo"$getCredential_Nome_Professor";  ?>  </li>
                <li class="img-user"> Docente | <a href="../../php/logout"> Log Out <i class="fa fa-sign-out"></i> </a> </li> 
              </ul>
          </div>
        </div>

        <!-- Painel Actual em que se encontra o usuario-->
        <div class="grid-x grid-margin-x controle-panel status-panel">
            <h1> Painel do Docente </h1>
        </div>

         <!-- Informacoes do Professor -->
        <div class="grid-x grid-margin-x grid-padding-x avaliacao controle-panel">
            
          <div class="small-12 medium-6 large-6 cell">
            <br><br>
            <h5> Turmas </h5>

            <?php foreach ($rowTurma as $rowTurma) {

                $turma = $rowTurma['Nome_Turma'];

                echo "";
                echo $turma;
                echo "<br>";  
              }  
            ?>
            
          </div>
          <div class="small-12 medium-6 large-6 cell">
            <br><br>
            <h5> Disciplinas </h5> 

            <?php 
              foreach ($rowDisciplina as $rowDisciplina) {

                $disciplina = $rowDisciplina['Nome_Disciplina'];

                
                echo $disciplina;
                echo "<br>";  
              }  
            ?>
            
          </div>





          <!-- Espacamento -->
            <div class="small-12 medium-12 large-12 cell">
              <hr>  <br> 
            </div>



            
          <div class="small-12 medium-6 large-6 cell">
            
            <h5> Número do Professor </h5> <?php echo $Id_Professor;  ?>
          <br><br>
          </div>
          <div class="small-12 medium-6 large-6 cell">
            
            <h5> Grau Académico </h5> <?php echo $Grau_Academico;  ?>
            <br><br>
          </div>


            
          <div class="small-12 medium-6 large-6 cell">
            
            <h5> Nome  </h5> <?php echo $Nome_Professor;  ?>
            <br><br>
          </div>
          <div class="small-12 medium-6 large-6 cell">
            
            <h5> Data de Nascimento </h5> <?php echo $Data_Nascimento;  ?>
            <br><br>
          </div>
          <div class="small-12 medium-6 large-6 cell">
            
            <h5> Bilhete de Identidade </h5> <?php echo $Bi_Professor;  ?>
            
          </div>





          <!-- Espacamento -->
            <div class="small-12 medium-12 large-12 cell">
              <hr>  <br> 
            </div>

 <!-- // $Id_Professor = $rowProfessor['Id_Professor'];
            
            // $Nome_Professor = $rowProfessor['Nome_Professor'];
            
            // $Grau_Academico = $rowProfessor['Grau_Academico'];
            
            // $Bi_Professor = $rowProfessor['Bi_Professor'];
            
            // $Data_Nascimento = $rowProfessor['Data_Nascimento'];
            
            // $Telefone = $rowProfessor['telefone1'];
            
            // $Email = $rowProfessor['Email_Professor'];
            
            // $rua = $rowProfessor['rua'];
            
            // $bairro = $rowProfessor['bairro'];
            
            // $municipio = $rowProfessor['municipio'];

            // $cidade = $rowProfessor['cidade'];
            
            
            // $provincia = $rowProfessor['provincia']; -->

            

          <div class="small-12 medium-6 large-6 cell">
            
            <h5> Telefone </h5> <?php echo $Telefone;  ?>
            
          </div>
          <div class="small-12 medium-6 large-6 cell">
            
            <h5> E-Mail </h5> <?php echo $Email;  ?>

          </div>





          <!-- Espacamento -->
            <div class="small-12 medium-12 large-12 cell">
              <hr>  <br> 
            </div>



            


          <div class="small-12 medium-6 large-6 cell">
            
            <h5> Rua </h5> <?php echo $rua;  ?>
            <br><br>
          </div>
          <div class="small-12 medium-6 large-6 cell">
            
            <h5> Bairro </h5> <?php echo $bairro;  ?>
            <br><br>
          </div>
          <div class="small-12 medium-6 large-6 cell">
            
            <h5> Município </h5> <?php echo $municipio;  ?>
            <br><br>
          </div>
          <div class="small-12 medium-6 large-6 cell">
            
            <h5> Cidade </h5> <?php echo $cidade;  ?>
            <br><br>
          </div>
          <div class="small-12 medium-6 large-6 cell">
            
            <h5> Provincia </h5> <?php echo $provincia;  ?>
            <br><br>
          </div>






        </div>


        










        <div class="espacamento"></div>
 
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
