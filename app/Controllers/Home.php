<?php

namespace App\Controllers;
define('_TITLE','beranda');
class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' =>_TITLE
        ];
        return view('beranda', $data);
    }
}
