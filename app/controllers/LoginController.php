<?php
require_once(__DIR__ . '/../models/userModel.php');

class LoginController {
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login() {
        if(isset($_POST["username"]) && isset($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
    
            if ($this->userModel->Login($username, $password)) {
              
                $home = asset('product');
                header("Location: $home");
                exit;
            } else {
               
                $errorMessage = "Kullanıcı adı veya şifre yanlış!";
            }
        } else {
            $errorMessage = "Kullanıcı adı ve şifre alanları boş bırakılamaz!";
        }
    
        include_once 'app/views/login.php';
    }
    

    public function logout() {
       
        
        $login = asset('login');
                header("Location: $login");
                exit;
    }

  

 
}
?>