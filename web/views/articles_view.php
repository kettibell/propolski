<?// Вьюха для того, чтоб отобразаить статьи списком ?>
<link rel="stylesheet" href="../web/static/css/article.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="../web/static/css/galery.css" />

<script src="../web/static/js/galery.js"></script>
<?
if (!isset($this->globaldata["categories"]) || is_null($this->globaldata["categories"]) ||$this->globaldata["categories"]["errStatus"]) {
  echo "<br> ".$globaldata["categories"]["errText"];
} else {
  $categories=$this->globaldata["categories"]["data"];
}
?> 

    <? // а теперь отображаем новости: статьи, которые последними были добавлены
        $serv_req_uri=explode("?", $_SERVER['REQUEST_URI'])[0];        
        $serv_req_uri=explode(".", $_SERVER['REQUEST_URI'])[0];
        $serv_req_uri=$serv_req_uri."/articles";
          if (!isset($data["data"]) || is_null($data) || $data["errStatus"]) {  // если еще нет статей по этой теме
                echo "<br> ".$data["errText"];  
                echo "<br> <h2>Раздел редактируется</h2>";  
          } else {?> 
          <p class="p_level"> Выберите уровень: </p>
          <?

          if (isset($categories)) {
            foreach ($categories as $catkey => $catvalue) {
            // echo "2".$catvalue["title"];
              echo "<a href=\"".$serv_req_uri."?catid=".$catvalue["id"]."\" ><img class=\"all_category_img\" src=\"/web/static/img/all/".strtolower($catvalue["title"]).".png\" alt=\"".$catvalue["desctiption"]."\"></a>";

            }

          }
          // var_dump($categories)
          ?>
          <br>
   <div class="container">
    <div class="col-xs-12">      
      <div class="carousel slide" id="myCarousel">
        <div class="carousel-inner">
                <? $isFirstArticle=true;
                $artCounter=0;
                foreach ($data["data"] as $artkey => $artvalue) {// по всем статьям  по очереди отображаем картинку и первые 1000 символов статьи

                  $artCounter++;
                  if ($artCounter % 4 == 1) {// 4 слайда за раз отображаем
                      if ($isFirstArticle) {// если это первый элемент
                          echo "<div class=\"item active\">";
                          $isFirstArticle=false;
                    } else {
                          echo "<div class=\"item\">";
                    }
                    echo "<ul class=\"thumbnails\">";
                  }               
                ?>
                          
                            <li class="col-sm-3">
                              <div class="fff">
                                <div class="thumbnail">
                                  <a href="#"><img src=<?echo "\"".$artvalue["name_img"]."\""?> alt=<?echo "\"".$artvalue["name"]."\""?>></a>
                                </div>
                                <div class="caption">
                                  <h4> <?
                                      echo  "<a href=\"".$serv_req_uri."?artid=".$artvalue["id"]."\">".$artvalue["name"]."</h2></a>";
                                      ?>
                                  </h4>
                                  <p>
                                    <?

                                      //  Первым делом, уберём все html элементы:
                                      $shortText =strip_tags( $artvalue["text"]);
                                      //Теперь обрежем его на определённое количество символов:
                                      $shortText = substr($shortText, 0, 100);
                                      //Затем убедимся, что текст не заканчивается восклицательным знаком, запятой, точкой или тире:
                                      $shortText = rtrim($shortText, "!,.-");
                                      //Напоследок находим последний пробел, устраняем его и ставим троеточие:
                                      $shortText = substr($shortText, 0, strrpos($shortText, ' '));
                                      // var_dump($artCounter % 4);
                                      echo $shortText."...";                        
                                    //  echo  "<a href=\"".$serv_req_uri."?artid=".$artvalue["id"]."\">".$artvalue["name"]."</h2></a>";
                                      ?>
                                  </p>
                                  <a class="btn btn-mini" href=<?echo "\"".$serv_req_uri."?artid=".$artvalue["id"]."\""?>>»  Подробнее</a>
                                </div>
                              </div>
                            </li>   
                      <?
                          if ($artCounter % 4 == 0) {// 4 слайда за раз отображаем
                          echo "</ul> </div>";
                          // $artCounter=0;
                          }  

                    }
                    ?>
                                   </div>                                 
                                

                                <nav>

                                  <ul class="control-box pager">
                                    <li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
                                    <li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
                                  </ul>
                                </nav>
                                <!-- /.control-box -->   
                              </div><!-- /#myCarousel -->
                            </div><!-- /.col-xs-12 -->          
                          </div><!-- /.container -->

                    <?
                  }
                  ?>



