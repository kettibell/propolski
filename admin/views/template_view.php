	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Админка propolski.ua</title>
		  <!-- <script type="text/javascript" src="lib/jquery/jquery-1.3.2.js"></script> -->
		  <script type="text/javascript" src="/lib/jquery/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="/lib/jquery/jquery.livequery.js"></script>
		<link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" href="/lib/bootstrapvalidator/dist/css/bootstrapValidator.min.css"/>
<!--Нужная идея все подключать через ссылки. Тогда работает кеш-->
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script-->

		<script type="text/javascript" src="/lib/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="/lib/bootstrap/js/bootstrap.min.js"></script>
		<script src="/lib/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>

	<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css'>
	<!-- <link rel='stylesheet prefetch' href='http://puertokhalid.com/up/demos/puerto-Mega_Menu/css/normalize.css'> -->
  	<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'> <!-- TODO  избавиться от дублирования. По оставляем. тут иконци для панельки авторизации-->
  <script src="/lib/ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" href="/web/static/css/all.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="/web/static/css/hor_menu.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="/web/static/css/left_menu.css" type="text/css" media="screen"/> 
   <link rel="stylesheet" href="/web/static/css/header.css" type="text/css" media="screen"/>
  

  
  <!-- <link rel="stylesheet" href="css/404.css" type="text/css" media="screen"/> -->


  <!--Корзина-->

  <!-- <script src="/web/static/js/autorizashko.js"></script> -->
		<!-- <link rel="stylesheet" type="text/css" href="/web/static/css/all.css" /> -->
		<!-- <script src="/web/static/js/jquery-1.6.2.js" type="text/javascript"></script> -->
<!-- 		<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" href="lib/bootstrapvalidator/dist/css/bootstrapValidator.min.css"/> -->
	</head>
	<body>

	<?
		require_once "all_header.php"; 
	    require_once 'all_hor_menu.php';
	    require_once "admin/temp/menu.php";  // TODO : временно !!!
	?>

		<div id="container">	

			<div id="left-menu">	
		 		<?  require_once 'all_left_menu.php';	 	
		 		?>		
			</div>
<!-- 			<div id="right-menu">	
		 		<?  //require_once 'all_right_menu.php';	 	
		 		?>		
			</div> -->
			<div id="content">
				<?php include 'admin/views/'.$content_view; ?>
			</div>		
		</div>


		<div id="footer">
			<a href="/">propolski.com<a> &copy; 2016</a>
		</div>
	</body>
</html>