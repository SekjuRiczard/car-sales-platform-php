<?php 
namespace App\Controllers;

class AccountDetailsController{
    public function index(){
        require __DIR__ . '/../Views/accountDetails.php';
    }

    public function logoutUser() {
        // 5. Wyczyszczenie zmiennych sesji
        $_SESSION = [];
    
        // 6. Wygaszenie ciasteczka sesji
        if (ini_get("session.use_cookies")) {
          $params = session_get_cookie_params();
          setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
          );
        }
    
        // 7. Zniszczenie pliku sesji
        session_destroy();
    
        // 8. Usunięcie własnych ciasteczek (np. auth_token)
        setcookie('auth_token', '', time() - 3600, '/');
    
        // 9. Przekierowanie do strony logowania
        header('Location: /login');
        exit;
      }
}
?>