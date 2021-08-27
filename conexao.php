<?php

session_start();

$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "alugue_facil";

	//Criar a conexão
	$db = mysqli_connect($servidor, $usuario, $senha, $dbname);


if (isset($_POST['cad_i'])) {
		$cnpj = $_POST['cnpj'];
		$nome_i = $_POST['nome_imobiliaria'];
		$site = $_POST['site'];
		$telefone = $_POST['telefone'];

		$q = "INSERT INTO imobiliaria (cnpj, nome_imobiliaria, site, telefone) VALUES ('$cnpj', '$nome_i', '$site', $telefone)";

		mysqli_query($db, $q);


		header('Location: ./adm_imobiliaria.php');



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
