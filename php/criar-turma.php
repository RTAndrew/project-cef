<?php

include_once "conexao.php";

$curso = $_POST['curso'];
$ano = $_POST['ano'];
$turno = $_POST['turno'];
$turma = $_POST['turma'];
$capacidade = $_POST['capacidade'];



	if($curso != "" && $ano != "" && $turno != "" && $turma != "" && $capacidade){

		$sqlGetSiglaCurso = mysqli_query($conexao, " SELECT * FROM curso WHERE curso.Id_Curso = '$curso' ");
		while ($line = mysqli_fetch_array($sqlGetSiglaCurso)) {
			$cursoGetSigla = $line['Sigla'];
			$cursoGetId = $line['Id_Curso'];
		}

		$sqlGetNumeroAno = mysqli_query($conexao, " SELECT * from ano where ano.Id_Ano = '$ano' ");
			while ($line = mysqli_fetch_array($sqlGetNumeroAno)) {
				$anoGetNumero = $line['Numero_Ano'];
				$anoGetId = $line['Id_Ano'];
			}

		$concatenacao = $cursoGetSigla.''.$anoGetNumero.''.$turno.'-'.$turma;
		//echo $concatenacao;
		$sqlVerificarTurma = mysqli_query($conexao, " SELECT * FROM turma WHERE Nome_Turma = '$concatenacao' ");
			$registroCountTurma = mysqli_num_rows($sqlVerificarTurma);

			if($registroCountTurma >= 1){
				echo "Já existe uma turma com o mesmo registro";
			} else {

				$inserir = "INSERT INTO turma (Nome_Turma, Capacidade_Turma, Id_Curso, Id_Ano) VALUES ('$concatenacao', '$capacidade', '$curso', '$ano')";
				

					if(mysqli_query($conexao, $inserir)){
						header('Location: ../pages/dir-academico/criar-turma.php?sucesso=1');
					} else {
						echo "Erro ao introduzir na tabela";
					}

			}

	} else {
		header('Location: ../pages/dir-academico/criar-turma.php?valor=1');
	}


	










?>