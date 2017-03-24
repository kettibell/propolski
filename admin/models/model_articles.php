<?php

class Model_Articles extends Model
{
	public $db;
	protected $articlesCl;

	public function __construct ($db){
		parent::__construct($db);
		$this->articlesCl= new Articles($db);
		$this->db-$db;
	}
	
	public function getAllArticles()
	{			
		return $this->articlesCl->getAllArticles();
	}
                                                       
		public function getData4editArticle()
	{	
		if (isset($_GET['id']))  {
				$id= trim (htmlspecialchars(strip_tags($_GET['id'])));
				return  $this->articlesCl->getArticleById( $this->db, $id);
		} else {
			return null;
		}	
	}


		public function editArticle()
	{	
		$articleFields=[];

		$articleFields["name"]			= trim(htmlspecialchars(strip_tags($_POST['name'])));
		$articleFields["title"] 		= trim(htmlspecialchars(strip_tags($_POST['title'])));
		$articleFields["desctiption"] 	= trim(htmlspecialchars(strip_tags($_POST['desctiption'])));
		$articleFields["keywords"] 		= trim(htmlspecialchars(strip_tags($_POST['keywords'])));				
		$articleFields["menuid"] 		= trim(htmlspecialchars(strip_tags($_POST['menuid'])));
		$articleFields["categoryid"]	= trim(htmlspecialchars(strip_tags($_POST['categoryid'])));
		$articleFields["text"] 		= mysqli_real_escape_string($this->db->dbc, $_POST['text']);
		$articleFields["isPublic"] 	= (isset ($_POST['isPublic'])) ? 1 :0 ;
		$articleFields["id"]			= trim(htmlspecialchars(strip_tags($_POST['id'])));
		// var_dump($articleFields["id"]);
		$translit_name=UsefulFunction::translit($articleFields["name"]);		
		$img_name="a_".$translit_name;
		$articleFields["logo"]=$img_name;
		Articles::checkArticleFields( $articleFields);
		if (isset($articleFields["id"]) && $articleFields["id"]!="") {
			Articles::editArticle( $this->db, $articleFields, $articleFields["id"]); //echo "Редактирование";
		} else {
		      Articles::editArticle( $this->db, $articleFields); //echo "добавление";
		      $articleFields["id"]= mysql_insert_id();
		}
		if (isset($_FILES["input23"])){
					$ext = substr($_FILES['input23']['name'][0], 1 + strrpos($_FILES['input23']['name'][0], "."));
					$extFile='';
					if (in_array($ext,array('jpeg','jpe','jpg'))) $extFile = '.jpeg';
					if (in_array($ext,array('gif'))) $extFile = '.gif';
					if (in_array($ext,array('png'))) $extFile = '.png';					
					$imgFullPath="stat/img/".$img_name."_F".$extFile;
					$imgMediumPath="stat/img/".$img_name."_M".$extFile;
					$imgSmallPath="stat/img/".$img_name."_S".$extFile;
					if ($extFile) {
							move_uploaded_file($_FILES["input23"]['tmp_name'][0], $imgFullPath );
					} else {
							echo "Не верный формат файла";
					}
		}
		UsefulFunction::resize($imgFullPath, $imgMediumPath, 550, 550, $percent = false);
		UsefulFunction::resize($imgFullPath, $imgSmallPath, 230, 230, $percent = false);
				$this->setImgToDb($imgFullPath,'Article', $articleFields["id"], $extFile, 'Y');
				$this->setImgToDb($imgMediumPath,'Article', $articleFields["id"],  $extFile, 'Y');
				$this->setImgToDb($imgSmallPath,'Article', $articleFields["id"],  $extFile, 'Y');
		die();
		// var_dump($articleFields);

	}

		public function setImgToDb ($imgPath, $type_img, $key_img, $extFile, $isMain) {
				$this->query="SELECT `name_img` FROM `Images` WHERE `name_img`='$imgPath'";
				$dbRes=$this->db->getQueryResutlInArray($this->query);
				if($dbRes[0]){
					$size=filesize ( $imgPath);
					$this->query="UPDATE `Images` 
					SET `name_img`='$imgPath',`type_img`='$type_img',`key_img`='$key_img',
					`ext_img`='$extFile',`isMain`='$isMain',`size`='$size'
					WHERE `name_img`='$imgPath'";
					$this->db->makeQuery($this->query);	
				}else {
					$size=filesize ( $imgPath);
					$this->query="INSERT INTO `Images`( `name_img`,`type_img`,`key_img`, `ext_img`, `isMain`, `size`) 
					 VALUES ('$imgPath', '$type_img','$key_img','$extFile','$isMain','$size')";
					 $this->db->makeQuery($this->query);	
				}
		}
	
}

