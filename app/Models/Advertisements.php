<?php
namespace App\Models;

use App\Core\Database;
use PDO;
use Exception;

class Advertisements {
    private $con;

    public function __construct() {
        $this->con = Database::getInstance()->getConnection();
    }

    /**
     * Tworzy ogłoszenie + dane samochodu + zdjęcia.
     *
     * @param array $data   Dane ogłoszenia i samochodu.
     * @param int   $userId ID użytkownika.
     * @param array $files  Tablica $_FILES['images'].
     * @return int|false    ID nowego ogłoszenia lub false.
     * @throws Exception    W razie błędów operacji plikowych lub SQL.
     */
    public function createAdvertisement(array $data, int $userId, array $files) {
        // upewnij się, że sesja działa, jeśli potrzebujesz username
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        try {
            $this->con->beginTransaction();

            // 1) INSERT do advertisements
            $stmtA = $this->con->prepare(
                'INSERT INTO advertisements
                   (user_id, price, description, title, created_at)
                 VALUES
                   (:user_id, :price, :description, :title, NOW())'
            );
            $stmtA->execute([
                ':user_id'     => $userId,
                ':price'       => $data['price'],
                ':description' => $data['description'],
                ':title'       => $data['title'],
            ]);
            if ($err = $stmtA->errorInfo()[2] ?? null) {
                throw new Exception("advertisements insert error: $err");
            }
            $adId = (int)$this->con->lastInsertId();

            // 2) INSERT do cars
            $stmtC = $this->con->prepare(
                'INSERT INTO cars
                   (advertisement_id, model_id, year, mileage, gearbox, type, fuel, body, car_brand, car_generation)
                 VALUES
                   (:ad_id, :model_id, :year, :mileage, :gearbox, :type, :fuel, :body, :car_brand, :car_generation)'
            );
            $stmtC->execute([
                ':ad_id'           => $adId,
                ':model_id'        => $data['model_id'],
                ':year'            => $data['year'],
                ':mileage'         => $data['mileage'],
                ':gearbox'         => $data['gearbox'],
                ':type'            => $data['type'],
                ':fuel'            => $data['fuel'],
                ':body'            => $data['body'],
                ':car_brand'       => $data['car_brand'],
                ':car_generation'  => $data['car_generation'],
            ]);
            if ($err = $stmtC->errorInfo()[2] ?? null) {
                throw new Exception("cars insert error: $err");
            }

            // 3) Obsługa uploadu zdjęć
            $baseDir    = __DIR__ . '/../../public/uploads';
            $userFolder = $userId . '_' . $this->slugify($_SESSION['user']['username']);
            $adFolder   = $adId . '_' . uniqid();
            $adPath     = "$baseDir/$userFolder/$adFolder";

            // Tworzymy foldery (może rzucić Exception)
            $this->ensureDir($adPath);

            // Przechodzimy przez wszystkie pliki
            foreach ($files['error'] as $i => $error) {
                if ($error !== UPLOAD_ERR_OK) {
                    throw new Exception("File upload error code $error at index $i");
                }
                $origName = basename($files['name'][$i]);
                $safeName = preg_replace('/[^A-Za-z0-9\.\-_]/', '_', $origName);

                // definiujemy ścieżkę relatywną PRZED przeniesieniem
                $relative = "uploads/$userFolder/$adFolder/$safeName";
                $target   = "$adPath/$safeName";

                if (!move_uploaded_file($files['tmp_name'][$i], $target)) {
                    throw new Exception("Failed to move {$files['tmp_name'][$i]} to $target");
                }

                // zapisujemy ścieżkę do bazy
                if (! $this->addImagesToAdvertisement($adId, $relative)) {
                    throw new Exception("Failed to insert image record for $relative");
                }
            }

            $this->con->commit();
            return $adId;

        } catch (Exception $e) {
            // rollback i sprzątanie
            if ($this->con->inTransaction()) {
                $this->con->rollBack();
            }
            // opcjonalnie usuń katalog adPath
            error_log('Create ad failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Zapisuje ścieżkę obrazu do car_images.
     */
    public function addImagesToAdvertisement(int $adId, string $imagePath): bool {
        try {
            $stmt = $this->con->prepare(
                'INSERT INTO car_images
                   (advertisement_id, image_path, uploaded_at)
                 VALUES
                   (:ad_id, :path, NOW())'
            );
            $ok = $stmt->execute([
                ':ad_id' => $adId,
                ':path'  => $imagePath,
            ]);
            if (! $ok) {
                $err = $stmt->errorInfo()[2] ?? 'unknown error';
                error_log("car_images insert error: $err for path $imagePath");
            }
            return $ok;
        } catch (Exception $e) {
            error_log("addImagesToAdvertisement exception: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Tworzy katalog wraz z nadrzędnymi. Rzuca wyjątek w razie niepowodzenia.
     */
    private function ensureDir(string $path): void {
        if (!is_dir($path) && !mkdir($path, 0755, true)) {
            throw new Exception("Cannot create directory: $path");
        }
    }

    /**
     * Zamienia tekst na "slug" (bez polskich znaków, spacji, w małych literach).
     */
    private function slugify(string $text): string {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        return strtolower($text);
    }
}
