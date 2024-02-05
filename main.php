<?php

require 'src/Databases/Db.php';
require 'src/Entities/Hotel.php';
require 'src/Entities/Apartment.php';
require 'src/Repositories/HotelRepository.php';
require 'src/Repositories/ApartmentRepository.php';

class Main {
    private $hotelRepo;
    private $apartmentRepo;

    public function __construct() {
        // Crear una instancia de Database (Singleton)
        $db = Db::getInstance();
        // Crear instancias de los repositorios
        $this->hotelRepo = new HotelRepository($db);
        $this->apartmentRepo = new ApartmentRepository($db);
    }

    public function run() {
        while (true) {
            $input = $this->getUserInput();

            if (strtolower($input) === 'salir') {
                break;
            }

            if (!$this->isValidInput($input)) {
                echo "Por favor, introduce al menos tres caracteres.\n";
                continue;
            }

            // Cogemos las 3 primeras letras del input
            $input = substr($input, 0, 3);
            
            $results = $this->searchAccommodations($input);
            $this->displayResults($results);

            echo "\n";
        }

        echo "Gracias por usar la aplicación - Rafael Gómez.\n";
    }

    private function getUserInput() {
        echo "Introduce las tres primeras letras del hospedaje (o 'salir' para finalizar): ";
        return trim(fgets(STDIN));
    }

    private function isValidInput($input) {
        return strlen($input) >= 3;
    }

    private function searchAccommodations($input) {
        try {
            $hotels = $this->hotelRepo->searchHotels($input);
            $apartments = $this->apartmentRepo->searchApartments($input);
            return ['hotels' => $hotels, 'apartments' => $apartments];
        } catch (Exception $e) {
            echo "Ocurrió un error: " . $e->getMessage() . "\n";
            return ['hotels' => [], 'apartments' => []];
        }
    }

    private function displayResults($results) {
        if (empty($results['hotels']) && empty($results['apartments'])) {
            echo "No se encontraron hospedajes con esas letras.\n";
        } else {
            foreach ($results['hotels'] as $hotel) {
                $ciudad = isset($hotel['ciudad']) ? $hotel['ciudad'] : 'ciudad no disponible';
                $provincia = isset($hotel['provincia']) ? $hotel['provincia'] : 'provincia no disponible';
    
                echo "[ Hotel ] {$hotel['nombre']}, {$hotel['estrellas']} estrellas, {$hotel['tipo_habitacion']}, {$ciudad}, {$provincia}\n";
            }
    
            foreach ($results['apartments'] as $apartment) {
                $ciudad = isset($apartment['ciudad']) ? $apartment['ciudad'] : 'ciudad no disponible';
                $provincia = isset($apartment['provincia']) ? $apartment['provincia'] : 'provincia no disponible';
    
                echo "[ Apartamento ] {$apartment['nombre']}, {$apartment['num_apartamentos']} apartamentos, {$apartment['capacidad_adultos']} adultos, {$ciudad}, {$provincia}\n";
            }
        }
    }
}

$searcher = new Main();
$searcher->run();