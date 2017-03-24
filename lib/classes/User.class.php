<?
// Класс для пользователя. Вынесла туда пока только один метод
class User 
{
	protected $login;
	protected $passwd;
	protected $email;
	protected $first_name;
	protected $last_name;
	protected $avatar;

	protected $valid;
	protected $cookie_time;
	protected $query;

	public function __construct ($db){
		parent::__construct($db);
	}

	protected function setAllFieldsFromDbByField($fieldName, $fieldValue){
		$this->query="SELECT `login`, `email`,`first_name`, `last_name`, `avatar` FROM `Users` WHERE `$fieldName`='$fieldValue'";
		$dbRes=$this->db->getQueryResutlInArray($this->query);
		$this->login=$dbRes[0]["login"];
		$this->email=$dbRes[0]["email"];
		$this->first_name=$dbRes[0]["first_name"];
		$this->last_name=$dbRes[0]["last_name"];
		$this->avatar=$dbRes[0]["avatar"];
	}	

}
?>