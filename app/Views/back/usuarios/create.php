<!-- Registro -->
<section class="container register-section col-md-6 col-lg-5 padding-section px-3">
  <h2 class="text-center mb-5">Agregar usuario</h2>
  <?php $validation = \Config\Services::validation(); ?>
  <form method="post" class="bg-white p-5 shadow mx-auto" action="<?php echo base_url('/store') ?>">
    <?= csrf_field(); ?>
    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
      <div class="alert alert-danger"><?= session()->getFlashData('fail'); ?></div>
    <?php endif; ?>
    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
      <div class="alert alert-success"><?= session()->getFlashData('success'); ?></div>
    <?php endif; ?>
    <!-- Nombre input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <label class="form-label" for="userName">Nombre</label>
      <input name="nombre" type="text" id="userName" class="form-control" placeholder="Ingrese su nombre" />
      <!-- Error -->
      <?php if ($validation->getError('nombre')) { ?>
        <div class="alert alert-danger mt-2">
          <?= $error = $validation->getError('nombre') ?>
        </div>
      <?php } ?>
    </div>
    <!-- Apellido input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <label class="form-label" for="userSurname">Apellido</label>
      <input name="apellido" type="text" id="userSurname" class="form-control" placeholder="Ingrese su apellido" />
      <!-- Error -->
      <?php if ($validation->getError('apellido')) { ?>
        <div class="alert alert-danger mt-2">
          <?= $error = $validation->getError('apellido') ?>
        </div>
      <?php } ?>
    </div>

    <!-- Email input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <label class="form-label" for="userRegisterEmail">Email</label>
      <input name="email" type="email" id="userRegisterEmail" class="form-control" placeholder="Ingrese su correo" />
      <!-- Error -->
      <?php if ($validation->getError('email')) { ?>
        <div class="alert alert-danger mt-2">
          <?= $error = $validation->getError('email') ?>
        </div>
      <?php } ?>
    </div>

    <!-- Usuario input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <label class="form-label" for="userNickName">Usuario</label>
      <input name="usuario" type="text" id="userNickName" class="form-control" placeholder="Ingrese su nombre de usuario" />
      <!-- Error -->
      <?php if ($validation->getError('usuario')) { ?>
        <div class="alert alert-danger mt-2">
          <?= $error = $validation->getError('usuario') ?>
        </div>
      <?php } ?>
    </div>

    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <label class="form-label" for="userRegisterPassword">Contraseña</label>
      <input name="password" type="password" id="userRegisterPassword" class="form-control" placeholder="Ingrese su contraseña" />
      <!-- Error -->
      <?php if ($validation->getError('password')) { ?>
        <div class="alert alert-danger mt-2">
          <?= $error = $validation->getError('password') ?>
        </div>
      <?php } ?>
    </div>

    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <label class="form-label" for="userRepeatPassword">Repita la contraseña</label>
      <input name="repassword" type="password" id="userRepeatPassword" class="form-control" placeholder="Repita su contraseña" />
      <!-- Error -->
      <?php if ($validation->getError('repassword')) { ?>
        <div class="alert alert-danger mt-2">
          <?= $error = $validation->getError('repassword') ?>
        </div>
      <?php } ?>
    </div>

    <!-- Submit button -->
    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Crear usuario</button>
    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-block mb-4">
      <a href="<?php echo base_url('/dashboard') ?>" class="text-white text-decoration-none">Cancelar</a>
    </button>

  </form>
</section>