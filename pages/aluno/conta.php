<?php

include "../../php/conexao.php";
session_start();
//Checkar se existe uma sessao
    if(!$_SESSION['login']){
       header("location: ../../login.php");
       die;
    } elseif ($_SESSION['perfil'] != 'aluno') {
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
  $sql = mysqli_query($conexao, "SELECT * FROM aluno WHERE Id_Login = '$id'");
      while ($line = mysqli_fetch_array($sql)) {
        //Pegar os dados
          $getCredential_Id_Aluno = $line['Id_Aluno'];
          $getCredential_Nome_Aluno = $line['Nome_Aluno'];
      }

//Query
        //Pegar o ID e Nome dos Cursos
          $queryConta = "SELECT matricula.Id_Matricula, curso.Nome_Curso, Ano.Nome_Ano, turma.Nome_Turma,
              aluno.Id_Aluno, aluno.Nome_Aluno, aluno.Data_Nascimento, aluno.Sexo_Aluno, aluno.Bi_Aluno, matricula.Filiacao_Primeiro, matricula.Filiacao_Segundo, matricula.Naturalidade, 
              aluno.telefone1, aluno.Email_Aluno,
              aluno.rua, aluno.bairro, aluno.municipio, aluno.cidade, aluno.provincia,
              encarregado.Nome_Encarregado, encarregado.Profissao, encarregado.telefone
          FROM matricula
          
          INNER JOIN aluno ON (aluno.Id_Matricula = matricula.Id_Matricula)
          INNER JOIN encarregado_aluno ON (encarregado_aluno.Id_Aluno = aluno.Id_Aluno)
          INNER JOIN encarregado ON (encarregado.Id_Encarregado = encarregado_aluno.Id_Encarregado)
          INNER JOIN turma ON (turma.Id_Turma = aluno.Id_Turma)
          INNER JOIN curso ON (curso.Id_Curso = turma.Id_Curso)
          INNER JOIN ano ON (ano.Id_Ano = turma.Id_Ano)
          WHERE aluno.Id_Aluno = $getCredential_Id_Aluno";

            $resultConta = mysqli_query($conexao, $queryConta);
            $rowConta = mysqli_fetch_all($resultConta, MYSQLI_ASSOC);
            mysqli_free_result($resultConta);

            foreach ($rowConta as $rowConta) {

              $Id_Matricula = $rowConta['Id_Matricula'];

              $Nome_Curso = $rowConta['Nome_Curso'];
              
              $Nome_Ano = $rowConta['Nome_Ano'];
              
              $Nome_Turma = $rowConta['Nome_Turma'];
              
              $Nome_Aluno = $rowConta['Nome_Aluno'];
              
              $Id_Aluno = $rowConta['Id_Aluno'];
              
              $Data_Nascimento = $rowConta['Data_Nascimento'];
              
              $Sexo_Aluno = $rowConta['Sexo_Aluno'];
              
              $Bi_Aluno = $rowConta['Bi_Aluno'];
              
              $Filiacao_Primeiro = $rowConta['Filiacao_Primeiro'];
              
              $Filiacao_Segundo = $rowConta['Filiacao_Segundo'];
              
              $Naturalidade = $rowConta['Naturalidade'];
              
              $Aluno_Telefone = $rowConta['telefone1'];
              
              $Aluno_Email = $rowConta['Email_Aluno'];
              
              $rua = $rowConta['rua'];
              
              $bairro = $rowConta['bairro'];
              
              $municipio = $rowConta['municipio'];
              
              $cidade = $rowConta['cidade'];
              
              $provincia = $rowConta['provincia'];
              
              $Nome_Encarregado = $rowConta['Nome_Encarregado'];
              
              $Encarregado_Profissao = $rowConta['Profissao'];
              
              $Encarregado_Telefone = $rowConta['telefone'];

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
    <link rel="stylesheet" href="../../css/aluno/conta.css">
      <!-- Professor -->
      
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
                                    <a href="../../painel-aluno"> <i class="fa fa-home" aria-hidden="true"> </i> Home <span class="subitem"> </span> </a>
                                  </li>
                                  <li>
                                    <a href="avaliacao"> <i class="fa fa-book" aria-hidden="true"> </i> Avaliações  <span class="subitem"> </span> </a>
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
             <ul class="">
                <li class="img-user img-user-d"> <?php  echo"$getCredential_Nome_Aluno";  ?>  </li>
                <li class="img-user"> Aluno (a) | <a href="../../php/logout"> Log Out <i class="fa fa-sign-out"></i> </a> </li> 
              </ul>
          </div>
        </div>

        <!-- Painel Actual em que se encontra o usuario-->
        <div class="grid-x grid-margin-x controle-panel status-panel">
            <h1> Painel do Aluno </h1>
        </div>

        <div class="grid-x grid-margin-x grid-padding-x avaliacao controle-panel">
            <h1> Informações de Matrícula </h1>
        </div>


        <!-- Informacoes de Matricula -->
        <div class="grid-x grid-margin-x grid-padding-x avaliacao controle-panel">
            
          <div class="small-12 medium-12 large-12 cell">

            <h5> Número de Matricula </h5> <?php echo $Id_Matricula;  ?>
            <br><br>
            <h5> Número do Aluno </h5> <?php echo $Id_Aluno;  ?>
            
            <br>  <hr>
          </div>   
          <div class="small-12 medium-12 large-12 cell">

            <center> <h5> Curso </h5> <?php echo $Nome_Curso;  ?> </center>
            <br>  <hr>
          </div> 

          <div class="small-12 medium-6 large-6 cell">

            <h5> Ano </h5> <?php echo $Nome_Ano;  ?>
            <br>  <hr>
          </div>
          <div class="small-12 medium-6 large-6 cell">

            <h5> Turma Actual </h5> <?php echo $Nome_Turma;  ?>
            <br>  <hr>
          </div>
     
          <div class="small-12 medium-12 large-6 cell">

            <h5> Nome do Aluno </h5> <?php echo $Nome_Aluno;  ?>
            <br> <br> <br> 
          </div>
     
          <div class="small-12 medium-6 large-3 cell">

            <h5> Data de Nascimento </h5> <?php echo $Data_Nascimento;  ?>
          <br> <br> <br> 
          </div>

          <div class="small-12 medium-6 large-3 cell">

            <h5> Sexo </h5> <?php echo $Sexo_Aluno;  ?>
          <br> <br> <br> 
          </div>

          <div class="small-12 medium-6 large-6 cell">

            <h5> Filho de  </h5> <?php echo $Filiacao_Primeiro;  ?>
          <br> <br> <br> 
          </div>


          <div class="small-12 medium-6 large-6 cell">

            <h5> ... e de </h5> <?php echo $Filiacao_Segundo;  ?>
            <br> <br> <br> 
          </div>


          <div class="small-12 medium-6 large-4 cell">

            <h5> Naturalidade </h5> <?php echo $Naturalidade;  ?>
            <br> <br> <br> 
          </div>


          <div class="small-12 medium-6 large-4 cell">

            <h5> Provincia </h5> <?php echo $Id_Aluno;  ?>
            <br> <br> <br> 
          </div>


          <div class="small-12 medium-12 large-4 cell">

            <h5> Bilhete de Identidade </h5> <?php echo $Bi_Aluno;  ?>
            <br> <br> <br> 
          </div>
          
          <!-- Espacamento -->
            <div class="small-12 medium-12 large-12 cell">
              <hr>  <br> 
            </div>


          <div class="small-12 medium-6 large-6 cell">

            <h5> Número de Telefone </h5> <?php echo $Aluno_Telefone;  ?>
            <br>  <hr>
          </div>

          <div class="small-12 medium-6 large-6 cell">

            <h5> Email </h5> <?php echo $Aluno_Email;  ?>
            <br>  <hr>
          </div>


          <!-- Espacamento -->
            <div class="small-12 medium-12 large-12 cell">
              <hr>  <br> 
            </div>


          <div class="small-12 medium-6 large-4 cell">

            <h5> Rua </h5> <?php echo $rua;  ?>
            <br> <br> <br> 
          </div>


          <div class="small-12 medium-6 large-4 cell">

            <h5> Bairro </h5> <?php echo $bairro;  ?>
            <br> <br> <br> 
          </div>


          <div class="small-12 medium-6 large-4 cell">

            <h5> Município </h5> <?php echo $municipio;  ?>
            <br> <br> <br> 
          </div>


          <div class="small-12 medium-6 large-4 cell">

            <h5> Cidade </h5> <?php echo $cidade;  ?>
            <br> <br> <br> 
          </div>


          <div class="small-12 medium-6 large-4 cell">

            <h5> Província </h5> <?php echo $provincia;  ?>
            <br> <br> <br> 
          </div>

          <!-- Espacamento -->
            <div class="small-12 medium-12 large-12 cell">
              <hr>  <br> 
            </div>

            <div class="small-12 medium-6 large-4 cell">

            <h5> Encarregado de Educação </h5> <?php echo $Nome_Encarregado;  ?>
            <br> <br> <br> 
          </div>

          <div class="small-12 medium-6 large-4 cell">

            <h5> Profissão </h5> <?php echo $Encarregado_Profissao;  ?>
            <br> <br> <br> 
          </div>

          <div class="small-12 medium-6 large-4 cell">

            <h5> Número de Telefone </h5> <?php echo $Encarregado_Telefone;  ?>
            <br> <br> <br> 
          </div>



         <!--  $Id_Matricula = $rowConta['Id_Matricula'];

              $Nome_Curso = $rowConta['Nome_Curso'];
              
              $Nome_Ano = $rowConta['Nome_Ano'];
              
              $Nome_Turma = $rowConta['Nome_Turma'];
              
              $Nome_Aluno = $rowConta['Nome_Aluno'];
              
              $Id_Aluno = $rowConta['Id_Aluno'];
              
              $Data_Nascimento = $rowConta['Data_Nascimento'];
              
              $Sexo_Aluno = $rowConta['Sexo_Aluno'];
              
              $Bi_Aluno = $rowConta['Bi_Aluno'];
              
              $Filiacao_Primeiro = $rowConta['Filiacao_Primeiro'];
              
              $Filiacao_Segundo = $rowConta['Filiacao_Segundo'];
              
              $Naturalidade = $rowConta['Naturalidade'];
              
              $Aluno_Telefone = $rowConta['telefone1'];
              
              $Aluno_Email = $rowConta['Email_Aluno'];
              
              $rua = $rowConta['rua'];
              
              $bairro = $rowConta['bairro'];
              
              $municipio = $rowConta['municipio'];
              
              $cidade = $rowConta['cidade'];
              
              $provincia = $rowConta['provincia'];
              
              $Nome_Encarregado = $rowConta['Nome_Encarregado'];
              
              $Encarregado_Profissao = $rowConta['Profissao'];
              
              $Encarregado_Telefone = $rowConta['telefone'];
               -->





        </div>


















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
