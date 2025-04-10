<?php 
    namespace App\Models;
    use App\Core\Database;

    class CarBrands{
        private $id;
        private $name;
        private $pdo;
        public function __construct()
        {
            $this->pdo=Database::getInstance()->getConnection();
        }

        public function getCarBrands() {
            $query = "SELECT * FROM car_brand";
            $stmt = $this->pdo->query($query);
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
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