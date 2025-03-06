# .htaccess
El `.htacces` es un archivo que funciona en los servidores **Apache** y se utiliza para modificar rutas.

```htaccess
# Redireccionar al archivo que se mostrará en caso de error 404
RewriteEngine On
ErrorDocument 404 /error.php
```


