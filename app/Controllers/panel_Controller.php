<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class panel_Controller extends Controller
{
  public function index()
  {
    $session = session();
    // $nombre = $session->get('nombre');
    $perfil = $session->get('perfil_id');

    $data['perfil_id'] = $perfil;

    $dato['titulo'] = 'Panel de usuario';
    echo view('front/head_view', $dato);
    echo view('front/navbar_view');
    echo view('back/usuarios/usuario_Logueado', $data);
    echo view('front/footer_view');
  }
}
