<?php
session_start();
include 'conexao.php'
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
    <form method="post" action="conexao.php">

      <div class="form-group">
        <label for="cnpj">CNPJ</label>
        <input type="text" id="cnpj" class="form-group" name="cnpj" placeholder="Digite o CNPJ..." maxlength="30">
      </div>

      <div class="form-group">
        <label for="nome_i">NOME</label>
        <input type="text" id="nome_i" name="nome_imobiliaria" placeholder="Digite o nome...">
      </div>

      <div class="form-group">
        <label for="site">SITE</label>
        <input type="text" name="site" id="site" placeholder="Digite o site...">
      </div>

      <div class="form-group">
        <label for="telefone">TELEFONE</label>
        <input type="text" id="telefone" name="telefone" placeholder="Digite o telefone..." maxlength="20">

      </div>

      <button type="submit" name="cad_i" class="btn-btn-success">Cadastrar</button>

    </form>
  </body>
</html>
