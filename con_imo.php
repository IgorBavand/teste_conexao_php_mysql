

<?php
 include 'conexao.php';


 $q = "select * from consultor_imobiliaria";

 $resultado = mysqli_query($db, $q);

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
        <h1>Consultor & Imobiliaria</h1>
      </div>


      <div class="container">

        <table class="table table-dark">
          <thead>
              <tr id="teste">
                                <th>Consultor</th>
                                <th>Imobiliaria</th>



                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($res = mysqli_fetch_assoc($resultado)) { ?>
                                <tr style="border-style: solid">
                                    <td><?php echo $res['nome_consultor']; ?></td>
                                    <td><?php echo $res['nome_imobiliaria']; ?></td>
  
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

      </div>








  </body>
</html>
