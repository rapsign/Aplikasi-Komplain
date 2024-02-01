<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplainModel extends Model
{
    protected $table      = 'tb_complain';
    protected $allowedFields = ['email', 'kepada', 'subject', 'complain', 'status'];
    protected $returnType = 'object';
    protected $useTimestamps = true;

    public function count($email)
    {
        return $this->db->table('tb_complain')->where('email', $email)->countAll();
    }
}
