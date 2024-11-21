<?php
namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CommandModel;
use App\Models\LoginUser;
class LoginController extends BaseController{
    public function index(): string {
        $model = new LoginUser;
        $data["users"] = $model->findAll();
        return view("login", $data);
    }
    public function connect(){
        return view("login");
    }   
    public function command(){
        if(session()->get("admin")){
            $command = new CommandModel();
            $data["command"] = $command->findAll();
            return view("commande", $data);
        }else{
            return redirect()->to("loginAdmin");
        }
    }
    public function loginAdmin(){
        $email = 'ironmanandy23@gmail.com';
        $password = '123';
        $data = [
            'email'=>$this->request->getPost('email'),
            'password'=>$this->request->getPost('password'),
        ];
        if ($data['email'] && $data['password']){
            if ($data['email'] == $email && $data['password'] == $password){
                session()->set('admin', $data['email']);
                return redirect()->to('listeBook');
            }else{
                return 'Mot de pass incorrect';
            }
        }else{
            return 'Veuillez remplir tous les champs';
        }
    }
    public function login(){
        $model = new LoginUser();
        $data = [
            'email'=>$this->request->getPost('email'),
            'password'=>$this->request->getPost('password'),
        ];
        if ($data['email'] && $data['password']){
            $select = $model->select(['email', 'id'])->where('email', $data['email'])->where('password', $data['password'])->first();
            if ($select) {
                session()->set('id', $select['id']);
                return redirect()->to('bookUser'. $select['id']);
            }else{
                return 'Mot de pass incorrect';
            }
        }else{
            return 'Veuillez remplir tous les champs';
        }
    }
    public function logout(){
        session()->remove("id");
        return redirect()->to('login');
    }
    public function logoutAdmin(){
        session()->remove("admin"); 
        return redirect()->to('loginAdmin');
    }
    public function inscrire(){
        return view("signIn");
    }
    public function signIn(){
        $model = new LoginUser();
        $data = [
            'email'=>$this->request->getPost('email'),
            'password'=>$this->request->getPost('password'),
            'truePassword'=>$this->request->getPost('truePassword'),
        ];
        if ($data['email'] && $data['password'] && $data['truePassword']){
            if ($data['truePassword'] == $data['password']){
                $model->insert($data);
                // session('user') = $model->select();
                return redirect()->to('login');
            }else{
                return 'Mot de pass incorrect';
            }
        }else{
            return 'Veuillez remplire tous les champs';             
        }
    }
}