<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_Model;

class login_Controller extends BaseController
{
  public function index()
  {

    helper(['form', 'url']);

    // Verifica si el usuario ya está logueado
    if (session()->get('logged_in')) {
      return redirect()->to('/panel'); // Redirige al panel si ya está logueado
    }

    $data['titulo'] = 'Login';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/login');
    echo view('front/footer_view');
  }

  public function delete($id_usuario)
  {
    $model = new usuario_Model();

    // Verifica si el usuario existe
    $usuario = $model->find($id_usuario);
    if ($usuario) {
      // Marca al usuario como dado de baja
      $usuario['baja'] = 'SI';
      $model->update($id_usuario, $usuario);
      session()->setFlashdata('msg', 'Usuario dado de baja con éxito');
    } else {
      session()->setFlashdata('msg', 'Usuario no encontrado');
    }

    // Redirige de vuelta al panel de control
    return redirect()->to('/dashboard');
  }

  public function auth()
  {
    $session = session();
    $model = new usuario_Model();

    // Se trae los datos del formulario
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $data = $model->where('email', $email)->first();

    if ($data) {
      $pass = $data['password'];
      $baja = $data['baja'];
      if ($baja === 'SI') {
        $session->setFlashdata('msg', 'Usuario dado de baja');
        return redirect()->to('/login');
      }
      // Se verifican los datos ingresados para iniciar la sesión. Si cumple la verificación, se inicia la sesión.
      $verify_pass = password_verify($password, $pass);

      if ($verify_pass) {
        $ses_data = [
          'id_usuario' => $data['id_usuario'],
          'nombre' => $data['nombre'],
          'apellido' => $data['apellido'],
          'email' => $data['email'],
          'usuario' => $data['usuario'],
          'perfil_id' => $data['perfil_id'],
          'logged_in' => TRUE
        ];
        // Al cumplirse la verificación, se inicia la sesión
        $session->set($ses_data);

        session()->setFlashdata('msg', 'Bienvenido');
        return redirect()->to('/panel');
      } else {
        // Si no se pasa la validación
        $session->setFlashdata('msg', 'Password incorrecta');
        return redirect()->to('/login');
      }
    } else {
      $session->setFlashdata('msg', 'Password o email incorrecto');
      return redirect()->to('/login');
    }
  }
  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('/');
  }
}
