<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$modul = strtolower('Pendaftaran');
$routes->group($modul, ['namespace' => 'App\Modules\Pendaftaran\Controllers'], function($subroutes){
	/*** Route for Dashboard ***/
    $subroutes->get('', 'Pendaftaran::index');	

});