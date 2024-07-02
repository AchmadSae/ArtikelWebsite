<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class RequestArtikelController extends BaseController
{
    protected $usersModel;
    public function __construct(){
        $this->usersModel = new UsersModel();
        
    }
    public function index()
    {
        session();
        if (!$this->usersModel->current_user()) {
            # code...
            return redirect()->to('/auth');
        }
        $data = [
            'titleWeb' => 'Write Article',
            'isLoggedIn' => true,
        ];
        return view('RequestArtikelView', $data);
    }
}
