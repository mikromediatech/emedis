<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}


$routes->group('Ab', ['namespace' => 'App\Modules\Admin\Controllers'], function($subroutes){
	/*** Route for Dashboard ***/
    $subroutes->get('', 'Ab::index');	

});