<?php
class UserModel{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function insertUser($email, $password){
        $insert = $this->db->prepare("INSERT INTO users(email, password) VALUES(?, ?)");
        return $insert->execute(array($email, $password));
    }
    public function getUser($email, $password){
        $req = $this->db->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
        return $req->fetch(PDO::FETCH_OBJ);
    }
    public function getAlluser(){
        $req = $this->db->query("SELECT * FROM users");
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    public function delUser($id){
        $req = $this->db->prepare("DELETE FROM users WHERE id='$id'");
        return $req->execute();
    }
    public function updateUser($id, $email, $password){
        $req = $this->db->prepare("UPDATE users SET email='$email', password='$password' WHERE id='$id'");
        return $req->execute();
    }
    public function emailDefined(){
        $req = $this->db->query("SELECT email FROM users");
        $select = $req->fetchAll(PDO::FETCH_OBJ);
        return $select;
    }
}
?>