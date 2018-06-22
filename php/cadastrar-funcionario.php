<?php 


include_once "conexao.php";

//Pegar os Dados
	//Dados Pessoais
		$nome = $_POST['nome'];
		$data_nascimento = $_POST['data_nascimento'];
		$identificacao = $_POST['identificacao'];
		$grau_academico = $_POST['grau_academico'];
		$perfil = $_POST['perfil'];
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
		//ORDEM => Id_Funcionario, Id_Login, Nome_Funcionario, Grau, Bi_Funcionario, Data_Nascimento, Email_Funcionario, telefone1, telefone2, rua, bairro, municipio, cidade, provincia, perfil
		if($nome != "" && $data_nascimento != "" && $identificacao != "" && $grau_academico != "" && $rua != "" && $bairro != "" && $municipio != "" && $cidade != "" && $provincia != "" && $telefone1 != ""){

			$sql = mysqli_query($conexao, "SELECT Nome_Funcionario, Bi_Funcionario FROM funcionario WHERE Nome_Funcionario = '$nome' OR Bi_Funcionario = '$identificacao'");
			$registro = mysqli_num_rows($sql);

			//Verificar se ja existe um registro com o mesmo nome
			if ($registro >= 1) {
				
					header('Location: ../pages/dir-geral/cadastrar-funcionario.php?erro=1');

			} else{ //Se não tiver um registro, vai inserir os dados

					$inserir = "INSERT INTO funcionario (Nome_Funcionario, Grau_Academico, Bi_Funcionario, Data_Nascimento, Email_Funcionario, telefone1, rua, bairro, municipio, cidade, provincia, perfil) VALUES ('$nome', '$grau_academico', '$identificacao', '$data_nascimento', '$email', '$telefone1', '$rua', '$bairro', '$municipio', '$cidade', '$provincia', '$perfil')";


					if(mysqli_query($conexao, $inserir)){


						$sql = mysqli_query($conexao, "SELECT Id_Funcionario FROM funcionario WHERE Nome_Funcionario = '$nome'");
							//Pegar o Id do professor cadastrado
							while ($line = mysqli_fetch_array($sql)) {
								$getIdFuncionario = $line['Id_Funcionario'];
							}

							//Inserir os dados na tabela LOGIN
								//O nick name vai ser, por exemplo, func208
								//A password sera o BI
									$login_nickname = 'func'.$getIdFuncionario;
									$login_password = $identificacao;
									$login_perfil = $perfil;	

								$sql = "INSERT INTO login (nickname, password, perfil) VALUES ('$login_nickname','$login_password','$login_perfil')";
									
									if(mysqli_query($conexao, $sql)){



									//Pegar Id_Login do login de acordo com nickname
										$pegar_Id_Login = mysqli_query($conexao, "SELECT Id_Login from login WHERE nickname = '$login_nickname'");
											
											while ($line = mysqli_fetch_array($pegar_Id_Login)) {
												$teste = $line['Id_Login'];
											}


									$alterar = "UPDATE funcionario SET Id_Login = '$teste' WHERE Id_Funcionario = '$getIdFuncionario' ";
									mysqli_query($conexao, $alterar);

									
								} else {
									echo "Erro na porra";
								}

						header('Location: ../pages/dir-geral/cadastrar-funcionario.php?sucesso=1');
					} else{
						echo "Estamos a ter difilcudades técnicas. Tente mais tarde.";
					}
				}

		} else {
			header('Location: ../pages/dir-geral/cadastrar-funcionario.php?valor=1');
		}







?>

