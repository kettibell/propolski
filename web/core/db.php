<?
	// основной класс для работы с базой
	class Db 
	{
		// $this->result=mysqli_query ($this->dbc, "SET NAMES utf8");
		public $dbc;
		protected $query;
		protected $result;
		// в конструкторе создаем соединение к БД
		function __construct()
		{
			$this->dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
			if (!$this->dbc) {
				die();
			}
			$this->dbc->set_charset("utf8");
		}
// для выполнения запроса
		public function makeQuery($query){
			// mysql_query($this->dbc, "SET NAMES utf8");  
			$this->result=mysqli_query ($this->dbc, $query);
			if (!$this->result) {
				die();	
			}
			//return $this->result;
			//return (is_bool($this->result))?  $this->result : mysqli_fetch_assoc($this->result)["realRoute"];
		}
		// для выполнения запроса на получение реального урла страницы
		public function makeQuery4Route($query, $real_url_column){
			// mysql_query($this->dbc, "SET NAMES utf8"); 
			$this->result=mysqli_query ($this->dbc, $query);
			// var_dump($this->dbc);
			if (!$this->result) {
				die();	
			}
			return (is_bool($this->result))?  $this->result : mysqli_fetch_assoc($this->result)[$real_url_column];
		}
		// все, что база нам вернула запихнём в массив
		public function getQueryResutlInArray($query){
			$this::makeQuery($query);
			while ( $row=mysqli_fetch_array ($this->result,  MYSQLI_ASSOC)) {//  возвращает 1 строку
				$arr[]=$row;
			}
			//var_dump($arr);
			return ($arr);
		}

		function __destruct(){
			mysqli_close($this->dbc);
		}
	}

?>
