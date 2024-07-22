<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class cursos_Controller extends Controller
{
  public function index()
  {
    // Verifica si el usuario está logueado
    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil_id') != 2) {
      // Redirige a la página principal si no está logueado
      return redirect()->to(base_url('/'));
    }

    $data['titulo'] = 'Nuestros cursos';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuarios/nuestros_cursos');
    echo view('front/footer_view');
  }
}
