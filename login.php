<?php
include "php/conexao.php";
session_start();
//Checkar se existe uma sessao e para redirecionar
  //Funcao do redirecionamento
      function redirect($DoDie = true) {
          header('Location: painel-aluno.php');
          if ($DoDie)
              die();
      }
      
      function redirectProfessor($DoDie = true) {
          header('Location: painel-professor');
          if ($DoDie)
              die();
      }
      
      function redirectSecretaria($DoDie = true) {
          header('Location: painel-secretaria');
          if ($DoDie)
              die();
      }
      
      function redirectDirectorAcademico($DoDie = true) {
          header('Location: painel-diretor-academico');
          if ($DoDie)
              die();
      }
      
      function redirectDirectorGeral($DoDie = true) {
          header('Location: painel-geral');
          if ($DoDie)
              die();
      }
  //Verificacao se existe uma sessao
    if(isset($_SESSION['login'])) {
        if ($_SESSION['perfil'] == "aluno") {
          redirect();
        } 

        //Se nao haver uma sessao, havera um redirecionamento

            elseif ($_SESSION['perfil'] == "professor") {
              redirectProfessor();
            } elseif ($_SESSION['perfil'] == "secretaria") {
              redirectSecretaria();
            } elseif ($_SESSION['perfil'] == "director academico") {
              redirectDirectorAcademico();
            } elseif ($_SESSION['perfil'] == "director geral") {
              redirectDirectorGeral();
            } 
    }


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
    <link rel="stylesheet" href="css/login.css">
      <!-- Professor -->
      
    <!-- Font Awesome -->
        <link rel="stylesheet" href="font/font-awesome/css/font-awesome.min.css">
  </head>
  <body>








  <div class="grid-x smal-grid-frame medium-grid-frame">

    <div class="grid-container">


      <!-- Background do Logotipo -->
      <div class="grid-x grid-padding-x">
        
        
          <!-- Formulario do Login -->
          <div class="grid-x grid-padding-x grid-margin-x bg-image">
             
            <div class="cell medium-12 large-12">
                  
              <div class="grid-x grid-padding-x grid-margin-x conteudo align-center">
                <div class="small-12 medium-12 cell"> 
                  <form class="contudo" action="php/auth.php" method="POST">
                    <div class="grid-container">

                      <div class="grid-x grid-padding-x auth"> 
                        <div class="small-12 medium-12 large-12 cell align-center">
                          <h1> Autenticação </h1>
                          <?php
                            @$v = $_GET['valor'];
                            @$s = $_GET['erro'];
                            if($v){
                              echo "<center> <span class='erro'> Todos os campos devem ser preenchidos </span> </center>";
                            } elseif ($s) {
                              echo "<center> <span class='erro'> Email ou Senha incorrectos </span> </center>";
                            }
                              
                          ?>
                        </div>
                        <form>
                          <div class="x small-12 medium-12 large-12 cell input-group">
                            <span class="input-group-label"> <i class="fa fa-user"></i> </span>
                            <input class="input-group-field" type="text" name="nickname" placeholder="Alcunha">
                          </div>

                          <div class="x small-12 medium-12 large-12 cell input-group">
                            <span class="input-group-label"> <i class="fa fa-lock"></i> </span>
                            <input class="input-group-field" type="password" name="password" placeholder="Password">
                          </div>

                          <div class="x small-12 medium-12 cell">
                            <label>
                              <input class="button cell small-12 medium-12 large-12" type="submit" value="Procurar" name="login" />
                            </label>
                          </div>
                        </form>
                      </div>


                    </div>
                  </div>
                </form>

              </div>




            </div>

          </div>
      </div>
    </div>
  </div>
























  </div>




  


















    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
