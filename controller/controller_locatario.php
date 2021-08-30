<?php
include '../conexao.php';



if(isset($_GET['del_lc'])){
  $cpf = $_GET['del_lc'];

  $q = "DELETE FROM locatario WHERE cpf_locatario='$cpf'";
    mysqli_query($db, $q);
  $_SESSION['message'] = "Excluido com sucesso!";
  header('location: ../adm_locatario.php');
}


if(isset($_GET['edit_lc'])){
	$_SESSION['cpf_lc'] = $_GET['edit_lc'];

	header('Location: ../cad_locatario.php');

}


if(isset($_POST['cad_lc'])){

	$data = str_replace("/", "-", $_POST["data"]);
	$data = date('Y-m-d', strtotime($data));
	$cpf = $_POST['cpf'];
	$nome = $_POST['nome_lc'];
	$telefone = $_POST['telefone'];
	$rua = $_POST['rua'];
	$cep = $_POST['cep'];
	$cidade = $_POST['cidade'];

	if(isset($_SESSION['cpf_lc'])){
		$q = "UPDATE locatario SET nome_locatario = '{$nome}', data_nasc = '{$data}', telefone = '{$telefone}', rua = '{$rua}', cep = '{$cep}', cidade = '{$cidade}' WHERE locatario.cpf_locatario = '000000001';";
		mysqli_query($db, $q);
		unset($_SESSION['cpf_lc']);

	}else{



		$q = "INSERT INTO locatario (cpf_locatario, nome_locatario, data_nasc, telefone, rua, cep, cidade) VALUES ('{$cpf}','{$nome}','{$data}','{$telefone}','{$rua}','{$cep}','{$cidade}')";
		mysqli_query($db, $q);

	}



		header('location: ../adm_locatario.php');

}


 ?>
