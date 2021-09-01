<?php
 include 'conexao.php';


 $select_todas = 'select * from imobiliaria';

 $resultado = mysqli_query($db, $select_todas);

?>


<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <style>
      .texto{
    text-align: center;
}
.bc
{
background-image: url('img/fundo.jpg');
background-repeat: no-repeat;
background-size:100%;
bottom: 0;
color: black;
left: 0;
overflow: auto;
padding: 3em;
position: absolute;
right: 0;
text-align: center;
top: 0;
background-size: cover;
}
    </style>
  </head>
  <body class="bc">

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


                <div class="row d-flex justify-content-center alert alert-primary" >
                <p class="font-weight-bold">Quantidade de imobiliarias cadastradas: <?php echo mysqli_num_rows($reg) ?> </p>
                </div>
                <div class="row d-flex justify-content-center">
                <p><a href="cad_imobiliaria.php" class="btn btn-primary">Cadastrar nova imobiliaria</a></p>
                <p><a class="btn btn-secondary ml-3" href="index.php">Home</a></p>



              </div>


      <table class="table table-dark">
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
                                  <td><?php echo $res['site_imobiliaria']; ?></td>
                                  <td><?php echo $res['telefone']; ?></td>



                                  <td>
                                    <a href="./conexao.php?edit_i=<?php echo $res['cnpj'];?>" class="btn btn-warning">Editar</a>
                                    <a href="./conexao.php?del=<?php echo $res['cnpj'];?>" class="btn btn-danger">Cancelar</a>
                                  </td>
                              </tr>
                          <?php } ?>
                      </tbody>
                  </table>

    </div>


  </body>
</html>
