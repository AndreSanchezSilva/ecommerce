<?php
class IndexController extends Page
{
	public function __construct() {}

	public function index($get)
	{
		include "View/index.php";
	}
}
?>