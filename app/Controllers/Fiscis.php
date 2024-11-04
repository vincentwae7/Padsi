<?php

namespace App\Controllers;

use App\Models\fiscismodel;
define('_TITLE', 'Fiscis');

class Fiscis extends BaseController
{
    public function index()
    {
        $fiscis_model = new fiscismodel();
        $data_fiscis = $fiscis_model->findAll();
        $data = [
            'title' => _TITLE,
            'data_fiscis' => $data_fiscis,
        ];
        //dd($data_fiscis);
        return view('fiscis/index', $data);
    }
}
