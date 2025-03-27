<?php
require_once 'config.php';

// Get all students
$conn = connectDB();
$students = $conn->query("SELECT * FROM students ORDER BY name")->fetch_all(MYSQLI_ASSOC);

// Get all courses
$courses = $conn->query("SELECT * FROM courses ORDER BY title")->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Estudiantes y Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>/index.php">Sistema de Gestión</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo BASE_URL; ?>/index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/matricular.php">Matricular</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        <h1 class="mb-4">Sistema de Gestión de Estudiantes y Cursos</h1>
        
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="h5 mb-0">Estudiantes</h2>
                        <a href="<?php echo BASE_URL; ?>/nuevo-estudiante.php" class="btn btn-primary btn-sm">Nuevo Estudiante</a>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <?php foreach ($students as $student): ?>
                                <a href="estudiante/<?php echo htmlspecialchars($student['slug']); ?>" 
                                   class="list-group-item list-group-item-action">
                                    <?php echo htmlspecialchars($student['name']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="h5 mb-0">Cursos</h2>
                        <a href="nuevo-curso.php" class="btn btn-primary btn-sm">Nuevo Curso</a>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <?php foreach ($courses as $course): ?>
                                <a href="curso/<?php echo htmlspecialchars($course['slug']); ?>" 
                                   class="list-group-item list-group-item-action">
                                    <?php echo htmlspecialchars($course['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>