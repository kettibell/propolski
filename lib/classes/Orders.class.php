<?
// класс заказов . Уже не актуален
class Orders
{
	
// для валидации полей - задаем фильтры - какими должны быть поля
	 protected $checkMatrix= [
         "id_user" => 	["isNotNull" => true, "type" => "string", "minLength" => 1,"maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|'],
         "email" => 	["isNotNull" => true, "type" => "string", "minLength" => 1,"maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|'],
         "city" => 		["isNotNull" => true, "type" => "string", "minLength" => 3,"maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|'],
         "country" => 	["isNotNull" => true, "type" => "string", "minLength" => 0,"maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|'],
         "surname" => 	["isNotNull" => true, "type" => "string", "minLength" => "foo","maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|'],
         "name" => 		["isNotNull" => false, "type" => "int", "fpreg_match" => '|^[\w]{3,127}$|'],
         "patronymic" =>["isNotNull" => true, "type" => "string", "minLength" => 1,"maxLength" => 1,"fpreg_match" => '|^[\w]{3,127}$|'],
         "phone" => 	["isNotNull" => true, "type" => "string", "minLength" => "foo","maxLength" => "foo","fpreg_match" => '|^[\w]{3,127}$|'],
         "state" =>["isNotNull" => true, "type" => "string", "minLength" => 1,"maxLength" => 1,"fpreg_match" => '|^[\w]{3,127}$|']
        
         ];

	static public $allFields="`id`, `id_user`, `email`, `city`, `country`, `surname`, `name`, `patronymic`, `phone`, `state`";
static public $allFieldsOG= "`id`, `idOrder`, `idGood`, `price`, `count`";
static public $allFieldsOGName= "o.`idOrder`, g.`name`, o.`price`, o.`count`";

	static public function getAllOrders($db)
	{	
		$query="SELECT ".self::$allFields." FROM `ORDERS`";
		return self::resultFormaterFromDB($db,$query);
	}
	// static	public function getOrderDeteilsById($db, $menuid)
	// {	
	// 	$query="SELECT ".self::$allFields." FROM `ORDERS` WHERE `menuid`=$menuid";
	// 	return self::resultFormaterFromDB($db, $query);
	// }

	

	static public function getOrderById($db, $idOrder)
	{	
		$query="SELECT ".self::$allFields." FROM `ORDERS` where `id`='$idOrder'";
		return self::resultFormaterFromDB($db, $query);
	}


	static public function getOrderGoodsById($db, $idOrder)
	{	
		$query="SELECT  ".self::$allFieldsOG." FROM `ORDERS_GOODS` where `idOrder`='$idOrder'";
		return self::resultFormaterFromDB($db, $query);
	}

	static public function resultFormaterFromDB($db, $query){
		// echo "<br>---------------------------<br>";
		// var_dump($db);
		// echo "<br><br>";
		// var_dump($query);
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
		return $result;
	}

	static public function editOrders($db) {
	}

	static public function  checkOrderFields( $OrderFields){

	}
	static public function getUserOrdersByEmail ($db, $email) {
		$query="SELECT ".self::$allFields." FROM `ORDERS` where `email`='$email'";
		$orders=self::resultFormaterFromDB($db, $query); 
		$result=[];
		foreach ($orders["data"] as $orderkey => $ordervalue) {
			$oneorder=[];
			$orGd=self::getOrderGoodsDataWithName($db,  $ordervalue["id"]);
			//$orderGoods=array_merge($orderGoods, $orGd["data"]);
			$oneorder["order"]= $ordervalue;
			$oneorder["orderGoods"]=  $orGd["data"];

			$result[]=$oneorder; 
		}
		return $result;
	}

	static public  function getOrderGoodsDataWithName ($db, $idOrder) {// TODO : NOT IMPLEMENTED YET
		$query="SELECT  ".self::$allFieldsOGName." FROM `ORDERS_GOODS` o join GOODS g on o.idGood=g.`idGood` where o.`idOrder`='$idOrder'";
		return self::resultFormaterFromDB($db, $query);

  	}

}
?>