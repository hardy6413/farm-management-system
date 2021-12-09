<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('farms', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('createFarm', 'FarmController');
Router::get('fields', 'FieldController');
Router::post('addField', 'FieldController');
Router::get('fieldOverview', 'FieldController');
Router::get('tasks', 'TaskController');
Router::post('addTask', 'TaskController');
Router::get('workers', 'WorkersController');
Router::get('account', 'ProfileController');
Router::get('settings', 'ProfileController');
Router::get('profileOverview', 'ProfileController');

Router::run($path);

