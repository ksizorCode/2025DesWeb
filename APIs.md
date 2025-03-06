# USO DE APIs

Una API (Application Programming Interface) es un conjunto de reglas y protocolos que permite a diferentes sistemas o aplicaciones interactuar entre sí. Facilita el intercambio de datos y funcionalidades entre diferentes aplicaciones, plataformas y entornos tecnológicos.

Existen diferentes tipos de API, como las API REST, SOAP, GraphQL y RPC, entre otras. Las API REST son las más comunes y se basan en HTTP para realizar operaciones como GET, POST, PUT y DELETE en recursos específicos.


## Ejemplo 1: Consumir una API con file_get_contents()
Este método es el más sencillo, pero no permite muchas configuraciones avanzadas.

```php
<?php
$url = "https://jsonplaceholder.typicode.com/posts/1"; // API de prueba
$response = file_get_contents($url);
$data = json_decode($response, true);

echo "<h2>" . $data['title'] . "</h2>";
echo "<p>" . $data['body'] . "</p>";
?>
```

Pros:
- Fácil de usar.
- No requiere configuración adicional.
Contras:
- No permite cabeceras personalizadas.
- No es seguro para APIs que requieren autenticación.

##Ejemplo 2: Consumir una API con cURL (Método recomendado para mayor control)
Usamos cURL para hacer peticiones más avanzadas.

```php

<?php
$url = "https://jsonplaceholder.typicode.com/posts/1";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

echo "<h2>" . $data['title'] . "</h2>";
echo "<p>" . $data['body'] . "</p>";
?>
```
Pros:
- Permite autenticación, cabeceras y métodos HTTP (GET, POST, etc.).
- Más seguro y flexible.
Contras:
- Código más complejo.
- Requiere que cURL esté habilitado en el servidor.


## Ejemplo 3: Consumir una API con cURL y parámetros GET
En este caso, pasamos parámetros en la URL.

```php
<?php
$base_url = "https://jsonplaceholder.typicode.com/posts";
$params = http_build_query(["userId" => 1]); 
$url = "$base_url?$params";  

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

foreach ($data as $post) {
    echo "<h2>{$post['title']}</h2>";
    echo "<p>{$post['body']}</p>";
}
?>
```
## Ejemplo 4: Consumir una API con cURL y método POST
Este ejemplo envía datos a la API.

```php
<?php
$url = "https://jsonplaceholder.typicode.com/posts";

$data = [
    "title" => "Título de prueba",
    "body" => "Este es el contenido del post",
    "userId" => 1
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
print_r($result);
?>
```

## Ejemplo 5: Usar una API con Guzzle (Librería externa más moderna)
Si quieres usar una librería más avanzada y orientada a objetos, puedes instalar Guzzle con Composer:

```sh
composer require guzzlehttp/guzzle
```

Código en PHP:

```php
<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
$response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts/1');

$data = json_decode($response->getBody(), true);

echo "<h2>{$data['title']}</h2>";
echo "<p>{$data['body']}</p>";
?>
```

Pros:
- Más moderno y limpio.
- Maneja excepciones y errores de manera eficiente.
- Compatible con pruebas automatizadas.
Contras:
- Necesita instalación con Composer.
