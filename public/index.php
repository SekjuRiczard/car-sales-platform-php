<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$router = new AltoRouter();



$router->map('GET', '/', 'HomeController@index', 'home');
$router->map('GET', '/login', 'LoginController@showLogin', 'login');
$router->map('GET', '/register', 'RegisterController@showRegister', 'register');
$router->map('POST','/register/saveUser','RegisterController@saveUser','saveUser'); //metoda rejestracji usera
$router->map('GET', '/dashboard', 'DashboardController@index', 'dashboard');

$match = $router->match();

if ($match) {
   
    list($controller, $method) = explode('@', $match['target']);
    $controllerClass = 'App\\Controllers\\' . $controller;
    if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
        $controllerInstance = new $controllerClass();
        call_user_func_array([$controllerInstance, $method], $match['params']);
    } else {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error');
        echo "Kontroler lub metoda nie istnieje.";
    }

} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "Strona nie znaleziona.";
}
?>
