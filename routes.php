<?php

// call in Router.php
$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

$router->get('todos', 'TodosController@index');
$router->post('todos', 'TodosController@store');