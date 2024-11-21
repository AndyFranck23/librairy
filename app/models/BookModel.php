<?php
namespace app\Models;
Use CodeIgniter\Model;

class BookModel extends Model{
    protected $table = "books";
    protected $primaryKey = "id";
    protected $allowedFields = ['heure', 'auteur', 'titre', 'emprunt', 'date'];
}