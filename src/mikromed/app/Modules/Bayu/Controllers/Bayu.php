<?php

namespace App\Modules\Bayu\Controllers;

class Bayu extends BaseControl
{
    public function index()
    {
        return view('Bayu/V_Bayu');
    }

    public function bayu()
    {
        return view('Bayu/V_Bayu2');
    }

    
}
