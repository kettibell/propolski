<?
	
	class Db 
	{
		public $dbc;
		protected $query;
		protected $result;
		function __construct()
		{			
			$this->dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
			if (!$this->dbc) {
				die();
			}
			$this->dbc->set_charset("utf8");
		}

		public function makeQuery($query){
			$this->result=mysqli_query ($this->dbc, $query);
			if (!$this->result) {
				die();	
			}
			//return $this->result;
			//return (is_bool($this->result))?  $this->result : mysqli_fetch_assoc($this->result)["realRoute"];
		}
		public function makeQuery4Route($query, $real_url_column){
			$this->result=mysqli_query ($this->dbc, $query);
			if (!$this->result) {
				die();	
			}
			return (is_bool($this->result))?  $this->result : mysqli_fetch_assoc($this->result)[$real_url_column];
		}
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
