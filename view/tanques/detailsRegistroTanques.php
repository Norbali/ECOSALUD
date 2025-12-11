<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Tanque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center fw-bold mb-4">Detalles del Tanque</h2>

    <?php 
        // Siempre viene un solo registro
        $t = $detalle[0];
    ?>

    <div class="card shadow-lg p-4">

        <h4 class="text-primary fw-bold mb-3">
            <?= $t['nombre_tanque'] ?>
        </h4>

        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>ID:</strong> <?= $t['id_tanque'] ?>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Tipo de Tanque:</strong> <?= $t['nombre_tipo_tanque'] ?>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Medida Alto:</strong> <?= $t['medida_alto'] ?> cm
            </div>

            <div class="col-md-6 mb-3">
                <strong>Medida Ancho:</strong> <?= $t['medida_ancho'] ?> cm
            </div>

            <div class="col-md-6 mb-3">
                <strong>Medida Profundidad:</strong> <?= $t['medida_profundidad'] ?> cm
            </div>

            <div class="col-md-6 mb-3">
                <strong>Cantidad de Peces:</strong> <?= $t['cantidad_peces'] ?>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Estado:</strong> 
                <span class="badge <?= $t['estado_nombre'] == 'Activo' ? 'bg-success' : 'bg-danger' ?>">
                    <?= $t['estado_nombre'] ?>
                </span>
            </div>
        </div>

        <hr>

        <h5 class="fw-bold">Responsable</h5>

        <div class="row mt-3">
            <div class="col-md-4 mb-3">
                <strong>Documento:</strong> <?= $t['user_doc'] ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Nombre:</strong> <?= $t['user_nombre'] ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Rol:</strong> <?= $t['user_rol'] ?>
            </div>
        </div>

        <div class="text-end mt-4">
            <a href="<?= getUrl('Tanques', 'Tanque', 'list') ?>" class="btn btn-secondary">
                Volver a la Lista
            </a>
        </div>

    </div>
</div>

</body>
</html>
