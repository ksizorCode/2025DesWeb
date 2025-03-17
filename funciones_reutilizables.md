# FUNCIONES URILES Y REUTILIZABLES de PHP


## Cifrado / Encriptado

### 1. Cifrado str_rot13

Aplica una rotación de 13 caracteres alfabéticos. Es reversible sin clave.

'''php
$texto = "Hola, mundo!";
$cifrado = str_rot13($texto);
$descifrado = str_rot13($cifrado);

echo "Cifrado: $cifrado\n"; 
echo "Descifrado: $descifrado\n";
'''

✔️ Ventaja: No requiere clave.
❌ Desventaja: Fácilmente reversible sin seguridad real.

---

### 2. base64

'''php
$texto = "Hola, mundo!";
$cifrado = base64_encode($texto);
$descifrado = base64_decode($cifrado);

echo "Texto original: $texto\n";
echo "Cifrado: $cifrado\n";
echo "Descifrado: $descifrado\n";
'''

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

### 3. Cifrado AES con openssl_encrypt

Este método usa AES-256-CBC, uno de los más seguros.


'''php
function cifrarAES($texto, $clave) {
    $iv = openssl_random_pseudo_bytes(16);
    $cifrado = openssl_encrypt($texto, 'aes-256-cbc', $clave, 0, $iv);
    return base64_encode($iv . $cifrado);
}

function descifrarAES($cifrado, $clave) {
    $cifrado = base64_decode($cifrado);
    $iv = substr($cifrado, 0, 16);
    $cifrado = substr($cifrado, 16);
    return openssl_decrypt($cifrado, 'aes-256-cbc', $clave, 0, $iv);
}

$texto = "Hola, mundo!";
$clave = "clave_secreta_segura_32bytes";
$cifrado = cifrarAES($texto, $clave);
$descifrado = descifrarAES($cifrado, $clave);

echo "Cifrado: $cifrado\n";
echo "Descifrado: $descifrado\n";
'''

✔️ Ventaja: Alta seguridad, ideal para datos sensibles.
❌ Desventaja: Requiere una clave segura de 32 bytes.




