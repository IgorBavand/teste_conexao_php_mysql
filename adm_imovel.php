<?php
 include 'conexao.php';


 $select_todas = 'select * from imovel';

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
        <h1>Imóveis</h1>
      </div>


      <?php if (isset($_SESSION['message'])): ?>

                      <div class="alert alert-success" role="alert">
                          <?php
                          echo $_SESSION['message'];
                          unset($_SESSION['message']);
                          ?>
                  </div>


              <?php endif ?>
              <?php $reg = mysqli_query($db, 'select * from imovel'); ?>


                <div class="row d-flex justify-content-center alert alert-primary" >
                <p class="font-weight-bold">Quantidade de imóveis cadastrados: <?php echo mysqli_num_rows($reg) ?> </p>
                </div>
                <div class="row d-flex justify-content-center">
                <p><a href="cad_imovel.php" class="btn btn-primary">Cadastrar novo imóvel</a></p>
                <p><a class="btn btn-secondary ml-3" href="index.php">Home</a></p>




              </div>


      <table class="table table-dark">
        <thead>
            <tr id="teste">
                              <th>Qt_quartos</th>
                              <th>Qt_banheiros</th>
                              <th>Rua</th>
                              <th>CEP</th>
                              <th>Cidade</th>
                              <th>Status</th>
                              <th>Valor</th>
                              <th>Locador</th>
                              <th>Imobiliaria</th>
                              <th>Ultima reforma</th>
                              <th>Construção</th>

                              <th>Ações</th>

                              <th colspan="2"></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php while ($res = mysqli_fetch_assoc($resultado)) { ?>
                              <tr style="border-style: solid">
                                  <td><?php echo $res['qtd_quartos']; ?></td>
                                  <td><?php echo $res['qtd_banheiros']; ?></td>
                                  <td><?php echo $res['rua']; ?></td>
                                  <td><?php echo $res['cep']; ?></td>
                                  <td><?php echo $res['cidade']; ?></td>
                                  <td><?php echo $res['status_imovel']; ?></td>
                                  <td><?php echo $res['valor']; ?></td>
                                  <td><?php echo $res['imobiliaria_cnpj']; ?></td>
                                  <td><?php echo $res['locador_cpf']; ?></td>
                                  <td><?php echo $res['ult_reforma']; ?></td>
                                  <td><?php echo $res['construcao_imovel']; ?></td>



                                  <td>
                                    <a href="./controller/controller_imovel.php?edit_imovel=<?php echo $res['id'];?>" class="btn btn-warning">Editar</a>
                                    <a href="./controller/controller_imovel.php?del_imovel=<?php echo $res['id'];?>" class="btn btn-danger">Cancelar</a>
                                  </td>
                              </tr>
                          <?php } ?>
                      </tbody>
                  </table>

    </div>


  </body>
</html>
