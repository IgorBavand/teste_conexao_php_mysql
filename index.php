<?php session_start(); ?>
<html>
	<head><title>Teste conexao</title>

	<style>
		.texto{
			text-align: center;
		}
	</style>
	</head>

	<body>
		<h3>Teste para banco de dados Alugue Fácil</h3>
		<p><a href="adm_imobiliaria.php">administrar imobiliarias</a></p>
		<p><a href="#">administrar locadores</a></p>
		<p><a href="#">administrar locatarios</a></p>
		<p><a href="#">administrar consultores</a></p>
		<p><a href="#">administrar imoveis</a></p>
		<form class="form" action="conexao.php" method="post">
			<button type="submit" name="cad" class="btn btn-success">Cadastrar</button>

		</form>
	</body>
</html>
