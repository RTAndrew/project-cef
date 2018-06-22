<?php

//Desativar or erros que seram apresentados na tela, ja que tudo esta a funcionar correctamente
error_reporting(E_ERROR);


include "../../php/conexao.php";
session_start();
//Checkar se existe uma sessao
    if(!$_SESSION['login']){
       header("location: ../../login.php");
       die;
    } elseif ($_SESSION['perfil'] != 'secretaria') {
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

  $queryTurma = "SELECT turma.Id_Turma, turma.Nome_Turma FROM turma";

        $resultTurma = mysqli_query($conexao, $queryTurma);
        $rowTurma = mysqli_fetch_all($resultTurma, MYSQLI_ASSOC);
        mysqli_free_result($resultTurma);


  //Apresentar todos os dados de acordo com a turma escolhida
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $turma = $_POST['turma'];


    $queryApresentarTurma = "SELECT aluno.Id_Aluno, aluno.Nome_Aluno, aluno.Data_Nascimento, aluno.Sexo_Aluno 
    from aluno 
    INNER JOIN turma ON (turma.Id_Turma = aluno.Id_Turma)
    where turma.Id_Turma = $turma";

      $resultApresentarTurma = mysqli_query($conexao, $queryApresentarTurma);
      $rowApresentarTurma = mysqli_fetch_all($resultApresentarTurma, MYSQLI_ASSOC);
      mysqli_free_result($resultApresentarTurma);

    //Apresentar a TURMA e a DISCIPLINA
        $getNomeTurma = "SELECT Nome_Turma from turma where Id_Turma = $turma";
        $resultGetNomeTurma = mysqli_query($conexao, $getNomeTurma);
        $rowGetTurma = mysqli_fetch_all($resultGetNomeTurma, MYSQLI_ASSOC);
            mysqli_free_result($resultGetNomeTurma);
        
  }

?>



<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pauta</title>

    <link rel="stylesheet" href="../../css/foundation.css">
    <link rel="stylesheet" href="../../css/app.css">
    <!-- Estilizacao CSS -->
    <link rel="stylesheet" href="../../css/css.css">
      <!-- Professor -->
      <link rel="stylesheet" href="../../css/secretaria/pauta.css">
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
                  <a href="../../painel-secretaria"> <i class="fa fa-home" aria-hidden="true"> </i> Home <span class="subitem"> </span> </a>
                </li>
                <!-- <li>
                  <a href="#"> <i class="fa fa-file" aria-hidden="true"> </i> Registrar Alunos  <span class="subitem"> </span></a>
                </li> -->
                <li>
                  <a href="matricula"> <i class="fa fa-copy" aria-hidden="true"> </i> Matricula  <span class="subitem"> </span> </a>
                </li>
                <li>
                  <a class="active" href="#"> <i class="fa fa-list-alt" aria-hidden="true"> </i> Lista Nominal  <span class="subitem"> </span></a>
                </li>
                <!-- <li>
                  <a href="#"> <i class="fa fa-file-word-o" aria-hidden="true"> </i> Emitir Declaração  <span class="subitem"> </span></a>
                </li>
                <li>
                  <a href="#"> <i class="fa fa-usd" aria-hidden="true"> </i> Pagamento de Propinas <span class="subitem"> </span></a>
                </li> -->
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
                    <li class="img-user img-user-d">  <?php  echo"$getCredential_Nome_Funcionario";  ?>    </li>
                    <li class="img-user"> Secretário (a) | <a href="../../php/logout.php"> Log Out <i class="fa fa-sign-out"></i> </a> </li> 
                  </ul>
              </div>

            </div>

            <!-- Painel Actual em que se encontra o usuario-->
            <div class="grid-x grid-margin-x controle-panel status-panel">
                <h1> Painel do Secretariado </h1>
            </div>

<!-- Quadro da Lista -->
        <form class="lista" method="POST">
          <div class="grid-container">
            <div class="grid-x grid-padding-x"> 
              <div class="small-12 medium-12 cell">
                <h1> Lista Nominal </h1>
              </div>
              <div class="small-12 medium-12 large-12 cell">
                <label> <h5> Turma </h5>
                  <select name="turma">
                    <?php foreach ($rowTurma as $rowTurma) : ?> 
                      <option value="<?php echo $rowTurma['Id_Turma']; ?>"> <?php echo $rowTurma['Nome_Turma']; ?> </option>
                    <?php endforeach; ?>
                  </select>
                </label>
              </div>
              
              <div class="small-12 medium-12 large-12 cell">
                <label>
                  <input class="button cell small-12 medium-12 large-12" type="submit" value="Procurar"/>
                </label>
              </div>
            </div>
          </div>
        </form>

        <!-- Alunos a Apresentar -->

        <center style="margin-top:2rem; color: #3C91E6;"> 
          <h4>

                <!-- Apresentar a Turma -->
                <?php
                  foreach ($rowGetTurma as $rowGetTurma) : ?>

                    <?php echo @$rowGetTurma['Nome_Turma'];?> 

                <?php endforeach; ?> 

          </h4> 
        </center>

        <table class="hover">
          <thead>
            <tr>
              <th width="200">Nº Aluno</th>
              <th width="600">Nome Aluno</th>
              <th width="250">Data Nascimento</th>
              <th width="100">Sexo</th>
            </tr>
          </thead>
          <?php
            foreach ($rowApresentarTurma as $rowApresentarTurma) : ?>
              <tbody>
                <tr>

                  <td><?php echo $rowApresentarTurma['Id_Aluno'];?></td>
                  
                  <td><?php echo $rowApresentarTurma['Nome_Aluno'];?></td>
                  
                  <td><?php echo $rowApresentarTurma['Data_Nascimento'];?></td>
                  
                  <td><?php echo $rowApresentarTurma['Sexo_Aluno'];?></td>

                </tr>
              </tbody>
          <?php endforeach; ?>
        </table>

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
