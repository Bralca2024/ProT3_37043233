<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    $data['titulo'] = 'Pagina principal';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('front/principal');
    echo view('front/certificaciones');
    echo view('front/cursos');
    echo view('front/testimoniales');
    echo view('front/footer_view');
  }
  public function formulario()
  {
    $data['titulo'] = 'Formulario';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('front/formulario');
    echo view('front/footer_view');
  }
  public function recuperar_cuenta()
  {
    $data['titulo'] = 'Recuperar cuenta';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('front/recuperar_cuenta');
    echo view('front/footer_view');
  }
  public function quienes_somos()
  {
    $data['titulo'] = 'Quienes somos';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('front/quienes_somos');
    echo view('front/integrantes');
    echo view('front/footer_view');
  }
  public function acerca_de()
  {
    $data['titulo'] = 'Acerca de';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('front/acerca_de');
    echo view('front/informacion_contacto');
    echo view('front/servicios');
    echo view('front/footer_view');
  }
  public function login()
  {
    $data['titulo'] = 'Login';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuarios/login');
    echo view('front/footer_view');
  }
  public function registro()
  {
    $data['titulo'] = 'Registro';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuarios/registro');
    echo view('front/footer_view');
  }
}
