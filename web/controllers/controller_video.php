<?php
// контролер для видео
class Controller_Video extends Controller
{
		function __construct($db)
	{
		parent::__construct($db);
		$this->model = new Model_Video($db);	
	}


	function action_index()
	{	
		$res=$this->model->getRecentArticles( "S",$this->globaldata["menu"]);
		$this->view->generate('video_view.php', 'template_view.php', $res);
	}

			function action_articles()
	{	
		// var_dump($_GET);
		if (isset($_GET['catid'])) {			
			$categoryId= trim(htmlspecialchars(strip_tags($_GET['catid'])));
			$res=$this->model->getArticlesByCategoryId($categoryId, "S");
			// var_dump($res);
			$this->view->generate('video_view_by_category.php', 'template_view.php', $res);
			die();		
		}	
		elseif (isset($_GET['artid'])) {		
			$articleId= trim(htmlspecialchars(strip_tags($_GET['artid'])));
			$res=$this->model->getArticleByArticleId($articleId, "M");
			// var_dump($res);
			$this->view->generate('article_view.php', 'template_view.php', $res);
			die();		
		}		
	

	}

	function action_article()
	{	
		if (isset($_GET['artid'])) {	
		echo"ddd";		
			$articleId= trim(htmlspecialchars(strip_tags($_GET['artid'])));
			$res=$this->model->getArticleByArticleId($articleId, "M");
			// var_dump($res);
			$this->view->generate('article_view.php', 'template_view.php', $res);
			die();		
		}		

	}
}