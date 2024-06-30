<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "name",
        "description",
        "price",
        "created_at",
        "updated_at",
        "quantity_available"
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
        'name' => 'required|min_length[3]',
        'description' => 'required|min_length[10]',
        'price' => 'required|numeric',
        'quantity_available' => 'required|integer'
    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'The Product Name field is required.',
            'min_length' => 'The Product Name field must be at least 3 characters long.'
        ],
        'description' => [
            'required' => 'The Description field is required.',
            'min_length' => 'The Description field must be at least 10 characters long.'
        ],
        'price' => [
            'required' => 'The Price field is required.',
            'numeric' => 'The Price field must contain a numeric value.'
        ],
        'quantity_available' => [
            'required' => 'The Quantity Available field is required.',
            'integer' => 'The Quantity Available field must contain an integer value.'
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
