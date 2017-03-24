<?php
// основной класс модели
class Model
{
	public $db;
	public $menu;
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/
	public function __construct($db){
		$this->db = $db;
		
	}
	// метод выборки данных
	public function get_data()
	{
		// todo
	}

		public function get_menu()
	{
		$menuCl= new Menu($this->db);
		 return $menuCl->getMenu("web");
	}
}
