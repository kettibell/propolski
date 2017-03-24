<?
// Класс для меню
class Menu
{
	
	static public $allFields=" `id`, `name`, `ru_name`, `small_name`, `logo`, `url`";
// получить меню из базы
 	 static public  function getMenu ($db, $flag="web") {
		if ($flag=="admin") {
			$query="SELECT ".self::$allFields." FROM `MENU_ADMIN`";
		}else {
			$query="SELECT ".self::$allFields." FROM `MENU` order by id";
		}
		return self::resultFormaterFromDB($db,$query);		
  }

// формат результата
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
}
?>