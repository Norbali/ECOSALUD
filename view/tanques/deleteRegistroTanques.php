<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Desactivar Tanque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center fw-bold mb-4">Desactivar Tanque</h2>

    <?php $t = $tanque[0]; ?>

    <div class="card shadow p-4">

        <p class="fs-5">
            ¿Está seguro que desea <strong class="text-danger">desactivar</strong> el tanque:
        </p>

        <h4 class="text-primary">
            <?= $t['nombre_tanque'] ?>
        </h4>

        <ul class="mt-3">
            <li><strong>ID:</strong> <?= $t['id_tanque'] ?></li>
            <li><strong>Tipo:</strong> <?= $t['id_tipo_tanque'] ?></li>
            <li><strong>Cantidad de Peces:</strong> <?= $t['cantidad_peces'] ?></li>
        </ul>

        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="<?= getUrl('Tanques', 'Tanque', 'list') ?>" class="btn btn-secondary">
                Cancelar
            </a>

            <a href="<?= getUrl('Tanques', 'Tanque', 'getDelete', ['id_tanque' => $t['id_tanque']]) ?>" 
                class="btn btn-danger">
                Desactivar
            </a>
        </div>

    </div>
</div>

</body>
</html>
