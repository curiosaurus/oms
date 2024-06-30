<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "customer_id","customer_name","product_id","quantity","total_price","created_at","updated_at","status"
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
        'customer_id' => 'required|integer',
        'customer_name' => 'required|min_length[3]',
        'product_id' => 'required|integer',
        'quantity' => 'required|integer',
        'total_price' => 'required|numeric',
        'status' => 'required'
    ];
    protected $validationMessages   = [
        'customer_id' => [
            'required' => 'The Customer ID field is required.',
            'integer' => 'The Customer ID field must be an integer.'
        ],
        'customer_name' => [
            'required' => 'The Customer Name field is required.',
            'min_length' => 'The Customer Name field must be at least 3 characters long.'
        ],
        'product_id' => [
            'required' => 'The Product ID field is required.',
            'integer' => 'The Product ID field must be an integer.'
        ],
        'quantity' => [
            'required' => 'The Quantity field is required.',
            'integer' => 'The Quantity field must be an integer.'
        ],
        'total_price' => [
            'required' => 'The Total Price field is required.',
            'numeric' => 'The Total Price field must contain a numeric value.'
        ],
        'status' => [
            'required' => 'The Status field is required.'
        ]
    ];
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
