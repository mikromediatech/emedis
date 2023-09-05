<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Bayu extends Model
{
    protected $table      = 'Bayu_TABLE';
    protected $primaryKey = 'id';    
	protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';    

    protected $useAutoIncrement = true;
    
}