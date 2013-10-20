<?php

	include('DAO/Conexao.php');
	include('DAO/ClienteDAO.php');
	include('Model/Cliente.php');

	$clienteDAO = new ClienteDAO;
	
	$cliente = new Cliente;

	$cliente->setIdCliente(1);
	$cliente->setNome("a1");
	$cliente->setEmail("b1");
	$cliente->setSenha("c1");
	$cliente->setCpf("d1");
	$cliente->setCep("e1");
	$cliente->setLogradouro("f1");
	$cliente->setNumero("g1");
	$cliente->setComplemento("h1");
	$cliente->setBairro("i1");
	$cliente->setEstado("j1");
	$cliente->setCidade("l1");
	$cliente->setTelefone("m1");
	$cliente->setCelular("n1");

	//print_r($cliente);

	print_r($clienteDAO->listar());
	


?>