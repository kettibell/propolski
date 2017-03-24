<?php
// контролер для домашней страницы
class Controller_Main extends Controller
{
	function __construct($db)
	{
		parent::__construct($db);
		$this->model = new Model_Main($db);	
	}



	function action_index()
	{	
		$res=$this->model->getRecentArticles( "S");
		// var_dump($res);
		if (isset($_GET['page']) && isset($_GET['page'])=='about') {	
		 	$pagetype= [
    		'page' => 'about'
		];
		// var_dump($pagetype);	
		 	$res=array_merge($res, $pagetype);				
		}		
		// var_dump($res);
	
		$this->view->generate('main_view.php', 'template_view.php', $res);
		die();	
	}


}