<?php

include '../conexao.php';


if(isset($_GET['edit_lcd'])){
  $_SESSION['cpf_lcd'] = $_GET['edit_lcd'];

	header('Location: ../cad_locador.php');
}


if(isset($_GET['del_lcd'])){
  $cpf = $_GET['del_lcd'];

  $q = "DELETE FROM locador WHERE cpf_locador='$cpf'";
    mysqli_query($db, $q);
  $_SESSION['message'] = "Excluido com sucesso!";
  header('location: ../adm_locador.php');
}


if(isset($_POST['cad_lcd'])){

if(isset( $_POST['cpf_locador'])){
  $cpf = $_POST['cpf_locador'];
}else{
  $cpf = $_SESSION['cpf_lcd'];
}

  $nome = $_POST['nome_lcd'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $escritura = $_POST['escritura'];
  $data = str_replace("/", "-", $_POST["data"]);
	$data = date('Y-m-d', strtotime($data));

  if(isset($_SESSION['cpf_lcd'])){
    $q = "UPDATE locador SET nome_locador = '{$nome}', email='{$email}', telefone='{$telefone}', escritura='{$escritura}', data_nasc = '{$data}' WHERE cpf_locador = '{$cpf}'";
    mysqli_query($db, $q);
    unset($_SESSION['cpf_lcd']);
  }else{
    $q = "INSERT INTO locador (cpf_locador, nome_locador, email, telefone, escritura, data_nasc) VALUES ('{$cpf}','{$nome}','{$email}','{$telefone}','{$escritura}','{$data}')";
    mysqli_query($db, $q);

  }

  header('location: ../adm_locador.php');




}




 ?>
