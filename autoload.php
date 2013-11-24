<?php
function __autoload($classe)
{
	$pastas = array('Application','Model','Controller', 'DAO');

	foreach ($pastas as $pasta)
	{
		if (file_exists("{$pasta}/{$classe}.class.php"))
		{
			include_once "{$pasta}/{$classe}.class.php";
		}
	}
}
?>