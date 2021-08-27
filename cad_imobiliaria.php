<?php
include 'conexao.php';


if(isset($_SESSION['cnpj_i'])){
  $r = mysqli_query($db, "SELECT * FROM imobiliaria WHERE cnpj='{$_SESSION['cnpj_i']}'");
  $res = mysqli_fetch_assoc($r);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>

  
    <form method="post" action="conexao.php">


    <?php if(isset($_SESSION['cnpj_i'])){ ?>

      <div class="form-group">
        <label for="cnpj">CNPJ</label>
        <input required type="text" id="cnpj" class="form-group" name="cnpj" placeholder="Digite o CNPJ..." maxlength="30" value="<?php if(isset($_SESSION['cnpj_i'])) echo $res['cnpj'];?>" disabled >
      </div>

      <?php }else{ ?>

        <div class="form-group">
        <label for="cnpj">CNPJ</label>
        <input type="text" id="cnpj" class="form-group" name="cnpj" placeholder="Digite o CNPJ..." maxlength="30" value="<?php if(isset($_SESSION['cnpj_i'])) echo $res['cnpj'];?>" required>
      </div>

      <?php } ?> 

      <div class="form-group">
        <label for="nome_i">NOME</label>
        <input type="text" id="nome_i" name="nome_imobiliaria" placeholder="Digite o nome..." value="<?php if(isset($_SESSION['cnpj_i'])) echo $res['nome_imobiliaria'];?>" required>
      </div>

      <div class="form-group">
        <label for="site">SITE</label>
        <input type="text" name="site_i" id="site" placeholder="Digite o site..." value="<?php if(isset($_SESSION['cnpj_i'])) echo $res['site_imobiliaria'];?>" required>
      </div>

      <div class="form-group">
        <label for="telefone">TELEFONE</label>
        <input type="text" id="telefone" name="telefone" placeholder="Digite o telefone..." maxlength="20" value="<?php if(isset($_SESSION['cnpj_i'])) echo $res['telefone'];?>" required>

      </div>

      <button type="submit" name="cad_i" class="btn-btn-success">

        <?php 
          if(isset($_SESSION['cnpj_i'])){
            echo 'Editar';
          }else{
            echo 'Cadastrar';
          }  
        ?>


      </button>

    </form>
  </body>
</html>
