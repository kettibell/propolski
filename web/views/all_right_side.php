            <div id="all_arts_right">   
              <? $isFirstArticle=true;
                $artCounter=0;
                $countOfShowedRightArticles=3;
                $cntAct=0;
                foreach ($data["data"] as $artkey => $artvalue) {// по всем статьям  по очереди отображаем картинку и первые 1000 символов статьи
                 // $artCounter++;
                  if ($cntAct>=$countOfShowedRightArticles) {
                    break;
                  }
                  ($cntAct++) ;

         
                ?> 
                <div class="arts_right"> 
                 <div class="img_arts_right">  
                 <p>
                  <a href="#"><img src=<?echo "\"/".$artvalue["name_img"]."\""?> alt=<?echo "\"".$artvalue["name"]."\""?>></a>
                  </div>
                    <h4>
                      <?
                         echo  "<a href=\"".$serv_req_uri."?artid=".$artvalue["id"]."\">".$artvalue["name"]."</h2></a>";
                      ?>
                      </h4>
                      <br>
                     
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
 

          <div class="intro-header"> 
            <div class="container-subscr"  align="center">

              <div class="tab-content custom-tab-content" align="center">
                <div class="subscribe-panel">
                  <h2>Подписаться</h2>
                  <p>на новые уроки</p>
                          
                          <form action="" method="post">
                                
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                            <input type="text" class="form-control input-lg" name="email" id="email"  placeholder="Введите Email"/>
                          </div>
                        </div>
                        <div class="col-md-4"></div>
                              <br/><br/><br/>
                              <button class="btn btn-warning btn-lg">Подписаться</button>
                        </form>

                 </div>
               </div>
          </div>
          </div>

         </div>