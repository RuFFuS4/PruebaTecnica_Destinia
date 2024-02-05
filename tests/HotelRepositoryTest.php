<?php
use PHPUnit\Framework\TestCase;
require_once 'src/Repositories/HotelRepository.php';
require_once 'src/Databases/Db.php';

class HotelRepositoryTest extends TestCase
{
    public function testSearchHotels()
    {
        // Crear un objeto Database falso
        $fakeDatabase = $this->createMock(Db::class);

        // Configurar el comportamiento esperado del objeto fakeDatabase
        $fakeDatabase->expects($this->once())
            ->method('executeQuery')
            ->with(
                $this->stringContains("SELECT Hoteles.*, Ubicaciones.ciudad, Ubicaciones.provincia"),
                $this->equalTo(['keyword' => '%keyword%'])
            )
            ->willReturn([
                // Aquí puedes proporcionar resultados falsos simulados
                ['nombre' => 'Hotel 1', 'ciudad' => 'Ciudad 1', 'provincia' => 'Provincia 1'],
                ['nombre' => 'Hotel 2', 'ciudad' => 'Ciudad 2', 'provincia' => 'Provincia 2'],
            ]);

        // Crear una instancia de HotelRepository con el objeto fakeDatabase
        $hotelRepository = new HotelRepository($fakeDatabase);

        // Llamar al método searchHotels
        $results = $hotelRepository->searchHotels('keyword');

        // Realizar aserciones en los resultados obtenidos
        $this->assertCount(2, $results); // Ajusta esto al número esperado de resultados
        $this->assertEquals('Hotel 1', $results[0]['nombre']);
        $this->assertEquals('Hotel 2', $results[1]['nombre']);
    }
}
