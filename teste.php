<?php

	include('DAO/Conexao.php');
	include('DAO/ProdutoDAO.php');
	include('Model/Produto.php');

	$produtoDAO = new ProdutoDAO;
	
	$produto = new Produto;

	$produto->setIdProduto(1);
	$produto->setIdSubGrupo(3);
	$produto->setNome('Produto Alterado 1');
	$produto->setPreco(100);
	$produto->setDetalhes('Datalhes Alterado 1');

	$produtoDAO->excluir(1);
	//print_r($cliente);

	print_r($produtoDAO->listar());
	


?>