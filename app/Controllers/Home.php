<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        //return view('welcome_message');
        echo "hello world";
    }

    public function coba($nama = null, $usia = null)
    {
        echo "Nama saya adalah $nama, usia saya adalah $usia tahun";
    }

    public function coba2($uuid)
    {
        echo "uuid adalah $uuid";
    }
}
