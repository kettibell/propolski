<link rel="stylesheet" type="text/css" href="/web/static/css/autorizashko.css" />
<script src="/web/static/js/autorizashko.js"></script>
  <?
 if (isset($_COOKIE['authMsg'])){
    echo "<h2>".$_COOKIE['authMsg']."</h2>";
 } 
 ?>
 <form id="proc_autorize" class="login" method="POST" action="/user/auth" >
	<h2>Авторизация</h2>
    <div class="form-group">
	   <label for="user" class="icon-user">email:</label>
       <input class="user" type="text" name="email" id="email" value="anika.kn.902@gmail.com" placeholder="email"/>
    </div>
     <div class="form-group">
        <label for="password" class="icon-lock">Пароль:</label>
        <input class="password" type="password" name="password"  id="password" value="Sonrisa@5" placeholder="Пароль"/>
    </div>
    <div class="form-group">
        <label for="remember">
            <input type="checkbox" id="remember" name="remember" />
            <span class="remember"/>Запомнить меня
            </label>
    </div>
    <div class="form-group">
        <label for="registrate">
            <a href="/registration.<?=$config["prefix"]?>" class="registrate">Зарегистрироваться</a>
        </label>
    </div>
    <div class="form-group">
        <input type="submit" name="auth" class="btn btn-primary" value="Войти"/>
    </div>

	
	<div class="extra">
		<a href="/rememberPass.<?=$config["prefix"]?>" class="forgetPassword">Забыли пароль?</a>
		<a href="#" class="facebook icon-facebook">Facebook</a>
		<a href="#" class="googlePlus icon-google-plus-sign">Google+</a>
	</div>
</form>
	

<script type="text/javascript">

/*Валидация формы*/
$(document).ready(function() {
    $('#proc_autorize').bootstrapValidator({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Поле должно быть задано'
                    },
                    stringLength: {
                        min: 6,
                        max: 127,
                        message: 'Поле должно быть больше 6 символов'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
                        message: 'Поле должно содержать буквы, цифры, точку и подчеркивание'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Поле должно быть задано'
                    },
                    stringLength: {
                        min: 8,
                        max: 127,
                        message: 'Поле должно быть больше 8 символов'
                    },
                    regexp: {
                        regexp: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/,
                        message: 'Поле должно содержать латинские буквы, цифры, спецсимволы '
                    }
                }
            }
        }
    });
});

</script>

