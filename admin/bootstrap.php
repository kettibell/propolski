<?php
session_start(); // старт сессии пользователя
// подключаем файлы конфигов
$config = parse_ini_file("config/config.ini");
require_once 'lib/functions.php';
require_once 'config/config.php';
// подключаем файлы ядра
require_once 'core/db.php';
// подключаем классы, для работы с эелементами сайта
require_once 'lib/classes/Menu.class.php';
require_once 'lib/classes/User.class.php';
require_once 'lib/classes/Categories.class.php';
require_once 'lib/classes/Articles.class.php';
require_once 'lib/classes/Orders.class.php';
// подключаем файлы ядра
//require_once 'core/url_routing.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
// подключаем класс роутера, который будет рассчитывать куда перенапрявлять пользователя
require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор
