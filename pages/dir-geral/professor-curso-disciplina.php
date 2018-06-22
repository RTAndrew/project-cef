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
  //Pegar o Nome e ID dos Professores
    $queryProfessor = "SELECT Id_Professor, Nome_Professor FROM professor ORDER BY Nome_Professor";

      $resultProfessor = mysqli_query($conexao, $queryProfessor);
      $rowProfessor = mysqli_fetch_all($resultProfessor, MYSQLI_ASSOC);
      mysqli_free_result($resultProfessor);



  //Codigo do Formulario
      if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $Id_Professor = $_POST['Id_Professor'];


        //Pegar o Nome, Turma e as dicipliplas de acordo com o professor
        $queryGetTurmaProfessor = "SELECT professor.Nome_Professor, turma.Nome_Turma, disciplina.Nome_Disciplina, curso_disciplina.Id_Ano
        FROM professor_curso_disciplina
        INNER JOIN professor ON (professor.Id_Professor = professor_curso_disciplina.Id_Professor)
        INNER JOIN curso_disciplina ON (curso_disciplina.Id_Curso_Disciplina = professor_curso_disciplina.Id_Curso_Disciplina)
        INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
        INNER JOIN turma ON (turma.Id_Turma = professor_curso_disciplina.Id_Turma)
          WHERE professor.Id_Professor = $Id_Professor 
          ORDER BY disciplina.Nome_Disciplina";

            $resultGetTurmaProfessor = mysqli_query($conexao, $queryGetTurmaProfessor);
            $rowGetTurmaProfessor = mysqli_fetch_all($resultGetTurmaProfessor, MYSQLI_ASSOC);
            mysqli_free_result($resultGetTurmaProfessor); 



                //Pegar os dados do professor
                $queryGetProfessor = "SELECT * FROM professor WHERE Id_Professor = $Id_Professor";

                    $resultGetProfessor = mysqli_query($conexao, $queryGetProfessor);
                    $rowGetProfessor = mysqli_fetch_all($resultGetProfessor, MYSQLI_ASSOC);
                    mysqli_free_result($resultGetProfessor);

                    foreach ($rowGetProfessor as $rowGetProfessor) {
                      $Id_Professor = $rowGetProfessor['Id_Professor'];
                      $Nome_Professor = $rowGetProfessor['Nome_Professor'];
                    }

      //Pegar os dados da tabela CURSO DISCIPLINA DE FORMA CONCATENADA
      $queryGetCursoDisciplina = "SELECT curso_disciplina.Id_Curso_Disciplina, curso.Nome_Curso, disciplina.Nome_Disciplina, ano.Nome_Ano
        FROM curso_disciplina
        INNER JOIN curso ON (curso.Id_Curso = curso_disciplina.Id_Curso)
        INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
        INNER JOIN ano ON (ano.Id_Ano = curso_disciplina.Id_Ano)
        ";

          $resultGetCursoDisciplina = mysqli_query($conexao, $queryGetCursoDisciplina);
          $rowGetCursoDisciplina = mysqli_fetch_all($resultGetCursoDisciplina, MYSQLI_ASSOC);
          mysqli_free_result($resultGetCursoDisciplina);

         

        //Apresentar a TURMA
        $getTurma = "SELECT * from turma";
        $resultGetTurma = mysqli_query($conexao, $getTurma);
        $rowGetTurma = mysqli_fetch_all($resultGetTurma, MYSQLI_ASSOC);
            mysqli_free_result($resultGetTurma);

        // $getNomeDisciplina = "SELECT Nome_Disciplina from disciplina where Id_Disciplina = $disciplina";
        // $resultGetNomeDisciplina = mysqli_query($conexao, $getNomeDisciplina);
        // $rowGetDisciplina = mysqli_fetch_all($resultGetNomeDisciplina, MYSQLI_ASSOC);
        //     mysqli_free_result($resultGetNomeDisciplina);
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
                                      <li><a class="subitem" href="lista-nominal">Lista Nominal</a></li>
                                      <!-- <li><a class="subitem" href="#">Emitir Declaração</a></li> -->
                                      <!-- <li><a class="subitem" href="#">Pagamento de Propinas</a></li> -->
                                    </ul>
                                  </li>
                                  <li>
                                    <a href="#"> <i class="fa fa-usd" aria-hidden="true"> </i> Direcção Académica  <span class="subitem"> </span> </a>
                                    <ul class="menu vertical sublevel-1">
                                      <li><a class="subitem" href="criar-afectar-disciplina">Criar / Afectar Disciplina </a></li>
                                      <li><a class="subitem" href="cadastrar-turma">Cadastrar Turma</a></li>
                                      <li><a class="subitem" href="cadastrar-professor">Cadastrar Professor</a></li>
                                    </ul>
                                  <li>
                                    <a href="cadastrar-funcionario"> <i class="fa fa-users" aria-hidden="true"> </i> Cadastrar Funcionário <span class="subitem"> </span> </a>
                                  <li>
                                    <a class="active" href="#"> <i class="fa fa-book" aria-hidden="true"> </i> Afectar Professor / Disciplina <span class="subitem"> </span> </a>
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

        <!-- Quadro da Lista -->
        <form class="lista" method="post">
          <div class="grid-container">
            <div class="grid-x grid-padding-x align-justify"> 
              <div class="small-12 medium-12 cell">
                <h1> Afectar um Professor a uma Disciplina </h1>
              </div>
 
              <div class="small-12 medium-6 large-6 cell">
                <label> <h5> Lista de Professores </h5>
                  <select name="Id_Professor">
                     <?php foreach ($rowProfessor as $rowProfessor) : ?> 
                      <option value="<?php echo $rowProfessor['Id_Professor']; ?>"> <?php echo $rowProfessor['Nome_Professor']; ?> </option>
                    <?php endforeach; ?>
                  </select>
                </label>
              </div>

              
              
              <div class="small-12 medium-12 large-6 cell">
                <label> <br> <br>
                  <input class="button cell small-12 medium-12 large-12" type="submit" value="Procurar"/>
                </label>
              </div>
            </div>
          </div>
        </form>

        
        <form method="post">
          <div class="grid-container">
            <div class="grid-x grid-padding-x align-justify">


              <!-- PEGAR O ID do PROFESSOR DE FORMA HIDDE, porque na validacao o valor nao passa -->
              <input type="hidden" name="id" value="<?php echo $Id_Professor; ?>">

              <div class="small-12 medium-12 large-12 cell">
                
                <label> 
                  <h5> Dados do Professor </h5> 
                  <center>
                    <h4>Turma  -  Disciplina</h4> <hr>
                      <h6>
                      <?php foreach ($rowGetTurmaProfessor as $rowGetTurmaProfessor) : ?> 

                          <?php
                            echo "<br>";
                              echo $rowGetTurmaProfessor['Nome_Turma']; 
                              echo " "; 
                              echo '<i class="fa fa-ellipsis-h" aria-hidden="true"></i>';
                              echo " ";
                              echo $rowGetTurmaProfessor['Nome_Disciplina']; 
                            echo "<br>";
                          ?>

                      <?php endforeach; ?>   
                      </h6>
                  </center>
                </label>

              </div>


              <div class="small-12 medium-12 large-12 cell">

                <label>
                  <h5> Cadastrar o Professor </h5>
                </label>

              </div> 



               <div class="small-12 medium-12 large-12 cell">
                <label>
                  <center>
                    <h6> 

                      <?php
                        echo $Id_Professor;
                        echo " ";
                        echo '<i class="fa fa-ellipsis-h" aria-hidden="true"></i>'; 
                        echo " ";
                        echo $Nome_Professor; 
                      ?> 

                    </h6>
                  </center>
                </label>
              </div> 

<!-- curso_disciplina.Id_Curso_Disciplina, curso.Nome_Curso, disciplina.Nome_Disciplina, ano.Nome_Ano -->

              <div class="small-12 medium-8 large-8 cell">
                <label> <h4> Dados </h4> <hr>
                  <select name="Id_Curso_Disciplina">
                     <?php 
                        foreach ($rowGetCursoDisciplina as $rowGetCursoDisciplina) : ?> 
                          
                          <option value="<?php echo $rowGetCursoDisciplina['Id_Curso_Disciplina']; ?>"> 

                            <?php 

                              echo $rowGetCursoDisciplina['Nome_Curso']; 
                              echo " ";
                              echo "-";
                              echo " ";
                              echo "-";
                              echo " ";
                              echo " ";
                              echo "-";
                              echo " ";
                              echo "-";
                              echo " ";
                              
                              echo $rowGetCursoDisciplina['Nome_Disciplina']; 
                              echo " ";
                              echo "-";
                              echo " ";
                              echo "-";
                              echo " ";
                              echo " ";
                              echo "-";
                              echo " ";
                              echo "-";
                              echo " ";
                              
                              echo $rowGetCursoDisciplina['Nome_Ano']; 
                              


                            ?> 

                          </option>

                    <?php endforeach; ?>
                  </select>
                </label>
              </div>





              <div class="small-12 medium-4 large-4 cell">
                <label> <h4> Turmas </h4> <hr>
                  <select name="Id_Turma">

                     <?php 
                        foreach ($rowGetTurma as $rowGetTurma) : ?> 

                          <option value="<?php echo $rowGetTurma['Id_Turma']; ?>"> 
                            
                            <?php 
                              echo $rowGetTurma['Nome_Turma']; 
                            ?> 

                          </option>

                    <?php endforeach; ?>
                  </select>
                </label>
              </div>


          <div class="small-12 medium-12 large-12 cell">
            <label> 
              <input class="button cell small-12 medium-12 large-12" type="submit" value="Afectar" name="Afectar" />
            </label>
          </div>

            </div>
          </div> 
                    
                    
          
 <!-- VALIDACAO do formulario Afectar -->

        <?php
        
       

          if(isset($_POST['Afectar'])){
            
            $Id_Curso_Disciplina = $_POST['Id_Curso_Disciplina'];
            $Id_Turma = $_POST['Id_Turma'];
             $id = $_POST['id'];

            //echo $id;


            //Verificar se a existe uma TURMA do mesmo CURSO com o mesmo ANO
            $sqlVerifyTurma = mysqli_query($conexao, "SELECT DISTINCT turma.Nome_Turma
              FROM turma 
              INNER JOIN curso_disciplina ON (curso_disciplina.Id_Curso = turma.Id_Curso)
               WHERE curso_disciplina.Id_Ano = turma.Id_Ano AND Id_Turma = $Id_Turma");

            $rowsVerifyTurma = mysqli_num_rows($sqlVerifyTurma); 





            //Verificar se a existe uma TURMA do mesmo CURSO com o mesmo ANO
            $sqlVerifyProfessorCursoDisciplina = mysqli_query($conexao, "SELECT * FROM professor_curso_disciplina WHERE 
              Id_Professor = $id AND Id_Curso_Disciplina = $Id_Curso_Disciplina AND Id_Turma = $Id_Turma ");

              $rowsVerifyProfessorCursoDisciplina = mysqli_num_rows($sqlVerifyProfessorCursoDisciplina);  

            if($rowsVerifyTurma >= 1){

              if ($rowsVerifyProfessorCursoDisciplina >= 1) {
                
                echo "<center> <span class='erro' style=font-weight:bold;> O professor já esta afectado a uma disciplina na mesma turma! </span> </center>";

              } else {

                $inserir = "INSERT INTO professor_curso_disciplina (Id_Professor, Id_Curso_Disciplina, Id_Turma) VALUES ('$id', '$Id_Curso_Disciplina', '$Id_Turma')";

                  if(mysqli_query($conexao, $inserir))
                  {
                    echo "<center> <span class='sucesso' style=font-weight:bold;> Professor afectado a uma disciplina e turma </span> </center>"; 
                  }

                  else
                  {

                    echo "<center> <span class='erro' style=font-weight:bold;> Erro inesperado! </span> </center>"; 
                    echo "<center> <span class='erro' style=font-weight:bold;> Verifique se o professor foi previamente selecionado. </span> </center>";  
                    echo "<center> <span class='erro' style=font-weight:bold;> Se o erro persistir, contacte a equipe técnica. </span> </center>"; 
                  }


              }

            } else {
              echo "<center> <span class='erro' style=font-weight:bold;> Não existe uma turma que pertence a este curso! </span> </center>"; 
            }

        
            

          } else {
            //echo "<center> <span class='erro' style=font-weight:bold;> Erro inesperado! Contacte a equipe técnica. </span> </center>"; 
          }



        ?>

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
