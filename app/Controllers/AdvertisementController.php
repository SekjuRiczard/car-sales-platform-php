<?php 
namespace App\Controllers;

use App\Models\Advertisements;

class AdvertisementController {
    public function index() {
        require __DIR__ . '/../Views/addAdvertisement.php';
    }

    public function createAdvertisement() {
        error_log('FILES dump: ' . print_r($_FILES, true));
        // 1. Zebranie danych
        $data = [
            'model_id'       => $_POST['model_id'],
            'year'           => (int)$_POST['year'],
            'mileage'        => (int)$_POST['mileage'],
            'gearbox'        => $_POST['gearbox'],
            'type'           => $_POST['condition'],
            'fuel'           => $_POST['fuel'],
            'body'           => $_POST['body'],
            'car_brand'      => $_POST['car_brand'],
            'car_generation' => $_POST['car_generation'],
            'price'          => (float)$_POST['price'],
            'description'    => $_POST['description'],
            'title'          => $_POST['title'],
        ];
        $userId = $_SESSION['user']['sub'] ?? null;


        // 3. Stworzenie ogłoszenia
        $advertisementModel = new Advertisements();
        $files = $_FILES['images'] ?? [];
        $newAdvertisement = $advertisementModel->createAdvertisement($data, $userId, $files);

        if (!$newAdvertisement) {
            error_log("Cannot create advertisement for userId={$userId}");
            // tu możesz przekierować albo wyrenderować błąd
            echo "Wystąpił błąd podczas zapisywania ogłoszenia.";
        } else {
            header("Location: /dashboard");
            exit;
        }
    }


}
