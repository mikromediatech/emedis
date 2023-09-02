<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('sample');
    }

    public function sample(){
        return view('sample');
    }
}
