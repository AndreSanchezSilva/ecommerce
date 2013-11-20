<?php
class Grupo extends Page
{
	public function __construct() {}

	public function onLista($get)
	{
		include "View/grupo/lista.php";
	}
	public function onCadastro($get)
	{
		include "View/grupo/cadastro.php";
	}
	public function onSalvar($get)
	{
		print_r($_POST);
	}
	public function onDelete($get)
	{
		echo "deleta grupo";
	}
}
?>