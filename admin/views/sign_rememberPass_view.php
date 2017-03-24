<link rel="stylesheet" type="text/css" href="/web/static/css/autorizashko.css" />
<script src="/web/static/js/autorizashko.js"></script>
 <form id="proc_autorize" class="login" method="POST" action="/user/remember">
	<h2>Забыли пароль ? </h2>
    <label for="user" class="icon-user">email:</label>
    <input class="user" name="email" id="email" placeholder="email"/>
	
	<label for="description"><span class="description"/> Не беда. Мы можем отправить пароль на почту)</label>
	<input type="submit" name="remember" value="Отправить" />
	<div class="extra">
	<!-- 	<a href="#" class="forgetPassword"></a>
		<a href="#" class="facebook icon-facebook">Facebook</a>
		<a href="#" class="googlePlus icon-google-plus-sign">Google+</a> -->
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
            login: {
                validators: {
                    notEmpty: {
                        message: 'Поле должно быть задано'
                    },
                    stringLength: {
                        min: 2,
                        max: 500,
                        message: 'Поле должно быть больше 2 символов'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
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
                        min: 2,
                        max: 500,
                        message: 'Поле должно быть больше 2 символов'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9А-Яа-я_\.]+$/,
                        message: 'Поле должно содержать буквы, цифры, точку и подчеркивание'
                    }
                }
            }
        }
    });
});

</script>

