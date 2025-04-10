<?php 
    namespace App\Controllers;
    use App\Models\CarBrands;
    use App\Models\CarModel;
    use App\Models\CarGeneration;

    class DashboardController{
        public function index(){
            require __DIR__ . '/../Views/dashboard.php';
        }

        public function getCarBrands() {
            $carBrands = new CarBrands();
            $brands = $carBrands->getCarBrands();   
            header('Content-Type: application/json');
            echo json_encode($brands);
        }

        public function getCarModels($id){
            $carModels = new CarModel();
            $brandModels = $carModels->getModelsByBrandId($id);
            header('Content-Type: application/json');
            echo json_encode($brandModels);
        }

        public function getModelGenerations($id){
            $carGenerations = new CarGeneration();
            $generations= $carGenerations->getGenerationsByModelId($id);
            header('Content-Type: application/json');
            echo json_encode($generations);
        }

        public function getAllAdvertisements(){
            
        }
    }
?>