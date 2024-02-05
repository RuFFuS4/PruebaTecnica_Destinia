<?php

class HotelRepository {
    private $database;

    public function __construct(Db $database) {
        $this->database = $database;
    }

    public function searchHotels($keyword) {
        $sql = "SELECT Hoteles.*, Ubicaciones.ciudad, Ubicaciones.provincia 
        FROM Hoteles 
        INNER JOIN Ubicaciones ON Hoteles.ubicacion_id = Ubicaciones.id 
        WHERE nombre LIKE :keyword ORDER BY nombre";
        return $this->database->executeQuery($sql, ['keyword' => "%$keyword%"]);
    }
}
