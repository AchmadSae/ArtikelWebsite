<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class RequestArtikelController extends BaseController
{
    protected $usersModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();

    }
    public function index()
    {
        session();
        $user_id = $this->usersModel->current_user();
        if (!$user_id) {
            # code...
            return redirect()->to('/auth');
        }
        $data = [
            'titleWeb' => 'Write Article',
            'isLoggedIn' => true,
            'username' => $user_id['username']
        ];
        return view('RequestArtikelView', $data);
    }
}
