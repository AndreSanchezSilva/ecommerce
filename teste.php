<?php

	include('DAO/Conexao.php');
	include('DAO/SubGrupoDAO.php');
	include('Model/SubGrupo.php');

	$subgrupoDAO = new SubGrupoDAO;
	
	$subgrupo = new SubGrupo;

	//$subgrupo->setIdSubGrupo(1);
	$subgrupo->setIdGrupo(6);
	$subgrupo->setDescricao('a');

	//print_r($subgrupo);

	print_r($subgrupoDAO->recuperar(4));


?>