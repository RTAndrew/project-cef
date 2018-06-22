<?php





include "../../php/conexao.php";
session_start();
//Checkar se existe uma sessao
    if(!$_SESSION['login']){
       header("location: login.php");
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
    <meta charset="ISO-8859-1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Matricula</title>

    <link rel="stylesheet" href="../../css/foundation.css">
    <link rel="stylesheet" href="../../css/app.css">
    <!-- Estilizacao CSS -->
    <link rel="stylesheet" href="../../css/css.css">
      <!-- Professor -->
      <link rel="stylesheet" href="../../css/secretaria/matricula.css">
      <link rel="stylesheet" href="../../css/diretor-academico/cadastrar-professor.css">
      <link rel="stylesheet" href="../../css/secretaria/matricula.css">
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
                  <a href="#"> <i class="fa fa-file" aria-hidden="true"> </i> Registrar Alunos  <span class="subitem"> </a>
                </li> -->
                <li>
                  <a class="active" href="#"> <i class="fa fa-copy" aria-hidden="true"> </i> Matricula  <span class="subitem"> </span> </a>
                </li>
                <li>
                  <a href="lista-nominal"> <i class="fa fa-list-alt" aria-hidden="true"> </i> Lista Nominal  <span class="subitem"> </a>
                </li>
                <!-- <li>
                  <a href="#"> <i class="fa fa-file-word-o" aria-hidden="true"> </i> Emitir Declaração  <span class="subitem"> </a>
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
                    <li class="img-user img-user-d">   <?php  echo"$getCredential_Nome_Funcionario";  ?>     </li>
                    <li class="img-user"> Secretário (a) | <a href="../../php/logout.php"> Log Out <i class="fa fa-sign-out"></i> </a> </li> 
                  </ul>
              </div>
            </div>

            <!-- Painel Actual em que se encontra o usuario-->
            <div class="grid-x grid-margin-x controle-panel status-panel">
                <h1> Painel do Secretariado </h1>
            </div>


              <form action="../../php/matricula.php" method="POST">
                <div class="grid-container">
                  <div class="grid-x grid-padding-x"> 
                    <div class="small-12 medium-12 cell">
                      <h1> Matrícula do Aluno</h1>
                      <?php
                            @$v = $_GET['valor'];
                            @$s = $_GET['erro'];
                            @$r = $_GET['error'];
                            @$sucesso = $_GET['sucesso'];
                            @$vaga = $_GET['vaga'];
                            if($v){
                              echo "<center> <span class='erro'> ** Todos os campos devem ser preenchidos ** </span> </center>";
                            } elseif ($s) {
                              echo "<center> <span class='erro'> Já existe uma Matrícula com o mesmo Nome ou Identificação </span> </center>";
                            }elseif ($r) {
                              echo "<center> <span class='error'> Já existe uma Aluno com o mesmo Nome ou Identificação </span> </center>";
                            }elseif ($sucesso) {
                              echo "<center> <span class='sucesso'> Aluno Cadastrado </span> </center>";
                            }
                            elseif ($vaga) {
                              echo "<center> <span class='erro'> Infelizmente, não há vagas disponíveis! </span> </center>";
                            }
                      ?>
                    </div>
                    <div class="small-12 medium-12 cell">
                      <h5> Informações do Aluno *</h5>
                    </div>
                    <div class="small-12 medium-10 cell">
                      <label>Nome do Aluno
                        <input type="text" placeholder="Nome Completo" name="nome" >
                      </label>
                    </div>
                    <div class="small-12 medium-2 cell">
                      <label> Sexo
                        <select name="sexo">
                          <option value="M">Masculino</option>
                          <option value="F">Femenino</option>
                        </select>
                      </label>
                    </div>
                    <div class="small-12 medium-6 cell">
                      <label>Filiação
                        <input type="text" placeholder="Filho de..." name="filiacao_primeiro" >
                      </label>
                    </div> 
                    <div class="small-12 medium-6 cell">
                      <label>    &nbsp
                        <input type="text" placeholder="e de..." name="filiacao_segundo" >
                      </label>
                    </div>
                    <div class="small-12 medium-4 cell">
                      <label>Natural de
                        <input type="text" placeholder="Naturalidade" name="naturalidade" >
                      </label>
                    </div> 
                    <div class="small-12 medium-4 cell">
                      <label>Província de
                        <input type="text" placeholder="Província" name="naturalidade_provincia" >
                      </label>
                    </div> 
                    <div class="small-12 medium-4 cell">
                      <label>Nascido aos
                        <input type="date" placeholder="Data de Nascimento" name="dataNasc" >
                      </label>
                    </div>
                    <div class="small-12 medium-6 cell">
                      <label>Portador do BI
                        <input type="text" placeholder="Número de Identificação" name="identificacao" >
                      </label>
                    </div>
                    <div class="small-12 medium-3 cell">
                      <label>Passado pela identificação
                        <input type="text" placeholder="Identificação" name="identificacao_local" >
                      </label>
                    </div>
                    <div class="small-12 medium-3 cell">
                      <label>aos
                        <input type="date" placeholder="dd/mm/AAAA" name="identificacao_data_emissao" >
                      </label>
                    </div>
                    <div class="small-12 medium-12 cell">
                      <h4> Morada E Contacto *</h4>
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
                    <!-- Espacamento entre a morada e os contactos de baixo -->
                        <div class="small-12 medium-12 large-12 cell"></div>
                    
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
                      <h5> Informações do Encarregado *</h5>
                    </div>
                    <div class="small-12 medium-3 cell">
                      <label>Encarregado de Educação
                        <input type="text" placeholder="Encarregado" name="encarregado_nome" >
                      </label>
                    </div>
                    <div class="small-12 medium-3 cell">
                      <label>Profissão
                        <input type="text" placeholder="Profissão" name="encarregado_profissao" >
                      </label>
                    </div>
                    <div class="small-12 medium-3 cell">
                      <label>Local de Serviço
                        <input type="text" placeholder="Local de Serviço" name="encarregado_local_servico" >
                      </label>
                    </div>
                    <div class="small-12 medium-3 cell">
                      <label>Telefone
                        <input type="number" placeholder="Telefone" name="encarregado_telefone" >
                      </label>
                    </div> 
                    <div class="small-12 medium-12 cell">
                      <h5> Matricula *</h5>
                    </div>
                    <div class="small-12 medium-6 cell">
                      <label> Curso a matricular
                        <select name="curso_matricular">
                          <?php foreach ($rowCurso as $rowCurso) : ?> 
                            <option value="<?php echo $rowCurso['Id_Curso']; ?>"> <?php echo $rowCurso['Nome_Curso']; ?> </option>
                          <?php endforeach; ?>
                        </select>
                      </label>
                    </div>
                    
                    <div class="small-12 medium-3 cell">
                      <label> Ano Lectivo
                        <select name="ano_matricular">
                          <?php foreach ($rowAno as $rowAno) : ?> 
                            <option value="<?php echo $rowAno['Id_Ano']; ?>"> <?php echo $rowAno['Nome_Ano']; ?> </option>
                          <?php endforeach; ?>
                        </select>
                      </label>
                    </div>
                    <div class="small-12 medium-3 cell">
                      <label>Matricula Efectuada aos
                        <input type="date" placeholder="Data de Matricula" name="ano_matricula_aplicada" >
                      </label>
                    </div>
                    <div class="small-12 medium-12 cell">
                      <label>
                        <input class="button cell small-12 medium-12 large-12" type="submit" name="submit"/>
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
