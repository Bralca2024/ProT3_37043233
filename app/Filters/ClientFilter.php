<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ClientFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    $session = session();

    // Verifica si el usuario está autenticado
    if (!$session->get('logged_in')) {
      // Redirige a la página del login si no está autenticado
      return redirect()->to('/login');
    }

    // Verifica si el perfil del usuario es '2'
    if ($session->get('perfil_id') != '2') {
      return redirect()->to('/');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
  }
}
