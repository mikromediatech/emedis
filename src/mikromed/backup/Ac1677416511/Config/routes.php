<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$modul = strtolower('Ac');
$routes->group($modul, ['namespace' => 'App\Modules\Ac\Controllers'], function($subroutes){
	/*** Route for Dashboard ***/
    $subroutes->get('', 'Ac::index');	

});