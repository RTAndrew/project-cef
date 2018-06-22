<?php

include_once "conexao.php";


//Dados da Matricula
	//Nome e sexo do Aluno
		$nome = $_POST['nome'];

		$sexo = $_POST['sexo'];

	//Nome dos Pais
		$filiacao_primeiro = $_POST['filiacao_primeiro'];

			$filiacao_segundo = $_POST['filiacao_segundo'];

	//Naturalidade do Aluno
		$naturalidade = $_POST['naturalidade'];

			$naturalidade_provincia = $_POST['naturalidade_provincia'];

	//Data de Nascimento do Aluno
		$dataNasc = $_POST['dataNasc'];

	//Informacoes do BI, sendo que o primeiro e o BI, segundo o LOCAL EMITIDO, e o terceiro a DATA DE EMISSO
		$identificacao = $_POST['identificacao'];

			$identificacao_local = $_POST['identificacao_local'];

			$identificacao_data_emissao = $_POST['identificacao_data_emissao'];

	//Endereco atual do Aluno
		$rua = $_POST['rua'];

			$bairro = $_POST['bairro'];

			$municipio = $_POST['municipio'];

			$cidade = $_POST['cidade'];

			$provincia = $_POST['provincia'];

	//Contactos do Aluno
		$primaryTele = $_POST['primaryTele'];

			$email = $_POST['email'];

	//Informacoes do Encarregado
		$encarregado_nome = $_POST['encarregado_nome'];

			$encarregado_profissao = $_POST['encarregado_profissao'];

			$encarregado_local_servico = $_POST['encarregado_local_servico'];

			$encarregado_telefone = $_POST['encarregado_telefone'];

	//Informacoes do curso, sendo que o primeiro e o CURSO que o aluno deseja se matricular, o segundo o ANO, e terceiro a DATA em que a mtricula foi feita
		$curso_matricular = $_POST['curso_matricular'];

			$ano_matricular = $_POST['ano_matricular'];

			$ano_matricula_aplicada = $_POST['ano_matricula_aplicada'];


//Ordem -> Fazer a Matricula 	->		Cadastrar o Encarregado 		->		 Cadastrar Login do Aluno 		->		 Aluno (Id_Login, Id_Matricula) 		->		 Encarregado_Aluno

if($nome != "" && $filiacao_primeiro != "" && $filiacao_segundo != "" && $naturalidade != "" && $naturalidade_provincia != "" && $dataNasc != "" && $identificacao != "" && $identificacao_local != "" && $identificacao_data_emissao != "" && $rua != "" && $bairro != "" && $municipio != "" && $cidade != "" && $provincia != "" && $primaryTele != "" && $encarregado_nome != "" && $encarregado_profissao != "" && $encarregado_telefone != "" && $curso_matricular != "" && $ano_matricular != "" && $ano_matricula_aplicada != "")
{

	$sql = mysqli_query($conexao, "SELECT Nome_Aluno, Bi_Aluno FROM matricula WHERE Nome_Aluno = '$nome' OR Bi_Aluno = '$identificacao'");
	$registro = mysqli_num_rows($sql);

	//Verificar se ja existe um registro com a mesma matricula
	if ($registro >= 1) {
			
			header('Location: ../pages/dir-geral/matricula.php?erro=1');

	} else { //Se não tiver um registro, vai inserir os dados



		//Pegar contar o registo de alunos para verificar se TAMBEM EXISTE um mesmo Aluno
			$sqlCountAluno = mysqli_query($conexao, "SELECT Nome_Aluno, Bi_Aluno FROM aluno WHERE Nome_Aluno = '$nome'");
			$registroCountAluno = mysqli_num_rows($sqlCountAluno);

			if ($registroCountAluno >= 1){
				header('Location: ../pages/dir-geral/matricula.php?error=1');
			} else {


					//Espaco para o Algoritmo para encontrar uma turma disponivel
					//Query para consultar o ID_CURSO e ID_ANO da tabela turma de acordo com a matricula




					$sqlQuery = "SELECT * FROM turma WHERE Id_Curso = '$curso_matricular' AND Id_Ano = '$ano_matricular'";
					

		            $r = mysqli_query($conexao, $sqlQuery);
		            $rowQuery = mysqli_fetch_all($r, MYSQLI_ASSOC);
		            mysqli_free_result($r);

		            $getIdTurmaCadastrar = 0;
						
						foreach ($rowQuery as $rowQuery) {
							//Pegar a capacidade do array
							$getRowIdTurma = $rowQuery['Id_Turma'];
							$getRowCapacidade = $rowQuery['Capacidade_Turma'];

							$sqlQueryAluno = mysqli_query($conexao, "select * from aluno WHERE Id_Turma = '$getRowIdTurma'");
							$count = mysqli_num_rows($sqlQueryAluno);

							if($count < $getRowCapacidade){
								$getIdTurmaCadastrar = $rowQuery['Id_Turma'];
								break;
							}

							
						}

					if($getIdTurmaCadastrar == 0){
						header('Location: ../pages/dir-geral/matricula.php?vaga=1');
						//echo "As vagas foram todas esgotadas";
					} else {


					// CREATE TABLE matricula (Id_Matricula int(10) auto_increment primary key, Nome_Aluno varchar(40) not null, 
					// 	Filiacao_Primeiro varchar(40) not null, Filiacao_Segundo varchar(40) not null, Naturalidade varchar(40) not null, 
					// 	Provincia varchar(40) not null, Data_Nascimento Date not null,  Bi_Aluno varchar(40) not null, 
					// 	Identificacao_Bi varchar(40) not null, Identificacao_Bi_Data DATE not null, Id_Curso int(10) references curso(Id_Curso), Id_Ano int(10) references ano(Id_Ano));

					//Inserir os dados na matricula
						$inserirMatricula = "INSERT INTO matricula (Nome_Aluno, Sexo_Aluno, Filiacao_Primeiro, Filiacao_Segundo, Naturalidade, Provincia, Data_Nascimento, Bi_Aluno, Identificacao_Bi, Identificacao_Bi_Data, Id_Curso, Id_Ano) VALUES ('$nome', '$sexo', '$filiacao_primeiro', '$filiacao_segundo', '$naturalidade', '$naturalidade_provincia', '$dataNasc', '$identificacao', '$identificacao_local', '$identificacao_data_emissao', '$curso_matricular', '$ano_matricular')";


					if(mysqli_query($conexao, $inserirMatricula)){

						// CREATE TABLE encarregado (Id_Encarregado int(10) auto_increment primary key, Nome_Encarregado varchar(40) not null, Profissao varchar(40) not null, 
						// Local_Profissao varchar(40), telefone int(10) not null, Id_Curso int(10) references curso(Id_Curso), Id_Ano int(10) references ano(Id_Ano));
						
						//Inserir dados do encarregado
						$inserirEncarregado = "INSERT INTO encarregado (Nome_Encarregado, Profissao, Local_Profissao, telefone) VALUES ('$encarregado_nome', '$encarregado_profissao', '$encarregado_local_servico', '$encarregado_telefone')";

						if(mysqli_query($conexao, $inserirEncarregado)){

						// 	CREATE TABLE aluno (Id_Aluno int(10) auto_increment primary key, Id_Login int(10) references login(Id_Login), Id_Matricula int(10) references matricula (Id_Matricula),
						// Id_Turma int(10) references turma(Id_Turma), Nome_Aluno varchar(40) not null, Sexo_Aluno varchar(20) not null, Bi_Aluno varchar(40) not null,  
						// Data_Nascimento DATE not null, Email_Aluno varchar(40), telefone1 int(10) not null, rua varchar(40) not null, bairro varchar(40) not null, 
						// municipio varchar(40) not null, cidade varchar(40) not null, provincia varchar(40) not null);

							//Pegar o ID da matricula que acabou de ser feito
								$sqlGetId_Matricula = mysqli_query($conexao, "SELECT Id_Matricula FROM matricula WHERE Nome_Aluno = '$nome'");
								while ($line = mysqli_fetch_array($sqlGetId_Matricula)) {
									$getIdMatricula = $line['Id_Matricula'];
								}
							//Inserir o ALUNO junto com o seu ID de Matricula
							$inserirAluno = "INSERT INTO aluno (Id_Matricula, Id_Turma, Nome_Aluno, Sexo_Aluno, Bi_Aluno, Data_Nascimento, Email_Aluno, telefone1, rua, bairro, municipio, cidade, provincia) VALUES ('$getIdMatricula', '$getIdTurmaCadastrar' ,'$nome', '$sexo', '$identificacao', '$dataNasc', '$email', '$primaryTele', '$rua', '$bairro', '$municipio', '$cidade', '$provincia')";

							if(mysqli_query($conexao, $inserirAluno)){

								//Pegar o ID do Aluno que acabou de ser feito
									$sqlGetIdAluno = mysqli_query($conexao, "SELECT Id_Aluno FROM aluno WHERE Nome_Aluno = '$nome'");
									while ($line = mysqli_fetch_array($sqlGetIdAluno)) {
										$getIdAluno = $line['Id_Aluno'];
									}

									//Fazer a manipulacao de dados para fazer a INSERCAO no LOGIN
										$login_nickname = 'aluno'.$getIdAluno;
										$login_password = $identificacao;
										$login_perfil = "aluno";	

									$inserirLogin = "INSERT INTO login (nickname, password, perfil) VALUES ('$login_nickname','$login_password','$login_perfil')";
		//Ordem -> Fazer a Matricula 	->		Cadastrar o Encarregado 		->		 Cadastrar Login do Aluno 		->		 Aluno (Id_Login, Id_Matricula) 		->		 Encarregado_Aluno									










								//Fazer as INSERCOES de avaliacao de acordo com o Curso e Ano

								$sqlQueryCursoDisciplina = "SELECT Id_Curso_Disciplina from curso_disciplina where Id_Curso = '$curso_matricular' AND Id_Ano = '$ano_matricular'";

								$r = mysqli_query($conexao, $sqlQueryCursoDisciplina);
					            $rowQueryCursoDisciplina = mysqli_fetch_all($r, MYSQLI_ASSOC);
					            mysqli_free_result($r);
									
									foreach ($rowQueryCursoDisciplina as $rowQueryCursoDisciplina) {
										//Pegar o Id_Curso_Disciplina
										$getRowIdCursoDisciplina = $rowQueryCursoDisciplina['Id_Curso_Disciplina'];

										//Ja foi pegue o Id_Aluno acabado de ser cadastrado --->>> Ver o codigo acima
										$sqlInsertAvaliacoes = " INSERT INTO avaliacao (Id_Aluno, Id_Curso_Disciplina) VALUES ('$getIdAluno', '$getRowIdCursoDisciplina') ";

										$inserirAvaliacao = mysqli_query($conexao, $sqlInsertAvaliacoes);
									}

							










									if(mysqli_query($conexao, $inserirLogin)){

										//Pegar o Id_Login que acabou de ser feito
											$pegar_Id_Login = mysqli_query($conexao, "SELECT Id_Login from login WHERE nickname = '$login_nickname'");
											
											while ($line = mysqli_fetch_array($pegar_Id_Login)) {
												$teste = $line['Id_Login'];
											}
										//Fazer o Update do ID no Aluno
											$alterar = "UPDATE aluno SET Id_Login = '$teste' WHERE Id_Aluno = '$getIdAluno'";
											mysqli_query($conexao, $alterar);

											if(mysqli_query($conexao, $alterar)){

												//Inserir na tabela ENCARREGADO_ALUNO
													$inserirEncarregadoAluno = "INSERT INTO encarregado_aluno (Id_Encarregado, Id_Aluno) VALUES ('$getIdMatricula', '$getIdAluno')";
												
												if (mysqli_query($conexao, $inserirEncarregadoAluno)){

												} else {
													echo "Erro ao introduzir na table ENCARREGADO_ALUNO";
												}

											} else {
												echo "Erro ao alterar os dados do Aluno";
											}

									} else {
										echo "Erro ao inserir no Login";
									}

							} else{
								echo "Erro ao inserir no aluno";
							}

						} else{
							echo "Houve um erro ao inserir dados na tabela do encarregado";
						}
						echo "<center>";

						echo "<h5> Redirecionamento dentro de 10 segundos <h5>";
						
						echo "<h1> Dados de Login do Sistema <h1>";
						
						echo "<br> <br> <br> ";

						echo "Nickname: "; echo $login_nickname;
						
						echo "<br> ";

						echo "Password "; echo $login_password;

						echo "</center>";
						
						header('refresh: 10; url=../pages/dir-geral/matricula.php?sucesso=1'); 
						//header('Location: ../pages/dir-geral/matricula.php?sucesso=1');
					} else{
						echo "Erro ao Inserir a Matricula";
						//echo "Estamos a ter difilcudades técnicas. Tente mais tarde.";
					}

					}




					
				}
			}
} else {
	echo "<center>";

	echo "</center>";

	//header('refresh: 0; url=../pages/dir-geral/matricula.php?valor=1'); 
	 header('Location: ../pages/dir-geral/matricula.php?valor=1');
}

//Criar tabela Matricula
			// CREATE TABLE matricula (Id_Matricula int(10) auto_increment primary key, Nome_Aluno varchar(40) not null, 
			// 	Filiacao_Primeiro varchar(40) not null, Filiacao_Segundo varchar(40) not null, Naturalidade varchar(40) not null, 
			// 	Provincia varchar(40) not null, Data_Nascimento Date not null,  Bi_Aluno varchar(40) not null, 
			// 	Identificacao_Bi varchar(40) not null, Identificacao_Bi_Data DATE not null, Id_Curso int(10) references curso(Id_Curso), Id_Ano int(10) references ano(Id_Ano));




// --Criar tabela Aluno
			// 	CREATE TABLE aluno (Id_Aluno int(10) auto_increment primary key, Id_Login int(10) references login(Id_Login), Id_Matricula int(10) references matricula (Id_Matricula),
			// 		Id_Turma int(10) references turma(Id_Turma), Nome_Aluno varchar(40) not null, Sexo_Aluno varchar(20) not null, Bi_Aluno varchar(40) not null,  
			// 		Data_Nascimento DATE not null, Email_Aluno varchar(40), telefone1 int(10) not null, rua varchar(40) not null, bairro varchar(40) not null, 
			// 		municipio varchar(40) not null, cidade varchar(40) not null, provincia varchar(40) not null);





// 	--Criar table Encarregado
			// 	CREATE TABLE encarregado (Id_Encarregado int(10) auto_increment primary key, Nome_Encarregado varchar(40) not null, Profissao varchar(40) not null, 
			// 		Local_Profissao varchar(40) not null, telefone int(10));
			// 	--Criar table Encarregado
			// 	CREATE TABLE encarregado_aluno (Id_Encarregado_Aluno int(10) auto_increment, Id_Encarregado int(10) references encarregado(Id_Encarregado), Id_Aluno int(10)
			// 		references aluno(Id_Aluno), primary key (Id_Encarregado_Aluno, Id_Encarregado, Id_Aluno));







?>