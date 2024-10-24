<?php

namespace App\Models;

class UserModel{

    private $conn;
    
    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function create($data){
        $query = "INSERT INTO users (name_user, email_user, password_user, title_user, code_user) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
		$stmt->bind_param('sssss', $data->name, $data->email, $data->password, $data->title, $data->code);
        if ($stmt->execute()) {
			return 0;
		} else {
			return -1;
		}
    }

    public function getByEmail($email){
        $query = "SELECT * FROM users WHERE email_user = ?";
        $stmt = $this->conn->prepare($query);    
        $stmt->bind_param('s', $email);
        if ($stmt->execute()){
            return $stmt->get_result();
        } else {
            return -1;
        }
    }

    public function updateTitle($email, $new_title){
        $query = "UPDATE users SET title_user = ? WHERE email_user = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss',$new_title, $email);
        if ($stmt->execute()) {
			return 0;
		} else {
		    return -1;
		}
    }
}

?>