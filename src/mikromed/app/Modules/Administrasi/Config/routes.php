<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$modul = strtolower('Administrasi');
$routes->group($modul, ['namespace' => 'App\Modules\Administrasi\Controllers'], function($subroutes){
	/*** Route for Dashboard ***/
    $subroutes->get('', 'Administrasi::index');	

});