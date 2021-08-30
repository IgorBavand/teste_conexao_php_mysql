<?php
include 'conexao.php';


if(isset($_SESSION['cpf_lc'])){
  $r = mysqli_query($db, "SELECT * FROM locatario WHERE cpf_locatario='{$_SESSION['cpf_lc']}'");
  $res = mysqli_fetch_assoc($r);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">




      <form method="post" action="controller/controller_locatario.php">


      <?php if(isset($_SESSION['cpf_lc'])){ ?>

        <div class="form-group">
          <label for="cpf">CPF</label>
          <input required type="text" id="cpf" class="form-control" name="cpf" placeholder="Digite o CPF..." maxlength="30" value="<?php if(isset($_SESSION['cpf_lc'])) echo $res['cpf_locatario'];?>" disabled >
        </div>

        <?php }else{ ?>

          <div class="form-group">
            <label for="cpf">CPF</label>
            <input required type="text" id="cpf" class="form-control" name="cpf" placeholder="Digite o CPF..." maxlength="30" value="<?php if(isset($_SESSION['cpf_lc'])) echo $res['cpf_locatario'];?>" >
          </div>

        <?php } ?>





        <div class="form-group">
          <label for="nome_lc">NOME</label>
          <input type="text" id="nome_lc" name="nome_lc" class="form-control" placeholder="Digite o nome..." value="<?php if(isset($_SESSION['cpf_lc'])) echo $res['nome_locatario'];?>" required>
        </div>

        <div class="form-group">
          <label for="data">DATA DE NASCIMENTO</label>
          <input type="text" name="data" id="data" class="form-control" placeholder="Data..." value="<?php if(isset($_SESSION['cpf_lc'])){

            $data = str_replace("/", "-", $res["data_nasc"]);
            echo date('d/m/Y', strtotime($data));

            }?>" required>
        </div>




        <div class="form-group">
          <label for="telefone">TELEFONE</label>
          <input type="text" id="telefone" class="form-control" name="telefone" placeholder="Digite o telefone..." maxlength="20" value="<?php if(isset($_SESSION['cpf_lc'])) echo $res['telefone'];?>" required>

        </div>



        <div class="form-group">
          <label for="rua">RUA</label>
          <input type="text" id="rua" class="form-control" name="rua" placeholder="Digite a rua..." value="<?php if(isset($_SESSION['cpf_lc'])) echo $res['rua'];?>" required>

        </div>


        <div class="form-group">
          <label for="cep">CEP</label>
          <input type="text" id="cep" class="form-control" name="cep" placeholder="Digite o CEP..." value="<?php if(isset($_SESSION['cpf_lc'])) echo $res['cep'];?>" required>

        </div>


        <div class="form-group">
          <label for="cidade">CIDADE</label>
          <input type="text" id="cidade" class="form-control" name="cidade" placeholder="Digite a cidade..." value="<?php if(isset($_SESSION['cpf_lc'])) echo $res['cidade'];?>" required>

        </div>



        <button type="submit" name="cad_lc" class="btn btn-success">

          <?php
            if(isset($_SESSION['cpf_lc'])){
              echo 'Editar';
            }else{
              echo 'Cadastrar';
            }
          ?>
        </button>

      </form>

    </div>
  </body>
</html>
