<?
// класс для работы со статьями
class Articles
{
	
	// protected $query;
	// protected $errText;
	// для валидации полей - задаем фильтры - какими должны быть поля
	 protected $checkMatrix= [
         "name" => 		["isNotNull" => true, "type" => "string", "minLength" => 1,"maxLength" => 20,"fpreg_match" => '|^[\w]{3,127}$|', "fpreg_matchText" =>"Имя должно содержать буквы, цифры, спец-символы"],
         "title" => 	["isNotNull" => true, "type" => "string", "minLength" => 1,"maxLength" => 20,"fpreg_match" => '|^[\w]{3,127}$|'],
         "desctiption" => ["isNotNull" => true, "type" => "string", "minLength" => 3,"maxLength" => 20,"fpreg_match" => '|^[\w]{3,127}$|'],
         "keywords" => 	["isNotNull" => true, "type" => "string", "minLength" => 0,"maxLength" => 20,"fpreg_match" => '|^[\w]{3,127}$|'],
         "menuid" => 	["isNotNull" => true, "type" => "string", "minLength" => "foo","maxLength" => 20,"fpreg_match" => '|^[\w]{3,127}$|'],
         "categoryid" => ["isNotNull" => false, "type" => "int", "fpreg_match" => '|^[\w]{3,127}$|'],
         "text" => 		["isNotNull" => true, "type" => "string", "minLength" => "foo","maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|'],
         "isPublic" => 	["isNotNull" => true, "type" => "string", "minLength" => 1,"maxLength" => 1,"fpreg_match" => '|^[\w]{3,127}$|']

         ];
// список полей для запросов в базу. А то мне надоело каждый раз его в коде прописывать
	static public $allFields="`id`, `name`, `title`, `desctiption`, `keywords`, `menuid`, `categoryid`, `text`, `isPublic`, `logo`";
	static public $allFieldsImg="a.`id`, a.`name`, a.`title`, a.`desctiption`, a.`keywords`, a.`menuid`, a.`categoryid`, a.`text`, a.`isPublic`, a.`logo`, i.name_img";
	static public $allFieldsIns="`name`, `title`, `desctiption`, `keywords`, `menuid`, `categoryid`, `text`, `isPublic`, `logo`";

//SELECT  FROM `ARTICLES` a  join `IMAGES` i on a.id=i.key_img WHERE `menuid`=4 and i.name_img like '%_F\.%''

	// получить все статьи
	static public function getAllArticles($db)
	{	
		$query="SELECT ".self::$allFields." FROM `ARTICLES`";
		return self::resultFormaterFromDB($db,$query);
	}
	// получить все статьи, которые относятся к конкретному пункту меню
	static	public function getArticlesByMenuId($db, $menuid, $imgtype=null)
	{	
		if (isset($imgtype) && ! is_null($imgtype)) {
			$query="SELECT ".self::$allFieldsImg." FROM  `ARTICLES` a  join `IMAGES` i on a.id=i.key_img WHERE `menuid`=$menuid and i.name_img like '%_".$imgtype."\.%'";
		} else {
			$query="SELECT ".self::$allFields." FROM `ARTICLES` WHERE `menuid`=$menuid";
		}

		return self::resultFormaterFromDB($db, $query);
	}

	// получить статью по ее ид
	static public function getArticleById($db, $id, $imgtype=null)
	{	
		if (isset($imgtype) && ! is_null($imgtype)) {
			$query="SELECT ".self::$allFieldsImg." FROM  `ARTICLES` a  join `IMAGES` i on a.id=i.key_img WHERE a.`id`=$id and i.name_img like '%_".$imgtype."\.%'";
		} else {
			$query="SELECT ".self::$allFields." FROM `ARTICLES` WHERE `id`='$id'";
		}
		return self::resultFormaterFromDB($db, $query);
	}

// получить все статьи из данной категории
	static public function getArticlesByCategoryId( $db, $id, $imgtype=null){
		if (isset($imgtype) && ! is_null($imgtype)) {
			$query="SELECT ".self::$allFieldsImg." FROM  `ARTICLES` a  join `IMAGES` i on a.id=i.key_img WHERE a.`categoryId`=$id and i.name_img like '%_".$imgtype."\.%'";
		} else {
			$query="SELECT ".self::$allFields." FROM `ARTICLES` WHERE `categoryId`='$id'";
		}
		return self::resultFormaterFromDB($db, $query);
	}
// получить статью по ид
	static public function getArticleByArticleId( $db, $id, $imgtype=null){
		if (isset($imgtype) && ! is_null($imgtype)) {
			$query="SELECT ".self::$allFieldsImg." FROM  `ARTICLES` a  join `IMAGES` i on a.id=i.key_img WHERE a.`id`=$id and i.name_img like '%_".$imgtype."\.%'";
		} else {
			$query="SELECT ".self::$allFields." FROM `ARTICLES` WHERE `id`='$id'";
		}
		return self::resultFormaterFromDB($db, $query);
	}

// последние добавленные статьи
	static public function getRecentArticles ($db, $imgtype, $globaldataMenu=null){
		if (isset($globaldataMenu) && ! is_null($globaldataMenu)) {
			foreach ($globaldataMenu["data"] as $menukey => $menuvalue) {
				if ($menuvalue ["state"]== "active") {
					$menuid=$menuvalue ["id"];
					break;
				}
			}
			return self::getArticlesByMenuId($db, $menuid, $imgtype);
			//echo "SSSSSS".$menuid;
		} else {
			$query="SELECT ".self::$allFieldsImg." FROM  `ARTICLES` a  join `IMAGES` i on a.id=i.key_img  WHERE i.name_img like '%_".$imgtype."\.%'";
		}
		return self::resultFormaterFromDB($db, $query);

	}
// оборачиваем результат в красивый массив
	static public function resultFormaterFromDB($db, $query){
		$dataArr["data"]=$db->getQueryResutlInArray($query);		
		// if($dataArr["data"][0]){ // если получили коректный результат от базы
			$errStatus=false;
			$errText="";
		$result =  [
    		"errStatus" => $errStatus,
    		"errText" => $errText
		];
		 $result=array_merge($result, $dataArr);
		 // var_dump($result);
		return $result;
	}


	static public function  checkArticleFields( $categoryFields){

	}
// для редактирования статьи и записи в базу
	static public function editArticle ($db, $articleData,$id=null) {
		if (! isset($id)) {
			$query="INSERT INTO `ARTICLES`(".self::$allFieldsIns.") VALUES (";
			$query.="'".$articleData["name"]."', ";
			$query.="'".$articleData["title"]."', ";
			$query.="'".$articleData["desctiption"]."', ";
			$query.="'".$articleData["keywords"]."', ";
			$query.="'".$articleData["menuid"]."', ";
			$query.="'".$articleData["categoryid"]."', ";
			$query.="'".$articleData["text"]."', ";
			$query.="'".((isset($articleData["isPublic"]) && $articleData["isPublic"]==1 ) ? "Y" : "N")."', ";
			$query.="'".$articleData["logo"]."') ";
		} else {
			$query="UPDATE `ARTICLES` SET  ";
			$query.="name='".$articleData["name"]."', ";
			$query.="title='".$articleData["title"]."', ";
			$query.="desctiption='".$articleData["desctiption"]."', ";
			$query.="keywords='".$articleData["keywords"]."', ";
			$query.="menuid='".$articleData["menuid"]."', ";
			$query.="categoryid='".$articleData["categoryid"]."', ";
			$query.="text='".$articleData["text"]."', ";
			$query.="isPublic='".((isset($articleData["isPublic"]) && $articleData["isPublic"]==1 ) ? "Y" : "N")."', ";
			$query.="logo='".$articleData["logo"]."' ";
			$query.="WHERE  `id`='$id' ";
		}

		var_dump($query); //die();
		$db->makeQuery($query);
//var_dump($query);
		// $idArticle = mysqli_insert_id ($db->dbc);
	}


}
?>
