<?php

namespace App\Controllers;
use App\Models\BookModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view("index");
    }
    public function liste(){
        if(session()->get("admin")){
            $model = new BookModel;
            $this->dateBook();
            $data["books"] = $model->findAll();
            return view("librairy", $data);
        }else{
            return redirect()->to("loginAdmin");
        }
    }
    public function dateBook(){
        $model = new BookModel;
        $current_date = $model->where("emprunt", 0)->findAll();
        foreach( $current_date as $row){
            if(date('Y-m-d') >= $row['date']){
                $data = ['emprunt' => 1];
                $model->update($row['id'], $data);
            }
        }
    }
    public function bookUser($user_id){
        if(session()->get('id') && session()->get('id') == $user_id){
            $model = new BookModel;
            $this->dateBook();
            $data["books"] = $model->findAll();
            $data["user_id"] = $user_id;
            return view("bookUser", $data);
        }else{
            return redirect()->to("login");
        }
    }
    public function book(){
        return view("addBook");
    }
    public function delete($id){
        $model = new BookModel(); 
        $model->delete($id);
        return redirect()->to('listeBook');
    }
    public function edit($id){
        $model = new BookModel();
        $data['book'] = $model->find($id);
        return view('addBook', $data);
    }
    public function update($id){
        $model = new BookModel();
        $data = [
            'titre'=>$this->request->getPost('titre'),
            'auteur'=>$this->request->getPost('auteur'),
            'heure'=>$this->request->getPost('heure')
        ];
        $model->update($id, $data); 
        return redirect()->to('listeBook');
    }
    public function enregistrer(){
        $model = new BookModel();
        $data = [
            'heure'=>$this->request->getPost('heure'),
            'titre'=>$this->request->getPost('titre'),
            'auteur'=>$this->request->getPost('auteur'),
            'emprunt'=>1
        ];
        if($data['heure'] && $data['titre'] && $data['auteur']){
            $model->insert($data);
            return redirect()->to('listeBook');
        }else{
            return 'Veuillez remplir tous champs';
        }
    }
    public function search($value){
        $model = new BookModel();
        $data = [
            'titre'=>$this->request->getPost('search'),
        ];
        $select["search"] = $model->like('titre', $data['titre'])->findAll();
        $select["user_id"] = $value;
        return view('bookUser', $select);
    }
    public function searchAdmin(){
        $model = new BookModel();
        $data = [
            'titre'=>$this->request->getPost('search'),
        ];
        $select["books"] = $model->like('titre', $data['titre'])->findAll();
        return view('librairy', $select);
    }
}   
