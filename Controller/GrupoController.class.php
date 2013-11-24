<?php
class GrupoController extends Page
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
	public function onSalvar($request)
	{
		$grupo = new Grupo;
		$grupo->setIdGrupo($request['post']['id']);
		$grupo->setNome($request['post']['nome']);
		//$grupoDao = new GrupoDAO;
		//$grupoDao->salvar($grupoDao);
	}
	public function onDelete($get)
	{
		echo "deleta grupo";
	}
}
?>