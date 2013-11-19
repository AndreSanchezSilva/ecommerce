<?php
class Grupo extends Page
{
	public function onView($get)
	{
		echo "lista de grupos";
	}
	public function onSave($get)
	{
		echo "salva grupo";
	}
	public function onDelete($get)
	{
		echo "deleta grupo";
	}
}
?>