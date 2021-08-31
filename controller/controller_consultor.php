<?php
include '../conexao.php';


if(isset($_GET['edit_c'])){
    $_SESSION['cons'] = $_GET['edit_c'];
  
      header('Location: ../cad_consultor.php');
  }

if(isset($_POST['cad_c'])){
    $cpf = $_POST['cpf_cons'];
    $nome = $_POST['nome_cons'];
    $telefone = $_POST['telefone'];
    $rua = $_POST['rua'];
    $cep = $_POST['teste'];
    $cidade = $_POST['cidade'];
    $i_cnpj_c = $_POST['i_cnpj'];
    $l_cpf_c = $_POST['l_cpf'];

    $i_r = mysqli_query($db, "SELECT * FROM imobiliaria WHERE nome_imobiliaria='{$i_cnpj_c}'");
    $l_r = mysqli_query($db, "SELECT * FROM locatario WHERE nome_locatario='{$l_cpf_c}'");

    $i_cnpj = "";
    $l_cpf = "";
    while($aux = mysqli_fetch_assoc($i_r)){
        $i_cnpj = $aux['cnpj'];
    }
    while($aux = mysqli_fetch_assoc($l_r)){
        $l_cpf = $aux['cpf_locatario'];
    }

    

    $q = "INSERT INTO consultor (cpf_consultor, nome_consultor, telefone, rua, cep, cidade, imobiliaria_cnpj, locatario_cpf) VALUES ('{$cpf}', '{$nome}', '{$telefone}', '{$rua}', '{$cep}', '{$cidade}', '{$i_cnpj}', '{$l_cpf}');";

    mysqli_query($db, $q);
    header('location: ../adm_consultor.php');
}


?>