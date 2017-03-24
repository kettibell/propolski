<?// Вьюха для страницы личного кабинета пользователя?>
<script type="text/javascript" src="lib/bootstrap-fileinput-master/js/fileinput.min.js"></script>
<link rel="stylesheet" href="lib/bootstrap-fileinput-master/css/fileinput.min.css" type="text/css" media="screen"/>
<script src="lib/bootstrap-fileinput-master/js/fileinput.js"></script>
<script src="lib/bootstrap-fileinput-master/js/locales/ru.js"></script>
<link href="/lib/photo-editor-gh-pages/css/font-awesome.min.css" rel="stylesheet">
<link href="/lib/photo-editor-gh-pages/css/cropper.min.css" rel="stylesheet">
<link href="/lib/photo-editor-gh-pages/css/main.css" rel="stylesheet">
<?
   
   if (isset($_COOKIE['usrUpdateMsg'])){
   	echo "<h2 class=\"warningMsg\">".$_COOKIE['usrUpdateMsg']."</h2>";
   } 
    $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
    $user = json_decode($s, true);
                    //$user['network'] - соц. сеть, через которую авторизовался пользователь
                    //$user['identity'] - уникальная строка определяющая конкретного пользователя соц. сети
                    //$user['first_name'] - имя пользователя
                    //$user['last_name'] - фамилия пользователя
                // var_dump($user);
   //$deffFieldValue="Заполните это поле";
   //$userInfo=unserialize($_SESSION["userInfo"]);
   ?>
<h1> Личный кабинет. </h1>
<h3> Добро пожаловать, <? echo $data["login"]?> </h3>
<form id="editUser" class="user"  method="POST" action="/user/edit"  enctype="multipart/form-data" >
   <table width="100%" >
      <tr>
         <td width="70%">
            <table  width="100%" >
                <tr>
                  <td  width="20%">
                     <label for="text" class="control-label">Логин</label>
                  </td>
                  <td width="80%">
                     <div class="form-group">
                        <input type="text" class="form-control" name="login" id="login" value=<?echo "".$data["login"]."";?>>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td  width="20%">
                     <label for="text" class="control-label">Email</label>
                  </td>
                  <td width="80%">
                     <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" value=<?echo "".$data["email"]."";?>>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td  width="20%">
                     <label for="text" class="control-label">Имя</label>
                  </td>
                  <td width="80%">
                     <div class="form-group">
                        <input type="text" class="form-control"  name="first_name"  id="first_name" value=<?echo "".$data["first_name"]."";?>>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td  width="20%">
                     <label for="text" class="control-label">Фамилия</label>
                  </td>
                  <td width="80%">
                     <div class="form-group">
                        <input type="text" class="form-control" name="last_name" id="last_name"    value=<?echo "".$data["last_name"]."";?>>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td  width="20%">
                  </td>
                  <td width="80%">
                     <div class="btn_btn-primary_my">
                     <button type="submit" class="btn btn-primary" name="edit" id="edit">Сохранить изменения</button>
                     <div>
                  </td>
               <tr>
                  <td  width="20%">
                  </td>
                  <td width="80%">
                     <!-- <form id="dropUser" method="POST" action="/user/drop"  enctype="multipart/form-data" > -->
                     <div class="btn_btn-primary_my">
                     <button type="submit" class="btn btn-primary" name="drop" id="drop" >Удалить аккаунт</button>
                     <div>
                  </td>
            </table>
         </td>
         <td width="30%">
            <div class="middle-avatar"> 
               <img  src=<?echo "".$data["last_name"]."";?>  "/web/static/img/avatars/default.png" class="pull-right" class="img-circle" alt="avatar">
            </div>
            <br>
            <div class="form-group">
            <!-- <label class="control-label">Select File</label> -->
            <input id="input-23" name="input23[]" type="file" multiple class="file-loading">
            <script>
               $(document).on('ready', function() {
               	$("#input-23").fileinput({
               		showUpload: false,
               		language: "ru",
               		allowedFileExtensions: ["jpg", "png", "gif"],
               		layoutTemplates: {
               			main1: "{preview}\n" +
               			"<div class=\'input-group {class}\'>\n" +
               			"   <div class=\'input-group-btn\'>\n" +
               			"       {browse}\n" +
               			"       {upload}\n" +
               			"       {remove}\n" +
               			"   </div>\n" +
               			"   {caption}\n" +
               			"</div>"
               		}
               	});
               });
            </script>
</form>
</td>
</tr>

</table>
<input type="hidden"  name="real_email" id="real_email"    value=<?echo "".$data["email"]."";?>>
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
   						min: 3,
   						max: 127,
   						message: 'Поле должно быть больше 2 символов'
   					},
   					regexp: {
   						regexp: /^[\w]{3,127}$/,
   						message: 'Поле должно содержать буквы, цифры, точку и подчеркивание'
   					}
   				}
   			},
   			email: {
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
   						regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
   						message: 'Поле должно содержать буквы, цифры, точку и подчеркивание'
   					}
   				}
   			}
   		}
   	});
   });
   
</script>