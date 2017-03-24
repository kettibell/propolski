<?php

	ini_set('display_errors', 1);
	$routes = explode('/', $_SERVER['REQUEST_URI']);
	if ($routes[1] === "administrator") {  // если зашли на http://kursy.propolski.com/administrator  - показать вход в админку
		require_once 'admin/bootstrap.php';
	}else{
		require_once 'web/bootstrap.php'; // если без - просто сайт
	}

	// test git
?>
