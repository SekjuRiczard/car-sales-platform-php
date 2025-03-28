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

        public function getCarBrands(){
            $query = "Select * from car_brand";
            $stmt=$this->pdo->query($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function getBrandIdByName($brandName) {
            $query = "SELECT id FROM car_brand WHERE name = :brandName";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':brandName', $brandName);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
            return $result ? $result['id'] : null;
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