<?php
    include 'header.php';

    $usuario = $_SESSION['username'] ?? '';
    $columnaNota = in_array($usuario, ['profesor1', 'profesor2', 'profesor3', 'profesor4'], true)
        ? $usuario
        : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4 pb-2 border-bottom">
            <div>
                <h1 class="h2 mb-1">Listado de Usuarios</h1>
                <p class="text-muted mb-0">Bienvenido, <strong><?php echo htmlspecialchars($usuario); ?></strong></p>
            </div>
            <?php if ($usuario === 'admin'): ?>
                <span class="badge text-bg-primary fs-6">Administrador</span>
            <?php elseif ($columnaNota !== null): ?>
                <span class="badge text-bg-secondary fs-6"><?php echo htmlspecialchars($usuario); ?></span>
            <?php endif; ?>
            <form action="logout.php" method="post" class="mb-0">
                <button type="submit" class="btn btn-outline-danger">Cerrar sesión</button>
            </form>
        </div>

        <?php if ($usuario === 'admin'): ?>
            <?php if (!empty($estudiantes)): ?>
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover align-middle mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido 1</th>
                                        <th>Apellido 2</th>
                                        <th>Profesor 1</th>
                                        <th>Profesor 2</th>
                                        <th>Profesor 3</th>
                                        <th>Profesor 4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($estudiantes as $estudiante): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($estudiante['nombre'] ?? ''); ?></td>
                                            <td><?php echo htmlspecialchars($estudiante['apellido1'] ?? ''); ?></td>
                                            <td><?php echo htmlspecialchars($estudiante['apellido2'] ?? ''); ?></td>
                                            <td><?php echo htmlspecialchars($estudiante['profesor1'] ?? ''); ?></td>
                                            <td><?php echo htmlspecialchars($estudiante['profesor2'] ?? ''); ?></td>
                                            <td><?php echo htmlspecialchars($estudiante['profesor3'] ?? ''); ?></td>
                                            <td><?php echo htmlspecialchars($estudiante['profesor4'] ?? ''); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-info mb-0" role="alert">
                    No hay estudiantes registrados en el sistema.
                </div>
            <?php endif; ?>

        <?php elseif ($columnaNota !== null): ?>
            <h2 class="h4 mb-3">Mis notas</h2>
            <?php if (!empty($estudiantes)): ?>
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover align-middle mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido 1</th>
                                        <th>Apellido 2</th>
                                        <th>Mi nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($estudiantes as $estudiante): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($estudiante['nombre'] ?? ''); ?></td>
                                            <td><?php echo htmlspecialchars($estudiante['apellido1'] ?? ''); ?></td>
                                            <td><?php echo htmlspecialchars($estudiante['apellido2'] ?? ''); ?></td>
                                            <td class="fw-semibold"><?php echo htmlspecialchars($estudiante[$columnaNota] ?? ''); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-info mb-0" role="alert">
                    No hay estudiantes registrados en el sistema.
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>