<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserController {
    private $model;
    
    public function __construct($dbConnection) {
        $this->model = new UserModel($dbConnection);
    }

    public function createUser($data){
        if(empty($data)){
            return "Input incorreto";
        }

        $result = $this->model->create($data);

        return $result;
    }

    public function getUserByEmail($email){
        $result = $this->model->getByEmail($email);

        // $row = mysqli_fetch_array($result);

        return $result->fetch_assoc();
    }

    public function updateTitle($email, $new_title){
        $result = $this->model->updateTitle($email, $new_title);

        return $result;
    }

    public function loginUser($email, $password){
        $result = $this->model->loginUser($email, $password);

        return $result->fetch_assoc();
    }
}
