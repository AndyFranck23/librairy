<?php
namespace App\Controllers;
use App\Models\CommandModel;
use App\Models\BookModel;
use App\Models\LoginUser;

class CommandController extends BaseController{
    public function addCommand($book_id, $user_id){
        $model = new CommandModel;
        $book = new BookModel();
        $users = new LoginUser();
        $select_book = $book->where("id", $book_id)->first();
        $user = $users->where("id", $user_id)->first();
        $data = [
            "user_id"=> $user_id,
            "book_id"=> $book_id,
            "titre"=> $select_book['titre'],
            "auteur"=> $select_book['auteur'],
            // "heure"=>$select_book['heure'],
            "email"=>$user['email']
        ];
        $model->insert($data);
        return redirect()->to('bookUser' . $user_id);
    }
    public function accept($command_id){
        $model = new BookModel();
        $command = new CommandModel();
        $test = $command->where('id', $command_id)->first();
        $book = $model->where('id', $test['book_id'])->first();
        $data = [
            "emprunt"=>0,
            "date"=>date("Y-m-d", strtotime(date('Y-m-d') . "+". $book['heure']." days")),
        ];
        // $date = $date('+5 days');
        // recuperer la date du db: select otrany mahazatra
        $model->update($test['book_id'], $data);
        $command->delete($command_id);
        return redirect()->to("listeCommand");
    }
    public function refuser($command_id){
        $command = new CommandModel();
        $command->delete($command_id);
        return redirect()->to("listeCommand");
    }
    public function searchCommand(){
        $model = new CommandModel();
        $data = [
            'titre'=>$this->request->getPost("search"),
        ];
        $command["command"] = $model->like('titre', $data['titre'])->findAll();
        return view('commande', $command);
    }
}