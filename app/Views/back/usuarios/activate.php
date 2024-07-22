<div class="container padding-section">
  <h2 class="text-center mb-5">Usuarios dados de baja</h2>
  <table class="table table-responsive">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Email</th>
        <th scope="col">Usuario</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Filtra los datos por perfil_id = 2 y baja = 'SI'
      $usuarios_baja = array_filter($datos, function ($dato) {
        return $dato['perfil_id'] == 2 && $dato['baja'] === 'SI';
      });

      // Muestra los datos de los usuarios dados de baja
      foreach ($usuarios_baja as $dato) {
      ?>
        <tr>
          <th scope="row"><?php echo $dato['id_usuario'] ?></th>
          <td><?php echo $dato['nombre'] ?></td>
          <td><?php echo $dato['apellido'] ?></td>
          <td><?php echo $dato['email'] ?></td>
          <td><?php echo $dato['usuario'] ?></td>
          <td>
            <a class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#activateModal<?php echo $dato['id_usuario'] ?>">Activar</a>

            <!-- Modal -->
            <div class="modal fade" id="activateModal<?php echo $dato['id_usuario'] ?>" tabindex="-1" aria-labelledby="activateModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="activateModalLabel">Confirmar Activación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ¿Estás seguro de que deseas activar este usuario?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a class="btn btn-warning" href="<?php echo base_url('activate/' . $dato['id_usuario']) ?>">Activar</a>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>