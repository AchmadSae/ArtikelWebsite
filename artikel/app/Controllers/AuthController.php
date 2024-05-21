<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Session;

class AuthController extends BaseController
{
    public function login()
    {
        // Start the session
        $session = session();
        $model = new UsersModel();
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            // Validation rules
            $isValid = [
                'username' => 'required|valid_email',
                'password' => 'required'
            ];

            // Validate user input
            if (!$this->validate($isValid)) {
                return view('loginView', [
                    'validation' => $this->validator,
                    'titleWeb' => 'Login',
                ]);
            }

            // Get data from request
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $user = $model->getUser($username);

            // Verify user credentials
            if ($user && password_verify($password, $user['password'])) {
                $session->set([
                    'username' => $user['username'],
                    'password' => $user['password'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/create_artikel');
            } else {
                return view('loginView', [
                    'error' => 'Invalid login credentials',
                    'titleWeb' => 'Login'
                ]);
            }
        }

        // Default view data
        $data = [
            'titleWeb' => 'Login',
        ];
        return view('loginView', $data);
    }

    public function logOut()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
    public function signUp()
    {
        helper(['form']);
        $model = new UsersModel();
        if ($this->request->getMethod() == 'post') {
            $newUser = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'instagram_name' => $this->request->getVar('instName')
            ];
            if (!$model->save($newUser)) {
                return view('login', [
                    'validation' => $model->errors(),
                    'titleWeb' => 'login'
                ]);
            }
            return redirect()->to('/login');
        }
        $data = [
            'titleWeb' => 'Sign In',
        ];
        return view('signUpView', $data);

    }


}
