<?php 
    namespace App\Models;
    use App\Core\Database;
    use PDO;
    class CarGeneration{
        private $id;
        private $name;
        private $car_model_id;
        private $conn;

        public function __construct()
        {
            $this->conn = Database::getInstance()->getConnection();
            
        }

        public function getGenerationsByModelId($id){
            $query = "SELECT id,name from car_generation where car_model_id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id',$id);
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