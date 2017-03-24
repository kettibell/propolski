<?// Вьюха для одной статьи ?>
<link rel="stylesheet" href="/web/static/css/article.css" type="text/css" media="screen"/>
<? 
if (!isset($data["data"]) || is_null($data) || $data["errStatus"]) {
    echo "<br> ".$data["errText"];  
    echo "<br> <h2>Раздел редактируется</h2>";  
} else {
    $article=$data["data"][0]; 
    // var_dump($article);
        ?>
        <div class="block_article">
        <meta name="description" content=<?echo "\"".$article["description"]."\"";?>> 
        <meta name="keywords" content=<?echo "\"".$article["keywords"]."\"";?>> 
        <title><?echo "\"".$article["title"]."\"";?></title>
    
        <?
        echo  "<h2>".$article["name"]."</h2>";
        ?>
        <img class="mainimg_art"  alt=<?echo "\""
        .$article["name_img"]."\""?> src=<?echo "\"../".$article["name_img"]."\""?>> 
        <p>   </p>
        <?
        echo  "<div>".$article["text"]."</div>";  

        $filename = "stat/tests/".$article["logo"].".php" ; // подключение файлов тестов
        // var_dump( $filename );var_dump( file_exists ( $filename ) );
        if ( file_exists ( $filename )) {
            require_once $filename;
        }
         ?>
        </div>
        <?

}
?>


