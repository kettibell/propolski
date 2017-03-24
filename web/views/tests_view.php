<?// Вьюха для страницы тестов?>
<h1>Tests</h1>

<link rel="stylesheet" href="/web/static/css/article.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="/web/static/css/galery.css" />
<link rel="stylesheet" type="text/css" href="/web/static/css/articlesByCategory.css" />
<script src="/web/static/js/galery.js"></script>

<?
if (!isset($this->globaldata["categories"]) || is_null($this->globaldata["categories"]) ||$this->globaldata["categories"]["errStatus"]) {
  echo "<br> ".$globaldata["categories"]["errText"];
} else {
  $categories=$this->globaldata["categories"]["data"];
}
?> 

  <div id="center-side"> 
            <?
           require_once "all_center_side.php"; 
           ?>
          </div>
          <div id="right-side">  
                  <div class="img-right-popular">
                    <img class="img-right-popular" src="/web/static/img/all/most_popul_test.png" alt="img-right-popular" style="min-width: 45px" /> 
                </div>          
                    
            <?
           require_once "all_right_side.php"; 
           ?>
         </div>
          <!-- </div> -->








 


