    <? // а теперь отображаем новости: статьи, которые последними были добавлены
        $serv_req_uri=explode("?", $_SERVER['REQUEST_URI'])[0];        
       // $serv_req_uri=explode(".", $_SERVER['REQUEST_URI'])[0];
        if (stristr($serv_req_uri, 'articles') === FALSE) {
            $serv_req_uri=$serv_req_uri."/articles";
        }

        $http_flag=( isset($_SERVER['HTTPS'] ) )?'https://':'http://' ;
        $serv_req_uri=$http_flag.$_SERVER['SERVER_NAME'].$serv_req_uri;
        // var_dump($serv_req_uri);
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
          // var_dump($serv_req_uri);
          ?>
<br>

             <div id="all_arts_center">   
              <? $isFirstArticle=true;
                $artCounter=0;
                foreach ($data["data"] as $artkey => $artvalue) {// по всем статьям  по очереди отображаем картинку и первые 1000 символов статьи
                 // $artCounter++;
                  // var_dump($artvalue["categoryid"]);
         
                ?> 
                <div class="arts_center"> 
                 <div class="img_arts_center">  
                 <p>
                  <a href="#"><img src=<?echo "\"/".$artvalue["name_img"]."\""?> alt=<?echo "\"".$artvalue["name"]."\""?>></a>
                  </div>
                  <? foreach ($categories as $catkey => $catvalue)  {
                    if ($artvalue["categoryid"]==$catvalue["id"]) {
                      echo "<img class=\"all_category_img\" src=\"/web/static/img/all/".strtolower($catvalue["title"]).".png\" alt=\"".$catvalue["desctiption"]."\">";
                      break;
                    }
                  }
                  ?>
                    <h4>
                      <?
                         echo  "<a href=\"".$serv_req_uri."?artid=".$artvalue["id"]."\">".$artvalue["name"]."</h2></a>";
                      ?>
                      </h4>
                     
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
                <?}?>     
             </div>

                                 <?
                  }
                  ?>