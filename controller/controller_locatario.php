<?php
include '../conexao.php';

if(isset($_GET['edit_lc'])){
	echo $_GET['edit_lc'];
}


if(isset($_GET['del_lc'])){
  $cpf = $_GET['del_lc'];

  $q = "DELETE FROM locatario WHERE cpf_locatario='$cpf'";
    mysqli_query($db, $q);
  $_SESSION['message'] = "Excluido com sucesso!";
  header('location: ../adm_locatario.php');
}

if(isset($_POST['cad_lc'])){
	echo "deu certo";
}


 ?>
