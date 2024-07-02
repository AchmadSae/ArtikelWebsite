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
    protected $allowedFields = ['id', 'username', 'password', 'instagram_name', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    //validation when login
    protected $validationRules = [
        'username' => 'required',
        'password' => 'required',
    ];

    const SESSION_KEY = 'id';

    public function login($username, $password)
    {
        $user = $this->where('username', $username)
            ->first();
        // Check if user exists and password is correct
        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            session()->set([self::SESSION_KEY => $user['id']]);
            $this->_update_last_login($user['id']);
            return session()->has(self::SESSION_KEY);
        }

        return false;
    }

    function getUser($username){
        $user = $this->where($username)->first();
        return $user['username'];
    }

    public function current_user()
    {
        if (!session()->has(self::SESSION_KEY)) {
            return null;
        }

        $user_id = session()->get(self::SESSION_KEY);
        return $this->find($user_id);
    }

    public function logout()
    {
        session()->remove(self::SESSION_KEY);
        return !session()->has(self::SESSION_KEY);
    }

    private function _update_last_login($id)
    {
        $data = [
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        $this->update($id, $data);
    }

    public function signUp($data)
    {
        var_dump($data);
        // Insert the user data
        if ($this->save($data)) {
            return [
                'status' => true,
                'message' => 'User created successfully.'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Failed to create user.'
            ];
        }

    }
}
