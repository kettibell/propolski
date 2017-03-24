<?
if ($data["errStatus"]) {
	echo "<br> ".$data["errText"];
} else {
	// var_dump($data["data"])
?> 

<h1>Категории</h1>


<table border="1">
	<div class="btn_btn-primary_my">
		<button type="submit" class="btn btn-primary" name="edit" id="edit"
			onClick=<?echo "'location.href=\"/administrator/categories/edit\"'"?>>Добавить</button>
	<div>	
 <caption>Таблица категорий</caption>
   <tr>
    <th>Название</th>
    <th>Заглавие</th>
    <th>meta Описание</th>
    <th>meta Ключевые слова</th>
    <th>id меню</th>
    <th>id родительской записи</th>
     <th>Публикация</th>
    <th>Изменить</th>
    <th>Удалить</th>
   </tr>

	<?foreach ($data["data"] as $datakey => $dataValue) {?>
	<tr>
		<td><?echo  $dataValue["name"]?></td>
		<td><?echo  $dataValue["title"]?></td>
		<td><?echo  $dataValue["desctiption"]?></td>
		<td><?echo  $dataValue["keywords"]?></td>
		<td><?echo  $dataValue["menuid"]?></td>
		<td><?echo  $dataValue["parentid"]?></td>
		<td><?echo  $dataValue["isPublic"]?></td>
		<td>
			<div class="btn_btn-primary_my">
				<button type="submit" class="btn btn-primary" name="edit" id="edit"
				 onClick=<?echo "'location.href=\"/administrator/categories/edit?id=". $dataValue["id"]."\"'"?>>Изменить</button>
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
<?}?>