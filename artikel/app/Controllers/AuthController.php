<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class AuthController extends BaseController
{
    protected $usersModel;
    protected $request;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->usersModel = new UsersModel();

        // $this->request = $request ?? \Config\Services::request();
    }
    public function index()
    {
        $isLoggedIn = true;
        if (!$this->usersModel->current_user()) {
            # code...
            $isLoggedIn = false;
        }
        $data = [
            'isLoggedIn' => $isLoggedIn,
            'titleWeb' => 'Login'
        ];
        return view('LoginView', $data);
    }
    public function signUp()
    {
        $isLoggedIn = true;
        if (!$this->usersModel->current_user()) {
            # code...
            $isLoggedIn = false;
        }
        $data = [
            'isLoggedIn' => $isLoggedIn,
            'titleWeb' => 'SignUp'
        ];
        return view('SignUpView', $data);
    }


    public function register()
    {
        $val = $this->usersModel->validationRules;
        if (!$this->validate($val)) {
            $validation = \Config\Services::validation();
            $errors = $validation->getErrors();
            return redirect()->back()->with('validation', $errors);
        }
        $data = array(
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'instagram_name' => $this->request->getPost('instagram_name'),
        );
        $result = $this->usersModel->signUp($data);
        if ($result['status']) {
            session()->setFlashdata('message', $result['message']);
            session()->setFlashdata('iconMsg', 'success');
            session()->setFlashdata('isAlert', true);
            return redirect()->to('/auth');
        } else {
            session()->setFlashdata('message', $result['message']);
            session()->setFlashdata('iconMsg', 'error');
            session()->setFlashdata('isAlert', true);
            return redirect()->back();
        }
    }

    public function login()
    {
        helper(['form']);
        // Check if this is a POST request
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $validationRules = $this->usersModel->validationRules;

        if (!$this->validate($validationRules)) {
            $validation = \Config\Services::validation();
            $errors = $validation->getErrors();
            return redirect()->back()->with('titleWeb', 'Login')->with('validation', $errors);
        } else if ($this->usersModel->login($username, $password)) {
            $user_id = $this->usersModel->current_user();
            session()->setFlashdata('message', 'Success Login');
            session()->setFlashdata('iconMsg', 'success');
            session()->setFlashdata('isAlert', true);
            return redirect()->to('/creator/create_article')->with('username', $user_id['username']);
        } else {
            session()->setFlashdata('message', 'Username and Password is incorrect!');
            session()->setFlashdata('iconMsg', 'error');
            session()->setFlashdata('isAlert', true);
            return redirect()->back();
        }
    }

    public function logout()
    {
        $this->usersModel->logout();
        return redirect()->to('/');
    }

}
