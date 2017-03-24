<?
// класс товаров. Уже не актуальный
class Goods
{

static public $allFields="`idGood`, `name`, `nameLink`, `price`, `oldPrice`, `endingGood`, `description`, `mediaLinkVideo`, `mediaLinkDemo`, `topSales`, `promo`,`imgGood`,`raiting`";
	
	static public function getGoodByCategoryId( $db, $id, $imgtype=null){
			$query="SELECT ".self::$allFields." FROM `GOODS` WHERE `categoryId`='$id'";
		return self::resultFormaterFromDB($db, $query);
	}

	static public function getGoodByGoodId( $db, $id, $imgtype=null){
		$query="SELECT ".self::$allFields." FROM `GOODS` WHERE `id`='$id'";
		return self::resultFormaterFromDB($db, $query);
	}

		static public function resultFormaterFromDB($db, $query){
		$dataArr["data"]=$db->getQueryResutlInArray($query);		
		// if($dataArr["data"][0]){ // если получили коректный результат от базы
			$errStatus=false;
			$errText="";
		// }else {
		// 	$errStatus=true;
		// 	$errText="Не удалось получить данные из базы";
		// }
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
