<?php

class ApartmentRepository {
    private $database;

    public function __construct(Db $database) {
        $this->database = $database;
    }

    public function searchApartments($keyword) {
        $sql = "SELECT Apartamentos.*, Ubicaciones.ciudad, Ubicaciones.provincia 
        FROM Apartamentos 
        INNER JOIN Ubicaciones ON Apartamentos.ubicacion_id = Ubicaciones.id 
        WHERE nombre LIKE :keyword ORDER BY nombre";
        return $this->database->executeQuery($sql, ['keyword' => "%$keyword%"]);
    }
}