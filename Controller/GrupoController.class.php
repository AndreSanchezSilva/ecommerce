<?php
class GrupoController extends Page
{
	public $grupo;
	public $grupos;

	public function __construct() {}

	public function onLista($request)
	{
		$grupo = new Grupo;
		$grupoDao = new GrupoDAO;

		$this->grupos = $grupoDao->listar();

		include "View/grupo/lista.php";
	}
	public function onCadastro($request)
	{
		include "View/grupo/cadastro.php";
	}
	public function onSalvar($request)
	{
		if ($request['post'])
		{
			$grupo = new Grupo;

			$idGrupo = isset($request['post']['id']) ? $request['post']['id'] : NULL;
			$grupo->setIdGrupo($idGrupo);
			$grupo->setNome($request['post']['nome']);
			
			$grupoDao = new GrupoDAO;
			$result = $grupoDao->salvar($grupo);

			return ($result) ? true : false;
		}
	}
	public function onDelete($request)
	{
		$uri = explode('/', $request['get']['uri']);
		$idGrupo = $uri[2];
		if ($idGrupo)
		{
			$grupoDao = new GrupoDAO;
			$result = $grupoDao->excluir($idGrupo);
			
			//$this->onLista(); ou // <- desta forma nao altera a url
			header("location: /Grupo/onLista");
			
			return ($result) ? true : false;
		}
	}
}
?>