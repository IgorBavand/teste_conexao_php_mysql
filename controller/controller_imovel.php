<?php
include '../conexao.php';

if(isset($_POST['cad_im'])){
    $qtq = $_POST['qtq'];
    $qtb = $_POST['qtb'];
    $rua = $_POST['rua'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $st = $_POST['st'];
    $valor = $_POST['valor'];

    $i_cnpj_c = $_POST['i_cnpj'];

   $l_cpf_c = $_POST['l_cpf'];


    $i_r = mysqli_query($db, "SELECT * FROM imobiliaria WHERE nome_imobiliaria='{$i_cnpj_c}'");
    $l_r = mysqli_query($db, "SELECT * FROM locador WHERE nome_locador='{$l_cpf_c}'");
    $i_cnpj = "";
    $l_cpf = "";

    while($aux = mysqli_fetch_assoc($i_r)){
        $i_cnpj = $aux['cnpj'];
    }
    while($aux = mysqli_fetch_assoc($l_r)){
        $l_cpf = $aux['cpf_locador'];
    }


    $data_r = str_replace("/", "-", $_POST["data_r"]);
  	$data_r = date('Y-m-d', strtotime($data_r));

    $data_c = str_replace("/", "-", $_POST["data_c"]);
  	$data_c = date('Y-m-d', strtotime($data_c));

    if(isset($_SESSION['id_im'])){
      $id = $_SESSION['id_im'];
$q = "UPDATE imovel SET qtd_quartos = '{$qtq}', qtd_banheiros = '{$qtb}', rua = '{$rua}', status_imovel = '{$st}', valor = '{$valor}', imobiliaria_cnpj = '{$i_cnpj}', locador_cpf = '{$l_cpf}',  WHERE imovel.id = '{$id}';";


      mysqli_query($db, $q);
      unset($_SESSION['id_im']);

    }else{
      $q = "INSERT INTO imovel (qtd_quartos, qtd_banheiros, rua, cep, cidade, status_imovel, valor, imobiliaria_cnpj, locador_cpf, ult_reforma, construcao_imovel) VALUES ('{$qtq}', '{$qtb}', '{$rua}', '{$cep}', '{$cidade}', '{$st}', '{$valor}', '{$i_cnpj}', '{$l_cpf}', '{$data_r}', '{$data_c}');";
      mysqli_query($db, $q);
    }


    header('location: ../adm_imovel.php');



}


if(isset($_GET['edit_imovel'])){
    $_SESSION['id_im'] = $_GET['edit_imovel'];

      header('Location: ../cad_imovel.php');
  }


if(isset($_GET['del_imovel'])){
  $id = $_GET['del_imovel'];

  $q = "DELETE FROM imovel WHERE id='$id'";
    mysqli_query($db, $q);
  $_SESSION['message'] = "Excluido com sucesso!";
  header('location: ../adm_imovel.php');
}










 ?>
