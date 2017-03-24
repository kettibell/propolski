<?
if ($data["errStatus"]) {
    echo "<br> ".$data["errText"];
} else {

     $onedat = (isset($data["data"][0])) ? $data ["data"][0]: [] ; 
// var_dump($onedat);
  function elemValue($onedat, $elem)
    {
            echo  (isset($onedat[$elem])) ? "value=\"".$onedat[$elem]."\"" : "" ;          
    }

          function elemValueCheckBox($onedat, $elem)
    {
            $res=(isset($onedat[$elem]) && $onedat[$elem]==="1") ?"checked": "" ;   
            echo $res;       
    }
 
    ?>

      <form id="editProductProcess" action="/administrator/orders/edit"  enctype="multipart/form-data" method="POST" class="form-horizontal">
     	<br>
     	<h2>Форма редактирования заказа</h2>
     	<br>

     		<div class="form-group">
     			<label class="col-xs-3 control-label">id пользователя: </label>
     			<div class="col-xs-5">
     				<input type="text" class="form-control" name="id_user" <? elemValue($onedat, "id_user")?> placeholder="id пользователя"/>
                    <input type="text" class="form-control" name="idGood" <?elemValue($onedat, "id")?> placeholder="" hidden/>
     			</div>
     		</div>
            <div class="form-group">
                <label class="col-xs-3 control-label">email:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="email"  <?elemValue($onedat, "email")?> placeholder="email"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Город доставки:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="city" <?elemValue($onedat, "city")?> placeholder="Город доставки"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Страна доставки:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="country" <?elemValue($onedat, "country")?> placeholder="Страна доставки"/>
                </div>
            </div> 
            <div class="form-group">
                <label class="col-xs-3 control-label">Фамилия:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="surname" <?elemValue($onedat, "surname")?> placeholder="Фамилия"/>
                </div>
            </div>      
            <div class="form-group">
                <label class="col-xs-3 control-label">Имя:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="name" <?elemValue($onedat, "name")?> placeholder="Имя"/>
                </div>
            </div>      
            <div class="form-group">
                <label class="col-xs-3 control-label">Отчество:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="patronymic" <?elemValue($onedat, "patronymic")?> placeholder="Отчество"/>
                </div>
            </div>      
             <div class="form-group">
                <label class="col-xs-3 control-label">Телефон:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="phone" <?elemValue($onedat, "phone")?> placeholder="Телефон"/>
                </div>
            </div>      
       <!--      <div class="form-group">
                <label class="col-xs-3 control-label">Статус заказа:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="state" <//?elemValue($onedat, "state")?> placeholder="Страна доставки"/>
                </div>
            </div>       -->            
 <!--            <div class="form-group">
            <label class="col-xs-3 control-label">Публикация:</label>
            <div class="col-xs-5">
            <label for="isPublic" class="btn btn-success">Публикация<input type="checkbox" name="isPublic" id="isPublic" class="badgebox" <?//elemValueCheckBox($onedat, "isPublic")?> ><span class="badge">&check;</span></label>
            </div> 
            </div>  -->

            <div class="form-group">
              <label class="col-xs-3 control-label" for="sel1">Статус заказа:</label>
              <div class="col-xs-5">
                  <select class="form-control" id="sel1">
                  <?
                   $ordStates= [
                                 ["orderStateId" => 'NN', "orderSateName"=> 'Новый'],
                                 ["orderStateId" => 'WK', "orderSateName"=> 'В работе у менеджера'],
                                 ["orderStateId" => 'WT', "orderSateName"=> 'Ожидает доставки'],
                                 ["orderStateId" => 'AN', "orderSateName"=> 'Доставлен']        
                               ];

                    foreach ($ordStates as $ordSKey => $ordSValue) {
                        $selected="";
                        if ( $onedat["state"]==$ordSValue["orderStateId"]){
                            $selected="selected";
                        }
                        echo "<option name=\"".$ordSValue["orderStateId"]."\" ".$selected.">".$ordSValue["orderSateName"]."</option>";
                    }
   
                  
                  ?>
                  </select>
                </div>
            </div>

      
            <div class="form-group">
                <div class="col-xs-9 col-xs-offset-3">
                <button type="submit" class="btn btn-primary">Готово</button>
                </div>
            </div>


    </form>
<?}?>
    <script type="text/javascript">
    	// Without JQuery
    //var slider = new Slider('#ex1', {
    //	formatter: function(value) {
    //		return 'Current value: ' + value;
    //	}
    //});


    /*Валидация формы*/
    $(document).ready(function() {
        $('#editProductProcess').bootstrapValidator({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
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
                title: {
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
                },
                desctiption: {
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
                },
                keywords: {
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