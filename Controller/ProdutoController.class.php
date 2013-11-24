<?php
class ProdutoController extends Page
{
	function __construct() {}

	public function onView($get)
	{
		echo "lista de produtos";
	}
	public function onSave($get)
	{
		echo "salva produto";
	}
	public function onDelete($get)
	{
		echo "edita produto";
	}
}
?>