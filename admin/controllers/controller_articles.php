<?php

class Controller_Articles extends Controller
{
	public $db;

	function __construct($db)
	{
		$this->model = new Model_Articles($db);
		$this->view = new View();
		$this->db=$db;
	
	
	}
	
	function action_index()
	{
		$data = Articles::getAllArticles($this->db);
		$this->view->generate('articles_view.php', 'template_view.php', $data);
	}

		function action_edit()
	{	
		$menu["menu"]=Menu::getMenu($this->db);
		$categories["categories"] = Categories::getAllCategories($this->db);
		$data=[];		
		if (isset($_GET['id'])) { //отображение формы для изменения существующего
			$data=$this->model->getData4editArticle($this->db);			
		} elseif ($_POST['name']) {//запись результата о редактировании
			$data=$this->model->editArticle();
			$data=array_merge($data, $menu); 
			
		}
		$data=array_merge($data, $menu); 
		$data=array_merge($data, $categories);
		$this->view->generate('edit_article_view.php', 'template_view.php', $data);
		die();
	}
}




