<?php
namespace app\Models;
Use CodeIgniter\Model;
class CommandModel extends Model{
    protected $table = 'command';
    protected $pK = 'id';
    protected $allowedFields = ['user_id', 'book_id', 'titre', 'auteur', 'email'];
}