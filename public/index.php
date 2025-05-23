<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AccountDetailsController;
use App\Middleware\AuthMiddleware;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$router = new AltoRouter();


//Ladowanie stron
$router->map('GET', '/', 'HomeController@index', 'home');
$router->map('GET', '/login', 'LoginController@index', 'login');
$router->map('GET', '/register', 'RegisterController@index', 'register');
$router->map('GET', '/dashboard', 'DashboardController@index', 'dashboard');
$router->map('GET', '/accountDetails', 'AccountDetailsController@index', 'accountDetails');
$router->map('GET', '/addAdvertisement', 'AdvertisementController@index', 'addAdvertisement');
//Logowanie i rejestracja
$router->map('POST','/login/auth','LoginController@loginUser','loginUser');
$router->map('POST','/register/saveUser','RegisterController@saveUser','saveUser');
$router->map('POST','/logout','AccountDetailsController@logoutUser','logout');
//Zarzadzanie filrami
$router->map('GET','/getCarBrands','DashboardController@getCarBrands','getCarBrands');
$router->map('GET','/getCarModels/[i:id]','DashboardController@getCarModels','getCarModels');
$router->map('GET','/getModelGeneration/[i:id]','DashboardController@getModelGenerations','getCarGenerations');
//Pobieranie ogloszen
$router->map('GET','/getAllAdvertisements','DashboardController@getAllAdvertisements','getAllAdvertisements');
//Dodawanie ogloszen
$router->map('POST','/advertisement/create','AdvertisementController@createAdvertisement','createAdvertisement');
$match = $router->match();


logThings();


if ($match) {
   
    // trasy publiczne
    $public = ['home','login','register','loginUser','saveUser'];

    // jeśli trasa *nie* jest publiczna → wymagamy ciasteczka
    if (!in_array($match['name'], $public, true)) {
        try {
            $auth    = new AuthMiddleware();
            $payload = $auth->handle();
            // opcjonalnie zapisz do sesji
            $_SESSION['user'] = (array)$payload;
        } catch (Exception $e) {
            // zamiast 401 JSON – przekieruj na login
            header('Location: /login');
            exit;
        }
    }
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

function logThings(){
    if(!empty($_SESSION['user'])){
        foreach($_SESSION['user'] as $key=>$value){
            error_log("Session user [$key]" . print_r($value ,true));
        }
    }
  
}

?>
