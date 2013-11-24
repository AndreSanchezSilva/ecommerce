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

		$idGrupo = isset($request['post']['id']) ? $request['post']['id'] : NULL;
		$grupo->setIdGrupo($idGrupo);
		$grupo->setNome($request['post']['nome']);
		
		$grupoDao = new GrupoDAO;
		$grupoDao->salvar($grupo);
		
	}
	public function onDelete($get)
	{
		echo "deleta grupo";
	}
}
?>