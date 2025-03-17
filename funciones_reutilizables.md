# FUNCIONES URILES Y REUTILIZABLES de PHP


## Cifrado / Encriptado

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


### 4. Cifrado AES


### 5. Cifrado con Clave
### 6. Cifrado AER-256-CBC


## Generar enlaces GET a:



### Whatsapp con número
### Whatsap con mensaje 
### Whatsapp con número y mensaje


### Share
Enlaces a compartir web y publicar en redes estilo Share This Page.
- facebook
- twitter / X
- mendar como mensaje
- mandar por otras redes
- mandar como email
- imprimir




## Mapas

A partir de coordenadas de Longitud y Latitud
A partir de dirección (calle, número, ciudad y/o Código postal)
## Mostrar en Open Maps

## Mostrar en Google Maps

## Mostrar en Apple Maps


## Conversión a slug 


## Calendario

A partir de fecha de inicio, fin y título del evento (entre otras cosas)

## Generar archivo iCal

## Generar enlace a Google Calendar

## JSON

### Encriptiar JSON

### Desencriptar JSON



## Otras funciones útiles reutilizables para el día a día



##
Todo list 



