<?php
require_once 'config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    
    if (empty($name) || empty($email)) {
        $error = 'Por favor, complete todos los campos.';
    } else {
        $slug = createSlug($name);
        $conn = connectDB();
        
        // Check if slug already exists
        $stmt = $conn->prepare("SELECT id FROM students WHERE slug = ?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $error = 'Ya existe un estudiante con un nombre similar.';
        } else {
            $stmt = $conn->prepare("INSERT INTO students (name, email, slug) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $slug);
            
            if ($stmt->execute()) {
                $success = 'Estudiante agregado correctamente. <a href="index.php">Volver a la lista</a>';
                // Clear form
                $name = $email = '';
            } else {
                $error = 'Error al agregar el estudiante.';
            }
        }
        
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Estudiante - Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>/index.php">Inicio</a></li>
                <li class="breadcrumb-item active">Nuevo Estudiante</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <h1 class="h3 mb-0">Agregar Nuevo Estudiante</h1>
            </div>
            <div class="card-body">
                <?php if ($error): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                
                <?php if ($success): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>

                <form method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                        <div class="invalid-feedback">Por favor ingrese un nombre.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                        <div class="invalid-feedback">Por favor ingrese un email válido.</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Estudiante</button>
                    <a href="<?php echo BASE_URL; ?>/index.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
    </script>
</body>
</html>