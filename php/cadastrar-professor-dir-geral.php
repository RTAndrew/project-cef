<?php 


include_once "conexao.php";

//Pegar os Dados
	//Dados Pessoais
		$nome = $_POST['nome'];
		$data_nascimento = $_POST['data_nascimento'];
		$identificacao = $_POST['identificacao'];
		$grau_academico = $_POST['grau_academico'];
	//Endereco
		$rua = $_POST['rua'];
		$bairro = $_POST['bairro'];
		$municipio = $_POST['municipio'];
		$cidade = $_POST['cidade'];
		$provincia = $_POST['provincia'];

	//Telefones - Tabelas diferentes
		$telefone1 = $_POST['primaryTele'];
		$email = $_POST['email'];

	//Saber se os campos estao vazios
		//ORDEM => Id_Professor, Id_Login, Nome_Professor, Grau, Bi_Professor, Data_Nascimento, Email_Professor, telefone1, telefone2, rua, bairro, municipio, cidade, provincia, perfil
		


		// CREATE TABLE professor (Id_Professor int(10) auto_increment primary key, Id_Login int(10) references login(Id_Login), 
		// 			Nome_Professor varchar(40) not null, Grau_Academico varchar(40) not null, Bi_Professor varchar(40) not null,  Data_Nascimento DATE not null,
		// 			Email_Professor varchar(40), telefone1 int(10) not null, rua varchar(40) not null, bairro varchar(40) not null, 
		// 			municipio varchar(40) not null, cidade varchar(40) not null, provincia varchar(40) not null);



		if($nome != "" && $data_nascimento != "" && $identificacao != "" && $grau_academico != "" && $rua != "" && $bairro != "" && $municipio != "" && $cidade != "" && $provincia != "" && $telefone1 != ""){

			$sql = mysqli_query($conexao, "SELECT Nome_Professor, Bi_Professor FROM professor WHERE Nome_Professor = '$nome' OR Bi_Professor = '$identificacao'");
			$registro = mysqli_num_rows($sql);

			//Verificar se ja existe um registro com o mesmo nome
			if ($registro >= 1) {
				
					header('Location: ../pages/dir-geral/cadastrar-professor.php?erro=1');

			} else{ //Se não tiver um registro, vai inserir os dados

					$inserir = "INSERT INTO professor (Nome_Professor, Grau_Academico, Bi_Professor, Data_Nascimento, Email_Professor, telefone1, rua, bairro, municipio, cidade, provincia) VALUES ('$nome', '$grau_academico', '$identificacao', '$data_nascimento', '$email', '$telefone1', '$rua', '$bairro', '$municipio', '$cidade', '$provincia')";


					if(mysqli_query($conexao, $inserir)){


						$sql = mysqli_query($conexao, "SELECT Id_Professor FROM Professor WHERE Nome_Professor = '$nome'");
							//Pegar o Id do professor cadastrado
							while ($line = mysqli_fetch_array($sql)) {
								$getIdProfessor = $line['Id_Professor'];

							}

							//Inserir os dados na tabela LOGIN
								//O nick name vai ser, por exemplo, func208
								//A password sera o BI
									$login_nickname = 'prof'.$getIdProfessor;
									$login_password = $identificacao;
									$login_perfil = 'professor';	

								$sql = "INSERT INTO login (nickname, password, perfil) VALUES ('$login_nickname','$login_password','$login_perfil')";
									
									if(mysqli_query($conexao, $sql)){



									//Pegar Id_Login do login de acordo com nickname
										$pegar_Id_Login = mysqli_query($conexao, "SELECT Id_Login from login WHERE nickname = '$login_nickname'");
											
											while ($line = mysqli_fetch_array($pegar_Id_Login)) {
												$teste = $line['Id_Login'];
											}


									$alterar = "UPDATE professor SET Id_Login = '$teste' WHERE Id_Professor = '$getIdProfessor' ";
									mysqli_query($conexao, $alterar);

									
								} else {
									echo "Erro na porra";
								}

						header('Location: ../pages/dir-geral/cadastrar-professor.php?sucesso=1');
					} else{
						echo "Estamos a ter difilcudades técnicas. Tente mais tarde.";
					}
				}

		} else {
			header('Location: ../pages/dir-geral/cadastrar-professor.php?valor=1');
		}







?>







