<div class="card">
    <div class="card-header">
        <div class="card-title">Registro de Actividades</div>
    </div>

  <form action="<?php echo getUrl("RegistroDeActividades","RegistroDeActividades","postCreate") ?>" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="documento">Nombre de la actividad*</label>
                <input type="text" class="form-control" id="nombre_actividad" name="nombre_actividad" placeholder="Ingrese un nombre de actividad" required>
                <small class="text-danger"></small>
            </div>

            <div class="form-group">
                <label for="id_rol">Estado de la actividad*</label>
                <select class="form-control" id="id_estado_actividad" name="id_estado_actividad" required>
                    <option value="">Seleccione un estado</option>
                    <?php while ($estado = pg_fetch_assoc($estados)) { ?>
                        <option value="<?php echo $estado['id_estado_actividad']; ?>">
                            <?php echo $estado['nombre_estado_actividad']; ?>
                        </option>
                    <?php } ?>
         </select>
                <small class="text-danger"></small>
            </div>

        </div>

        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
</div>


<script src="/geosalud/web/assets/validaciones.js"></script>