<?
if ($data["errStatus"]) {
    echo "<br> ".$data["errText"];
} else {
     // var_dump($data["data"]);

     $onedat = (isset($data["data"][0])) ? $data ["data"][0]: [] ; 
                  // var_dump($onedat);
  

  function elemValue($onedat, $elem)
    {
            echo  (isset($onedat[$elem])) ? "value=\"".$onedat[$elem]."\"" : "" ;          
    }

    //   function elemValueEditor($onedat, $elem)
    // {
    //         echo  (isset($onedat[$elem])) ? $onedat[$elem]: "" ;          
    // }
          function elemValueCheckBox($onedat, $elem)
    {
            $res=(isset($onedat[$elem]) && $onedat[$elem]==="1") ?"checked": "" ;   
            echo $res;       
    }
    //  `id`, `name`, `title`, `desctiption`, `keywords`, `menuid`, `parentid`, `isPublic` 

    // <th>Заглавие</th>
    // <th>meta Описание</th>
    // <th>meta Ключевые слова</th>
    // <th>id меню</th>
    // <th>id родительской записи</th>
    //  <th>Публикация</th>
    ?>

      <form id="editProductProcess" action="/administrator/categories/edit"  enctype="multipart/form-data" method="POST" class="form-horizontal">
     	<br>
     	<h2>Форма добавления\изменения категории</h2>
     	<br>

     		<div class="form-group">
     			<label class="col-xs-3 control-label">Название категории: </label>
     			<div class="col-xs-5">
     				<input type="text" class="form-control" name="name" <? elemValue($onedat, "name")?> placeholder="Название категории"/>
                    <input type="text" class="form-control" name="idGood" <?elemValue($onedat, "id")?> placeholder="" hidden/>
     			</div>
     		</div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Заглавие:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="title"  <?elemValue($onedat, "title")?> placeholder="Заглавие"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">meta Описание:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="desctiption" <?elemValue($onedat, "desctiption")?> placeholder="meta Описание"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">meta Ключевые слова:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="keywords" <?elemValue($onedat, "keywords")?> placeholder="meta Ключевые слова"/>
                </div>
            </div>             
            <div class="form-group">
            <label class="col-xs-3 control-label">Публикация:</label>
            <div class="col-xs-5">
            <label for="isPublic" class="btn btn-success">Публикация<input type="checkbox" name="isPublic" id="isPublic" class="badgebox" <?elemValueCheckBox($onedat, "isPublic")?> ><span class="badge">&check;</span></label>
            </div> 
            </div> 

            <div class="form-group">
              <label class="col-xs-3 control-label" for="sel1">Меню id:</label>
              <div class="col-xs-5">
                  <select class="form-control" id="sel1">
                  <?
                  if ($data["menu"]["data"]) {
                    foreach ($data["menu"]["data"] as $menuKey => $menuValue) {
                        $selected="";
                        if (isset($onedat["menuid"]) && $menuValue["id"]==$onedat["menuid"]){
                            $selected="selected";
                        }
                        echo "<option name=\"".$menuValue["id"]."\" ".$selected.">".$menuValue["ru_name"]."</option>";
                    }
   
                  }
                  ?>
                  </select>
                </div>
            </div>

           <div class="form-group">
              <label class="col-xs-3 control-label" for="sel1">Родительская:</label>
              <div class="col-xs-5">
                  <select class="form-control" id="sel1">
                  <?
                  $selected="";
                    if (! isset($onedat["parentid"]) || is_null($onedat["parentid"])){
                            $selected="selected";
                  }?>
                  <option name="0" <?echo $selected?>>Нет родительской категории</option>
                  <?
                  if ($data["categories"]["data"]) {
                    foreach ($data["categories"]["data"] as $catKey => $catValue) {
                    $selected="";
                     if (isset($onedat["parentid"]) && $catValue["id"]==$onedat["id"]){
                            $selected="selected";
                    }
                        echo "<option name=\"".$catValue["id"]."\">".$catValue["name"]."</option>";
                    }
   
                  }
                  ?>
                  </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-9 col-xs-offset-3">
                <button type="submit" class="btn btn-primary">Изменить</button>
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
                            regexp: /^[a-zA-Z0-9А-Яа-я_\ \.]+$/,
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
                            regexp: /^[a-zA-Z0-9А-Яа-я_\ \.]+$/,
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
                            regexp: /^[a-zA-Z0-9А-Яа-я_\ \.]+$/,
                            message: 'Поле должно содержать буквы, цифры, точку и подчеркивание'
                        }
                    }
                }

            }
        });
    });

    </script>