<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table            = 'tickets';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'first_name',
  'last_name',
  'email',
  'office_id',
  'state',
  'severity',
  'description',
  'remarks'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'first_name' => 'required|min_length[1]|max_length[50]',
        'last_name' => 'required|min_length[1]|max_length[50]',
        'email'  => 'required|min_length[1]|max_length[100]',
        'office_id' => 'required|min_length[1]|max_length[10]',
        'state'  => 'required|min_length[1]|max_length[10]',
        'severity'  => 'required|min_length[1]|max_length[10]',
        'description'  => 'required|min_length[1]|max_length[255]',
        'remarks'  => 'required|min_length[1]|max_length[255]'

    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
