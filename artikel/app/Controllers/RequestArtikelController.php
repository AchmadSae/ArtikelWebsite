<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class RequestArtikelController extends BaseController
{
    protected $usersModel;
    protected $articleModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->articleModel = new ArtikelModel();

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

    public function addArticle()
    {
        session();
        $user_id = $this->usersModel->current_user();
        $userName = $user_id['username'];
        $val = $this->articleModel->validationRequestRules;
        if (!$this->validate($val)) {
            # code...if validation form is not passed
            $validation = \config\Services::validation();
            $errors = $validation->getErrors();
            return redirect()->back()->with('validation', $errors);
        }
        ;


        // Handle image uploads
        $main_img = $this->handleFileUpload($this->request->getFile('main_img'), 'img/default/default.jpg');
        $img1 = $this->handleFileUpload($this->request->getFile('img1'), 'img/default/default.jpg');
        $img2 = $this->handleFileUpload($this->request->getFile('img2'), 'img/default/default.jpg');
        $img3 = $this->handleFileUpload($this->request->getFile('img3'), 'img/default/default.jpg');
        // dd("success", $main_img, $img1, $img2, $img3);

        $data = [
            'id_artikel' => $this->request->getPost('slug'),
            'requester' => $userName,
            'title' => $this->request->getPost('title'),
            'contents' => $this->request->getPost('contents'),
            'main_img' => $main_img,
            'img1' => $img1,
            'img2' => $img2,
            'img3' => $img3,
            'img4' => $img1,
            'dictionary' => $this->request->getPost('resource_article'),
            'quote' => $this->request->getPost('quotes'),
            'linkYoutube' => $this->request->getPost('linkYoutube'),
            'linkInstagram' => $this->request->getPost('linkInstagram'),
            'linkWebsite' => $this->request->getPost('linkWebsite'),
            'otherSource' => $this->request->getPost('othersLink')
        ];

        $result = $this->articleModel->addArticle($data);
        if (!$result['status']) {
            # code...
            session()->setFlashdata('message', $result['message']);
            session()->setFlashdata('iconMsg', 'error');
            session()->setFlashdata('isAlert', true);
            return redirect()->back();
        }
        session()->setFlashdata('message', $result['message']);
        session()->setFlashdata('iconMsg', 'success');
        session()->setFlashdata('isAlert', true);
        return redirect()->to('/');
    }

    private function handleFileUpload($file, $default)
    {
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getName(); // Use a random name to avoid conflicts
            $filePath = FCPATH . 'img/article'; // Use WRITEPATH for write operations

            // Ensure the directory exists
            if (!is_dir($filePath)) {
                mkdir($filePath, 0755, true);
            }

            // Move the file and return the path if successful
            if ($file->move($filePath, $fileName)) {
                return 'img/article/' . $fileName;
            } else {
                // Log the error for debugging
                log_message('error', 'File could not be moved: ' . $file->getErrorString());
                return $default;
            }
        } else {
            // Log the error for debugging
            if ($file) {
                log_message('error', 'File upload error: ' . $file->getErrorString());
            }
            return $default;
        }
    }
}
