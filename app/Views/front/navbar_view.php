<?php
$session = session();
/* $nombre = $session()->get('nombre'); */
$perfil = $session->get('perfil_id');
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top p-0 bg-body-tertiary">
  <div class="container-fluid py-2 bg-modified shadow-sm">
    <a class="navbar-brand" href="<?php echo base_url('principal') ?>">
      <img src="<?php echo base_url('assets/img/logoHeader-green.png') ?>" alt="Logo de talentos digitales" width="160px">
    </a>
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse p-4 p-lg-0" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 d-flex align-items-md-start align-items-lg-center mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-black active" aria-current="page" href="<?php echo base_url('principal') ?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="<?php echo base_url('quienes_somos') ?>">Quienes somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="<?php echo base_url('acerca_de') ?>">Acerca de</a>
        </li>
        <?php if (session()->perfil_id == 2) : ?>
          <li class="nav-item">
            <a class="nav-link text-black" href="<?php echo base_url('/nuestros_cursos') ?>">Nuestros cursos</a>
          </li>
        <?php endif; ?>
      </ul>
      <form class="d-flex mx-auto" role="search">
        <div class="input-group">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success color-white" type="submit">
            <img src="<?php echo base_url('assets/img/searchIcon.svg') ?>" alt="Icono buscador" width="20px" class="light-icon">
          </button>
        </div>
      </form>
      <div class="dropdown mt-3 mt-lg-0">
        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown">
          <?php if (session()->get('usuario')) : ?>
            <?= session()->get('nombre') . ' ' .  session()->get('apellido') ?>
          <?php else : ?>
            Cuenta de usuario
          <?php endif; ?>
        </button>
        <ul class="dropdown-menu">
          <?php if (session()->perfil_id == 1) : ?>
            <li><a class="dropdown-item" href="<?php echo base_url('/dashboard') ?>">Panel de control</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('/activate') ?>">Usuarios inactivos</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('/logout') ?>" tabindex="-1">Cerrar sesión</a></li>

          <?php elseif (session()->perfil_id == 2) : ?>
            <li><a class="dropdown-item" href="<?php echo base_url('/user_Profile') ?>">Perfil de usuario</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('/logout') ?>" tabindex="-1">Cerrar sesión</a></li>

          <?php else : ?>
            <li><a class="dropdown-item" href="<?php echo base_url('login') ?>">Iniciar sesión</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('registro') ?>">Registrarse</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
      
  </div>
</nav>