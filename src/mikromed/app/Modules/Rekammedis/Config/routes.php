<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$modul = strtolower('Rekammedis');
$routes->group($modul, ['namespace' => 'App\Modules\Rekammedis\Controllers'], function($subroutes){
	/*** Route for Dashboard ***/
    $subroutes->get('', 'Rekammedis::index');	

});