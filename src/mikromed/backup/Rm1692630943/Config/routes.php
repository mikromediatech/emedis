<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$modul = strtolower('Rm');
$routes->group($modul, ['namespace' => 'App\Modules\Rm\Controllers'], function($subroutes){
	/*** Route for Dashboard ***/
    $subroutes->get('', 'Rm::index');	

});