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
    public function index()
    {
        // Get database connection
        $db = \Config\Database::connect();

        // Write your raw query to fetch data from the 'user' table
        $builder = $db->table('user');
        $query = $builder->get();  // This will execute a SELECT * query on the 'user' table

        // Fetch all data from the query result
        $data_user = $query->getResultArray(); // Fetch results as an array

        // Prepare data for view
        $data = [
            'title' => _TITLE,
            'data_user' => $data_user,
        ];

        // Return the view with the data
        return view('user/index', $data);
    }


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

        // Get input values
        // $user_id = $this->request->getVar('user_id');
        $nama_user = $this->request->getVar('nama_user');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $role = $this->request->getVar('Role');

        // Insert data using a raw query
        $db->query("INSERT INTO user ( nama_user, email, phone, role) VALUES (?, ?, ?, ?)", [$nama_user, $email, $phone, $role]);
        // Redirect to the index page after saving

        session()->setFlashdata('success', 'Data berhasil ditambahkan!');

        // Write your raw query to fetch data from the 'user' table
        $builder = $db->table('user');
        $query = $builder->get();  // This will execute a SELECT * query on the 'user' table

        // Fetch all data from the query result
        $data_user = $query->getResultArray(); // Fetch results as an array

        // Prepare data for view
        $data = [
            'title' => _TITLE,
            'data_user' => $data_user,
        ];

        // Return the view with the data
        return view('user/index', $data);
    }

    public function detail($slug)
    {
        // Fetch user details based on slug or id
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

    // New method to update user details
    public function update()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');

        // Get input values from the request
        $user_id = $this->request->getVar('user_id');
        $nama_user = $this->request->getVar('nama_user');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $role = $this->request->getVar('role');

        // Validate input (Optional: you can also add specific validation rules here)
        if (!$user_id || !$nama_user || !$email || !$phone || !$role) {
            session()->setFlashdata('error', 'All fields are required!');
            return redirect()->back()->withInput();
        }

        // Use query builder to update data
        $builder->where('user_id', $user_id)
            ->set([
                'nama_user' => $nama_user,
                'email' => $email,
                'phone' => $phone,
                'role' => $role
            ])
            ->update();

        // Check if the update was successful
        if ($db->affectedRows() > 0) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
        } else {
            session()->setFlashdata('error', 'No changes made or error occurred!');
        }

        // Write your raw query to fetch data from the 'user' table
        $builder = $db->table('user');
        $query = $builder->get();  // This will execute a SELECT * query on the 'user' table

        // Fetch all data from the query result
        $data_user = $query->getResultArray(); // Fetch results as an array

        // Prepare data for view
        $data = [
            'title' => _TITLE,
            'data_user' => $data_user,
        ];

        // Return the view with the data
        return view('user/index', $data);
    }

    public function delete()
    {
        $db = \Config\Database::connect();

        // Disable foreign key checks
        $db->query("SET FOREIGN_KEY_CHECKS=0");

        // Get the user_id from the POST request
        $user_id = $this->request->getVar('user_id');

        // Delete the user
        $db->query("DELETE FROM user WHERE user_id = ?", [$user_id]);

        // Re-enable foreign key checks
        $db->query("SET FOREIGN_KEY_CHECKS=1");

        session()->setFlashdata('success', 'Data berhasil dihapus!');
        // Write your raw query to fetch data from the 'user' table
        $builder = $db->table('user');
        $query = $builder->get();  // This will execute a SELECT * query on the 'user' table

        // Fetch all data from the query result
        $data_user = $query->getResultArray(); // Fetch results as an array

        // Prepare data for view
        $data = [
            'title' => _TITLE,
            'data_user' => $data_user,
        ];

        // Return the view with the data
        return view('user/index', $data);
    }

    // Controller untuk Logout
    public function logout()
    {
        // Menghapus session untuk logout
        session()->destroy();

        // Mengarahkan pengguna ke halaman login setelah logout
        return redirect()->to('/login');
    }

}
