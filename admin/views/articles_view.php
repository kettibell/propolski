<?
if ($data["errStatus"]) {
	echo "<br> ".$data["errText"];
} else {
	// var_dump($data["data"])
?> 

<h1>Статьи</h1>


<table border="1">
	<div class="btn_btn-primary_my">
		<button type="submit" class="btn btn-primary" name="edit" id="edit"
			onClick=<?echo "'location.href=\"/administrator/articles/edit\"'"?>>Добавить</button>
	<div>	
   <tr>
    <th>Название</th>
    <th>Заглавие</th>
    <th>meta Описание</th>
    <th>meta Ключевые слова</th>
    <th>id меню</th>
    <th>id категории</th>
    <th>Текст</th>
     <th>Публикация</th>
    <th>Изменить</th>
    <th>Удалить</th>
   </tr>

	<?
	if ($data["data"]) {
		foreach ($data["data"] as $datakey => $dataValue) {?>
			<tr>
				<td><?echo  $dataValue["name"]?></td>
				<td><?echo  $dataValue["title"]?></td>
				<td><?echo  $dataValue["desctiption"]?></td>
				<td><?echo  $dataValue["keywords"]?></td>
				<td><?echo  $dataValue["menuid"]?></td>
				<td><?echo  $dataValue["categoryid"]?></td>
				<td><?
				        $shortText =strip_tags( $dataValue["text"]);
       					 //Теперь обрежем его на определённое количество символов:
				        $shortText = substr($shortText, 0, 100);
				        //Затем убедимся, что текст не заканчивается восклицательным знаком, запятой, точкой или тире:
				        $shortText = rtrim($shortText, "!,.-");
				        //Напоследок находим последний пробел, устраняем его и ставим троеточие:
				        $shortText = substr($shortText, 0, strrpos($shortText, ' '));
				        echo $shortText."...";
				//echo  $dataValue["text"]?>
					
				</td>
				<td><?echo  $dataValue["isPublic"]?></td>
				<td>
					<div class="btn_btn-primary_my">
						<button type="submit" class="btn btn-primary" name="edit" id="edit"
						 onClick=<?echo "'location.href=\"/administrator/articles/edit?id=". $dataValue["id"]."\"'"?>>Изменить</button>
					<div>	
				</td>
				<td>
					<div class="btn_btn-primary_my">
						<button type="submit" class="btn btn-primary" name="edit" id="drop">Удалить</button>
					<div>	
				</td>
			</tr>
		<?}?>	

	<?}?>
	

	
</table>
<?}?>