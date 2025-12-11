<div class="mt-3">
    <h3 class="display-4 text-center fw-bold">Lista de tanques</h3>
</div>

<div class="mt-5">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Tipo Tanque</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tanques as $tanque) { ?>
                <tr>
                    <td><?php echo $tanque['id_tanque']; ?></td>
                    <td><?php echo $tanque['nombre_tanque']; ?></td>
                    <td><?php echo $tanque['nombre_tipo_tanque']; ?></td>
                    <td><?php echo $tanque['nombre_estado_tanques']; ?></td>

                    <td>
                        <!-- Botón Detalles -->
                        <a href="<?php echo getUrl('Tanques', 'Tanque', 'getDetails', array('id_tanque' => $tanque['id_tanque'])); ?>" 
                           class="btn btn-info btn-sm">
                            Detalles
                        </a>

                        <!-- Botón Editar -->
                        <a href="<?php echo getUrl('Tanques', 'Tanque', 'getUpdate', array('id_tanque' => $tanque['id_tanque'])); ?>" 
                           class="btn btn-primary btn-sm">
                            Editar
                        </a>

                        <!-- Botones según estado -->
                        <?php if ($tanque['id_estado_tanque'] == 1) { ?>

                            <a href="<?php echo getUrl('Tanques', 'Tanque', 'getDelete', array('id_tanque' => $tanque['id_tanque'])); ?>" 
                               class="btn btn-danger btn-sm">
                                Eliminar
                            </a>

                        <?php } else if ($tanque['id_estado_tanque'] == 2) { ?>

                            <a href="<?php echo getUrl('Tanques', 'Tanque', 'updateStatus', array('id_tanque' => $tanque['id_tanque'])); ?>" 
                               class="btn btn-success btn-sm">
                                Activar
                            </a>

                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
