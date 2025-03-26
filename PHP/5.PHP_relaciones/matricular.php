<?php
require_once 'config.php';

$error = '';
$success = '';

// Get all students and courses for the form
$conn = connectDB();
$students = $conn->query("SELECT * FROM students ORDER BY name")->fetch_all(MYSQLI_ASSOC);
$courses = $conn->query("SELECT * FROM courses ORDER BY title")->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['student_id'] ?? '';
    $courseId = $_POST['course_id'] ?? '';
    $action = $_POST['action'] ?? 'enroll';
    
    if (empty($studentId) || empty($courseId)) {
        $error = 'Por favor, seleccione un estudiante y un curso.';
    } else {
        $conn = connectDB();
        
        if ($action === 'enroll') {
            // Check if already enrolled
            $stmt = $conn->prepare("SELECT 1 FROM student_courses WHERE student_id = ? AND course_id = ?");
            $stmt->bind_param("ii", $studentId, $courseId);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                // Get student and course names
                $stmt = $conn->prepare("SELECT s.name as student_name, c.title as course_title FROM students s, courses c WHERE s.id = ? AND c.id = ?");
                $stmt->bind_param("ii", $studentId, $courseId);
                $stmt->execute();
                $result = $stmt->get_result();
                $names = $result->fetch_assoc();
                $error = sprintf('El estudiante <a href="estudiante.php?id=%d">%s</a> ya está matriculado en <a href="curso.php?id=%d">%s</a>.', 
                    $studentId, 
                    htmlspecialchars($names['student_name']), 
                    $courseId, 
                    htmlspecialchars($names['course_title'])
                );
            } else {
                $stmt = $conn->prepare("INSERT INTO student_courses (student_id, course_id) VALUES (?, ?)");
                $stmt->bind_param("ii", $studentId, $courseId);
                
                if ($stmt->execute()) {
                    // Get student and course names
                    $stmt = $conn->prepare("SELECT s.name as student_name, c.title as course_title FROM students s, courses c WHERE s.id = ? AND c.id = ?");
                    $stmt->bind_param("ii", $studentId, $courseId);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $names = $result->fetch_assoc();
                    $success = sprintf('<a href="estudiante.php?id=%d">%s</a> ha sido matriculado en <a href="curso.php?id=%d">%s</a>.', 
                        $studentId, 
                        htmlspecialchars($names['student_name']), 
                        $courseId, 
                        htmlspecialchars($names['course_title'])
                    );
                } else {
                    $error = 'Error al matricular al estudiante.';
                }
            }
        } else {
            // Unenroll student
            $stmt = $conn->prepare("DELETE FROM student_courses WHERE student_id = ? AND course_id = ?");
            $stmt->bind_param("ii", $studentId, $courseId);
            
            if ($stmt->execute()) {
                // Get student and course names before deleting
                $stmt = $conn->prepare("SELECT s.name as student_name, c.title as course_title FROM students s, courses c WHERE s.id = ? AND c.id = ?");
                $stmt->bind_param("ii", $studentId, $courseId);
                $stmt->execute();
                $result = $stmt->get_result();
                $names = $result->fetch_assoc();
                $success = sprintf('<a href="estudiante.php?id=%d">%s</a> ha sido dado de baja de <a href="curso.php?id=%d">%s</a>.', 
                    $studentId, 
                    htmlspecialchars($names['student_name']), 
                    $courseId, 
                    htmlspecialchars($names['course_title'])
                );
            } else {
                $error = 'Error al dar de baja al estudiante.';
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
    <title>Gestión de Matrículas - Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active">Gestión de Matrículas</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <h1 class="h3 mb-0">Gestión de Matrículas</h1>
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
                        <label for="student_id" class="form-label">Estudiante</label>
                        <select class="form-select" id="student_id" name="student_id" required>
                            <option value="">Seleccione un estudiante</option>
                            <?php foreach ($students as $student): ?>
                                <option value="<?php echo $student['id']; ?>">
                                    <?php echo htmlspecialchars($student['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Por favor seleccione un estudiante.</div>
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Curso</label>
                        <select class="form-select" id="course_id" name="course_id" required>
                            <option value="">Seleccione un curso</option>
                            <?php foreach ($courses as $course): ?>
                                <option value="<?php echo $course['id']; ?>">
                                    <?php echo htmlspecialchars($course['title']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Por favor seleccione un curso.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Acción</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="action" id="action_enroll" value="enroll" checked>
                            <label class="form-check-label" for="action_enroll">Matricular</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="action" id="action_unenroll" value="unenroll">
                            <label class="form-check-label" for="action_unenroll">Dar de baja</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
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