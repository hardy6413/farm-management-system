<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
//Router::get('findAllFarms', 'FarmController');
Router::post('login', 'SecurityController');
Router::post('createFarm', 'FarmController');
Router::get('fields', 'FieldController');
Router::post('addField', 'FieldController');
Router::get('fieldOverview', 'FieldController');
Router::get('tasks', 'TaskController');
Router::post('addTask', 'TaskController');
Router::get('workers', 'WorkersController');
Router::get('account', 'WorkersController');
Router::get('settings', 'WorkersController');
Router::get('profileOverview', 'WorkersController');
Router::get('farmsList', 'FarmController');
Router::post('search', 'FarmController');
Router::post('logout','SecurityController');
Router::get('createAccount','WorkersController');
Router::post('signUp','WorkersController');
Router::post('joinFarm', 'FarmController');

Router::run($path);

