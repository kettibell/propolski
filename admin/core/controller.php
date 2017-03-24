<?php

class Controller {
	
	public $model;
	public $view;
	public $db;
	public $config;
	
	function __construct()
	{
		global $config;
		$this->view = new View();
		$this->config=$config;
	}
	
	// действие (action), вызываемое по умолчанию
	function action_index()
	{
		// todo	
	}
}

