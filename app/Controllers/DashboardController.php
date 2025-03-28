<?php 
    namespace App\Controllers;
    use App\Models\CarBrands;
    use App\Models\CarModel;


    class DashboardController{
        public function index(){
            $carBrand =  new CarBrands;
            $carModel = new CarModel;

            $carBrands = $carBrand->getCarBrands();

          
          

            require __DIR__ . '/../Views/dashboard.php';
        }
    }
?>