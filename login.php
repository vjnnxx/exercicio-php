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

    $conn = connect();

     $controller = new UserController($conn);


     $email = $_POST["email"];
     $password = hash("sha256", $_POST["password"]);

     $result = $controller->loginUser($email, $password);

     if ($result === null){
        echo('Credenciais incorretas');
     } else {
        setcookie('logged_user', $result["name_user"], time() + (86400 * 30), "/");
        header('Location: '.'page.php');
     }

     



    

?>