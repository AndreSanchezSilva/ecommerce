<?php

	include('DAO/Conexao.php');

	$teste = Conexao::conecta();

	print_r($teste);

?>