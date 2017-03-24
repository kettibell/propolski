<?php

class Model_Goods extends Model
{
	protected $idGood;
	protected $name;
	protected $nameLink;
	protected $price;
	protected $oldPrice;
	protected $endingGood;
	protected $description;
	protected $mediaLinkVideo;
	protected $mediaLinkDemo;
	protected $topSales;
	protected $promo;
	protected $real_url;
	protected $alias;
	protected $query;

		public function __construct ($db){
		parent::__construct($db);
	}
	
	public function getAllGoods()
	{	
		$this->query="SELECT  `idGood`, `name`, `nameLink`, `price`, `oldPrice`, `endingGood`, `description`, `mediaLinkVideo`, `mediaLinkDemo`, `topSales`, `promo` FROM `GOODS`";
		return $this->db->getQueryResutlInArray($this->query);
	}

		public function getData4editGoods()
	{	
		if (isset($_GET['id']))  {
				$this->idGood= trim (htmlspecialchars(strip_tags($_GET['id'])));
				$this->query="SELECT  `idGood`, `name`, `nameLink`, `price`, `oldPrice`, `endingGood`, `description`, `mediaLinkVideo`, `mediaLinkDemo`, `topSales`, `promo` FROM `GOODS` where `idGood`='$this->idGood'";
				$dbRes=$this->db->getQueryResutlInArray($this->query);
				// var_dump($dbRes[0]);
				if ($dbRes[0]) {
					return $dbRes[0];
				} else {
					return null;
				}
		} else {
			return null;
		}	
	}



		public function editGoods()
	{	

		$this->name = trim(htmlspecialchars(strip_tags($_POST['name'])));
		$this->nameLink = trim(htmlspecialchars(strip_tags($_POST['nameLink'])));
		$this->price = (integer) trim(htmlspecialchars(strip_tags($_POST['price'])));
		$this->oldPrice = (integer) trim(htmlspecialchars(strip_tags($_POST['oldPrice'])));
		$this->endingGood =   (isset ($_POST['endingGood'])) ? 1 :0 ;		
		$this->description = trim(htmlspecialchars(strip_tags($_POST['description'])));
		$this->mediaLinkVideo = trim(htmlspecialchars(strip_tags($_POST['mediaLinkVideo'])));
		$this->mediaLinkDemo = trim(htmlspecialchars(strip_tags($_POST['mediaLinkDemo'])));
		$this->topSales =   (isset ($_POST['topSales'])) ? 1 :0 ;
		$this->promo =   (isset ($_POST['promo'])) ? 1 :0 ;


		if ($this->nameLink==="") {
			$this->nameLink=UsefulFunction::translit($this->name);			
		} 
		// var_dump($this->nameLink);
		// echo "<br>";		
		if (isset($_POST['idGood']) && ($_POST['idGood']!=""))  {			
			$this->idGood = trim(htmlspecialchars(strip_tags($_POST['idGood'])));
			// echo $this->idGood;
			$this->real_url="/goods/showgood?id=".$this->idGood;
			$this->nameLink=$this->nameLink."_".$this->idGood;
			// echo $this->$real_url;
			// die;
			$this->alias=$this->nameLink."_".$this->idGood;
			$this->query="UPDATE `GOODS` set `name`='$this->name',
				 								 `nameLink`='$this->nameLink',
				 								 `price`=$this->price,
				 								 `oldPrice`=$this->oldPrice,
				 								 `endingGood`=$this->endingGood,
				 								 `description`='$this->description',
				 								 `mediaLinkVideo`='$this->mediaLinkVideo',
				 								 `mediaLinkDemo`='$this->mediaLinkDemo',
				 								 `topSales`=$this->topSales,
				 								 `promo`=$this->promo
				 								 where  `idGood`=$this->idGood ";
			// echo $this->query;
			$this->db->makeQuery($this->query);	
			if ($this->isExistAliasInDB($this->real_url)){
				echo "Такой элиас существует !!!";
				return null;
			}			
			$this->real_url="/goods/showgood?id=".$this->idGood;
			if ($this->isExistReal_urlInDB($this->real_url)){
				$this->query="UPDATE `URL_ROUTE` set `alias`='$this->alias'
				 								 where  `real_url`='$this->real_url' ";
			} else {
				$this->query="INSERT INTO `URL_ROUTE`(`alias`, `real_url`) VALUES ('$this->alias','$this->real_url')";
			}	
			echo "<br>";
			echo $this->query;
			$this->db->makeQuery($this->query);	

		} else {
			//TODO: поправить ссылку, чтоб проливалась вместе с ид 

			$this->query="INSERT INTO `GOODS`
			(`name`, `nameLink`, `price`, `oldPrice`, `endingGood`, `description`,
			 `mediaLinkVideo`, `mediaLinkDemo`, `topSales`, `promo`)
			VALUES 
			('$this->name','$this->nameLink',$this->price,$this->oldPrice,$this->endingGood,'$this->description',
			'$this->mediaLinkVideo','$this->mediaLinkDemo',$this->topSales,$this->promo)";
			echo $this->query;
			$this->db->makeQuery($this->query);	
			echo "23552";
			if ($this->isExistAliasInDB() ){
				echo "Такой элиас существует!!!";
				return null;
			}
			$this->query="SELECT  `idGood` FROM `GOODS` where `name`='$this->name'";
			echo $this->query."<br>";
			$dbRes=$this->db->getQueryResutlInArray($this->query);
			// var_dump($dbRes[0]);
			$this->idGood=$dbRes[0]["idGood"];
			$this->real_url="/goods/showgood?id=".$this->idGood;
			$this->alias=$this->nameLink."_".$this->idGood;
			if ($this->isExistReal_urlInDB($this->real_url) ){
				echo "Такой урл существует!!!";
				return null;
			} else {
				$this->query="INSERT INTO `URL_ROUTE`(`alias`, `real_url`) VALUES ('$this->alias','$this->real_url')";
			}
			echo "<br>";
			echo $this->query;
			$this->db->makeQuery($this->query);	
			//  INsert
		}	



		
		// $real_url="/goods/showgood?id=".$this->idGood;

		// $this->query="SELECT  1 FROM `URL_ROUTE` WHERE `real_url`='$real_url'";
		// $dbRes=$this->db->getQueryResutlInArray($this->query);
		// 		// var_dump($dbRes[0]);
		// 		if ($dbRes[0]) {
		// 			echo "exist $real_url";
		// 		} else {
		// 			echo "NOTexist $real_url";
		// 		}		

	}

	// public function getRealURLById($id) // врятли используется
	// {
	//   $this->real_url = (isset($this->real_url)) ? $this->real_url : "/goods/showgood?id=".$this->idGood ;	
	// 	return $this->real_url;	
	// }

		public function isExistAliasInDB($excludedFromCheckRealurl=null)
	{	
		$this->query="SELECT  1 FROM `URL_ROUTE` WHERE `alias`='$this->alias'";
		$this->query.=(!is_null($excludedFromCheckRealurl))?" and `real_url`<>'$excludedFromCheckRealurl'":"";

		$dbRes=$this->db->getQueryResutlInArray($this->query);
		return ($dbRes) ? true:false;			

	}
	public function isExistReal_urlInDB($real_url)
	{					
		$this->query="SELECT  1 FROM `URL_ROUTE` WHERE `real_url`='$this->real_url'";
		echo $this->query."<br>";
		$dbRes=$this->db->getQueryResutlInArray($this->query);
		return ($dbRes) ? true:false;	
	}


}


