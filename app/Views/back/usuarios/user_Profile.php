<section class="col-md-6 col-lg-5 mx-auto padding-section">
  <div class="container">
    <h2 class="text-center mb-5">Perfil de Usuario</h2>
    <?php if (session('msg')) { ?>
      <div class="alert alert-success alert-dismissible fase show" role="alert">
        <strong>Felicidades !!! </strong> <?= session('msg'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
    <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title mb-4">Información del Usuario</h5>
        <p><strong>Nombre:</strong> <?php echo $dato['nombre']; ?></p>
        <p><strong>Apellido:</strong> <?php echo $dato['apellido']; ?></p>
        <p><strong>Email:</strong> <?php echo $dato['email']; ?></p>
        <p><strong>Usuario:</strong> <?php echo $dato['usuario']; ?></p>
        <a href="<?= base_url('') ?>" class="btn btn-primary">Regresar al inicio</a>
        <a href="<?php echo base_url($dato['id_usuario'] . '/editProfile/') ?>" class="btn btn-success">Editar</a>
      </div>
    </div>
  </div>
</section>