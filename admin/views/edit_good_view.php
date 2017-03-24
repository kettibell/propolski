
    <?
               $good = (isset($data)) ? $data : [] ; 
                  // var_dump($good);
  

  function elemValue($good, $elem)
    {
            echo  (isset($good[$elem])) ? "value=\"".$good[$elem]."\"" : "" ;          
    }

      function elemValueEditor($good, $elem)
    {
            echo  (isset($good[$elem])) ? $good[$elem]: "" ;          
    }
          function elemValueCheckBox($good, $elem)
    {
            $res=(isset($good[$elem]) && $good[$elem]==="1") ?"checked": "" ;   
            echo $res;       
    }
//elemValue($good, "name");
   //  var_dump(isset($good["topSales"])) ;
   //      var_dump($good["topSales"]==="1");
   // elemValueCheckBox($good, "topSales") ;

    ?>

      <form id="editProductProcess" action="/administrator/goods/edit"  enctype="multipart/form-data" method="POST" class="form-horizontal">
     	<br>
     	<h2>Форма добавления\изменения товара</h2>
     	<br>

     		<div class="form-group">
     			<label class="col-xs-3 control-label">Название товара: </label>
     			<div class="col-xs-5">
     				<input type="text" class="form-control" name="name" <? elemValue($good, "name")?> placeholder="Название товара"/>
                    <input type="text" class="form-control" name="idGood" <?elemValue($good, "idGood")?> placeholder="" hidden/>
     			</div>
     		</div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Ссылка:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="nameLink"  <?elemValue($good, "nameLink")?> placeholder="Ссылка"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Цена:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="price" <?elemValue($good, "price")?> placeholder="Цена"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Старая цена:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="oldPrice" <?elemValue($good, "oldPrice")?> placeholder="Старая цена"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Ссылка на видео:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="mediaLinkVideo" <?elemValue($good, "mediaLinkVideo")?> placeholder="Ссылка на видео"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">Ссылка на демо:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="mediaLinkDemo" <?elemValue($good, "mediaLinkDemo")?> placeholder="Ссылка на демо"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Стикеры:</label>
                <div class="col-xs-5">
                    <label for="topSales" class="btn btn-success">Топ продаж <input type="checkbox" name="sticker_topSales" id="topSales" class="badgebox" <?elemValueCheckBox($good, "topSales")?> ><span class="badge">&check;</span></label>
                    <label for="promo" class="btn btn-warning">Акция <input type="checkbox" name="sticker_promo" id="promo" class="badgebox" <?elemValueCheckBox($good, "promo")?> ><span class="badge">&check;</span></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Цвета:</label>
                <div class="col-xs-5">
                    <p class="checkboxGroup">
                            <label for="gold" class="btn btn-default">gold <input type="checkbox" name="newGood.colorsGood" id="gold" class="badgebox"><span class="badge">&check;</span></label>
                            <label for="black" class="btn btn-default">black <input type="checkbox" name="newGood.colorsGood" id="black" class="badgebox"><span class="badge">&check;</span></label>
                            <label for="blue" class="btn btn-default">blue <input type="checkbox" name="newGood.colorsGood" id="blue" class="badgebox"><span class="badge">&check;</span></label>
                            <label for="red" class="btn btn-default">red <input type="checkbox" name="newGood.colorsGood" id="red" class="badgebox"><span class="badge">&check;</span></label>
                            <label for="white" class="btn btn-default">white <input type="checkbox" name="newGood.colorsGood" id="white" class="badgebox"><span class="badge">&check;</span></label>
                            <label for="green" class="btn btn-default">green <input type="checkbox" name="newGood.colorsGood" id="green" class="badgebox"><span class="badge">&check;</span></label>
                        </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Картинка:</label>           
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Загрузить картинку:</label>
                <div class="col-xs-5">
                    <span class="btn btn-success btn-file">Выбрать <input type="file" name="imgGood_file"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Ссылка:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="imgGood_0" placeholder="Ссылка"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Alt:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="imgGood_1" placeholder="Alt"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Подпись к картинке:</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="imgGood_2" placeholder="Подпись к картинке"/>
                </div>
            </div>
            <div class="form-group">
            <label class="col-xs-3 control-label">Особенности:</label>
                <div class="col-xs-5">
                    <label for="endingGood" class="btn btn-success">Продукт заканчивается <input type="checkbox" name="endingGood" id="endingGood" <?elemValue($good, "idGood")?> class="badgebox"><span class="badge">&check;</span></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Еще картинки:</label>
                <div class="col-xs-5">
                    <span class="btn btn-success btn-file">Browse <input type="file" name="newGood.features.0"></span><img src="..." alt="..." class="img-rounded"><br>
                        <span class="btn btn-success btn-file">Browse <input type="file" name="newGood.features.1"></span><img src="..." alt="..." class="img-rounded"><br>
                        <span class="btn btn-success btn-file">Browse <input type="file" name="newGood.features.2"></span><img src="..." alt="..." class="img-rounded"><br>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Описание:</label>            
            </div>

            <textarea name="description" id="description"  rows="10" cols="80">
                        <?elemValueEditor($good, "description")?>
            </textarea>
            
            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'description' );
             </script>

            <div class="form-group">
                <div class="col-xs-9 col-xs-offset-3">
                <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </div>


    </form>

    <script type="text/javascript">
    	// Without JQuery
    //var slider = new Slider('#ex1', {
    //	formatter: function(value) {
    //		return 'Current value: ' + value;
    //	}
    //});


    /*Валидация формы*/
    $(document).ready(function() {
        $('#addProductProcess').bootstrapValidator({
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
                            regexp: /^[a-zA-Z0-9А-Яа-я_\.]+$/,
                            message: 'Поле должно содержать буквы, цифры, точку и подчеркивание'
                        }
                    }
                },
                nameLink: {
                    validators: {
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'Должно алиас продукта'
                        }
                    }
                },
                price: {
                    validators: {
                        notEmpty: {
                            message: 'Поле должно быть задано'
                        },
                        regexp: {
                            regexp: /\d/,
                            message: 'Поле должно содержать цифры'
                        }
                    }
                },
                oldPrice: {
                    validators: {
                        notEmpty: {
                            message: 'Поле должно быть задано'
                        },
                        regexp: {
                            regexp: /\d/,
                            message: 'Поле должно содержать цифры'
                        }
                    }
                }, 
                mediaLinkVideo: {
                    validators: {
                        notEmpty: {
                            message: 'Поле должно быть задано'
                        },
                        regexp: {
                            regexp: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/,
                            message: 'Должно содержать урл'
                        }
                    }
                },
                mediaLinkDemo: {
                    validators: {
                        notEmpty: {
                            message: 'Поле должно быть задано'
                        },
                        regexp: {
                            regexp: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/,
                            message: 'Должно содержать урл'
                        }
                    }
                },            
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required'
                        }
                    }
                }
            }
        });
    });

    </script>