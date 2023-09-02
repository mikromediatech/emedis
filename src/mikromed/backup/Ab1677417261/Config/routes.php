<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$modul = strtolower('Ab');
$routes->group($modul, ['namespace' => 'App\Modules\Ab\Controllers'], function($subroutes){
	/*** Route for Dashboard ***/
    $subroutes->get('', 'Ab::index');	

});