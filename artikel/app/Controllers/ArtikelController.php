<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Validation;

class ArtikelController extends BaseController
{

    public function index()
    {
        session();
        $artikelModel = new ArtikelModel();
        // echo "index method ";
        $data = [
            'dataArtikel' => $artikelModel->getArtikel(null),
            'titleWeb' => 'Artikel',
            'allArtikel' => $artikelModel->getAllArtikel(),
        ];
        // var_dump($data);
        return view('ArtikelView', $data);
    }

    public function find($id_artikel)
    {
        session();
        $artikelModel = new ArtikelModel();
        echo "find method ";
        $data = $artikelModel->getArtikel($id_artikel);
        var_dump($data);
    }
}
