<?php
class Session
{
	/**
	 * método construtor
	 * inicializa uma seção
	 */
	function __construct()
	{
		session_start();
	}

	/**
	 * método setValue()
	 * armazena uma variável na seção
	 * @param $var = Nome da seção
	 * @param $value = Valor
	 */
	function setValue($var, $value)
	{
		$_SESSION[$var] = $value;
	}

	/**
	 * método getValue()
	 * retorna uma variável da seção
	 * @param $var = Nome da seção
	 */
	function getValue($var)
	{
		return $_SESSION[$var];
	}

	/**
	 * método freeSession()
	 * destrói os dados de uma seção
	 */
	function freeSession()
	{
		$_SESSION = array();
		session_destroy();
	}
}
?>