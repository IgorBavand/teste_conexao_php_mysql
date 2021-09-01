<?php
include 'conexao.php';


if(isset($_SESSION['id_im'])){
  $r = mysqli_query($db, "SELECT * FROM imovel WHERE id='{$_SESSION['id_im']}'");
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




      <form method="post" action="controller/controller_imovel.php">


      <div class="form-group">

        <div class="form-group w-50">
          <label for="qtq">QUANTIDADE DE QUARTOS</label>
          <input type="text" id="qtq" name="qtq" class="form-control" placeholder="Digite..." value="<?php if(isset($_SESSION['id_im'])) echo $res['qtd_quartos'];?>" required>
        </div>


        <div class="form-group w-50">
          <label for="qtb">QUANTIDADE DE BANHEIROS</label>
          <input type="text" id="qtb" name="qtb" class="form-control" placeholder="Digite..." value="<?php if(isset($_SESSION['id_im'])) echo $res['qtd_banheiros'];?>" required>
        </div>

      </div>


      <div class="form-group w-50">
        <label for="rua">RUA</label>
        <input type="text" id="rua" name="rua" class="form-control" placeholder="Digite..." value="<?php if(isset($_SESSION['id_im'])) echo $res['rua'];?>" required>
      </div>


      <div class="form-group w-50">
        <label for="cep">CEP</label>
        <input type="text" id="cep" name="cep" class="form-control" placeholder="Digite..." value="<?php if(isset($_SESSION['id_im'])) echo $res['cep'];?>" required>
      </div>



      <div class="form-group w-50">
        <label for="qtb">CIDADE</label>
        <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Digite..." value="<?php if(isset($_SESSION['id_im'])) echo $res['cidade'];?>" required>
      </div>




      <div class="form-group w-50">
        <label for="qtb">STATUS</label>
        <select class="form-control" name="st">

          <?php if(isset($_SESSION['id_im'])){ ?>

            <option value="<?php echo $res['status_imovel']?>" selected>
              <?php
                echo $res['status_imovel'];
              ?>
            </option>

          <?php }else{ ?>

            <option value="nao">Selecione</option>

          <?php } ?>

          <option value="alugado">alugado</option>
          <option value="disponivel">disponivel</option>
        </select>
      </div>




      <div class="form-group w-50">
        <label for="qtb">VALOR</label>
        <input type="text" id="valor" name="valor" class="form-control" placeholder="Digite..." value="<?php if(isset($_SESSION['id_im'])) echo $res['valor'];?>" required>
      </div>



      <div class="form-group">
          <label for="i_cnpj"></label>
          <select class="form-control" name="i_cnpj" id="i_cnpj">


            <option value="padrao" selected>
                <?php

                    if(isset($_SESSION['id_im'])){
                        echo $res['imobiliaria_cnpj'];
                    }else{
                        echo "Selecione uma imobiliária";
                    }

                ?>
            </option>

            <?php
            $res_im = mysqli_query($db, "SELECT * FROM imobiliaria");
            while($res_imb = mysqli_fetch_assoc($res_im)){ ?>
                <option value="<?php echo $res_imb['nome_imobiliaria'] ?>"><?php echo $res_imb['nome_imobiliaria'] ?></option>
            <?php } ?>


          </select>
      </div>





      <div class="form-group">

<label for="l_cpf">LOCADOR</label>

  <select name="l_cpf" id="l_cpf" class="form-control">

  <option value="padrao" selected>
      <?php

          if(isset($_SESSION['id_im'])){
              echo $res['locador_cpf'];
          }else{
              echo "Selecione um locador";
          }

      ?>
  </option>

  <?php
  $res_lc = mysqli_query($db, "SELECT * FROM locador");
  while($res_lct = mysqli_fetch_assoc($res_lc)){ ?>
      <option value="<?php echo $res_lct['nome_locador'] ?>"><?php echo $res_lct['nome_locador'] ?></option>
  <?php } ?>
  </select>
</div>





      <div class="form-group w-50">
        <label for="data_r">DATA DA ULTIMA REFORMA</label>
        <input type="text" name="data_r" id="data_r" class="form-control" placeholder="Data..." value="<?php if(isset($_SESSION['id_im'])){

          $data_r = str_replace("/", "-", $res["ult_reforma"]);
          echo date('d/m/Y', strtotime($data_r));

          }?>" required>
      </div>

      <div class="form-group w-50">
        <label for="data_c">DATA DA CONSTRUÇÃO</label>
        <input type="text" name="data_c" id="data_c" class="form-control" placeholder="Data..." value="<?php if(isset($_SESSION['id_im'])){

          $data_c = str_replace("/", "-", $res["construcao_imovel"]);
          echo date('d/m/Y', strtotime($data_c));

          }?>" required>
      </div>
















        <button type="submit" name="cad_im" class="btn btn-success">

          <?php
            if(isset($_SESSION['id_im'])){
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
