<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'username', 'password', 'email'];


    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Function
    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($username)
    {
        return $this->where('username', $username)
            ->first();
    }
    public function GuestArrived($guestData)
    {
        return $this->db->insert('users', $guestData);
    }

    public function isLogged($email)
    {
        $isLogged = $this->db->get_where('users', array('email', $email))->row_array();
        if ($isLogged && $isLogged['isLogged'] == 1) {
            # code...
            return true;

        } else {
            return false;
        }
    }

    public function isAdmin($email)
    {
        $isAdmin = $this->db->get_where('users', array('email', $email))->row_array();
        if ($isAdmin && $isAdmin['isAdmin'] == 1) {
            return true;
        }
    }
}
