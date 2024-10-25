<?php

    use App\Controllers\UserController;

    require_once './vendor/autoload.php';
    require './src/Controllers/UserController.php';

    function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "test";
        

        try{
            $conn = new mysqli($servername, $username, $password, $database);
            return $conn;
        } catch (Exception $e) {
            echo $e->getMessage();
        }  
    }

    class User {
        public $name;
        public $email;
        public $password;
        public $code;
        public $title;

        public function __construct($name, $email, $password, $code, $title){
            $this->name = $name;
            $this->email = $email;
            $this->password = hash('sha256', $password);
            $this->code = $code;
            $this->title = $title;
        }
    }

    $user_data = new User($_POST["name"], $_POST["email"],  $_POST["password"], $_POST["code"], $_POST["title"]);

    $conn = connect();

    $controller = new UserController($conn);
    $result = $controller->createUser($user_data);

    $register = $controller->getUserByEmail($_POST["email"]);


    $user_email = $register['email_user'];
    
    $url = "https://jsonplaceholder.typicode.com/posts/1";
    
    // Initialize a CURL session.
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url); 
    $api_result = json_decode(curl_exec($ch));
    
    $result_title = $api_result->title; 
    
    $controller->updateTitle($user_email, $result_title);

    echo("Cadastro realizado com sucesso!");
 
?>

    

    
