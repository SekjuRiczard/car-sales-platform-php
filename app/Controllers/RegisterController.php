<?php 
namespace App\Controllers;

use App\Models\User;

class RegisterController{

    public function index(){
        require __DIR__ . '/../Views/register.php';
    }

    public function saveUser(){
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request method']);
            exit;
        }
    
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm-password'] ?? '';
    
        $errors = [];
    
        if (empty($username) || empty($email) || empty($password)) {
            $errors[] = "Fields cannot be empty";
        }
    
        if ($password !== $confirmPassword) {
            $errors[] = "Passwords do not match";
        }
    
        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long";
        }
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }
    
        if (!empty($errors)) {
            echo json_encode(['success' => false, 'message' => $errors]);
            exit;
        }
    
        $user = new User();
        $user->saveUser($username, $email, $password); // Ta funkcja już zwraca JSON z tokenem lub błędem
        exit;
    }
    
}