
<link rel="stylesheet" type="text/css" href="/web/static/css/slider.css" />
<script src="web/static/js/slider.js"></script>

<?
    if ($data['page']=='about') {
        require_once 'main_about.php';
    } else {
?>
<div id="our_carousel_top">
    <div style="background: #C8D86A; padding: 15px">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="float: left; display: inline-block; width: 70%">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <!-- <img src="http://placehold.it/1200x400/16a085/ffffff&text=About Us" /> -->
                    <a href="?page=about"><img src="/web/static/img/all/Slide_0_2.png" /></a>
                    <!-- <div class="carousel-caption hide"> 
                        <h3>
                            Headline</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                            tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem
                            ipsum dolor sit amet, consetetur sadipscing elitr.</p>
                    </div> -->
                </div>
                <!-- End Item -->
                <div class="item">
                    <!-- <img src="http://placehold.it/1200x400/e67e22/ffffff&text=Projects" /> -->
                    <a href="/materials.php"><img src="/web/static/img/all/Slide_1.png" /></a>
                    <!-- <div class="carousel-caption hide">
                        <h3>
                            Headline</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                            tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem
                            ipsum dolor sit amet, consetetur sadipscing elitr.</p>
                    </div> -->
                </div>
                <!-- End Item -->
                <div class="item">
                    <!-- <img src="http://placehold.it/1200x400/2980b9/ffffff&text=Portfolio" /> -->
                    <a href="/video.php"><img src="/web/static/img/all/Slide_2.png" /></a>
                    <!-- <div class="carousel-caption hide">
                        <h3>
                            Headline</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                            tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem
                            ipsum dolor sit amet, consetetur sadipscing elitr.</p>
                    </div> -->
                </div>
                <!-- End Item -->
                <div class="item">
                    <!-- <img src="http://placehold.it/1200x400/8e44ad/ffffff&text=Services" /> -->
                    <a href="/tests.php"><img src="/web/static/img/all/Slide_3.png" /></a>
                    <!-- <div class="carousel-caption hide">
                        <h3>
                            Headline</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                            tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem
                            ipsum dolor sit amet, consetetur sadipscing elitr.</p>
                    </div> -->
                </div>
                <!-- End Item -->
            </div>
            <!-- End Carousel Inner -->
            <ul class="nav nav-pills nav-justified">
                <li data-target="#myCarousel" data-slide-to="0" class="active">
                    <a href="#">О проекте</a>
                </li>
                <li data-target="#myCarousel" data-slide-to="1">
                    <a href="#">Польский для детей</a>
                </li>
                <li data-target="#myCarousel" data-slide-to="2">
                    <a href="#">Уроки со Свинкой Пеппой</a>
                </li>
                <li data-target="#myCarousel" data-slide-to="3">
                    <a href="#">Тесты</a>
                </li>
            </ul>
        </div>
        <!-- End Carousel -->
        
        <div style="float: right; display: inline-block; width: 30%; text-align: center">
            <img  src="/web/static/img/all/warsaw.png" alt="Warsaw" />
        </div>
        <div style="clear: both"></div>
    </div>
</div>


<!-- CAROUSEL 2 -->
<div class="container">
    <div class="col-xs-12">
    
        <div class="img-news">
            <img class="img-news" src="/web/static/img/all/news.png" alt="img-news" style="min-width: 45px" /> 
        </div> 

        <?php
             //var_dump($data['page']);
            $isFirstArticle = true;
        ?>
        <div class="carousel slide" id="carousel_bottom">
            <div class="carousel-inner">
                <?php 
                    foreach($data['data'] as $artkey => $artdata) {    // $artvalue
                        $artCounter++;
                        if($artCounter % 4 == 1){
                            $slideCounter++;
                        }
                        $slide[$slideCounter-1][] = $artdata;      // перекладываем в массив формата   $slide[индекс_слайда][индекс_статьи]
                    }
                    
                    // echo "<xmp>".print_r($slide, 1)."</xmp>";
                    
                    foreach($slide as $slIndex => $slides){
                        if($slIndex == 0) 
                            $active_class = 'active'; 
                        else 
                            $active_class = '';
                        
                        ?>
                        <div class="item <?=$active_class?> one-slide">
                            <ul class="thumbnails">
                                <?php 
                                foreach($slides as $artkey => $artdata) {
                                    $menname=null;
                                    foreach ($this->globaldata["menu"]["data"] as $menkey => $menvalue) {
                                        // var_dump($menvalue);
                                        if ($menvalue['id']==$artdata['menuid']) {
                                           $menname=$menvalue["name"].'.'.$config["prefix"];
                                           break;
                                        }
                                    }
                                    // var_dump($artdata['menuid']);
                                    //  Первым делом, уберём все html элементы:
                                    $shortText = strip_tags($artdata["text"]);
                                    //Теперь обрежем его на определённое количество символов:
                                    $shortText = substr($shortText, 0, 100);
                                    //Затем убедимся, что текст не заканчивается восклицательным знаком, запятой, точкой или тире:
                                    $shortText = rtrim($shortText, "!,.-");
                                    //Напоследок находим последний пробел, устраняем его и ставим троеточие:
                                    $shortText = substr($shortText, 0, strrpos($shortText, ' '));
                                ?>
                                <li class="col-sm-3">
            						<div class="fff">
        								<div class="thumbnail">
        									<a href="#"><img src="<?=$artdata['name_img']?>" alt="<?=$artdata['name']?>" /></a>
        								</div>
        								<div class="caption">
                                        <?
                                                    $serv_req_uri=explode("?", $_SERVER['REQUEST_URI'])[0];   
                                                    if ($serv_req_uri=== '/') {
                                                             $serv_req_uri='';
                                                    }     
                                                    // var_dump($serv_req_uri);
                                                   if (stristr($serv_req_uri, 'articles') === FALSE) {
                                                       $serv_req_uri=$serv_req_uri."/articles";
                                                    }

                                                   $http_flag=( isset($_SERVER['HTTPS'] ) )?'https://':'http://' ;
                                                   $serv_req_uri=$http_flag.$_SERVER['SERVER_NAME'].'/'.$menname.$serv_req_uri;
                                        ?>
        									<h4><a href="<?=$serv_req_uri?>?artid=<?=$artdata['id']?>"><?=$artdata["name"]?></a></h4>
        									<p><?=$shortText?>...</p>
                                            <a class="btn btn-mini" href="<?=$serv_req_uri?>?artid=<?=$artdata['id']?>">» Подробнее</a>
        								</div>
                                    </div>
                                </li>
                                <?php 
                                } 
                                ?>
                            </ul>
                        </div><!-- /.one-slide --> 
                        <?php
                     
                    } // -- foreach
                     
                    ?>
            </div>

    	   <nav>
    			<ul class="control-box pager">
    				<li><a data-slide="prev" href="#carousel_bottom" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
    				<li><a data-slide="next" href="#carousel_bottom" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
    			</ul>
    		</nav>
            
           
    	   <!-- /.control-box -->   
                                  
        </div><!-- /#carousel_bottom -->
            
    </div><!-- /.col-xs-12 -->          

</div><!-- /.container -->

<?}?>


