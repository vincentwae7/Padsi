<?php

namespace App\Controllers;

use App\Models\UserModel;

define('_TITLE', 'User');
class User extends BaseController
{
    private $_user_model;
    public function __construct()
    {
        $this->_user_model = new UserModel();
    }

    // Dashboard page
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard - ' . _TITLE
        ];
        return view('user/dashboard', $data);
    }

    // Profile page
    public function profile()
    {
        $db = \Config\Database::connect();
        $user_id = session()->get('user_id'); // Assuming user ID is stored in session

        // Fetch user data
        $builder = $db->table('user');
        $builder->where('user_id', $user_id);
        $query = $builder->get();
        $data_user = $query->getRowArray();

        $data = [
            'title' => 'Profile - ' . _TITLE,
            'data_user' => $data_user
        ];
        return view('user/profile', $data);
    }

    // Settings page
    public function settings()
    {
        $data = [
            'title' => 'Settings - ' . _TITLE
        ];
        return view('user/settings', $data);
    }

    // Index method to list all users
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $query = $builder->get();
        $data_user = $query->getResultArray();

        $data = [
            'title' => _TITLE,
            'data_user' => $data_user,
        ];
        return view('user/index', $data);
    }

    // Create, Save, Detail, Update, Delete, and Logout methods (existing code)

    public function create()
    {
        $data = [
            'title' => _TITLE
        ];
        return view('user/create', $data);
    }

    public function save()
    {
        $db = \Config\Database::connect();
        $nama_user = $this->request->getVar('nama_user');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $role = $this->request->getVar('Role');

        $db->query("INSERT INTO user (nama_user, email, phone, role) VALUES (?, ?, ?, ?)", [$nama_user, $email, $phone, $role]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('/user');
    }

    public function detail($slug)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('slug', $slug);
        $query = $builder->get();
        $data_user = $query->getRowArray();

        $data = [
            'title' => _TITLE,
            'data_user' => $data_user
        ];
        return view('user/detail', $data);
    }

    public function update()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');

        $user_id = $this->request->getVar('user_id');
        $nama_user = $this->request->getVar('nama_user');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $role = $this->request->getVar('role');

        if (!$user_id || !$nama_user || !$email || !$phone || !$role) {
            session()->setFlashdata('error', 'All fields are required!');
            return redirect()->back()->withInput();
        }

        $builder->where('user_id', $user_id)
            ->set([
                'nama_user' => $nama_user,
                'email' => $email,
                'phone' => $phone,
                'role' => $role
            ])
            ->update();

        if ($db->affectedRows() > 0) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
        } else {
            session()->setFlashdata('error', 'No changes made or error occurred!');
        }
        return redirect()->to('/user');
    }

    public function delete()
    {
        $db = \Config\Database::connect();
        $db->query("SET FOREIGN_KEY_CHECKS=0");

        $user_id = $this->request->getVar('user_id');
        $db->query("DELETE FROM user WHERE user_id = ?", [$user_id]);

        $db->query("SET FOREIGN_KEY_CHECKS=1");
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('/user');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
