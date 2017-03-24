<?
// модель для профайла
class Model_Profile extends Model
{
	
	protected $query;


	public function __construct ($db){
		parent::__construct($db);
	}

  	public function getUserOrders () {
		$userOrders=[];
		return (isset(unserialize($_SESSION["userInfo"])["email"])) ?
			 (Orders::getUserOrdersByEmail($this->db, unserialize($_SESSION["userInfo"])["email"])) : null ; // тут на форму приходят заказы пользователя. Это уже не надо
  	}
	
}
?>