<?php 
    namespace App\Models;
    use App\Core\Database;
    use PDO;

    class CarModel {
        private $name;
        private $car_brand_id;
        private $conn;

        public function __construct() {
            $this->conn = Database::getInstance()->getConnection();
        }

        public function getModelsByBrandId($brandId) {
            $query = "SELECT name FROM car_model WHERE car_brand_id = :brandId";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':brandId', $brandId);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function __get($property){
            if(property_exists($this,$property)){
                return $this->$property;
            }
        }

        public function __set($property, $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }
?>
