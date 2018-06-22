<?php
include_once "conexao.php";

$nickname = $_POST['nickname'];
$password = $_POST['password'];

if ($nickname != "" && $password != ""){

	$sql = mysqli_query($conexao, "SELECT * FROM login WHERE nickname = '$nickname'");
	$registro = mysqli_num_rows($sql);

	while ($line = mysqli_fetch_array($sql)) {
			$id = $line['Id_Login'];
			$senha_user = $line['password'];
			$perfil_user = $line['perfil'];
	}

	if ($registro) {
		if ($senha_user == $password) {
			//Guardar a sessao
				session_start();
				$_SESSION['id_login'] = $id;
				$_SESSION['login'] = $nickname;
				$_SESSION['password'] = $password;
				$_SESSION['perfil'] = $perfil_user;

			if($perfil_user == "aluno"){
				header("Location: ../painel-aluno");
			}
			elseif ($perfil_user == "professor") {
				header("Location: ../painel-professor");
			} 
			elseif ($perfil_user == "secretaria") {
				header("Location: ../painel-secretaria");
			}
			elseif ($perfil_user == "director academico") {
				header("Location: ../painel-diretor-academico");
			}
			elseif ($perfil_user == "director geral" OR $perfil_user == "administrador" ) {
				header("Location: ../painel-geral");
			}
		} else {
			//echo "Senha ou Nickname Incorreto";
			header('Location: ../login.php?erro=1');
		}

	} else{
		header('Location: ../login.php?erro=1');
		//echo "Senha ou Nickname Incorreto";
		//echo "<center> Estamos a ter problemas internos. <br> Caso o erro persista, por favor entre em contacto connosco. </center>";
	}
} else {
	header('Location: ../login.php?valor=1');
}
