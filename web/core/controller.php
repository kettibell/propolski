<?php
// главный контролер, от которого наследуются остальные
class Controller {
	// тут в конструкторе можем проверять куку запомнить меня (это не переводи. Это мне напоминалка, как надо сделать)
	
	public $model;
	public $view;
	public $db;
	public $config;
	public $menu;
	public $globaldata; // объект, который прилетит на форму и будет содержать кучу данных о станицы

	function __construct($db)
	{

		global $config;
		$this->globaldata=[];
		$menu["menu"]=Menu::getMenu($db);	
		foreach ($menu["menu"]["data"] as $menukey => $menuvalue) {
			$serv_req_uri=explode(".", $_SERVER['REQUEST_URI']);	
			// тянем реальный урл на сайт по элиасу	
			$realRoute = $db->makeQuery4Route("SELECT real_url FROM URL_ROUTE WHERE alias='".explode("/", $serv_req_uri[0])[1]."';", "real_url");
			if ($menuvalue["url"]==explode("/", $realRoute)[1]) { // находим пункт меню, который выбрал пользователь
				$currentMenuId=$menuvalue["id"];
				$menu["menu"]["data"][$menukey]["state"]="active";
			}
		}
		$iscaruselShow["iscaruselShow"] = ($_SERVER['REQUEST_URI']=="/") ? true : false ; // флаг показывать ли карусель - если главная тсраница - показываем
		if($currentMenuId) {// показываем статьи для текущей страницы
			$categories["categories"]=Categories::getCategoriesByMenuId($db, $currentMenuId);
		}else {
			$categories["categories"]=null;

		}
		
		// $basket["basket"]=Basket::getBasketData($db);	
		$this->globaldata=array_merge($this->globaldata, $menu);  // в гланый объект для фотрмы докидываем меню
		$this->globaldata=array_merge($this->globaldata, $categories);// и категории
		$this->globaldata=array_merge($this->globaldata, $iscaruselShow); // флажок для карусельки
		// $this->globaldata=array_merge($this->globaldata, $basket); // и корзину
		$this->view = new View($this->globaldata); // вызываем вьюху для нужной страницы
		$this->config=$config;
		// echo "33333";

	}
	
	
	// действие (action), вызываемое по умолчанию
	function action_index()
	{
		// todo	
	}
}
