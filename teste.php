<?php

	include('DAO/Conexao.php');
	include('DAO/GrupoDAO.php');
	include('Model/Grupo.php');

	$grupoDAO = new GrupoDAO;
	
	print_r($grupoDAO->listar());

?>