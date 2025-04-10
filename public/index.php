<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$router = new AltoRouter();


//Ladowanie stron
$router->map('GET', '/', 'HomeController@index', 'home');
$router->map('GET', '/login', 'LoginController@index', 'login');
$router->map('GET', '/register', 'RegisterController@index', 'register');
$router->map('GET', '/dashboard', 'DashboardController@index', 'dashboard');
//Logowanie i rejestracja
$router->map('POST','/login/auth','LoginController@loginUser','loginUser');
$router->map('POST','/register/saveUser','RegisterController@saveUser','saveUser');
//Zarzadzanie filrami
$router->map('GET','/getCarBrands','DashboardController@getCarBrands','getCarBrands');
$router->map('GET','/getCarModels/[i:id]','DashboardController@getCarModels','getCarModels');
$router->map('GET','/getModelGeneration/[i:id]','DashboardController@getModelGenerations','getCarGenerations');
//Pobieranie ogloszen
$router->map('GET','/getAllAdvertisements','DashboardController@getAllAdvertisements','getAllAdvertisements');
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
