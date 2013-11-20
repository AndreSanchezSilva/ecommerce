<?php
class Application
{
	static public function run()
	{
		$layout = file_get_contents('Layout/default.php');
		$content = '';

		if ($_GET)
		{
			$class = $_GET['class'];
			if (class_exists($class))
			{
				$pagina = new $class;
				ob_start();
				$pagina->show();
				$content = ob_get_contents();
				ob_end_clean();
			}
			else if (function_exists($method))
			{
				call_user_func($method, $_GET);
			}
		}
		echo str_replace('{{content}}', $content, $layout);
	}
}
?>