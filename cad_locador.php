<?php
include 'conexao.php';


if(isset($_SESSION['cpf_lcd'])){
  $r = mysqli_query($db, "SELECT * FROM dor WHERE cpf_locador='{$_SESSION['cpf_lcd']}'");
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




      <form method="post" action="controller/controller_locador.php">


      <?php if(isset($_SESSION['cpf_lcd'])){ ?>

        <div class="form-group">
          <label for="cpf">CPF</label>
          <input required type="text" id="cpf" class="form-control" name="cpf" placeholder="Digite o CPF..." maxlength="30" value="<?php if(isset($_SESSION['cpf_lcd'])) echo $res['cpf_locador'];?>" disabled >
        </div>

        <?php }else{ ?>

          <div class="form-group">
            <label for="cpf">CPF</label>
            <input required type="text" id="cpf" class="form-control" name="cpf" placeholder="Digite o CPF..." maxlength="30" value="<?php if(isset($_SESSION['cpf_lcd'])) echo $res['cpf_locador'];?>" >
          </div>

        <?php } ?>





        <div class="form-group">
          <label for="nome_lc">NOME</label>
          <input type="text" id="nome_lc" name="nome_lc" class="form-control" placeholder="Digite o nome..." value="<?php if(isset($_SESSION['cpf_lcd'])) echo $res['nome_locador'];?>" required>
        </div>

        <div class="form-group">
          <label for="data">EMAIL DO LOCADOR</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="E-mail..." value="<?php if(isset($_SESSION['cpf_lcd'])){

            echo $res['email'];

            }?>" required>
        </div>




        <div class="form-group">
          <label for="telefone">TELEFONE</label>
          <input type="text" id="telefone" class="form-control" name="telefone" placeholder="Digite o telefone..." maxlength="20" value="<?php if(isset($_SESSION['cpf_lcd'])) echo $res['telefone'];?>" required>

        </div>



        <div class="form-group">
          <label for="rua">ESCRITURA</label>
          <input type="text" id="escritura" class="form-control" name="escritura" placeholder="Digite a escritura..." value="<?php if(isset($_SESSION['cpf_lcd'])) echo $res['escritura'];?>" required>

        </div>



        <div class="form-group">
          <label for="data">DATA DE NASCIMENTO</label>
          <input type="text" name="data" id="data" class="form-control" placeholder="Data..." value="<?php if(isset($_SESSION['cpf_lcd'])){

            $data = str_replace("/", "-", $res["data_nasc"]);
            echo date('d/m/Y', strtotime($data));

            }?>" required>
        </div>






        <button type="submit" name="cad_lcd" class="btn btn-success">

          <?php
            if(isset($_SESSION['cpf_lcd'])){
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
