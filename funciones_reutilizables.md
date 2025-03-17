# FUNCIONES URILES Y REUTILIZABLES de PHP


## Cifrado / Desencriptado
Funciones para la encriptación y cifrado o desencriptación.

### 1. Cifrado str_rot13

Aplica una rotación de 13 caracteres alfabéticos. Es reversible sin clave.

```php
$texto = "Hola, mundo!";
$cifrado = str_rot13($texto);
$descifrado = str_rot13($cifrado);

echo "Cifrado: $cifrado\n"; 
echo "Descifrado: $descifrado\n";
```

✔️ Ventaja: No requiere clave.
❌ Desventaja: Fácilmente reversible sin seguridad real.

---

### 2. base64

```php
$texto = "Hola, mundo!";
$cifrado = base64_encode($texto);
$descifrado = base64_decode($cifrado);

echo "Texto original: $texto\n";
echo "Cifrado: $cifrado\n";
echo "Descifrado: $descifrado\n";
```

base64_encode($texto): Convierte el texto en una representación en base64.
	•	base64_decode($cifrado): Revierte el proceso y devuelve el texto original.

✔️ Ventajas:
	•	Fácil de usar y reversible.
	•	Útil para almacenar datos en formatos seguros (como URLs o JSON).

❌ Desventajas:
	•	No es un cifrado seguro, solo es una codificación.
	•	Puede ser decodificado fácilmente.

Si necesitas más seguridad, podrías combinarlo con una clave XOR o AES.

---

### 3. Cifrado XOR 
Utiliza la operación XOR entre cada byte del mensaje y una clave. Es simple, pero no proporciona alta seguridad.
```php
function cifrar_xor($texto, $clave) {
    $resultado = '';
    for ($i = 0, $len = strlen($texto); $i < $len; $i++) {
        $resultado .= $texto[$i] ^ $clave[$i % strlen($clave)];
    }
    return $resultado;
}

$texto = "Hola, mundo!";
$clave = "mi_clave";
$cifrado = cifrar_xor($texto, $clave);
$descifrado = cifrar_xor($cifrado, $clave);

echo "Texto original: $texto\n";
// Se muestra en hexadecimal para mayor legibilidad
echo "Cifrado: " . bin2hex($cifrado) . "\n";  
echo "Descifrado: $descifrado\n";
```

✔️ Ventaja:
- Muy simple de implementar.

❌ Desventaja:
- No es seguro si se usa una clave corta o predecible.


### 4. Cifrado AES
AES es un estándar robusto para cifrado simétrico. PHP utiliza la extensión OpenSSL para cifrar y descifrar datos.
```php
function cifrar_aes($texto, $clave, $metodo = 'AES-256-CBC') {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($metodo));
    $cifrado = openssl_encrypt($texto, $metodo, $clave, 0, $iv);
    return base64_encode($iv . $cifrado);
}

function descifrar_aes($texto_cifrado, $clave, $metodo = 'AES-256-CBC') {
    $datos = base64_decode($texto_cifrado);
    $iv_length = openssl_cipher_iv_length($metodo);
    $iv = substr($datos, 0, $iv_length);
    $cifrado = substr($datos, $iv_length);
    return openssl_decrypt($cifrado, $metodo, $clave, 0, $iv);
}

$texto = "Hola, mundo!";
$clave = "mi_super_clave_segura";
$cifrado = cifrar_aes($texto, $clave);
$descifrado = descifrar_aes($cifrado, $clave);

echo "Texto original: $texto\n";
echo "Cifrado: $cifrado\n";
echo "Descifrado: $descifrado\n";
```
✔️ Ventajas:
-Proporciona alta seguridad.
-Es un estándar en la industria para cifrado de datos.

❌ Desventajas:
-Requiere manejo adecuado de la clave y del vector de inicialización (IV).


### 5. Cifrado con Clave Personalizada
Combina técnicas (por ejemplo, XOR y Base64) junto con una clave personalizada para añadir una capa extra de seguridad.

```php
function cifrar_con_clave($texto, $clave) {
    $cifrado_xor = '';
    for ($i = 0, $len = strlen($texto); $i < $len; $i++) {
        $cifrado_xor .= $texto[$i] ^ $clave[$i % strlen($clave)];
    }
    return base64_encode($cifrado_xor);
}

function descifrar_con_clave($texto_cifrado, $clave) {
    $texto_xor = base64_decode($texto_cifrado);
    $descifrado = '';
    for ($i = 0, $len = strlen($texto_xor); $i < $len; $i++) {
        $descifrado .= $texto_xor[$i] ^ $clave[$i % strlen($clave)];
    }
    return $descifrado;
}

$texto = "Hola, mundo!";
$clave = "mi_clave_secreta";
$cifrado = cifrar_con_clave($texto, $clave);
$descifrado = descifrar_con_clave($cifrado, $clave);

echo "Texto original: $texto\n";
echo "Cifrado: $cifrado\n";
echo "Descifrado: $descifrado\n";
```

### 6. Cifrado AES-256-CBC
Una variante específica del cifrado AES utilizando el modo AES-256-CBC.
```php
function cifrar_aes_256_cbc($texto, $clave) {
    $metodo = 'AES-256-CBC';
    $iv_length = openssl_cipher_iv_length($metodo);
    $iv = openssl_random_pseudo_bytes($iv_length);
    $cifrado = openssl_encrypt($texto, $metodo, $clave, 0, $iv);
    return base64_encode($iv . $cifrado);
}

function descifrar_aes_256_cbc($texto_cifrado, $clave) {
    $metodo = 'AES-256-CBC';
    $datos = base64_decode($texto_cifrado);
    $iv_length = openssl_cipher_iv_length($metodo);
    $iv = substr($datos, 0, $iv_length);
    $cifrado = substr($datos, $iv_length);
    return openssl_decrypt($cifrado, $metodo, $clave, 0, $iv);
}

$texto = "Hola, mundo!";
$clave = "otra_clave_segura_256";
$cifrado = cifrar_aes_256_cbc($texto, $clave);
$descifrado = descifrar_aes_256_cbc($cifrado, $clave);

echo "Texto original: $texto\n";
echo "Cifrado: $cifrado\n";
echo "Descifrado: $descifrado\n";
```

✔️ Ventajas:
- Ofrece un alto nivel de seguridad.
- Ampliamente utilizado y compatible en diversas plataformas.

❌ Desventajas:
- Es fundamental el manejo correcto de la clave y del IV.

---

# Generar enlaces GET

## Whatsapp
### 1. Whatsapp con número
Genera un enlace para abrir WhatsApp con un número de teléfono específico.
```php
$numero = "1234567890";
$url = "https://wa.me/$numero";
echo $url;
```

### 2. Whatsap con mensaje
Genera un enlace para abrir WhatsApp con un mensaje predefinido.
```php
$mensaje = urlencode("Hola, ¿cómo estás?");
$url = "https://wa.me/?text=$mensaje";
echo $url;
```

### 3. Whatsapp con número y mensaje
Combina el número de teléfono y un mensaje predefinido.
```php
$numero = "1234567890";
$mensaje = urlencode("Hola, ¿cómo estás?");
$url = "https://wa.me/$numero?text=$mensaje";
echo $url;
```


### Share
Genera enlaces para compartir contenido en distintas plataformas:

### - Facebook
```php
$url = urlencode("https://tusitio.com");
$titulo = urlencode("Título de la página");
$shareFacebook = "https://www.facebook.com/sharer/sharer.php?u=$url&t=$titulo";
```
### - Twitter / X
```php
$url = urlencode("https://tusitio.com");
$mensaje = urlencode("Echa un vistazo a esta página");
$shareTwitter = "https://twitter.com/intent/tweet?url=$url&text=$mensaje";
```

### - Compartir por mensaje (SMS):
```php
$url = urlencode("https://tusitio.com");
$shareMensaje = "sms:?body=$url";
```

### - Compartir por email:
```php
$url = urlencode("https://tusitio.com");
$asunto = urlencode("Interesante contenido");
$cuerpo = urlencode("Te recomiendo visitar: $url");
$shareEmail = "mailto:?subject=$asunto&body=$cuerpo";
```
### - Imprimir
Puedes usar JavaScript para invocar la función de impresión:
```html
<a href="#" onclick="window.print()">Imprimir esta página</a>
```




# Mapas

## 1. Mapas a partir de Coordenadas
Genera enlaces para mostrar un mapa usando latitud y longitud.


### -OpenStreetMap:
```php
$lat = 40.416775;
$lon = -3.703790;
$urlOSM = "https://www.openstreetmap.org/?mlat=$lat&mlon=$lon#map=18/$lat/$lon";
```

### - Google Maps
```php
$lat = 40.416775;
$lon = -3.703790;
$urlGoogle = "https://www.google.com/maps?q=$lat,$lon";
```

### - Apple Maps
```php
$lat = 40.416775;
$lon = -3.703790;
$urlApple = "https://maps.apple.com/?ll=$lat,$lon";
```

## 2. Mapas a partir de Dirección
Genera enlaces a mapas usando una dirección (calle, número, ciudad y/o código postal).

### - Google Maps
```php
$direccion = urlencode("Calle de ejemplo, 123, Madrid, 28001");
$urlGoogle = "https://www.google.com/maps/search/?api=1&query=$direccion";
```


## Convertir a Slug
Convierte una cadena de texto en un slug amigable para URLs.
```php
function convertir_a_slug($texto) {
    // Convertir a minúsculas
    $texto = strtolower($texto);
    // Reemplazar acentos y caracteres especiales
    $buscar = array('á','é','í','ó','ú','ñ');
    $reemplazar = array('a','e','i','o','u','n');
    $texto = str_replace($buscar, $reemplazar, $texto);
    // Reemplazar espacios y caracteres no alfanuméricos por guiones
    $texto = preg_replace('/[^a-z0-9]+/i', '-', $texto);
    // Eliminar guiones al inicio y final
    $texto = trim($texto, '-');
    return $texto;
}

$cadena = "¡Hola, mundo! Esto es un ejemplo.";
$slug = convertir_a_slug($cadena);
echo $slug;
```


## Calendario

### 1. Generar Archivo iCal
Crea un archivo iCal (.ics) para representar un evento, a partir de fecha de inicio, fin, título y otros detalles.
```php
function generar_ical($titulo, $descripcion, $ubicacion, $fecha_inicio, $fecha_fin) {
    $ical  = "BEGIN:VCALENDAR\r\n";
    $ical .= "VERSION:2.0\r\n";
    $ical .= "PRODID:-//TuSitio//EN//\r\n";
    $ical .= "BEGIN:VEVENT\r\n";
    $ical .= "UID:" . uniqid() . "\r\n";
    $ical .= "DTSTAMP:" . gmdate('Ymd\THis\Z') . "\r\n";
    $ical .= "DTSTART:" . date('Ymd\THis\Z', strtotime($fecha_inicio)) . "\r\n";
    $ical .= "DTEND:" . date('Ymd\THis\Z', strtotime($fecha_fin)) . "\r\n";
    $ical .= "SUMMARY:" . $titulo . "\r\n";
    $ical .= "DESCRIPTION:" . $descripcion . "\r\n";
    $ical .= "LOCATION:" . $ubicacion . "\r\n";
    $ical .= "END:VEVENT\r\n";
    $ical .= "END:VCALENDAR\r\n";
    return $ical;
}

$evento = generar_ical(
    "Reunión de trabajo", 
    "Discutir proyecto", 
    "Oficina central", 
    "2025-04-01 09:00:00", 
    "2025-04-01 10:00:00"
);
file_put_contents("evento.ics", $evento);
```

### 2. Generar Enlace a Google Calendar
Crea un enlace que permita al usuario añadir un evento a su Google Calendar.
```php
$titulo = urlencode("Reunión de trabajo");
$descripcion = urlencode("Discutir proyecto");
$ubicacion = urlencode("Oficina central");
$fecha_inicio = date('Ymd\THis\Z', strtotime("2025-04-01 09:00:00"));
$fecha_fin = date('Ymd\THis\Z', strtotime("2025-04-01 10:00:00"));

$urlGoogleCalendar = "https://www.google.com/calendar/render?action=TEMPLATE&text=$titulo&dates=$fecha_inicio/$fecha_fin&details=$descripcion&location=$ubicacion&sf=true&output=xml";

echo $urlGoogleCalendar;

```

### JSON

## 1. Encriptar JSON
Ejemplo de cómo encriptar una cadena JSON utilizando el cifrado AES (función definida anteriormente).
```php
$json = json_encode(array("nombre" => "Juan", "edad" => 30));
$clave = "mi_clave_secreta";

$cifrado = cifrar_aes($json, $clave);
echo $cifrado;
```

## 2. Desencriptar JSON
Descifra la cadena encriptada y decodifica el JSON.
```php
$descifrado = descifrar_aes($cifrado, $clave);
$data = json_decode($descifrado, true);
print_r($data);
```




## Otras Funciones Útiles para el Día a Día

### - Validación de emails:
```php
function validar_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
```

### - Generación de contraseñas aleatorias:
```php
function generar_password($longitud = 8) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $longitud; $i++) {
        $password .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $password;
}
```

### - Conversión de fecha a formato legible:
```php
function formatear_fecha($fecha, $formato = 'd/m/Y H:i') {
    $datetime = new DateTime($fecha);
    return $datetime->format($formato);
}
```








