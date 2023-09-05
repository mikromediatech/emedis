<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$modul = strtolower('Bayu');
$routes->group($modul, ['namespace' => 'App\Modules\Bayu\Controllers'], function($subroutes){
	/*** Route for Dashboard ***/
    $subroutes->get('', 'Bayu::index');
    $subroutes->get('bayu2', 'Bayu::bayu');

});