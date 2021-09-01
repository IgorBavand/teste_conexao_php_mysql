<?php
include '../conexao.php';

if(isset($_POST['pes_imovel'])){
//$_POST['pes_imovel'];
 $_SESSION['pes_c'] = $_POST['cidade'];
header('location: ../res_con.php');
}

if(isset($_POST['sec'])){
  $_SESSION['bvalor'] = $_POST['atevalor'];
  header('location: ../b_valor.php');

}

if(isset($_POST['ter'])){
  $_SESSION['bcons'] = $_POST['consultor'];
  header('location: ../b_consultor.php');

}


if (isset($_GET['busca'])) {
  header('location: ../con_imo.php');
}




 ?>
