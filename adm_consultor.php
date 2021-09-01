<?php
 include 'conexao.php';


 $select_todas = 'select * from consultor';

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
        <h1>Consultores</h1>
      </div>


      <?php if (isset($_SESSION['message'])): ?>

                      <div class="alert alert-success" role="alert">
                          <?php
                          echo $_SESSION['message'];
                          unset($_SESSION['message']);
                          ?>
                  </div>


              <?php endif ?>
              <?php $reg = mysqli_query($db, 'select * from consultor'); ?>


                <div class="row d-flex justify-content-center alert alert-primary" >
                <p class="font-weight-bold">Quantidade de consultores cadastrados: <?php echo mysqli_num_rows($reg) ?> </p>
                </div>
                <div class="row d-flex justify-content-center">
                <p><a href="cad_consultor.php" class="btn btn-primary">Cadastrar novo consultor</a></p>
                <p><a class="btn btn-secondary ml-3" href="index.php">Home</a></p>




              </div>


      <table class="table table-dark">
        <thead>
            <tr id="teste">
                              <th>CPF</th>
                              <th>Nome</th>
                              <th>Telefone</th>
                              <th>Rua</th>
                              <th>CEP</th>
                              <th>Cidade</th>
                              <th>Imobiliaria</th>
                              <th>Locatário</th>
                              <th>Ações</th>

                              <th colspan="2"></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php while ($res = mysqli_fetch_assoc($resultado)) { ?>
                              <tr style="border-style: solid">
                                  <td><?php echo $res['cpf_consultor']; ?></td>
                                  <td><?php echo $res['nome_consultor']; ?></td>
                                  <td><?php echo $res['telefone']; ?></td>
                                  <td><?php echo $res['rua']; ?></td>
                                  <td><?php echo $res['cep']; ?></td>
                                  <td><?php echo $res['cidade']; ?></td>

                                  <td><?php

                                  $aux_i = $res['imobiliaria_cnpj'];

                                  $aux_im = mysqli_query($db, "SELECT nome_imobiliaria from imobiliaria WHERE cnpj = '{$aux_i}'");

                                  while($res_i = mysqli_fetch_assoc($aux_im)){
                                    echo  $res_i['nome_imobiliaria'];
                                  }


                                  ?></td>


                                <td><?php

                                  $aux_l = $res['locatario_cpf'];

                                  $aux_lc = mysqli_query($db, "SELECT nome_locatario from locatario WHERE cpf_locatario = '{$aux_l}'");

                                  while($res_l = mysqli_fetch_assoc($aux_lc)){
                                    echo  $res_l['nome_locatario'];
                                  }


                                  ?></td>




                                  <td>
                                    <a href="./controller/controller_consultor.php?edit_c=<?php echo $res['cpf_consultor'];?>" class="btn btn-warning">Editar</a>
                                    <a href="./controller/controller_consultor.php?del_c=<?php echo $res['cpf_consultor'];?>" class="btn btn-danger">Cancelar</a>
                                  </td>
                              </tr>
                          <?php } ?>
                      </tbody>
                  </table>

    </div>


  </body>
</html>
