<h1>Товары</h1>


<table border="1">
	<div class="btn_btn-primary_my">
		<button type="submit" class="btn btn-primary" name="edit" id="edit"
			onClick=<?echo "'location.href=\"/administrator/goods/edit\"'"?>>Добавить</button>
	<div>	
 <caption>Таблица товаров</caption>
   <tr>
    <th>Название</th>
    <th>Ссылка</th>
    <th>Цена</th>
    <th>Старая цена</th>
    <th>Заканчивается</th>
    <th>Описание</th>
    <th>Демо</th>
    <th>Видео</th>
    <th>Изменить</th>
    <th>Удалить</th>
   </tr>
	
	<?foreach ($data as $goodkey => $goodValue) {?>
	<tr>
		<td><?echo  $goodValue["name"]?></td>
		<td><?echo  $goodValue["nameLink"]?></td>
		<td><?echo  $goodValue["price"]?></td>
		<td><?echo  $goodValue["oldPrice"]?></td>
		<td><?echo  $goodValue["endingGood"]?></td>
		<td><?echo  $goodValue["description"]?></td>
		<td><?echo  $goodValue["mediaLinkVideo"]?></td>
		<td><?echo  $goodValue["mediaLinkDemo"]?></td>
		<td>
			<div class="btn_btn-primary_my">
				<button type="submit" class="btn btn-primary" name="edit" id="edit"
				 onClick=<?echo "'location.href=\"/administrator/goods/edit?id=". $goodValue["idGood"]."\"'"?>>Изменить</button>
			<div>	
		</td>
		<td>
			<div class="btn_btn-primary_my">
				<button type="submit" class="btn btn-primary" name="edit" id="drop">Удалить</button>
			<div>	
		</td>
	</tr>
	<?}?>	
	
</table>
