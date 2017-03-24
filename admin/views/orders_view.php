<?
if ($data["errStatus"]) {
	echo "<br> ".$data["errText"];
} else {
	// var_dump($data["data"])  	static public $allFields="`id`, `id_user`, `email`, `city`, `country`, `surname`, `name`, `patronymic`, `phone`, `state`";

?> 

<h1>Заказы</h1>


<table border="1">
<!-- 	<div class="btn_btn-primary_my">
		<button type="submit" class="btn btn-primary" name="edit" id="edit"
			onClick=<?//echo "'location.href=\"/administrator/orders/edit\"'"?>>Добавить</button>
	<div> -->	
 <caption>Таблица заказов</caption>
   <tr>
    <th>id пользователя</th>
    <th>email</th>
    <th>Город доставки</th>
    <th>Страна доставки</th>
    <th>Фамилия</th>
    <th>Имя</th>
     <th>Отчество</th>
    <th>Телефон</th>
    <th>Статус заказа</th>
     <th>Обработать</th>
    <th>Исполнен</th>
   </tr>

	<?foreach ($data["data"] as $datakey => $dataValue) {?>
	<tr>
		<td><?echo  $dataValue["id_user"]?></td>
		<td><?echo  $dataValue["email"]?></td>
		<td><?echo  $dataValue["city"]?></td>
		<td><?echo  $dataValue["country"]?></td>
		<td><?echo  $dataValue["surname"]?></td>
		<td><?echo  $dataValue["name"]?></td>
		<td><?echo  $dataValue["patronymic"]?></td>		
		<td><?echo  $dataValue["phone"]?></td>
		<td><?echo  $dataValue["state"]?></td>
		<td>
			<div class="btn_btn-primary_my">
				<button type="submit" class="btn btn-primary" name="edit" id="edit"
				 onClick=<?echo "'location.href=\"/administrator/orders/edit?id=". $dataValue["id"]."\"'"?>>Обработать</button>
			<div>	
		</td>
		<td>
			<div class="btn_btn-primary_my">
				<button type="submit" class="btn btn-primary" name="edit" id="drop">Исполнен</button>
			<div>	
		</td>
	</tr>
	<?}?>	
	
</table>
<?}?>