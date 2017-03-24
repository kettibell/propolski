<?php
// не используется, но пока не удаляю, он может быть прописан где-то
class Controller_Basket extends Controller
{
	function __construct($db)
	{
		parent::__construct($db);
		$this->model = new Model_Basket($db);	
	}

	function action_index()
	{	
		$data=$this->model->getAllBuys();
		$this->view->generate('basket_view.php', 'template_view.php',$data);
	}

	function action_setOrder()
	{	
		$data=$this->model->setOrder();
		$this->view->generate('basket_view.php', 'template_view.php',$data);
	}
}