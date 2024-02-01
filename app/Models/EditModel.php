<?php
namespace App\Models;

use CodeIgniter\Model;

class EditModel extends Model
{
    protected $table      = 'users';
    protected $allowedFields = ['email','fullname','user_image','password_hash'];
    protected $returnType = 'object';
}