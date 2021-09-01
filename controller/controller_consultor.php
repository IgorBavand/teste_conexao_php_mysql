<?php
include '../conexao.php';


if(isset($_GET['edit_c'])){
    $_SESSION['cons'] = $_GET['edit_c'];

      header('Location: ../cad_consultor.php');
  }

if(isset($_GET['del_c'])){

  $cpf = $_GET['del_c'];

	$q = "DELETE FROM consultor WHERE cpf_consultor='$cpf'";
	mysqli_query($db, $q);
	$_SESSION['message'] = "Cancelado com sucesso!";
	header('location: ../adm_consultor.php');

}

if(isset($_POST['cad_c'])){

  if(isset( $_POST['cpf_cons'])){
    $cpf = $_POST['cpf_cons'];
  }else{
    $cpf = $_SESSION['cons'];
  }
    //$cpf = $_POST['cpf_cons'];
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

    if(isset($_SESSION['cons'])){


      $q = "UPDATE consultor SET nome_consultor = '{$nome}', telefone = '{$telefone}', rua = '{$rua}', cep = '{$cep}', cidade = '{$cidade}', imobiliaria_cnpj = '{$i_cnpj}', locatario_cpf = '{$l_cpf}' WHERE consultor.cpf_consultor = '{$cpf}';";
      mysqli_query($db, $q);
      unset($_SESSION['cons']);
      //echo $cpf;

    }else{







      $q = "INSERT INTO consultor (cpf_consultor, nome_consultor, telefone, rua, cep, cidade, imobiliaria_cnpj, locatario_cpf) VALUES ('{$cpf}', '{$nome}', '{$telefone}', '{$rua}', '{$cep}', '{$cidade}', '{$i_cnpj}', '{$l_cpf}');";

      mysqli_query($db, $q);

    }


    header('location: ../adm_consultor.php');
}


?>
