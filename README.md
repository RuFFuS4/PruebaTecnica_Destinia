# PruebaTecnica_Destinia
Prueba técnica para la vacante de desarrollador PHP - 01/2024

# Sistema de Búsqueda de Hoteles

## Descripción

Este proyecto es una sencilla aplicación en la cual, por medio de una búsqueda de 3 caracteres recupera los Hoteles y Apartamentos de una base de datos.

## Tecnologías Utilizadas

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
- UnitPHP


## Instalación y Configuración

Instrucciones paso a paso para poner en funcionamiento el proyecto:

### Requisitos Previos

- PHP 8.0+
- Composer
- MySQL o similar

### Pasos de Instalación

1. Clonar el repositorio:

[![Android](https://img.shields.io/github/stars/RuFFuS4/PruebaTecnica_Destinia?label=Prueba%20Técnica%20Destinia&style=social)](https://github.com/RuFFuS4/PruebaTecnica_Destinia.git)

```shell
git clone https://github.com/RuFFuS4/PruebaTecnica_Destinia.git
```

2. Instalar dependencias:

```shell
composer install
```

3. Configurar la base de datos en `.env` y ejecutar migraciones:

```yml
DB_HOST=localhost
DB_NAME=destinia
DB_USER=username
DB_PASS=password
```


## Uso

- Para lanzar la aplicación:

```shell
php main.php
```

- Para lanzar los tests:

```shell
vendor/bin/phpunit
```

---

Documento creado por Rafael Gómez Rubio.