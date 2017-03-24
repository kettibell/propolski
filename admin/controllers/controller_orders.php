<?php

class Controller_Orders extends Controller
{
	public $db;

	function __construct($db)
	{
		$this->model = new Model_Orders($db);
		$this->view = new View();
		$this->db=$db;
	
	
	}
	
	function action_index()
	{
		$data = Orders::getAllOrders($this->db);
		$this->view->generate('orders_view.php', 'template_view.php', $data);
	}

		function action_edit()
	{	

		
		//$orders["orders"] = Orders::getAllOrders($this->db);
		$data=[];		
		if (isset($_GET['id'])) { //отображение формы для изменения существующего
			$id= trim(htmlspecialchars(strip_tags($_GET['id'])));
			$data=$this->model->getData4editOrders($this->db);	 // order
			//$order["order"]=Orders::getOrderById($this->db, $id);
			$ordergoods["ordergoods"]=Orders::getOrderGoodsById($this->db, $id);
			//$data=array_merge($data, $order); 
			$data=array_merge($data, $ordergoods);

		} elseif ($_POST['name']) {//запись результата о редактировании
			$data=$this->model->editOrders();			
			
		}	
		//$data=array_merge($data, $orders);
		$this->view->generate('edit_orders_view.php', 'template_view.php', $data);
		die();
	}
}




