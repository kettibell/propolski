<?// Вьюха -скелет для формирования всех страниц сайта. Тут все костяк страниц с хедерами, футерами, менюшками?>
	<head>
	<!--Поставила слеш перед некоторыми либами-->
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>kursy.propolski.com</title>
		  <script type="text/javascript" src="/lib/jquery/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="/lib/jquery/jquery.livequery.js"></script>
		<link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" href="/lib/bootstrapvalidator/dist/css/bootstrapValidator.min.css"/>
        <link rel="shortcut icon" href="/web/static/img/logo.png" type="image/x-icon">
		<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="/lib/bootstrap/js/bootstrap.min.js"></script>
		<script src="/lib/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>

		<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css'>
		<!-- Временно. Потому что мешало тестить - долго грузилось -->
		<!-- <link rel='stylesheet prefetch' href='http://puertokhalid.com/up/demos/puerto-Mega_Menu/css/normalize.css'> -->
	  	<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'> <!-- TODO  избавиться от дублирования. По оставляем. тут иконци для панельки авторизации-->
		  <script src="/lib/ckeditor/ckeditor.js"></script>
		  <link rel="stylesheet" href="/web/static/css/all.css" type="text/css" media="screen"/>
		  <link rel="stylesheet" href="/web/static/css/hor_menu.css" type="text/css" media="screen"/>
		  <link rel="stylesheet" href="/web/static/css/left_menu.css" type="text/css" media="screen"/> 
		  <link rel="stylesheet" href="/web/static/css/header.css" type="text/css" media="screen"/>
		  <link rel="stylesheet" href="/web/static/css/all_basket.css" type="text/css" media="screen"/>
	</head>
	<body>


	<?
	    include_once("all_analyticstracking.php") ;
		// подключаем хедер
		require_once "all_header.php"; 
		// подключаем гонизонтальное меню
	    require_once 'all_hor_menu.php';
	?>

		<div id="container">
			<div id="left-menu">	
		 		<?  
		 		// $currentMenuId=0;
		 		// // определяем id текущего пункта меню 
		 		// for ($i=0; $i <=count($menu["data"])-1 ; $i++) {
		 		// 	if ("/".$menu["data"][$i]["url"]==$_SERVER['REQUEST_URI']){
		 		// 		$currentMenuId=$menu["data"][$i]["id"];
					// }
		 		// }		 		
		 		// показываем левое меню с категориями (раньше тут список статей показывали)
		 		//require_once 'all_left_menu.php';	 	
		 		?>		
			</div>

			<div id="content">
				<?php
				// подключаем основной контент страницы 
				include 'web/views/'.$content_view; ?>
			</div>		
			<!-- <div id="right-menu">	 -->
		 		<?
		 		//require_once 'all_basket.php'; корзина пока не нужна 
		 		//require_once 'all_right_menu.php';//менюшка тоже	 	
		 		?>		
			<!-- </div> -->
		</div>

			<?	
			// подключаем футер
			require_once "all_footer.php"; 
	         ?>		
	</body>
</html>