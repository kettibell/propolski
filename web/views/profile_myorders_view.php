<?// Вьюха, чтоб в профиле пользователя показывать выбранные товары и их стоимость. Сейчас не актуальна, но пусть пока валяется?>
 <link rel="stylesheet" href="/web/static/css/basket.css" type="text/css" media="screen"/>
  
<h1>Мои заказы</h1>
<? 

if (!isset($data) || is_null($data) || $data["errStatus"]) {
	echo "<h3>Еще не оформлен ни один заказ</h3>";	
} else {
    foreach ($data as $oneOrderkey => $oneOrdervalue) {
        echo "<h3>Заказ номер ".$oneOrdervalue["order"]["id"]."</h3>";
        $order=$oneOrdervalue["order"];   
?>


<div class="table-responsive basket_table"> 
		<table class="table table-hover table-responsive ">
		   <tr class="danger">
		    <th>Название</th>
		    <th>Цена за единицу</th>
		    <th>Количество</th> 
		    <th>Цена</th>
		   </tr>
		   <?
		   $totalPrice=0;
		   $totalCount=0;
		   foreach ($oneOrdervalue["orderGoods"] as $buyskey => $buysvalue) {
		   	$greenColor= ($greenColor=="class=\"success\"") ? "":"class=\"success\"" ;
		   	 echo "<tr ".$greenColor.">";
		   	 echo "<td>".$buysvalue["name"]."</td>";
		   	 echo "<td>".$buysvalue["price"]." ".$config["curency"]."</td>";
		   	 echo "<td>".$buysvalue["count"]." шт</td>";	   	 
		   	 echo "<td>".$buysvalue["count"]*$buysvalue["price"]." ".$config["curency"]."</td>";
		   	 echo "</tr>";
		   	 $totalCount+=$buysvalue["count"];
		   	 $totalPrice+=$buysvalue["count"]*$buysvalue["price"];
		   }?>
		     <tfoot class="basket_buy_tfoot">
			    <tr class="danger">
			      <td>Всего приобрели:</td>
			      <td></td>
			      <td><?echo $totalCount." шт";?></td>
			      <td><?echo $totalPrice." ".$config["curency"];?></td>
			    </tr>
	  		</tfoot>
		</table>
	<!-- </div> -->
</div>

<form id="editOrder" action="/basket/setOrder"  enctype="multipart/form-data" method="POST" class="form-horizontal">
     	<br>
     	<h4>Данные заказа</h4>
     	<br>
     		<div class="form-group">
     			<label class="col-xs-3 control-label">e-mail: </label>
     			<div class="col-xs-5">
     				<input type="text" class="form-control" name="email" <? echo "value=\"".$oneOrdervalue["order"]["email"]."\""?> placeholder="e-mail"/>
                    <input  type="hidden" class="form-control" name="iduser" <? echo "value=\"".$oneOrdervalue["order"]["id_user"]."\""?> placeholder="" />
                    
     			</div>
     		</div>

     		<div class="form-group">
     			<label class="col-xs-3 control-label">Фамилия: </label>
     			<div class="col-xs-5">
     				<input type="text" class="form-control" name="name"  <? echo "value=\"".$oneOrdervalue["order"]["name"]."\""?> placeholder="Фамилия"/>
     			</div>
     		</div>
     		<div class="form-group">
     			<label class="col-xs-3 control-label">Имя: </label>
     			<div class="col-xs-5">
     				<input type="text" class="form-control" name="surname"  <? echo "value=\"".$oneOrdervalue["order"]["surname"]."\""?> placeholder="Имя"/>
     			</div>
     		</div>
     		<div class="form-group">
     			<label class="col-xs-3 control-label">Отчество: </label>
     			<div class="col-xs-5">
     				<input type="text" class="form-control" name="patronymic"  <? echo "value=\"".$oneOrdervalue["order"]["patronymic"]."\""?> placeholder="Отчество"/>
     			</div>
     		</div>
     		<div class="form-group">
     			<label class="col-xs-3 control-label">Страна: </label>
     			<div class="col-xs-5">
		     		<select class="selectpicker" data-live-search="true" name="country">
						  <option data-tokens="ua">Украина</option>
						  <option data-tokens="es">Испания</option>
						  <option data-tokens="pl">Польша</option>
					</select>
				</div>
     		</div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Город доставки: </label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="city"  <? echo "value=\"".$oneOrdervalue["order"]["city"]."\""?> placeholder="Город доставки"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-3 control-label">Контактный телефон: </label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="phone"  <? echo "value=\"".$oneOrdervalue["order"]["phone"]."\""?> placeholder="Телефон"/>
                </div>
            </div>

     		<div class="form-group">
                <div class="col-xs-9 col-xs-offset-3">
                <button type="submit" class="btn btn-success">Редактировать</button>
                </div>
            </div>


</form>
    <?}?>
<?}?>