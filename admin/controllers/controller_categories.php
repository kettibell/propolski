<?php

class Controller_Categories extends Controller
{
	public $db;

	function __construct($db)
	{
		$this->model = new Model_Categories($db);
		$this->view = new View();
		$this->db=$db;
	
	
	}
	
	function action_index()
	{
		$data = Categories::getAllCategories($this->db);
		$this->view->generate('categories_view.php', 'template_view.php', $data);
	}

		function action_edit()
	{	
		// $dataArr["data"]=$this->db->getQueryResutlInArray($query);  //Categories::getCategoriesByMenuId($db, $currentMenuId);
		// $result=array_merge($result, $dataArr);  getMenu4Categories
		$menu["menu"]=Menu::getMenu($this->db);
		$categories["categories"] = Categories::getAllCategories($this->db);
		$data=[];		
		if (isset($_GET['id'])) { //отображение формы для изменения существующего
			$data=$this->model->getData4editCategories($this->db);			
		} elseif ($_POST['name']) {//запись результата о редактировании
			$data=$this->model->editCategories();
			$data=array_merge($data, $menu); 
			
		}//else { // отображение формы для нового товара}	
		// var_dump($data);
		// echo "<br>";
		// var_dump($menu);
		$data=array_merge($data, $menu); 
		$data=array_merge($data, $categories);
		// echo "<br>";
		// var_dump($data);
		$this->view->generate('edit_categories_view.php', 'template_view.php', $data);
		die();
	}
}




