<?php
// контролер для профиля пользователя
class Controller_Profile extends Controller
{
	function __construct($db)
	{
		parent::__construct($db);
		$this->model = new Model_Profile($db);	
	}

	function action_index()
	{	
		$this->view->generate('profile_view.php', 'template_view.php');
	}
			
			function action_myorders()
	{	
		$res=$this->model->getUserOrders();
		$this->view->generate('profile_myorders_view.php', 'template_view.php', $res);// последнее
		
	}

}