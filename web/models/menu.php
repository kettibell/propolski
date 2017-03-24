<?
// модель для менюшки. Не уверена, что оно используется , но пусть пока лежит
class Menu
{
	
	protected $query;
	protected $errText;


	public function __construct ($db){
		parent::__construct($db);
	}

 	public function getMenu () {
		//$dataArr ["data"]=[];
		$this->query="SELECT `id`, `name`, `ru_name`, `small_name`, `logo`, `url` FROM `MENU`";
		$dataArr["data"]=$this->db->getQueryResutlInArray($this->query);
		//var_dump($allgoods);
		if($dbRes[0]){ // если получили коректный результат от базы
			$errStatus=false;
			$errText="";
		}else {
			$errStatus=true;
			$errText="Не удалось получить данные из базы";
		}
		$result =  [
    		"errStatus" => $errStatus,
    		"errText" => $errText,
    		"data" => $allMenu
		];
		 $result=array_merge($result, $dataArr);
		return $result;
  }
}
?>


					
					