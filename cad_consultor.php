<?php
include 'conexao.php';


if(isset($_SESSION['cons'])){
  $r = mysqli_query($db, "SELECT * FROM consultor WHERE cpf_consultor='{$_SESSION['cons']}'");
  $res = mysqli_fetch_assoc($r);
}



$q_i = "SELECT * FROM imobiliaria";

$q_l = "SELECT * FROM locatario";
$res_im = mysqli_query($db, $q_i);
$res_lc = mysqli_query($db, $q_l); 


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




      <form method="post" action="controller/controller_consultor.php">


      <?php if(isset($_SESSION['cons'])){ ?>

        <div class="form-group">
          <label for="cpf_locador">CPF</label>
          <input required type="text" id="cpf_cons" class="form-control" name="cpf_cons" placeholder="Digite o CPF..." maxlength="30" value="<?php if(isset($_SESSION['cons'])) echo $res['cpf_consultor'];?>" disabled >
        </div>

        <?php }else{ ?>

          <div class="form-group">
            <label for="cpf_locador">CPF</label>
            <input required type="text" id="cpf_cons" class="form-control" name="cpf_cons" placeholder="Digite o CPF..." maxlength="30" value="<?php if(isset($_SESSION['cons'])) echo $res['cpf_consultor'];?>" >
          </div>

        <?php } ?>





        <div class="form-group">
          <label for="nome_lc">NOME</label>
          <input type="text" id="nome_cons" name="nome_cons" class="form-control" placeholder="Digite o nome..." value="<?php if(isset($_SESSION['cons'])) echo $res['nome_consultor'];?>" required>
        </div>


        <div class="form-group">
          <label for="telefone">TELEFONE</label>
          <input type="text" id="telefone" class="form-control" name="telefone" placeholder="Digite o telefone..." maxlength="20" value="<?php if(isset($_SESSION['cons'])) echo $res['telefone'];?>" required>

        </div>


        <div class="form-group">
          <label for="data">RUA</label>
          <input type="text" name="rua" id="rua" class="form-control" placeholder="Digite a rua..." value="<?php if(isset($_SESSION['cons'])){

            echo $res['rua'];

            }?>" required>
        </div>




    

        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" name="teste" class="form-control" id="cep" placeholder="Digite o CEP..." value="<?php if(isset($_SESSION['cons'])) echo $res['cep'];?>">
        </div>



        <div class="form-group">
          <label for="data">CIDADE</label>
          <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Digite a cidade..." value="<?php if(isset($_SESSION['cons'])){

echo $res['cidade'];
            }?>" required>
        </div>


        <div class="form-group">

        <label for="i_cnpj">IMOBILIÁRIA</label>
            
            <select name="i_cnpj" id="i_cnpj" class="form-control">

            <option value="padrao" selected>
                <?php

                    if(isset($_SESSION['cons'])){
                        echo $res['imobiliaria_cnpj'];
                    }else{
                        echo "Selecione uma imobiliária";
                    }
                    
                ?>
            </option>

            <?php while($res_imb = mysqli_fetch_assoc($res_im)){ ?>
                <option value="<?php echo $res_imb['nome_imobiliaria'] ?>"><?php echo $res_imb['nome_imobiliaria'] ?></option>
            <?php } ?>
            </select>
        </div>


        <div class="form-group">

<label for="l_cpf">LOCATÁRIO</label>
    
    <select name="l_cpf" id="l_cpf" class="form-control">

    <option value="padrao" selected>
        <?php

            if(isset($_SESSION['cons'])){
                echo $res['locatario_cpf'];
            }else{
                echo "Selecione um locatário";
            }
            
        ?>
    </option>

    <?php while($res_lct = mysqli_fetch_assoc($res_lc)){ ?>
        <option value="<?php echo $res_lct['nome_locatario'] ?>"><?php echo $res_lct['nome_locatario'] ?></option>
    <?php } ?>
    </select>
</div>






        <button type="submit" name="cad_c" class="btn btn-success">

          <?php
            if(isset($_SESSION['cons'])){
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
