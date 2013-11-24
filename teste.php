<?php

	include('DAO/Conexao.php');
	include('DAO/ProdutoDAO.php');
	include('Model/Produto.php');

	$produtoDAO = new ProdutoDAO;
	$produto = new Produto;

	$produto->setIdSubGrupo(3);
	$produto->setNome('Teste');
	$produto->setPreco(10);
	$produto->setDetalhes('aaaaa');
	$produto->setFotos(array("teste1.jpg","teste2.jpg"));
	
	print_r($produtoDAO->salvar($produto));

	//$usuarioDAO->excluir(2);
	//print_r($cliente);

	//print_r($usuarioDAO->listar());
	


?>