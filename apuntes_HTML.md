# Apuntes de HTML

Bienvenido a los apuntes de HTML. Aquí encontrarás información esencial para aprender y trabajar con el lenguaje de marcado HTML.

## Índice

1. [Introducción a HTML](#introducción-a-html)
2. [Estructura Básica](#estructura-básica)
3. [Elementos y Etiquetas](#elementos-y-etiquetas)
4. [Atributos](#atributos)
5. [Formularios](#formularios)
6. [Multimedia](#multimedia)
7. [Consultas Avanzadas](#consultas-avanzadas)

---

## Introducción a HTML

HTML (HyperText Markup Language) es el lenguaje estándar para la creación de páginas web.

- **Ejemplo básico:**
  ```html
  <!DOCTYPE html>
  <html>
  <head>
      <title>Mi Página</title>
  </head>
  <body>
      <h1>¡Hola, mundo!</h1>
  </body>
  </html>
  ```

---

## Estructura Básica

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página</title>
</head>
<body>
    <h1>Encabezado Principal</h1>
    <p>Esto es un párrafo.</p>
</body>
</html>
```

---

## Elementos y Etiquetas

| Etiqueta | Descripción | Ejemplo |
|----------|------------|---------|
| `<h1>` - `<h6>` | Encabezados | `<h1>Título</h1>` |
| `<p>` | Párrafo | `<p>Texto aquí</p>` |
| `<a>` | Enlace | `<a href="https://ejemplo.com">Enlace</a>` |
| `<img>` | Imagen | `<img src="imagen.jpg" alt="Descripción">` |
| `<ul>` / `<ol>` | Listas | `<ul><li>Elemento</li></ul>` |

---

## Atributos

| Atributo | Descripción | Ejemplo |
|----------|------------|---------|
| `href` | Define la URL de un enlace | `<a href="https://ejemplo.com">Enlace</a>` |
| `src` | Fuente de una imagen | `<img src="imagen.jpg">` |
| `alt` | Texto alternativo para imágenes | `<img src="imagen.jpg" alt="Descripción">` |
| `class` | Define una clase para CSS | `<p class="destacado">Texto</p>` |
| `id` | Define un identificador único | `<div id="seccion">Contenido</div>` |

---

## Formularios

```html
<form action="procesar.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">
    <input type="submit" value="Enviar">
</form>
```

---

## Multimedia

### Imagen
```html
<img src="imagen.jpg" alt="Descripción de la imagen">
```

### Video
```html
<video controls>
    <source src="video.mp4" type="video/mp4">
    Tu navegador no soporta el video.
</video>
```

### Audio
```html
<audio controls>
    <source src="audio.mp3" type="audio/mpeg">
    Tu navegador no soporta el audio.
</audio>
```

---

## Consultas Avanzadas

### Meta Tags
```html
<meta name="description" content="Descripción de la página">
<meta name="keywords" content="HTML, tutorial, desarrollo web">
```

### Enlace a CSS y JavaScript
```html
<link rel="stylesheet" href="styles.css">
<script src="script.js"></script>
```

---

## 🚀 Contribuciones

Si quieres contribuir, ¡envía un pull request!

## 📜 Licencia

Este documento está bajo la licencia MIT.
