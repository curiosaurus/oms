<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;


class Sites extends ResourceController
{
    private $userObject;
    public function __construct(){
        $this->userObject = new UserModel();
    }

    public function listUsers(){
        $users = $this->userObject->findAll();
        return $this->respond([
            "status" => true,
            "message" => "Users retrieved successfully",
            "data" => $users
        ], 200);
    }

    public function addUser(){
        $data = $this->request->getJSON(true);

        // Extract values into variables
        $name = $data['name'] ?? '';
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        // Hash the password
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $hashedPassword=$password;
        // Prepare data for insertion
        $userData = [
            "username" => $name,
            "email" => $email,
            "password" => $hashedPassword
        ];

        if ($this->userObject->insert($userData)) {
            return $this->respondCreated([
                "status" => true,
                'username' => $name,
            'email' => $email,
            'password' => $hashedPassword,
            'data'=>$userData,
                "message" => "User added successfully"
            ]);
        } else {
            return $this->fail($this->userObject->errors());
        }
    }

    public function updateUser($id = null)
    {
        // Extract data from PUT request
        $data = $this->request->getRawInput();

        // Extract values into variables
        $name = $data['name'] ?? null;
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;
        $id=$data['id']??null;
        // Prepare data for update
        $userData = [];

        if ($name !== null) {
            $userData['name'] = $name;
        }

        if ($email !== null) {
            $userData['email'] = $email;
        }

        if ($password !== null) {
            // Hash the password
            
            // $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
            $userData['password'] = $password;
            
        }

        if (!empty($userData) && $this->userObject->update($id, $userData)) {
            return $this->respond([
                "status" => true,
                "data" =>$data,
                "message" => "User updated successfully"
            ], 200);
        } else {
            return $this->fail($this->userObject->errors());
        }
    }

    public function deleteUser(){
        echo json_encode(array(
            "status"=> true,
            "message"=> "Delete User called"
        ));
    }
}