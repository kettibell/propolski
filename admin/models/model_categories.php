<?php

class Model_Categories extends Model
{
	protected $categoriesCl;
	public function __construct ($db){
		parent::__construct($db);
		$this->categoriesCl= new Categories($db);
	}
	
	public function getAllCategories()
	{			
		return $this->categoriesCl->getAllCategories();
	}
                                                       
		public function getData4editCategories()
	{	
		if (isset($_GET['id']))  {
				$id= trim (htmlspecialchars(strip_tags($_GET['id'])));
				return  $this->categoriesCl->getCategorуById($db, $id);
		} else {
			return null;
		}	
	}


		public function editCategories()
	{	
		$categoryFields=[];

		$categoryFields["name"]			= trim(htmlspecialchars(strip_tags($_POST['name'])));
		$categoryFields["title"] 		= trim(htmlspecialchars(strip_tags($_POST['title'])));
		$categoryFields["desctiption"] 	= trim(htmlspecialchars(strip_tags($_POST['desctiption'])));
		$categoryFields["keywords"] 	= trim(htmlspecialchars(strip_tags($_POST['keywords'])));				
		$categoryFields["menuid"] 		= trim(htmlspecialchars(strip_tags($_POST['menuid'])));
		$categoryFields["parentid"]	 	= trim(htmlspecialchars(strip_tags($_POST['parentid'])));
		$categoryFields["isPublic"] 	= (isset ($_POST['isPublic'])) ? 1 :0 ;
		$categoryFields["logo"] 		= trim(htmlspecialchars(strip_tags($_POST['logo'])));

		var_dump($categoryFields);
		Categories::checkCategoryFields( $categoryFields);

// TODO!!!!!! Создавать ссылку в таблице ссылок!!!!!!



//static public $allFields="`id`, `name`, `title`, `desctiption`, `keywords`, `menuid`, `parentid`, `isPublic`, `logo`";
	}

	// public function getMenu4Categories()
	// {			

	// 	return $Menu::getMenu($this->db);
	// }
}

