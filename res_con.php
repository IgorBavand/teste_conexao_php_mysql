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
        <h1>Imoveis em <?php echo $_SESSION['pes_c'] ?></h1>
      </div>


      <?php
        $res_all = mysqli_query($db, "SELECT * FROM imovel WHERE cidade = '{$_SESSION['pes_c']}'");
       ?>

      <div class="container">

        <?php
          while ($res = mysqli_fetch_assoc($res_all)) { ?>


            <div class="row">

              <h4> <?php echo $res['rua']; ?> </h4>
              <h4><?php echo '    -    '.$res['status_imovel']?></h4>
              <h4><?php echo '    -    '.$res['qtd_quartos'].' quartos e '?></h4>
              <h4><?php echo '    -    '.$res['qtd_banheiros'].' banheiros'?></h4>
            </div>

          <?php }
         ?>

      </div>








  </body>
</html>
