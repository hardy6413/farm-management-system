<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('createFarm', 'FarmController');
Router::get('fields', 'FieldController');
Router::post('addField', 'FieldController');
Router::get('fieldOverview', 'FieldController');
Router::get('tasks', 'TaskController');
Router::post('addTask', 'TaskController');
Router::get('listWorkers', 'WorkersController');
Router::get('account', 'WorkersController');
Router::get('settings', 'WorkersController');
Router::get('profileOverview', 'WorkersController');
Router::get('farmsList', 'FarmController');
Router::post('searchFarms', 'FarmController');
Router::post('searchFields', 'FieldController');
Router::post('logout','SecurityController');
Router::get('createAccount','SecurityController');
Router::post('signUp','SecurityController');
Router::post('joinFarm', 'FarmController');
Router::get('createAction','FieldActionController');

Router::run($path);

