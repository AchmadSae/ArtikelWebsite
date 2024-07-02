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


    public function register()
    {
        $val = $this->usersModel->ValidationRules;
        if (!$this->validation($val)) {
            $pesanvalidasi = \Config\Services::validation();
            return redirect()->to('/login')->withInput()->with('validation', $pesanvalidasi)
                ->with('titleWeb', 'Login');
        }
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'insta_name' => $this->request->getPost('insta'),
        );
        $this->usersModel->insert($data);
        session()->setFlashdata('message', 'Success login!');
        return redirect()->to('/login')->with('titleWeb', 'Login');
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
            session()->setFlashdata('message', 'Success Login');
            session()->setFlashdata('iconMsg', 'success');
            session()->setFlashdata('isAlert', true);
            return redirect()->to('/creator/create_artikel')->with('iconMsg', 'success');
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
