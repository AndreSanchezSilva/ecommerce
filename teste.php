<?php

	include('DAO/Conexao.php');
	include('DAO/GrupoDAO.php');
	include('Model/Grupo.php');

	$grupoDAO = new GrupoDAO;
	
	$grupo = new Grupo;

	$grupo->setIdGrupo(5);
	$grupo->setNome('dddddb');

	print_r($grupoDAO->listar());


?>