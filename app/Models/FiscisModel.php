<?php

namespace App\Models;

use CodeIgniter\Model;

class FiscisModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $useTimestamps = true;

    public function getficsis() 
    {
        $this->join('fiscis_category','fiscis.fiscis_category_id= fiscis_category_id');
        return $this->findAll();
    }
}
