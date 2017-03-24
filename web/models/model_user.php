<?
// Класс для работы с пользователем
class Model_User extends Model
{
	protected $login;
	protected $passwd;
	protected $email;
	protected $query;
	protected $valid;
	protected $cookie_time;
	protected $first_name;
	protected $last_name;
	protected $avatar;

	public function __construct ($db){
		parent::__construct($db);
	}
// авторизация пользователя
	public function authUser () {
		if (trim (htmlspecialchars(strip_tags($_POST['auth'])))) {
			$this->passwd= trim (htmlspecialchars(strip_tags($_POST['password'])));
			$this->email = trim (htmlspecialchars(strip_tags($_POST['email'])));
			if (isset($_POST["remember"]) ) {// если нажал кнопку "запомнить меня" - запоминаем надолго (в конфигах срок)
				$this->cookie_time=time()+REMEMBER_ME_SESSION_TIME;
			} else {
				$this->cookie_time=time()+SESSION_TIME;
			}
		}
		// проверка: это уже существующий юзер ?
		$checkinUserResult=$this->checkExistUser();
		switch ($checkinUserResult) { // Ответы про успешной и нет авторизации
			case 0:			
				setcookie("authMsg","Авторизация успешна!",0 ,'/');
				$this->setAllFieldsFromDbByEmail($this->email);
				return true;
				break;
			case 1:	
				setcookie("authMsg","Не верный пароль.",0 ,'/');
				return false;
				break;
			case 2:	
				setcookie("authMsg","Пользователя с таким адресом email не существует",0 ,'/');
				return false;
				break;
		}
		setcookie("authMsg","Не верно введены данные",0 ,'/');
		return false;
	}
	// вытащить из базы все данные о пользователе по его email
	protected function setAllFieldsFromDbByEmail($email){
		$this->query="SELECT `login`, `email`,`first_name`, `last_name`, `avatar` FROM `Users` WHERE `email`='$email'";
		$dbRes=$this->db->getQueryResutlInArray($this->query);
		$this->login=$dbRes[0]["login"];
		$this->email=$dbRes[0]["email"];
		$this->first_name=$dbRes[0]["first_name"];
		$this->last_name=$dbRes[0]["last_name"];
		$this->avatar=$dbRes[0]["avatar"];

	}	
// проинициализировать поля данными из базы
	protected function setAllFieldsFromDb(){		
		$this->query="SELECT `login`, `email`,`first_name`, `last_name`, `avatar` FROM `Users` WHERE `login`='$login'";
		$dbRes=$this->db->getQueryResutlInArray($this->query);
		$this->login=$dbRes[0]["login"];
		$this->email=$dbRes[0]["email"];
		$this->first_name=$dbRes[0]["first_name"];
		$this->last_name=$dbRes[0]["last_name"];
		$this->avatar=$dbRes[0]["avatar"];

	}	

// проверка существует ли юзер
	public function checkExistUser(){
		$this->query="SELECT `email` FROM `Users` WHERE `email`='$this->email'";
		$emailRes=$this->db->getQueryResutlInArray($this->query);
		if (! isset($emailRes[0]["email"])) {
			return 2;
		}
		$this->query="SELECT `passwd` FROM `Users` WHERE `email`='$this->email'";
		$passwdRes=$this->db->getQueryResutlInArray($this->query);		
		if (password_verify ($this->passwd, $passwdRes[0]["passwd"])) {
			return 0;
		}
		return 1;
	}	

// регистрация пользователя - проверка на валидноссть полей
	public function regUser(){
		if (trim (htmlspecialchars(strip_tags($_POST['reg'])))) {
			$this->login = trim (htmlspecialchars(strip_tags($_POST['ulogin'])));
			$this->passwd= trim (htmlspecialchars(strip_tags($_POST['password'])));
			$this->email = trim (htmlspecialchars(strip_tags($_POST['email'])));
			$this->valid = Validation::checkAllFields(["login"=>$this->login, 'passwd'=>$this->passwd, "email"=>$this->email]);
			if (!$this->valid) {
				
				die();
			}
			$this->passwd = password_hash($this->passwd, PASSWORD_DEFAULT); //  создаем хеш пароля
			$this->login = mysqli_real_escape_string($this->db->dbc, $this->login);
			$this->passwd = mysqli_real_escape_string($this->db->dbc, $this->passwd);
			$this->email = mysqli_real_escape_string($this->db->dbc, $this->email);
		
		}

		$checkinUserResult=$this->checkNewUser();
		switch ($checkinUserResult) {
			case 0:
				$this->query="INSERT INTO `Users`(`login`, `passwd`, `email`) VALUES ('$this->login', '$this->passwd','$this->email')";
				$this->db->makeQuery($this->query);
				
				setcookie("registrateMsg","Поздравляем! Вы успешно зарегистрировались!",0 ,'/');
				return true;
				break;
			case 1:	
				setcookie("registrateMsg","Пользователь с таким логином уже зарегистрирован",0 ,'/');
				return false;
				break;
			case 2:	
				setcookie("registrateMsg","Пользователь с таким e-mail уже зарегистрирован",0 ,'/');
				return false;
				break;
		}
		setcookie("registrateMsg","Пользователь с такими данными уже зарегистрирован",0 ,'/');
		return false;
	}
	// проверка нового пользователя: есть ли кто-то с таким логином или email
	public function checkNewUser(){
		$this->query="SELECT `login` FROM `Users` WHERE `login`='$this->login'";
		$loginRes=$this->db->getQueryResutlInArray($this->query);		
		if ($loginRes[0]["login"]==$this->login) {
			return 1;
		}
		$this->query="SELECT `email` FROM `Users` WHERE `email`='$this->email'";
		$emailRes=$this->db->getQueryResutlInArray($this->query);
		if ($emailRes[0]["email"]==$this->email) {
			return 2;
		}
		return 0;
	}	

	public function getLogin(){
		return $this->login;
	}
	public function getCookieTime(){
		return $this->cookie_time;
	}
// сериализуем инфо в юзере 
	public function getSerializedUserInfo ($login) {
		$this->setAllFieldsFromDbByLogin($login);
		return serialize(['login'=> $this->login,
			'login'=> $this->login,
			'email'=> $this->email,
			'first_name'=> $this->first_name,
			'last_name'=> $this->last_name,
			'avatar'=> $this->avatar
		 ]);

	}
// проинициализировать все поля с данными о пользователе по его логину
		public function setAllFieldsFromDbByLogin ($login) {
		$this->query="SELECT `login`, `email`,`first_name`, `last_name`, `avatar` FROM `Users` WHERE `login`='$login'";
		$dbRes=$this->db->getQueryResutlInArray($this->query);
		$this->login=$dbRes[0]["login"];
		$this->email=$dbRes[0]["email"];
		$this->first_name=$dbRes[0]["first_name"];
		$this->last_name=$dbRes[0]["last_name"];
		$this->avatar=$dbRes[0]["avatar"];

	}
//string(140) "a:5:{s:5:"login";s:5:"Anika";s:5:"email";s:22:"anika.kn.902@gmail.com";s:10:"first_name";s:0:"";s:9:"last_name";s:0:"";s:6:"avatar";s:0:"";}" 
	//array(5) { ["login"]=> string(5) "Anika" ["email"]=> string(22) "anika.kn.902@gmail.com" ["first_name"]=> string(0) "" ["last_name"]=> string(0) "" ["avatar"]=> string(0) "" } 
	// получить из сессии все данные о пользовале, как в примере выше
		public function getUserInfo () {
			$userInfo=unserialize($_SESSION["userInfo"]);
			//var_dump(unserialize($_SESSION["userInfo"]));

		if (empty ($userInfo) || empty($userInfo["login"])) 	{
			echo "Ошибка определения логина пользователя";
		}	else {
			return $userInfo;
		}

		$this->setAllFieldsFromDbByLogin($login);
		return serialize(['login'=> $this->login,
			'login'=> $this->login,
			'email'=> $this->email,
			'first_name'=> $this->first_name,
			'last_name'=> $this->last_name,
			'avatar'=> $this->avatar
		 ]);

	}

// редактирование учетных данных пользователя
		public function editUser () {
				$form_email = 		trim (htmlspecialchars(strip_tags($_POST['email'])));
				$form_login = 		trim (htmlspecialchars(strip_tags($_POST['login'])));
				$form_first_name= 	trim (htmlspecialchars(strip_tags($_POST['first_name'])));
				$form_last_name = 	trim (htmlspecialchars(strip_tags($_POST['last_name'])));
				$real_email = 	trim (htmlspecialchars(strip_tags($_POST['real_email'])));


				$fields4validate=["login"=>$form_login, "email"=>$form_email];
					if (isset($form_first_name) && !empty($form_first_name)) {
						$fields4validate["first_name"]=$form_first_name;
					}
					if (isset($form_last_name) && !empty($form_last_name)) {
						$fields4validate["last_name"] = $form_last_name;
					}

				$this->valid = Validation::checkAllFields($fields4validate);				
				if (!$this->valid) {				
					die();
				}


				$form_login = mysqli_real_escape_string($this->db->dbc, $form_login);
				$form_email = mysqli_real_escape_string($this->db->dbc, $form_email);
				$form_first_name = mysqli_real_escape_string($this->db->dbc, $form_first_name);
				$form_last_name = mysqli_real_escape_string($this->db->dbc, $form_last_name);
				$real_email = mysqli_real_escape_string($this->db->dbc, $real_email);
				if (isset($_FILES["input23"])){ // если он задал аватарку
					$ext = substr($_FILES['input23']['name'][0], 1 + strrpos($_FILES['input23']['name'][0], "."));
					$extFile='';
					// проверяем расширение - что это реально картинка
					if (in_array($ext,array('jpeg','jpe','jpg'))) $extFile = '.jpeg';
					if (in_array($ext,array('gif'))) $extFile = '.gif';
					if (in_array($ext,array('png'))) $extFile = '.png';
					// сохраняем на файловую системы в полном, среднем и маленьком формате
					$imgFullPath="stat/img/".$form_login."_F".$extFile;
					$imgMediumPath="stat/img/".$form_login."_M".$extFile;
					$imgSmallPath="stat/img/".$form_login."_S".$extFile;
					if ($extFile) {
							move_uploaded_file($_FILES["input23"]['tmp_name'][0], $imgFullPath );
					} else {
							echo "Не верный фотрмат файла";
					}
				}
				UsefulFunction::resize($imgFullPath, $imgMediumPath, 100, 100, $percent = false);
				UsefulFunction::resize($imgFullPath, $imgSmallPath, 50, 50, $percent = false);

				$this->query="UPDATE `Users` set `login`='$form_login',
				 								 `email`='$form_email' ";
				 $this->query.=(isset($form_first_name) && !empty($form_first_name)) ? ", `first_name`='$form_first_name'" : "" ;
				 $this->query.=(isset($form_last_name) && !empty($form_last_name)) ? ", `last_name`='$form_last_name'" : "" ;
				 $this->query.=" WHERE email='$real_email'";
				$this->db->makeQuery($this->query);	
				$_SESSION["userInfo"] = $this->getSerializedUserInfo($form_login);	

				$this->query="SELECT `id` FROM `Users` WHERE `login`='$form_login'";
				$dbRes=$this->db->getQueryResutlInArray($this->query);

				$this->setImgToDb($imgFullPath,'Users', $this->login=$dbRes[0]["id"], $extFile, 'Y');
				$this->setImgToDb($imgMediumPath,'Users', $this->login=$dbRes[0]["id"],  $extFile, 'Y');
				$this->setImgToDb($imgSmallPath,'Users', $this->login=$dbRes[0]["id"],  $extFile, 'Y');





		}
		// заливаем данные об аватарке в базу
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
// удаление юзера
			public function dropUser () {
				$real_email = 	trim (htmlspecialchars(strip_tags($_POST['real_email'])));
				$real_email = mysqli_real_escape_string($this->db->dbc, $real_email);
				$this->query="INSERT INTO  `Users_DEL` SELECT * FROM  `Users`  WHERE email='$real_email'";
				$this->db->makeQuery($this->query);
				$this->query="DELETE from  `Users`  WHERE email='$real_email'";
				$this->db->makeQuery($this->query);
				$_SESSION["userInfo"] ="";	
				//INSERT INTO `Users` (`login`, `passwd`, `email`, `first_name`, `last_name`, `avatar`) SELECT `login`, `passwd`, `email`, `first_name`, `last_name`, `avatar` FROM `Users_DEL`

			}
}
?>