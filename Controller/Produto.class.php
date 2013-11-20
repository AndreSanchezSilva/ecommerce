<?php
class Produto extends Page
{
	function __construct()
	{
		$view = new Action(array($this, 'onView'));
		$salvar = new Action(array($this, 'onSave'));
		$deletar = new Action(array($this, 'onDelete'));
	}
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