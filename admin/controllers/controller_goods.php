<?php

class Controller_Goods extends Controller
{

	function __construct($db)
	{
		$this->model = new Model_Goods($db);
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->getAllGoods();

		$this->view->generate('goods_view.php', 'template_view.php', $data);
	}

		function action_edit()
	{	
		if (isset($_GET['id'])) {
			$good=$this->model->getData4editGoods();
			$this->view->generate('edit_good_view.php', 'template_view.php', $good);
			die();
		} elseif ($_POST['name']) {
			$good=$this->model->editGoods();
			$this->view->generate('edit_good_view.php', 'template_view.php', $good);
			die();
		}else {
			$this->view->generate('edit_good_view.php', 'template_view.php');
			die();
		}				

	}


}




