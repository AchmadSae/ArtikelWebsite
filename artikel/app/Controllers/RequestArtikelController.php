<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class RequestArtikelController extends BaseController
{
    public function index()
    {
        session();
        $data = [
            'titleWeb' => 'Write Artikel',
        ];
        return view('RequestArtikelView', $data);
    }
}
