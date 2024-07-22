<div class="container padding-section">
  <h2 class="text-center mb-5">Panel de control</h2>

  <table class="table table-responsive">
    <thead>
      <?php if (session('msg')) { ?>
        <div class="alert alert-success alert-dismissible fase show" role="alert">
          <strong>Felicidades !!!</strong> <?= session('msg'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } ?>
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
      // Filtra los datos por perfil_id = 2
      $usuarios_perfil_2 = array_filter($datos, function ($dato) {
        return $dato['perfil_id'] == 2 && $dato['baja'] === 'NO';
      });

      // Muestra los datos de los usuarios con perfil_id 2
      foreach ($usuarios_perfil_2 as $dato) {
      ?>
        <tr>
          <th scope="row"><?php echo $dato['id_usuario'] ?></th>
          <td><?php echo $dato['nombre'] ?></td>
          <td><?php echo $dato['apellido'] ?></td>
          <td><?php echo $dato['email'] ?></td>
          <td><?php echo $dato['usuario'] ?></td>
          <td>
            <a class="btn btn-success" href="<?php echo base_url($dato['id_usuario'] . '/edit/') ?>">Editar</a>
            <!-- Código existente -->
            <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $dato['id_usuario'] ?>">Eliminar</a>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal<?php echo $dato['id_usuario'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este usuario?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="<?php echo base_url($dato['id_usuario'] . '/delete') ?>">Eliminar</a>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <button class="btn btn-success"><a href="<?php echo base_url('/create') ?>" class="text-white  text-decoration-none">Crear usuario</a></button>
</div>