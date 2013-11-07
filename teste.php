<?php

	include('DAO/Conexao.php');
	include('DAO/UsuarioDAO.php');
	include('Model/Usuario.php');

	$usuarioDAO = new UsuarioDAO;
	
	$usuario = new Usuario;

	$usuario->setIdUsuario(1);
	$usuario->setNome('Nome Alterado Usuario 1');
	$usuario->setEmail('Email Alterado 1');
	$usuario->setUsuario('Usuario Alterado 1');
	$usuario->setSenha('Senha Alterado Usuario 1');

	//$usuarioDAO->excluir(2);
	//print_r($cliente);

	print_r($usuarioDAO->listar());
	


?>