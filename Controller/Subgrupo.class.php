<?php
class Subgrupo extends Page
{
	public function onView($get)
	{
		echo "lista de subgrupos";
	}
	public function onSave($get)
	{
		echo "salva subgrupo";
	}
	public function onDelete($get)
	{
		echo "deleta subgrupo";
	}
}
?>