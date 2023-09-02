<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$modul = strtolower('Main');
$routes->group($modul, ['namespace' => 'App\Modules\Main\Controllers'], function($subroutes){
	/*** Route for Dashboard ***/
    $subroutes->get('', 'Main::index');	

});