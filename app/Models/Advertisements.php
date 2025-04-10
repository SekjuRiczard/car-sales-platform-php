<?php 
    use App\Core\Database;
    use PDO;
    class Advertisements{
        private $advertisement_id;
        private $model_id;
        private $year;
        private $mileage;
        private $gearbox;
        private $type;
        private $fuel;
        private $body;
        private $con;

        public function __construct(){

         $this->con = Database::getInstance()->getConnection();

        }
        
    }
?>