<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_id', 'nama_user', 'email', 'phone', 'Role'];
    protected $useTimestamps = false;

    public function getUser($slug = null)
    {
        if ($slug === null) {
            $this->join('transaksi_penjualan', 'user.user_id = transaksi_penjualan.user_id');
            return $this->get()->getResultArray();
        } else {
            $this->join('transaksi_penjualan', 'user.user_id = transaksi_penjualan.user_id');
            $this->where(['slug' => $slug]);
            return $this->first();
        }
    }
}
