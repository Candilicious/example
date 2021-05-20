<?php
class Controller
{
	protected $twig; //работа с шаблонами
	function __construct () {
		$loader = new \Twig\Loader\FilesystemLoader('views');
		$this->twig = new \Twig\Environment($loader);
	}
}