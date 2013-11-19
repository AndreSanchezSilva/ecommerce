<?php
class Pagina extends Page
{
	function __construct()
	{
		$grupo = new Action(array($this, 'onGrupos'));
		$subgrupo = new Action(array($this, 'onSubgrupos'));
		$produto = new Action(array($this, 'onProdutos'));
		include "nav.php";
	}

	/**
	 * método onGrupos
	 * executado quando o usuário clicar em produtos
	 * @param $get = variável $_GET
	 */
	function onGrupos($get)
	{
		echo "Grupos";
	}

	/**
	 * método onSubGrupos
	 * executado quando o usuário clicar em produtos
	 * @param $get = variável $_GET
	 */
	function onSubGrupos($get)
	{
		echo "Sub Grupos";
	}

	/**
	 * método onProdutos
	 * executado quando o usuário clicar em produtos
	 * @param $get = variável $_GET
	 */
	function onProdutos($get)
	{
		echo "Produtos";
	}

	/**
	 * método onContato
	 * executado quando o usuário clicar em contato
	 * @param $get = variável $_GET
	 */
	function onContato($get)
	{
		include "contato.php";
	}
}
?>