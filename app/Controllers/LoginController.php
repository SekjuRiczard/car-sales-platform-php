<?php 
    namespace App\Controllers;
    use App\Models\User;

    class LoginController{

        public function index(){
            require __DIR__ . '/../Views/login.php';
        }

        public function loginUser(){
            if($_SERVER['REQUEST_METHOD']==="POST"){

                $username = $_POST['username'];
                $password = $_POST['password'];
                $user = new User;

                if(!empty($username) || !empty($password)){
                    $user->loginUser($username,$password);
                }else{
                    echo json_encode(['success' => false, 'message' => 'Fields cannot be empty']);
                }
            }else{
                echo json_encode(['success' => false, 'message' => 'Bad method signature']);
            }
        }

    }
?>