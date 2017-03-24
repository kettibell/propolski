<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{

	static function start()
	{
		global $config;
		$db = new DB();
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';

		$routes = explode('?', $_SERVER['REQUEST_URI'])[0];
		$routes = explode('/', $routes);
		// 		echo "<br> route 1 :";
		// var_dump($routes);
		$url = explode(".", $routes[1]);
		// 		echo "<br> url 1 :";
		// var_dump($url);
				// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}
		
		if ($config["prefix"] === $url[1]) {// определяем по какому урлу тянуть реальную страницу. Убираем элиас - работаем с реальной ссылкой 
			$realRoute = $db->makeQuery4Route("SELECT real_url FROM URL_ROUTE WHERE alias='".$url[0]."';", "real_url");
		}
		//var_dump($realRoute);
		// 				echo "<br> realRoute 1 :";
		// var_dump($realRoute);
		if ($realRoute) {// резбиваем урл на куски, вытягиваем get-параметры
			$routes = explode('?', $realRoute)[0];
			$routes = explode('/', $routes);
			}
		// 		echo "<br> route 2 :";
		// var_dump($routes);
		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		

		// var_dump($routes);

		// добавляем префиксы
		// тут важный момент: $controller_name имя страницы, а приставки для контроллера, модели и вьюхи должны быть строго со словами  Model_ Controller_ action_
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		
		// echo "Model: $model_name <br>";
		// echo "Controller: $controller_name <br>";
		// echo "Action: $action_name <br>";
		

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "web/models/".$model_file;
		if(file_exists($model_path))
		{
			include "web/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "web/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "web/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new $controller_name ($db);
	//	$controller->db = $db;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}
	
	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
