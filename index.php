<?php
	//FRONT CONTROLLER

	// 1. Общие настройки

	ini_set('display_errors',1);
	error_reporting(1);

	session_start();
	
	// 2. Подключение файлов системы

	define('ROOT', dirname(__FILE__));
	require_once(ROOT.'/components/Autoload.php');
	
	

	// 3. Установка соеденения с БД

	
	// 4. Вызов Router

	$rout=new Router;
	$rout->run();

?>