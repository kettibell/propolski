<?
// Класс для корзины товаров. Будем выкидывать
class Basket
{
	
	protected $errText;
	static public $ordersAllFields="`id_user`,  `email`, `country`, `city`, `surname`, `name`, `patronymic`, `phone`, `state`";
	


 	static public  function getBasketData ($db, $buys) {// TODO : NOT IMPLEMENTED YET
 	 	$selectIN="(";
 	 	foreach ($buys as $bkey => $bvalue) {
 	 		$selectIN.= ($selectIN=="(") ? $bkey."" : ", ".$bkey ;
 	 		//$selectIN.=$bkey.",";
 	 	}
 	 	$selectIN.=")";
 	 	if ($selectIN=="()") {
 	 		return null;
 	 	}
		$query="SELECT idGood, name, price FROM `GOODS` WHERE idGood in ".$selectIN;
		// var_dump($query);
		$dataArr=$db->getQueryResutlInArray($query);
		foreach ($dataArr as $dataArrkey => $dataArrvalue) {
			foreach ($buys as $bkey => $bvalue) {
				if ($dataArrvalue ["idGood"]==$bkey) {
					$dataArr[$dataArrkey] ["count"] = $bvalue ;
				}
				
			}
		}
		return self::resultFormaterFromArr($dataArr);
  	}


	static public function setOrder ($db, $orderData) {
		// var_dump($orderData);
		$query="INSERT INTO `ORDERS`(".self::$ordersAllFields.") VALUES (";
		$query.="'".((isset($orderData["id_user"])) ? $orderData["id_user"] : "")."', ";
		$query.="'".$orderData["email"]."', ";
		$query.="'".$orderData["country"]."', ";
		$query.="'".$orderData["city"]."', ";
		$query.="'".$orderData["surname"]."', ";
		$query.="'".$orderData["name"]."', ";
		$query.="'".((isset($orderData["patronymic"])) ? $orderData["patronymic"] : "")."', ";
		$query.="'".$orderData["phone"]."', ";
		$query.="'NN') ";
		$db->makeQuery($query);
// var_dump($db->dbc);
		$idOrder = mysqli_insert_id ($db->dbc);

		$buys= unserialize($_COOKIE["basket"]);
		foreach ($buys as $buykey => $buycount) {
			$query="INSERT INTO `ORDERS_GOODS` (`idOrder`, `idGood`, `price`, `count`) SELECT ".$idOrder.", ".$buykey.", price, ".$buycount." FROM `GOODS` WHERE idGood = ".$buykey;
			$db->makeQuery($query);



			// var_dump($query);
			// echo "<br>";
		}
		unset ($_COOKIE ['basket']); // удаляем куку
		return true; // отработало без ошибок
		// var_dump($buys);


	}

 //  	static public function resultFormaterFromDB($db, $query){
	// 	$dataArr["data"]=$db->getQueryResutlInArray($query);
	// 	// echo $query;
	// 	// var_dump($dataArr["data"]);
	// 	if($dataArr["data"][0]){ // если получили коректный результат от базы
	// 		$errStatus=false;
	// 		$errText="";
	// 	}else {
	// 		$errStatus=true;
	// 		$errText="Не удалось получить данные из базы";
	// 	}
	// 	$result =  [
 //    		"errStatus" => $errStatus,
 //    		"errText" => $errText
	// 	];
	// 	 $result=array_merge($result, $dataArr);
	// 	 // var_dump($result);
	// 	return $result;
	// }
		 static public function getAllBuys ($db) {

		  }

	  	static public function resultFormaterFromArr($arr){
		$dataArr["data"]=$arr;	
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