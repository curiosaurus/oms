<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\RESTful\ResourceController;

class ProductController extends ResourceController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $products = $this->productModel->findAll();
        return $this->respond([
            "status" => true,
            "message" => "Products retrieved successfully",
            "data" => $products
        ], 200);
    }

    public function addProduct()
    {
        $data = $this->request->getJSON(true);

        // Create a dictionary for product data
        $productData = [
            'name' => $data['name'] ?? '',
            'description' => $data['description'] ?? '',
            'price' => $data['price'] ?? 0,
            'quantity_available' => $data['quantity_available'] ?? 0
        ];

        if ($this->productModel->insert($productData)) {
            return $this->respondCreated([
                "status" => true,
                "message" => "Product added successfully",
                "data" => $productData
            ]);
        } else {
            return $this->fail($this->productModel->errors());
        }
    }

    public function addStock()
    {
        $data = $this->request->getJSON(true);
        $id= $data["id"];
        $quantity = $data['quantity'] ?? 0;

        $product = $this->productModel->find($id);
        if (!$product) {
            return $this->failNotFound("Product not found");
        }

        // Update the product's quantity
        $productData = [
            'quantity_available' => $product['quantity_available'] + $quantity
        ];

        if ($this->productModel->update($id, $productData)) {
            return $this->respond([
                "status" => true,
                "message" => "Stock added successfully",
                "data" => $productData
            ], 200);
        } else {
            return $this->fail($this->productModel->errors());
        }
    }

    public function deleteProduct()
    {
        $data = $this->request->getJSON(true);
        $id= $data["id"];
        if ($this->productModel->delete($id)) {
            return $this->respondDeleted([
                "status" => true,
                "message" => "Product deleted successfully"
            ]);
        } else {
            return $this->fail($this->productModel->errors());
        }
    }

    public function updateProduct()
    {
        $data = $this->request->getJSON(true);
        $id= $data["id"];

        // Create a dictionary for product data
        $productData = [];

        // Check if each key exists in the request data and add it to the dictionary if it does
        if (isset($data['name'])) {
            $productData['name'] = $data['name'];
        }
        if (isset($data['description'])) {
            $productData['description'] = $data['description'];
        }
        if (isset($data['price'])) {
            $productData['price'] = $data['price'];
        }
        if (isset($data['quantity_available'])) {
            $productData['quantity_available'] = $data['quantity_available'];
        }

        if ($this->productModel->update($id, $productData)) {
            return $this->respond([
                "status" => true,
                "message" => "Product updated successfully",
                "data" => $productData
            ], 200);
        } else {
            return $this->fail($this->productModel->errors());
        }
    }
}
