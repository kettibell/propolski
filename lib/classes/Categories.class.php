<?
// категории
class Categories
{
	
	// protected $query;
	// protected $errText;
	// для валидации полей - задаем фильтры - какими должны быть поля
	 protected $checkMatrix= [
         "name" => 		["isNotNull" => true, "type" => "string", "minLength" => 1,"maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|'],
         "title" => 	["isNotNull" => true, "type" => "string", "minLength" => 1,"maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|'],
         "desctiption" => ["isNotNull" => true, "type" => "string", "minLength" => 3,"maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|'],
         "keywords" => 	["isNotNull" => true, "type" => "string", "minLength" => 0,"maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|'],
         "menuid" => 	["isNotNull" => true, "type" => "string", "minLength" => "foo","maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|'],
         "parentid" => 	["isNotNull" => false, "type" => "int", "fpreg_match" => '|^[\w]{3,127}$|'],
         "isPublic" => 	["isNotNull" => true, "type" => "string", "minLength" => 1,"maxLength" => 1,"fpreg_match" => '|^[\w]{3,127}$|'],
         "logo" => 		["isNotNull" => true, "type" => "string", "minLength" => "foo","maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|']
         ];

	static public $allFields="`id`, `name`, `title`, `desctiption`, `keywords`, `menuid`, `parentid`, `isPublic`, `logo`";


	// public function __construct ($db){
	// 	$this->db = $db;
	// }
// получить все категории
	static public function getAllCategories($db)
	{	
		$query="SELECT ".self::$allFields." FROM `CATEGORIES`";
		return self::resultFormaterFromDB($db,$query);
	}
	// получить категории по ид меню
	static	public function getCategoriesByMenuId($db, $menuid)
	{	
		$query="SELECT ".self::$allFields." FROM `CATEGORIES` WHERE `menuid`=$menuid";
		return self::resultFormaterFromDB($db, $query);
	}

	
// полоучить категорию по ее ид
	static public function getCategorуById($db, $id)
	{	
		$query="SELECT  ".self::$allFields." FROM `CATEGORIES` where `id`='$id'";
		return self::resultFormaterFromDB($db, $query);
	}
// форматируем результат
	static public function resultFormaterFromDB($db, $query){
		$dataArr["data"]=$db->getQueryResutlInArray($query);
		if($dataArr["data"][0]){ // если получили коректный результат от базы
			$errStatus=false;
			$errText="";
		}else {
			$errStatus=true;
			$errText="Не удалось получить данные из базы";
		}
		$result =  [
    		"errStatus" => $errStatus,
    		"errText" => $errText
		];
		 $result=array_merge($result, $dataArr);
		 // var_dump($result);
		return $result;
	}

	static public function editCategories($db) {
	}

	static public function  checkCategoryFields( $categoryFields){

	}

}
?>