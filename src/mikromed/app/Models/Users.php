<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;    
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['username','password','group_id','level'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'username'=>'required|is_unique[users.username,id_user,{id_user}]',
        'password'=>'required',
        'level'=>'required|is_natural'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['encrypt_password'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['encrypt_password'];
    protected $afterUpdate    = ['deleteCache'];
    protected $beforeFind     = ['checkcache'];
    protected $afterFind      = ['saveCache'];
    protected $beforeDelete   = [];
    protected $afterDelete    = ['deleteCache'];

    protected function encrypt_password(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);         

        return $data;
    }
    protected function checkCache(array $data)
    {
        // Check if the requested item is already in our cache
        if (isset($data['data']['id_user']) && $item = cache('user_'.$data['data']['id_user'])) {
            $data['data']       = $item;
            $data['returnData'] = true;

            return $data;
        }

      

        
    }
    protected function deleteCache(array $data)
    {
        // Check if the requested item is already in our cache
        if (isset($data['data']['id_user']) && $item = cache('user_'.$data['data']['id_user'])) {
             cache()->delete('user_'.$data['id_user']);
        }

         return $data;
    }
    protected function saveCache(array $data)
    {
        
        
        // Check if the requested item is already in our cache

        if (isset($data['data']['id_user']) && cache('user_'.$data['data']['id_user'])== null ) {
            cache()->save('user_'.$data['data']['id_user'],$data['data']);
            return $data;
        } else{
            
            return $data;
        
        }

        
    }
}
