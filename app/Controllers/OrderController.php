<?php

namespace App\Controllers;

use App\Models\OrderModel;
use CodeIgniter\RESTful\ResourceController;

class OrderController extends ResourceController
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    public function index()
    {
        $orders = $this->orderModel->findAll();
        return $this->respond([
            "status" => true,
            "message" => "Orders retrieved successfully",
            "data" => $orders
        ], 200);
    }

    public function addOrder()
    {
        // Create a dictionary for order data
        $data = $this->request->getJSON(true);
        $id = $data["id"];
        // Create a dictionary for order data
        $orderData = [];

        // Check if each key exists in the request data and add it to the dictionary if it does
        if (isset($data['customer_id'])) {
            $orderData['customer_id'] = $data['customer_id'];
        }
        if (isset($data['customer_name'])) {
            $orderData['customer_name'] = $data['customer_name'];
        }
        if (isset($data['product_id'])) {
            $orderData['product_id'] = $data['product_id'];
        }
        if (isset($data['quantity'])) {
            $orderData['quantity'] = $data['quantity'];
        }
        if (isset($data['total_price'])) {
            $orderData['total_price'] = $data['total_price'];
        }
        if (isset($data['status'])) {
            $orderData['status'] = $data['status'];
        }

        if ($this->orderModel->insert($orderData)) {
            return $this->respondCreated([
                "status" => true,
                "message" => "Order added successfully",
                "data" => $orderData
            ]);
        } else {
            return $this->fail($this->orderModel->errors());
        }
    }

    public function updateOrder()
    {
        $data = $this->request->getJSON(true);
        $id = $data["id"];
        // Create a dictionary for order data
        $orderData = [];

        // Check if each key exists in the request data and add it to the dictionary if it does
        if (isset($data['customer_id'])) {
            $orderData['customer_id'] = $data['customer_id'];
        }
        if (isset($data['customer_name'])) {
            $orderData['customer_name'] = $data['customer_name'];
        }
        if (isset($data['product_id'])) {
            $orderData['product_id'] = $data['product_id'];
        }
        if (isset($data['quantity'])) {
            $orderData['quantity'] = $data['quantity'];
        }
        if (isset($data['total_price'])) {
            $orderData['total_price'] = $data['total_price'];
        }
        if (isset($data['status'])) {
            $orderData['status'] = $data['status'];
        }

        if ($this->orderModel->update($id, $orderData)) {
            return $this->respond([
                "status" => true,
                "message" => "Order updated successfully",
                "data" => $orderData
            ], 200);
        } else {
            return $this->fail($this->orderModel->errors());
        }
    }

    public function deleteOrder()
    {
        $data = $this->request->getJSON(true);
        $id = $data["id"];
        if ($this->orderModel->delete($id)) {
            return $this->respondDeleted([
                "status" => true,
                "message" => "Order deleted successfully"
            ]);
        } else {
            return $this->fail($this->orderModel->errors());
        }
    }
}
