<?// Вьюха для страницы с материалами?>
<!-- <h1>Materials</h1> -->

<link rel="stylesheet" href="/web/static/css/article.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="/web/static/css/galery.css" />
<link rel="stylesheet" type="text/css" href="/web/static/css/articlesByCategory.css" />
<script src="web/static/js/galery.js"></script>

    <? //получуть урлик
    $serv_req_uri=explode("?", $_SERVER['REQUEST_URI'])[0];        
    if (stristr($serv_req_uri, 'articles') === FALSE) {
      $serv_req_uri=$serv_req_uri."/articles";
    }

    $http_flag=( isset($_SERVER['HTTPS'] ) )?'https://':'http://' ;
    $serv_req_uri=$http_flag.$_SERVER['SERVER_NAME'].$serv_req_uri;
    ?>

     <div id="center-side"><!--  center-side START-->

      <div class="img-right-popular">
        <img class="img-right-popular" src="/web/static/img/all/game.png" alt="img-right-popular" style="min-width: 45px" /> 
      </div> 
      <div class="main_categor_back" >
        <div class="main_categor_img" >
          <img  src="/web/static/img/all/ucz1.jpg" alt="ucz1" />
        </div>
        <p class="main_categor_p">Обучающий сериал на польском</p>
        <p><? echo  "<a href=\"".$serv_req_uri."?catid=56\">Смотреть все серии...</a>"; ?></p>
      </div>


      <div class="img-right-popular">
        <img class="img-right-popular" src="/web/static/img/all/flash_card.png" alt="img-right-popular" style="min-width: 45px" /> 
      </div> 
      <div class="main_categor_back">
        <div class="main_categor_img">
          <img  src="/web/static/img/all/peppa_pig_family.jpeg" alt="ucz1" />
        </div>
        <p class="main_categor_p">Мультики на польском</p>
        <p><? echo  "<a href=\"".$serv_req_uri."?catid=57\">Смотреть все мультики...</a>"; ?></p>
      </div>




      <div class="img-right-popular">
        <img class="img-right-popular" src="/web/static/img/all/table.png" alt="img-right-popular" style="min-width: 45px" /> 
      </div> 
      <div class="main_categor_back" >
        <div class="main_categor_img" >
          <img  src="/web/static/img/all/ucz1.jpg" alt="ucz1" />
        </div>
        <p class="main_categor_p">Обучающее видео от propolski</p>
        <p><? echo  "<a href=\"".$serv_req_uri."?catid=58\">Смотреть все видео...</a>"; ?></p>
      </div>

    </div><!--  center-side END-->

<!-- Правая часть -->
<div id="right-side">  
  <div class="img-right-popular">
    <img class="img-right-popular" src="/web/static/img/all/most_popul_mater.png" alt="img-right-popular" style="min-width: 45px" /> 
  </div> 

  <?
    require_once "all_right_side.php"; 
  ?>
</div>





