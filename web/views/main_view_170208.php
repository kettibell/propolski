<?// Вьюха для домашней страницы ?>
<h1>Добро пожаловать!</h1>
<link rel="stylesheet" href="/web/static/css/article.css" type="text/css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="/web/static/css/slider.css" />
    <link rel="stylesheet" type="text/css" href="/web/static/css/galery.css" />
  <script src="web/static/js/galery.js"></script>

        <div class="slcontainer">
      <!-- Codrops top bar -->
<!--             <div class="codrops-top">
                <a href="http://tympanus.net/Tutorials/CSSButtonsPseudoElements/">
                    <strong>&laquo; Previous Demo: </strong>CSS Buttons with Pseudo-elements
                </a>
                <span class="right">
          <a href="http://www.behance.net/gallery/w-h-i-t-e/269865" target="_blank">Images by Joanna Kustra</a>
          <a href="http://creativecommons.org/licenses/by-nc/3.0/" target="_blank">CC BY-NC 3.0</a>
                    <a href="http://tympanus.net/codrops/2012/01/17/sliding-image-panels-with-css3/">
                        <strong>Back to the Codrops Article</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div> -->
            <!--/ Codrops top bar -->
<!--       <header>
        <h1>Sliding Image Panels <span>with CSS3</span></h1>
        <p class="codrops-demos">
          <a href="index.html">Demo 1</a>
          <a href="index2.html">Demo 2</a>
          <a href="index3.html">Demo 3</a>
          <a class="current-demo" href="index4.html">Demo 4</a>
        </p>
      </header> -->
      <section class="cr-slcontainer">
        
        <input id="select-img-1" name="radio-set-1" type="radio" class="cr-selector-img-1" checked/>
        <label for="select-img-1" class="cr-label-img-1">1</label>
        
        <input id="select-img-2" name="radio-set-1" type="radio" class="cr-selector-img-2" />
        <label for="select-img-2" class="cr-label-img-2">2</label>
        
        <input id="select-img-3" name="radio-set-1" type="radio" class="cr-selector-img-3" />
        <label for="select-img-3" class="cr-label-img-3">3</label>
        
        <input id="select-img-4" name="radio-set-1" type="radio" class="cr-selector-img-4" />
        <label for="select-img-4" class="cr-label-img-4">4</label>
        
        <div class="clr"></div> 
        <div class="cr-bgimg">
          <div>
            <span>Slice 1 - Image 1</span>
            <span>Slice 1 - Image 2</span>
            <span>Slice 1 - Image 3</span>
            <span>Slice 1 - Image 4</span>
          </div>
          <div>
            <span>Slice 2 - Image 1</span>
            <span>Slice 2 - Image 2</span>
            <span>Slice 2 - Image 3</span>
            <span>Slice 2 - Image 4</span>
          </div>
          <div>
            <span>Slice 3 - Image 1</span>
            <span>Slice 3 - Image 2</span>
            <span>Slice 3 - Image 3</span>
            <span>Slice 3 - Image 4</span>
          </div>
          <div>
            <span>Slice 4 - Image 1</span>
            <span>Slice 4 - Image 2</span>
            <span>Slice 4 - Image 3</span>
            <span>Slice 4 - Image 4</span>
          </div>
        </div>
        <div class="cr-titles">
          <h3><span>Serendipity</span><span>What you've been dreaming of</span></h3>
          <h3><span>Adventure</span><span>Where the fun begins</span></h3>
          <h3><span>Nature</span><span>Unforgettable eperiences</span></h3>
          <h3><span>Serenity</span><span>When silence touches nature</span></h3>
        </div>
      </section>
        </div>






<div class="polski_carousel_with_back">
 <img  class="back_carusel" src="/web/static/img/all/background.png" alt="back" >
      <div class="polski_carousel">
      <img  class="warsaw" src="/web/static/img/all/warsaw.png" alt="Warsaw" >
            <!-- Карусель -->
        <div id="myCarousel" class="carousel slide" data-interval="6000" data-ride="carousel">
          <!-- Индикаторы для карусели -->
          <ol class="carousel-indicators">
            <!-- Перейти к 0 слайду карусели с помощью соответствующего индекса data-slide-to="0" -->
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <!-- Перейти к 1 слайду карусели с помощью соответствующего индекса data-slide-to="1" -->
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <!-- Перейти к 2 слайду карусели с помощью соответствующего индекса data-slide-to="2" -->
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <!-- Перейти к 3 слайду карусели с помощью соответствующего индекса data-slide-to="2" -->
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>   
          <!-- Слайды карусели -->
          <div class="carousel-inner">
            <!-- Слайды создаются с помощью контейнера с классом item, внутри которого помещается содержимое слайда -->
            <div class="active item">
              <img src="/web/static/img/slider/11.jpg" alt="...">
              <!--h2>Слайд №1</h2-->
              <div class="carousel-caption polski-carousel">
                <h3>Чтение на польском языке по методу Ильи Франка</h3>
                <p>Гарри Поттер и философский камень</p>
              </div>
            </div>
            <!-- Слайд №2 -->
            <div class="item">
                <img src="/web/static/img/slider/12.jpg" alt="...">
              <h2>Slide 2</h2>
              <div class="carousel-caption polski-carousel">
                <h3>Волшебный замок Мальборк</h3>
                <p>Один день в Средневековье</p>
              </div>
            </div>
            <!-- Слайд №3 Топ-1000 слов: польский язык -->
            <div class="item">
              <img src="/web/static/img/slider/13.jpg" alt="...">
              <h2>Slide 3</h2>
              <div class="carousel-caption polski-carousel">
                <h3>Вроцлавский зоопарк</h3>
                <p>И пусть Вас тоже укусит верблюд!</p>
              </div>
            </div>
            <!-- Слайд №4  -->
            <div class="item">
              <img src="/web/static/img/slider/14.jpg" alt="...">
              <h2>Slide 3</h2>
              <div class="carousel-caption polski-carousel">
                <h3>Топ-1000 слов: польский язык</h3>
                <p>Самые популярные слова польского языка</p>
              </div>
            </div>
          </div>
          <!-- Навигация для карусели -->
          <!-- Кнопка, осуществляющая переход на предыдущий слайд с помощью атрибута data-slide="prev" -->
          <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <!-- Кнопка, осуществляющая переход на следующий слайд с помощью атрибута data-slide="next" -->
          <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
    </div>
    <p class="carousel_test">
      At et volupti unt qui rem rem eum fuga. Am ium esti bearum
facid quis sam rem volupta tiassequae. Tusandae sume ipsandam fuga. Ita dit mi, solo et volumquide porerovit
experum lam iunti dolesciendem et od qui inctum vel in es remporeicit litat volese volum quodit, netur, velicabo.
Otas ium aut faccusam, seque solorpo rpossinci velit accum doluptam et, cus moluptur, optam quia quaecab
    </p>
</div>

      <div id="content-side"> 
        <div class="img-news">
         <img   class="img-news" src="/web/static/img/all/news.png" alt="img-news" > 
             <div class="pointers">
             <img  src="/web/static/img/all/left_pointer.png " alt="left_pointer" > 
              <img  src="/web/static/img/all/right_pointer.png " alt="right_pointer" >         
            </div> 
        </div> 














<p></p>
<div class="container">
<div class="col-xs-12">      
    <div class="carousel slide" id="myCarousel">
        <div class="carousel-inner">
            <div class="item active">
                    <ul class="thumbnails">
                        <li class="col-sm-3">
              <div class="fff">
                <div class="thumbnail">
                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                </div>
                <div class="caption">
                  <h4>Praesent commodo</h4>
                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                  <a class="btn btn-mini" href="#">» Read More</a>
                </div>
                            </div>
                        </li>
                        <li class="col-sm-3">
              <div class="fff">
                <div class="thumbnail">
                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                </div>
                <div class="caption">
                  <h4>Praesent commodo</h4>
                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                  <a class="btn btn-mini" href="#">» Read More</a>
                </div>
                            </div>
                        </li>
                    </ul>
              </div><!-- /Slide1 --> 
            <div class="item">
                    <ul class="thumbnails">
  
                        <li class="col-sm-3">
              <div class="fff">
                <div class="thumbnail">
                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                </div>
                <div class="caption">
                  <h4>Praesent commodo</h4>
                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                  <a class="btn btn-mini" href="#">» Read More</a>
                </div>
                            </div>
                        </li>
                        <li class="col-sm-3">
              <div class="fff">
                <div class="thumbnail">
                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                </div>
                <div class="caption">
                  <h4>Praesent commodo</h4>
                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                  <a class="btn btn-mini" href="#">» Read More</a>
                </div>
                            </div>
                        </li>
                    </ul>
              </div><!-- /Slide2 --> 
            <div class="item">
                    <ul class="thumbnails">
                        <li class="col-sm-3">
              <div class="fff">
                <div class="thumbnail">
                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                </div>
                <div class="caption">
                  <h4>Praesent commodo</h4>
                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                  <a class="btn btn-mini" href="#">» Read More</a>
                </div>
                            </div>
                        </li>
                        <li class="col-sm-3">
              <div class="fff">
                <div class="thumbnail">
                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                </div>
                <div class="caption">
                  <h4>Praesent commodo</h4>
                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                  <a class="btn btn-mini" href="#">» Read More</a>
                </div>
                            </div>
                        </li>
                    </ul>
              </div><!-- /Slide3 --> 
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










































                  

         
                <? // а теперь отображаем новости: статьи, которые последними были добавлены
                $serv_req_uri=explode("?", $_SERVER['REQUEST_URI'])[0];
                if (!isset($data["data"]) || is_null($data) || $data["errStatus"]) {  // если еще нет статей по этой теме
                    echo "<br> ".$data["errText"];  
                    echo "<br> <h2>Раздел редактируется</h2>";  
                } else {
                    foreach ($data["data"] as $artkey => $artvalue) {// по всем статьям  по очереди отображаем картинку и первые 1000 символов статьи
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
            
      </div>
      <div id="right-side">  
      <div class="img-about_project">
          <img  class="img-about_project" src="/web/static/img/all/project.png" alt="img-about_project" >
          <div class="text-about_project"> 
          ehytdhjfytjytjdhfghrtsgfz
          </div>
      </div>
  
            
      </div>


