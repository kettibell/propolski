<?// Вьюха для авторизации пользователя ?>
<link rel="stylesheet" type="text/css" href="/web/static/css/autorizashko.css" />
<script src="/web/static/js/autorizashko.js"></script>
<?	//если  в куках есть сессия - показываем профиль пользователя profile_view.php
if (isset($_COOKIE['login']) && isset($_COOKIE['sesson']) 
	&& $_SESSION["login"]==$_COOKIE['login'] && $_SESSION["sesson"]==$_COOKIE['sesson']){
		require_once "profile_view.php"; 
} else {
	if (isset($_GET['route'])) {
		$route = trim(htmlspecialchars(strip_tags($_GET['route'])));
		switch ($route) {
			case 'reg':
				require_once "sign_registrate_view.php"; // если нет сессии и он хочет зарегаться - вьюха регистрации
				break;
			case 'rememberPass':
				require_once "sign_rememberPass_view.php"; // если выбрал "запомнить меня"
				break;
			default:
				require_once "sign_auth_view.php"; // если хочет авторизоваться
				break;
		}
	} else {
		require_once "sign_auth_view.php"; // если сессии нет - просто на страницу авторизации кидаем
	}
}


?>

