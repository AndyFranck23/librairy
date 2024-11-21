<?php
namespace app\Models;
Use CodeIgniter\Model;
class LoginUser extends Model{
    protected $table = 'users';
    protected $pK = 'id';
    protected $allowedFields = ['email', 'password'];
}