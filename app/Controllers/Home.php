<?php

namespace App\Controllers;
 define('_TITLE','Beranda');
class Home extends BaseController
{
   public function index()
   {
      $data = [
         'title' => _TITLE
      ];
        return view('beranda', $data);
   }
        
}
