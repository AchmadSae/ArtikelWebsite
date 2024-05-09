<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function login()
    {
        return view('loginView');
        
    }
    public function signUp()
    {
        return view('signUpView');
        
    }


}
