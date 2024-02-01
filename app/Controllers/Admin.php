<?php

namespace App\Controllers;

use App\Models\ComplainModel;

class Admin extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->removeModel =  new \App\Models\RemoveModel();
        $this->mModel = new ComplainModel();
        $this->builders = $this->db->table('tb_complain');
    }
    public function index()
    {
        $data['title'] = 'User Management';
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();
        $data['users'] = $query->getResult();
        return view('admin/index', $data);
    }
    public function detail($id = 0)
    {
        $data['title'] = 'User Detail';
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $this->builder->select('users.id as userid, username, email, fullname, user_image, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();
        $data['users'] = $query->getRow();

        if (empty($data['users'])) {

            return redirect()->to('/admin');
        }
        return view('admin/detail', $data);
    }
    public function Add()
    {
        $data['title'] = 'Tambah Data Dosen';
        return view('admin/add', $data);
    }
    public function Remove($id)

    {
        $this->removeModel->delete($id);
        return redirect()->to('/admin');
    }
    public function complain()
    {
        $skkp = $this->mModel->findAll();
        $data['title'] = 'Complain';
        $data['p'] = $skkp;
        return view('admin/complain', $data);
    }
    public function print($id)
    {
        $this->builders->select('id, email, kepada, subject, complain, status, created_at, updated_at, deleted_at');
        $this->builders->where('id', $id);
        $query = $this->builders->get();
        $data['s'] = $query->getRow();
        $skkp = $this->mModel->find($id);
        $data['title'] = 'Complain';
        $this->mModel->save([
            'id' => $id,
            'status' => 1
        ]);

        return view('admin/email', $data);
    }
    public function Delete($id)
    {
        $this->mModel->delete($id);
        return redirect()->to('/admin/complain');
    }
    public function read($id = 0)
    {
        $this->builders->select('id, email, kepada, subject, complain, status, created_at, updated_at, removed_at');
        $this->builders->where('id', $id);
        $query = $this->builders->get();
        $data['s'] = $query->getRow();
        $skkp = $this->mModel->find($id);
        $data['title'] = 'Complain';
        return view('admin/read', $data);
    }
    public function export()
    {
        $skkp = $this->mModel->findAll();
        $data['title'] = 'Daftar Komplain Kejaksaan Negeri';
        $data['p'] = $skkp;
        return view('admin/print', $data);
    }
}
