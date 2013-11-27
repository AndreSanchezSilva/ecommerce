<?php
/**
 * classe Page
 * classe para controle de fluxo (seguindo design patterns)
 */
class Page
{
	public function __construct()
	{

	}
	/**
	 * método show()
	 * exibe o conteúdo da página
	 */
	public function show()
	{
		$this->run();
	}

	/**
	 * método run()
	 * executa determinado método com os parâmetros recebidos
	 */
	public function run()
	{
		$uri = explode('/', $_GET['uri']);

		$class = isset($uri[0]) ? $uri[0] . 'Controller' : NULL;
		$method = isset($uri[1]) ? $uri[1] : NULL;

		$request = array('get' => $_GET, 'post' => $_POST);

		/*
		$class = isset($_GET['class']) ? $_GET['class'] : NULL;
		$method = isset($_GET['method']) ? $_GET['method'] : NULL;
		*/
		if ($class)
		{
			$object = $class == get_class($this) ? $this : new $class;

			if (method_exists($object, $method))
			{
				call_user_func(array($object, $method), $request);
			}
			else if (function_exists($method))
			{
				call_user_func($method, $request);
			}
		}
	}
}
?>