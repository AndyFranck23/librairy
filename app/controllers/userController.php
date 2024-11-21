<?php
session_start();
class UserController{
    private $model; 
    public $erreur;
    public function __construct($db){
        $this->model = $db;
        $this->erreur = "";
    }
    public function sendRequest(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST["sign-in"])){
                $this->addUser();
            }elseif(isset($_POST["login"])){
                $this->connectUser();
            }
        }
    }
    public function addUser(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $truePassword = $_POST['newPassword'];
        $this->erreur = " ";
        if (($email && $password && $truePassword) == true){	
            if (($this->emailExist($email)) == false){
                if ($password == $truePassword){
                    $this->erreur = " ";
                    $this->model->insertUser($email, $password);
                    $_SESSION["user"] = $this->model->getUser($email, $password);
                    header("Location: ../views/addBook.php?id=" . $_SESSION['user']->id);
                }else{
                    $this->erreur = "Mot de pass incorrect";
                }
            }else{
                $this->erreur = "Cette adresse est déjà utilisé";
            }
        }else{
            $this->erreur = "Veuillez remplir tous les champs";
        }
    }
    public function emailExist($email){
        $select = $this->model->emailDefined();
        $res = false;
        foreach($select as $e){
            if( $e->email == $email ){
                $res = true;
            }
        }
        return $res;
    }
    public function connectUser(){
        $email = $_POST["email"];
        $password = $_POST["password"];
        if($email && $password){
            if(isset($this->model->getUser($email, $password)->id)){
                $_SESSION["user"] = $this->model->getUser($email, $password);
                $this->erreur = "connection réussi";
                header("Location: ../views/addBook.php?id=" . $_SESSION['user']->id);
            }else{
                $this->erreur = "Mauvaise identifiant";
            }
        }else{
            $this->erreur = "Veuillez remplir tous les champs";
        }
    }
}
?>