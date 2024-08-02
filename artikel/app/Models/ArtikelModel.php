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
        'title',
        'contents',
        'main_img',
        'img1',
        'img2',
        'img3',
        'img4',
        'dictionary',
        'isLaunch',
        'quote',
        'relatedSource',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // validations when request article 
    protected $validationRequestRules = [
        'slug' => 'required|is_unique[artikel.id_artikel]',
        'title' => 'required',
        'contents' => 'required',
        'main_img' => 'uploaded[main_img]|mime_in[main_img,image/jpg,image/jpeg,image/png]',
        'img1' => 'mime_in[img1,image/jpg,image/jpeg,image/png]',
        'img2' => 'mime_in[img2,image/jpg,image/jpeg,image/png]',
        'img3' => 'mime_in[img3,image/jpg,image/jpeg,image/png]',
    ];
    function getArtikel($id_artikel)
    {
        $artikelData = $this->where('isLaunch', $id_artikel)->first();
        return $artikelData;
    }
    function getAllArtikel()
    {
        $allArtikel = $this->findAll();
        return $allArtikel;
    }

    function addArticle($data)
    {
        $result = $this->save($data);
        if (!$result) {
            # code...
            return [
                'status' => false,
                'message' => 'Request Article Failed, Please Fill Correctly!'
            ];
        }
        return [
            'status' => true,
            'message' => 'Request Article Success, We Will Inform You If Article Launch'
        ];
    }
}
