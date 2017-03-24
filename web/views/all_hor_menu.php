<?// горизонтальное меню. Получаем объект меню и отображаем его
//var_dump($this->globaldata["iscaruselShow"]);
if ($this->globaldata["iscaruselShow"]["errStatus"]) { // если вместо меню получили ошибку - покажем ошибку
	echo "<br> ".$this->globaldata["menu"]["errText"];
} else {
	$menu=$this->globaldata["menu"]["data"];
	  			$domain = ''; // Пока результат пуст
   			 if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {
    			// В защищенном! Добавим протокол...
    			$domain .= 'https://';
  			} else {
   			 	// Обычное соединение, обычный протокол
   			 	$domain .= 'http://';
  			}
    		// Имя сервера, напр. site.com или www.site.com
  			 $domain .= $_SERVER['SERVER_NAME'];
?> 
 <div class="hor_menu_container">
	<nav>
		<ul class="hor_menu_mcd-menu">
			<?for ($i=0; $i <=count($menu)-1 ; $i++) {?> 
			<li>
				<a <?
				$prefix=".".$config["prefix"];

				if ($menu[$i]["url"]=="") {// если это корень сайта - расширения .php нет
					$prefix = "";
					#$menu[$i]["url"] = "/";
					$last_url=$menu[$i]["url"].$prefix;

				} else {
					$last_url="/".$menu[$i]["url"].$prefix;
				}

				if ($menu[$i]["state"] == "active") { // выбранный пользователем пункт меню подсвечиваем
					?>class="active"<?php // подсвечиваем его					
				}
				$menu_type="mini_"; // по умолчанию отображаем мини менюшки ( прямоугольники без картинки)
				if ($this->globaldata["iscaruselShow"]) {// если первая страница - надо отобразить квадратики с картинками в меню
					$menu_type="";
				} 
				// выводим меню 
				?> href="<?=$domain.$last_url?>">
				    <img class="img_square_back" src="<?="/web/static/img/all/".$menu_type.$menu[$i]["logo"]?>" alt="<?=$menu[$i]["ru_name"]?>" />
				</a>

			</li>
			<?}?>
		</ul>
	</nav>
</div>


<?}?>
<?// красная палка, которая под главным меню?>
  <img class="all_l_i_n_e" src="/web/static/img/all/intermittent_line.png" alt="line" >


