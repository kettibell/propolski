<link rel="stylesheet" type="text/css" href="/web/static/css/autorizashko.css" />
<script src="/web/static/js/autorizashko.js"></script>
 <?
 if (isset($_COOKIE['registrateMsg'])){
    echo "<h2>".$_COOKIE['registrateMsg']."</h2>";
 } 
 ?>
 <form id="proc_autorize" class="login" method="POST" action="/user/reg">
	<h2>Регистрация</h2>
    <div class="form-group">
       <label for="user" class="icon-user">email:</label>
       <input class="user" type="text" name="email" id="email" placeholder="email"/>
    </div>
     <div class="form-group">
        <label for="password" class="icon-lock">Пароль:</label>
        <input class="password" type="password" name="password"  id="password" placeholder="Пароль"/>
    </div>
    <div class="form-group">
        <label for="repassword" class="icon-lock">Повторите пароль:</label>
        <input class="repassword" type="password" name="repassword"  id="repassword" placeholder="Повторите пароль"/>
    </div>
    <div class="form-group">
        <label for="ulogin" class="icon-user">Логин:</label>
        <input class="ulogin" type="text" name="ulogin" id="ulogin" placeholder="Логин"/>
    </div>
	<div class="form-group">
        <input type="submit" name="reg" class="btn btn-primary" autofocus value="Регистрация"/>
    </div>
	<div class="extra">
		<a href="/login.<?=$config["prefix"]?>" class="forgetPassword">Вход</a>
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
            ulogin: {
                validators: {
                    notEmpty: {
                        message: 'Поле должно быть задано'
                    },
                    stringLength: {
                        min: 3,
                        max: 127,
                        message: 'Поле должно быть больше 3 символов'
                    },
                    regexp: {
                        regexp: /^[A-Za-z0-9А-Яа-я]{3,127}$/,
                        message: 'Поле должно содержать буквы, цифры'
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
            },
            repassword: {
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
                    },
                    identical: {
                        field: 'password',
                        message: 'Пароль не совпадает'
                }
                }
            }
        }
    });
});
</script>

