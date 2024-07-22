<!-- Editar registro -->
<section class="container register-section col-md-6 col-lg-5 padding-section px-3">
  <h2 class="text-center mb-5">Editar mi perfil</h2>
  <?php $validation = \Config\Services::validation(); ?>
  <form method="post" action="<?php echo base_url('updateProfile/' . $dato['id_usuario']); ?>" class="bg-light p-4 shadow-sm">
    <!--  <input type="hidden" name="_method" value="PUT"> -->
    <input type="hidden" name="id_usuario" value="<?= $dato['id_usuario'] ?>">

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
      <input name="nombre" type="text" id="userName" class="form-control" placeholder="Ingrese su nombre" value="<?= $dato['nombre'] ?>" />
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
      <input name="apellido" type="text" id="userSurname" class="form-control" placeholder="Ingrese su apellido" value="<?= $dato['apellido'] ?>" />
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
      <input name="email" type="email" id="userRegisterEmail" class="form-control" placeholder="Ingrese su correo" value="<?= $dato['email'] ?>" />
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
      <input name="usuario" type="text" id="userNickName" class="form-control" placeholder="Ingrese su nombre de usuario" value="<?= $dato['usuario'] ?>" />
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
    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Guardar cambios</button>
    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-block mb-4"><a class="text-white text-decoration-none" href="<?php echo base_url('/user_Profile'); ?>">Cancelar</a></button>
  </form>
</section>