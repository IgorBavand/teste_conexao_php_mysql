<?php

session_start();

$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "alugue_facil";

	//Criar a conexão
	$db = mysqli_connect($servidor, $usuario, $senha, $dbname);


if (isset($_POST['cad_i'])) {



		if(isset($_SESSION['cnpj_i'])){
			$cnpj_i = $_SESSION['cnpj_i'];
			$nome_i = $_POST['nome_imobiliaria'];
			$site_i = $_POST['site_i'];
			$telefone = $_POST['telefone'];
			$query = "UPDATE imobiliaria SET nome_imobiliaria = '{$nome_i}', site_imobiliaria = '{$site_i}', telefone = '{$telefone}' WHERE imobiliaria.cnpj = '{$cnpj_i}'";
			mysqli_query($db, $query);
			unset($_SESSION['cnpj_i']);
			header('Location: ./adm_imobiliaria.php');

		}else{
			try {
				$cnpj = $_POST['cnpj'];
				$nome_i = $_POST['nome_imobiliaria'];
				$site_i = $_POST['site_i'];
				$telefone = $_POST['telefone'];
				$query = "INSERT INTO imobiliaria (cnpj, nome_imobiliaria, site_imobiliaria, telefone) VALUES ('{$cnpj}', '{$nome_i}', '{$site_i}', '{$telefone}')";
				mysqli_query($db, $query);
				header('Location: ./adm_imobiliaria.php');
			} catch (Exception $e) {
				echo 'Exceção: ',  $e->getMessage(), "\n";
			}

		}
	}



if(isset($_GET['edit_i'])){
	$_SESSION['cnpj_i'] = $_GET['edit_i'];

	header('Location: cad_imobiliaria.php');

}

if (isset($_GET['del'])) {
	$cnpj = $_GET['del'];
	//echo $cnpj;
	$q = "DELETE FROM imobiliaria WHERE cnpj='$cnpj'";
		mysqli_query($db, $q);
	$_SESSION['message'] = "Cancelado com sucesso!";
	header('location: ./adm_imobiliaria.php');
}
?>
