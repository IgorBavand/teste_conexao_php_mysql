<?php
 include 'conexao.php';
 session_start();

 $select_todas = 'select * from imobiliaria';

 $resultado = mysqli_query($db, $select_todas);

?>


<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>

    <div class="container mt-auto">
      <div class="text-center">
        <h1>Imobiliárias</h1>
      </div>


      <?php if (isset($_SESSION['message'])): ?>

                      <div class="alert alert-success" role="alert">
                          <?php
                          echo $_SESSION['message'];
                          unset($_SESSION['message']);
                          ?>
                  </div>


              <?php endif ?>
              <?php $reg = mysqli_query($db, 'select * from imobiliaria'); ?>

              <p>Quantidade de imobiliarias cadastradas: <?php echo mysqli_num_rows($reg) ?> </p>

              <p><a href="cad_imobiliaria.php" class="btn btn-primary">Cadastrar nova imobiliaria</a></p>
      <table class="table table-striped">
        <thead>
            <tr id="teste">
                              <th>CNPJ</th>
                              <th>Nome</th>
                              <th>Site</th>
                              <th>Telefone</th>
                              <th>Ações</th>

                              <th colspan="2"></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php while ($res = mysqli_fetch_assoc($resultado)) { ?>
                              <tr style="border-style: solid">
                                  <td><?php echo $res['cnpj']; ?></td>
                                  <td><?php echo $res['nome_imobiliaria']; ?></td>
                                  <td><?php echo $res['site']; ?></td>
                                  <td><?php echo $res['telefone']; ?></td>



                                  <td>
                                    <a href="#" class="btn btn-warning">Editar</a>
                                    <a href="./conexao.php?del=<?php echo $res['cnpj'];?>" class="btn btn-danger">Cancelar</a>
                                  </td>
                              </tr>
                          <?php } ?>
                      </tbody>
                  </table>

    </div>


  </body>
</html>
