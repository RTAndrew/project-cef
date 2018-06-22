<?php

include_once "conexao.php";

//Primeiro Formulario
	$nome_disciplina = $_POST['nome_disciplina'];
	$sigla_disciplina = $_POST['sigla_disciplina'];

//Segundo Formulario
	$Id_Disciplina = $_POST['nome_disciplina_afectar'];
	$Id_Curso = $_POST['curso_afectar'];
	$Id_Ano = $_POST['ano_afectar'];





//Verificar quais dos FORMULARIOS foi clicado

	//Operacoes para o primeiro formulario
	if(isset($_POST["criar_disciplina"])){


		if($nome_disciplina != "" && $sigla_disciplina != ""){

			$sql = mysqli_query($conexao, "SELECT * FROM disciplina WHERE Nome_Disciplina = '$nome_disciplina' AND Sigla = '$sigla_disciplina'");
			$registro = mysqli_num_rows($sql);

			if($registro >= 1){

				header('Location: ../pages/dir-geral/criar-afectar-disciplina.php?erroCD=1');

			} else{

				$inserir = "INSERT INTO disciplina (Nome_Disciplina, Sigla) VALUES ('$nome_disciplina', '$sigla_disciplina')";

					if(mysqli_query($conexao, $inserir)){

						header('Location: ../pages/dir-geral/criar-afectar-disciplina.php?sucessoCD=1');
						
					} else{

						echo "Erro ao Inserir na Disciplina";
					}
			}




		} else{

			header('Location: ../pages/dir-geral/criar-afectar-disciplina.php?valorCD=1');

		}







	//Operacoes para o segundo formulario
	} elseif (isset($_POST["afectar_disciplina_curso"])){




		$sql = mysqli_query($conexao, "SELECT * FROM curso_disciplina WHERE Id_Curso = '$Id_Curso' AND Id_Disciplina = '$Id_Disciplina' AND Id_Ano = '$Id_Ano'");
		$registro = mysqli_num_rows($sql);

		if($registro >= 1){

			header('Location: ../pages/dir-geral/criar-afectar-disciplina.php?erroACD=1');

		} else{


			$sqlGetSiglaCurso = mysqli_query($conexao, "SELECT Sigla FROM curso WHERE Id_Curso = '$Id_Curso'");
			//Pegar a SIGLA do curso para podermos fazer a concatenacao
				while ($line = mysqli_fetch_array($sqlGetSiglaCurso)) {
					$getSiglaCurso = $line['Sigla'];

				}


			$sqlGetSiglaDisciplina = mysqli_query($conexao, "SELECT Sigla FROM disciplina WHERE Id_Disciplina = '$Id_Disciplina'");
			//Pegar a SIGLA da disciplina para podermos fazer a concatenacao
				while ($line = mysqli_fetch_array($sqlGetSiglaDisciplina)) {
					$getSiglaDisciplina = $line['Sigla'];

				}


					$concatenacao = $getSiglaCurso.'-'.$getSiglaDisciplina;

			$inserir = "INSERT INTO curso_disciplina (Id_Curso, Id_Disciplina, Cod_Disciplina, Id_Ano) VALUES ('$Id_Curso', '$Id_Disciplina', '$concatenacao', '$Id_Ano')";

			if( (mysqli_query($conexao, $inserir)) ){
				header('Location: ../pages/dir-geral/criar-afectar-disciplina.php?sucessoACD=1');
			}else{
				echo "Erro ao Inserir relacionar Curso & Disciplina";
			}

		}






	}





















?>