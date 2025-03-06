# .htaccess
El `.htacces` es un archivo que funciona en los servidores **Apache** y se utiliza para modificar rutas.

Por ejemplo en el caso de querer que cualquier dirección incorrecta en nuestra web lance el archivo 404 se utilizará el siguiente código:

## Error 404
```htaccess
# Redireccionar al archivo que se mostrará en caso de error 404
RewriteEngine On
ErrorDocument 404 /error.php
```


