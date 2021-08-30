<?php
 include 'conexao.php';


 $select_todas = 'select * from locador';

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
              <?php $reg = mysqli_query($db, 'select * from locador'); ?>


                <div class="row d-flex justify-content-center alert alert-primary" >
                <p class="font-weight-bold">Quantidade de locadores cadastrados: <?php echo mysqli_num_rows($reg) ?> </p>
                </div>
                <div class="row d-flex justify-content-center">
                <p><a href="cad_locador.php" class="btn btn-primary">Cadastrar novo locador</a></p>



              </div>


      <table class="table table-dark">
        <thead>
            <tr id="teste">
                              <th>CPF</th>
                              <th>Nome</th>
                              <th>Email</th>
                              <th>Telefone</th>
                              <th>Escritura</th>
                              <th>Data de nascimento</th>
                              <th>Ações</th>

                              <th colspan="2"></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php while ($res = mysqli_fetch_assoc($resultado)) { ?>
                              <tr style="border-style: solid">
                                  <td><?php echo $res['cpf_locador']; ?></td>
                                  <td><?php echo $res['nome_locador']; ?></td>
                                  <td><?php echo $res['email']; ?></td>
                                  <td><?php echo $res['telefone']; ?></td>
                                  <td><?php echo $res['escritura']; ?></td>
                                  <td><?php echo $res['data_nasc']; ?></td>



                                  <td>
                                    <a href="./controller/controller_locador.php?edit_lcd=<?php echo $res['cpf_locador'];?>" class="btn btn-warning">Editar</a>
                                    <a href="./controller/controller_locador.php?del_lcd=<?php echo $res['cpf_locador'];?>" class="btn btn-danger">Cancelar</a>
                                  </td>
                              </tr>
                          <?php } ?>
                      </tbody>
                  </table>

    </div>


  </body>
</html>
