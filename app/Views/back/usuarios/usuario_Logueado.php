<div class="container mt-5 bg-light d-flex flex-column p-4 text-center col-md-6 col-lg-5 shadow-lg">
  <div class="row justify-content-md-center">
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-success">
        <?= session()->getFlashdata('msg') ?>
      </div>
    <?php endif; ?>
    <br>
    <?php if (session()->get('perfil_id') == 1) : ?>
      <div>
        <img src="assets/img/administrador.png" alt="Imagen de administrador" height="100px" width="100px" class="center" class="mb-5">
        <h2>Bienvenido, <?= session()->get('nombre') . ' ' . session()->get('apellido') ?></h2>
        <p>Accede a las herramientas de gestión y control.</p>
      </div>
    <?php elseif (session()->get('perfil_id') == 2) : ?>
      <div>
        <img src="assets/img/usuario.png" alt="Imagen de usuario" height="100px" width="100px" class="center" class="mb-5">
        <h2>Bienvenido, <?= session()->get('nombre') . ' ' . session()->get('apellido') ?></h2>
        <p>Explora tu perfil y disfruta de nuestros cursos.</p>
      </div>
    <?php endif; ?>
  </div>
</div>