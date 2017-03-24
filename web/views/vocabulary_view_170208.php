<?// Вьюха для страницы словарика?>
<h1>Vocabulary</h1>
<link rel="stylesheet" href="/web/static/css/article.css" type="text/css" media="screen"/>

<? 
$serv_req_uri=explode("?", $_SERVER['REQUEST_URI'])[0];
if (!isset($data["data"]) || is_null($data) || $data["errStatus"]) { // если еще нет статей по этой теме
    echo "<br> ".$data["errText"];  
    echo "<br> <h2>Раздел редактируется</h2>";  
} else {
    foreach ($data["data"] as $artkey => $artvalue) { // по всем статьям  по очереди отображаем картинку и первые 1000 символов статьи
        ?>
        <div class="block_article">
        <?
        echo  "<a href=\"".$serv_req_uri."?artid=".$artvalue["id"]."\"><h2>".$artvalue["name"]."</h2></a>";
        ?>
        <img class="img_art"  alt=<?echo "\"".$artvalue["name_img"]."\""?> src=<?echo "\"".$artvalue["name_img"]."\""?>>        
        <?
        //  Первым делом, уберём все html элементы:
        $shortText =strip_tags( $artvalue["text"]);
        //Теперь обрежем его на определённое количество символов:
        $shortText = substr($shortText, 0, 1000);
        //Затем убедимся, что текст не заканчивается восклицательным знаком, запятой, точкой или тире:
        $shortText = rtrim($shortText, "!,.-");
        //Напоследок находим последний пробел, устраняем его и ставим троеточие:
        $shortText = substr($shortText, 0, strrpos($shortText, ' '));
        echo $shortText."...";

         ?>
        </div>
        <?

    }
}
?>