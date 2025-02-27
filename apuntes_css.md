# Apuntes de CSS

Bienvenido a los apuntes de CSS. Aquí encontrarás información esencial para aprender y trabajar con hojas de estilo en cascada (CSS).

## Índice

1. [Introducción a CSS](#introducción-a-css)
2. [Selectores](#selectores)
3. [Propiedades Básicas](#propiedades-básicas)
4. [Modelo de Caja](#modelo-de-caja)
5. [Flexbox y Grid](#flexbox-y-grid)
6. [Animaciones y Transiciones](#animaciones-y-transiciones)
7. [Consultas Avanzadas](#consultas-avanzadas)

---

## Introducción a CSS

CSS (Cascading Style Sheets) es un lenguaje de estilos utilizado para diseñar páginas web.

- **Incluir CSS en HTML:**
  ```html
  <link rel="stylesheet" href="styles.css">
  ```
- **Regla CSS básica:**
  ```css
  body {
      background-color: lightblue;
  }
  ```

---

## Selectores

| Selector | Descripción | Ejemplo |
|----------|------------|---------|
| `*` | Selecciona todos los elementos | `* { margin: 0; }` |
| `elemento` | Selecciona por etiqueta | `p { color: red; }` |
| `.clase` | Selecciona por clase | `.destacado { font-weight: bold; }` |
| `#id` | Selecciona por ID | `#titulo { font-size: 20px; }` |
| `[atributo]` | Selecciona por atributo | `input[type="text"] { border: 1px solid; }` |

---

## Propiedades Básicas

| Propiedad | Descripción | Ejemplo |
|-----------|------------|---------|
| `color` | Color del texto | `color: blue;` |
| `background-color` | Color de fondo | `background-color: yellow;` |
| `font-size` | Tamaño de fuente | `font-size: 16px;` |
| `margin` | Margen exterior | `margin: 10px;` |
| `padding` | Relleno interior | `padding: 5px;` |

---

## Modelo de Caja

```css
div {
    width: 200px;
    height: 100px;
    padding: 10px;
    margin: 20px;
    border: 2px solid black;
}
```

---

## Flexbox y Grid

### Flexbox
```css
.container {
    display: flex;
    justify-content: center;
    align-items: center;
}
```

### Grid
```css
.grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
}
```

---

## Animaciones y Transiciones

### Transición
```css
button {
    transition: background-color 0.3s ease;
}
```

### Animación
```css
@keyframes mover {
    from { transform: translateX(0); }
    to { transform: translateX(100px); }
}

div {
    animation: mover 2s infinite alternate;
}
```

---

## Consultas Avanzadas

### Media Queries
```css
@media (max-width: 600px) {
    body {
        background-color: lightgray;
    }
}
```

### Variables CSS
```css
:root {
    --color-principal: #ff5733;
}

h1 {
    color: var(--color-principal);
}
```

---

## 🚀 Contribuciones

Si quieres contribuir, ¡envía un pull request!

## 📜 Licencia

Este documento está bajo la licencia MIT.
