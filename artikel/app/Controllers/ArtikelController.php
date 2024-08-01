<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\UsersModel;

class ArtikelController extends BaseController
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
        $artikelModel = new ArtikelModel();
        $isLoggedIn = true;
        $user_id = $this->usersModel->current_user();
        if (!$user_id) {
            # code...
            $isLoggedIn = false;
        }
        // echo "index method ";
        $data = [
            'dataArtikel' => $artikelModel->getArtikel(null),
            'titleWeb' => 'Home | Artikel',
            'allArtikel' => $artikelModel->getAllArtikel(),
            'isLoggedIn' => $isLoggedIn
        ];
        // dd($data);
        // var_dump($data);
        return view('ArtikelView', $data);
    }

    public function find($id_artikel)
    {
        $artikelModel = new ArtikelModel();
        echo "find method in Artikel Controller that data artikel is ";
        $data = $artikelModel->getArtikel($id_artikel);
        if ($data == null) {
            # code...
            return redirect()->back()->with('massage', 'Artikel not available')->with('iconMsg', 'info');
        }
        return view('ArtikelView', $data);
    }
}
