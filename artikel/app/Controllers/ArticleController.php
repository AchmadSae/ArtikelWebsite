<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use App\Models\UsersModel;

class ArticleController extends BaseController
{
    protected $usersModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        session();
        // debug key session 
        // var_dump(session()->get($this->usersModel::SESSION_KEY));
        $articleModel = new ArticleModel();
        $isLoggedIn = true;
        $username = "";
        $toEmail = "";
        $user_id = $this->usersModel->current_user();
        if (!$user_id && $user_id == null) {
            # code...
            $isLoggedIn = false;
            $username = "Guest";
            $toEmail = "sssnerv@gmail.com";
        } else {
            $username = $user_id['username'];
            $toEmail = $user_id['email'];
        }
        // echo "index method ";
        $data = [
            'dataArticle' => $articleModel->getArtikel(1),
            'titleWeb' => 'Home | Artikel',
            'allArtikel' => $articleModel->getAllArtikel(),
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'toEmail' => $toEmail
        ];
        // dd($data);
        return view('ArticleView', $data);
    }

    public function find($id_artikel)
    {
        $articleModel = new ArticleModel();
        echo "find method in Article Controller that data artikel is ";
        $data = $articleModel->getArtikel($id_artikel);
        if ($data == null) {
            # code...
            return redirect()->back()->with('massage', 'Artikel not available')->with('iconMsg', 'info');
        }
        return view('ArticleView', $data);
    }
}
