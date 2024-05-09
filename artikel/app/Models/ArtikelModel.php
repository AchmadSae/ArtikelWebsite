<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'id_artikel',
        'requester',
        'title' .
        'content',
        'main_img',
        'img1',
        'img2',
        'img3',
        'img4',
        'dictionary',
        'isLaunch'
    ];

    protected bool $allowEmptyInserts = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    function getArtikel($id_artikel)
    {
        // Debugging statement
        $artikelData = null;
        if ($id_artikel === null) {
            // echo "ID Artikel Null Model : $id_artikel";
            $artikelData = $this->first();
        }
        $artikelData = $this->find($id_artikel);
        return $artikelData;
    }
    function getAllArtikel(){
        $allArtikel = $this->findAll();
        return $allArtikel;
    }
}
