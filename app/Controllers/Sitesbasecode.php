<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
class Sitesbase extends BaseController
{
    private $db;
    private $table;

    private $userObject;
    public function __construct(){
        $this->userObject = new UserModel();
    }

    public function insertUser(){
        $data = [
                    "username"=>"Pratik",
                    "email"=> "pratik@gmail.com",
                    "password"=>"Pratik@123"
                ];
        
        if ($this->userObject->insert($data)){
            echo"User added";
        }
        else{
            echo "Error";
        }
    }

    public function updateUser(){
        $user_id = 3;
        $data = [
            "username"=> "Ajinkya"
        ];
        if ($this->userObject->update([
            "id"=> $user_id
        ], $data)){
            echo"User updated";
        }
        else{
            echo "Error";
        }
    }

    public function deleteUser(){
        $user_id = 3;
        
        if ($this->userObject->delete($user_id)){
            echo"User deleted";
        }
        else{
            echo "Error";
        }
    }

    public function getUsers(){
        $users = $this->userObject->findAll();

        echo"<pre>";
        print_r($users);
        echo"<pre>";

    }

    public function searchUser(){
        $userid=3;

        $user = $this->userObject->where([
            "id"=> $userid
        ])->get()->getRowArray();

        echo "<pre>";
        print_r($user);

        echo "</pre>";
    }
    // public function __construct(){
    //     $this->db = db_connect();
    //     $this->table = $this->db->table("Users");
    // }
    // public function insertUser()
    // {
    //     $data = [
    //         "username"=>"Pratik",
    //         "email"=> "pratik@gmail.com",
    //         "password"=>"Pratik@123"
    //     ];

    //     if ($this->table->insert($data)){
    //         echo"User added";
    //     }
    //     else{
    //         echo "Error";
    //     }
    // }
    // public function updateUser(){
    //     $user_id=1;
    //     $updated_data=[
    //         "email"=>"pratik@mitaoe.ac.in"
    //     ];
    //     if ($this->table->update($updated_data,["id"=>$user_id])){ 
    //         echo"Successfully updated"; 
    //     }
    //     else{
    //         echo "update unsuccessfull";
    //     }
    // }

    // public function deleteUser(){
    //     $user_id=2;
    //     if ($this->table->delete(["id"=>$user_id])){
    //         echo "Delete operation Successful";
    //     }
    //     else{
    //         echo "Failed deletion";
    //     }
    // }

    // public function searchUser(){
    //     $students = $this->table->where([
    //         "id"=>3
    //     ])->get()->getRowArray();

    //     echo "<pre>";
    //     print_r($students);

    //     echo "</pre>";
    // }


}
