<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$modul = strtolower('Ab');
$routes->group($modul, ['namespace' => 'App\Modules\Admin\Controllers'], function($subroutes){
	/*** Route for Dashboard ***/
    $subroutes->get('', 'Ab::index');	

});