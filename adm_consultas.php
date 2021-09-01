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
        <h1>Consultas</h1>
      </div>


      <div class="container">
        <p><a class="btn btn-secondary ml-3" href="index.php">Home</a></p>


        <div class="form-group">
            <a href="controller/controller_con.php?busca=consimovel" class="form-control btn btn-primary">Imobiliaria & Consultor</a>
        </div>


          <form class="" action="./controller/controller_con.php" method="post">
            <div class="row">
            <select name="cidade" id="cidade" class="form-control w-50">

            <?php
            $res_im = mysqli_query($db, "SELECT * FROM imovel");
            while($res_imb = mysqli_fetch_assoc($res_im)){ ?>
                <option value="<?php echo $res_imb['cidade'] ?>"><?php echo $res_imb['cidade'] ?></option>
            <?php } ?>
            </select>

            <button type="submit" class="btn btn-success" name="pes_imovel">Pesquisar Imovel</button>
            </div>
          </form>


<br>
          <form class="" action="./controller/controller_con.php" method="post">
            <div class="row">
              <label for="atevalor">Buscar por valor</label>
              <input type="text" name="atevalor" class="form-control w-50">
            <button type="submit" name="sec" class="btn btn-success">Buscar Imóvel</button>
            </div>


          </form>

          <br>


          <form class="" action="./controller/controller_con.php" method="post">
            <div class="row">
              <label for="consultor">Buscar consultor</label>
              <input type="text" name="consultor" class="form-control w-50">
            <button type="submit" name="ter" class="btn btn-success">Buscar Consultor</button>
            </div>


          </form>


      </div>








  </body>
</html>
