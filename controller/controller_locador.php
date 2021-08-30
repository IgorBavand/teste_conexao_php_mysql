<?php

if(isset($_GET['edit_lcd'])){
  $_SESSION['cpf_lcd'] = $_GET['edit_lcd'];

	header('Location: ../cad_locador.php');
}





 ?>
