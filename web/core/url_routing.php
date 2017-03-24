<?
// Кажется не используется
class  Url_Routing 
{
	protected $db;
	protected $query;

	public function __construct(){
		$this->db = new Db();
		
	}
	public function getRealURLByAlias($alias){
		$this->query="SELECT `real_url` FROM `URL_route` WHERE `alias`='$alias'";
		$dbRes=$this->db->getQueryResutlInArray($this->query);		
		return $dbRes[0]["real_url"];
	}	

}

?>
