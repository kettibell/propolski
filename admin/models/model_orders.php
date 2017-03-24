<?php

class Model_Orders extends Model
{
	protected $ordersCl;
	public $db;
	public function __construct ($db){
		parent::__construct($db);
		$this->db=$db;
		$this->ordersCl= new Orders($db);
	}
	
	public function getAllOrders()
	{			
		return $this->ordersCl->getAllOrders();
	}
                                                       
		public function getData4editOrders()
	{	
		if (isset($_GET['id']))  {
				$id= trim (htmlspecialchars(strip_tags($_GET['id'])));
				return  $this->ordersCl->getOrderById($this->db, $id);
		} else {
			return null;
		}	
	}


		public function editOrders()
	{	
		$orderFields=[];

		$orderFields["name"]			= trim(htmlspecialchars(strip_tags($_POST['name'])));
		$orderFields["title"] 		= trim(htmlspecialchars(strip_tags($_POST['title'])));
		$orderFields["desctiption"] 	= trim(htmlspecialchars(strip_tags($_POST['desctiption'])));
		$orderFields["keywords"] 	= trim(htmlspecialchars(strip_tags($_POST['keywords'])));				
		$orderFields["menuid"] 		= trim(htmlspecialchars(strip_tags($_POST['menuid'])));
		$orderFields["parentid"]	 	= trim(htmlspecialchars(strip_tags($_POST['parentid'])));
		$orderFields["isPublic"] 	= (isset ($_POST['isPublic'])) ? 1 :0 ;
		$orderFields["logo"] 		= trim(htmlspecialchars(strip_tags($_POST['logo'])));

		var_dump($orderFields);
		Orders::checkOrderFields( $orderFields);


//static public $allFields="`id`, `name`, `title`, `desctiption`, `keywords`, `menuid`, `parentid`, `isPublic`, `logo`";
	}

	// public function getMenu4Orders()
	// {			

	// 	return $Menu::getMenu($this->db);
	// }
}

