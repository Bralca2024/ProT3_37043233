<?php

namespace App\Controllers;

use App\Models\usuario_Model;
use CodeIgniter\Controller;

class usuario_Controller extends Controller
{
  public function __construct()
  {
    helper(['form', 'url']);
  }
  public function create()
  {
    $data['titulo'] = 'Registro';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuarios/registro');
    echo view('front/footer_view');
  }
  public function formValidation()
  {
    $input = $this->validate([
      'nombre' => 'required|min_length[3]',
      'apellido' => 'required|min_length[3]|max_length[25]',
      'usuario' => 'required|min_length[3]|is_unique[usuarios.usuario]',
      'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
      'password' => 'required|min_length[6]|max_length[10]',
      'repassword' => 'matches[password]'
    ]);

    $formModel = new usuario_Model();

    if (!$input) {
      $data['titulo'] = 'Registro';
      echo view('front/head_view', $data);
      echo view('front/navbar_view');
      echo view('back/usuarios/registro');
      echo view('front/footer_view');
    } else {
      $formModel->save([
        'nombre' => $this->request->getVar('nombre'),
        'apellido' => $this->request->getVar('apellido'),
        'usuario' => $this->request->getVar('usuario'),
        'email' => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        // password_hash(): Crea un nuevo hash de contraseña usando un algoritmo de hash de único sentido.
      ]);

      session()->setFlashdata('success', 'Usuario registrado con éxito');
      return redirect()->to('/login');
    }
  }
  public function indexUserProfile()
  {
    // Obtener el modelo de usuario
    $model = new usuario_Model();

    // Obtener el ID del usuario logueado
    $userId = session()->get('id_usuario');

    // Obtener la información del usuario logueado
    // $dato = $model->find($userId);

    $dato = $model->getClient($userId);

    $data['titulo'] = 'Perfil de Usuario';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuarios/user_Profile', compact('dato'));
    echo view('front/footer_view');
  }
  public function editProfile()
  {
  
    // Suponiendo que el ID del usuario está almacenado en la sesión
    $session = session();
    $id_usuario = $session->get('id_usuario'); // Cambia esto según tu implementación

    $model = new usuario_Model();
    $dato = $model->getClient($id_usuario);

    $data['titulo'] = 'Perfil de Usuario';
    $data['dato'] = $dato; 
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuarios/edit_Profile', $data); 
    echo view('front/footer_view');
  }
  public function updateProfile($id_usuario)
  {
    // Validación de los campos
    $validationRules = [
      'nombre' => 'required|min_length[3]',
      'apellido' => 'required|min_length[3]|max_length[25]',
      'usuario' => 'required|min_length[3]|is_unique[usuarios.usuario,id_usuario,' . $id_usuario . ']',
      'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email,id_usuario,' . $id_usuario . ']',
      'password' => 'permit_empty|min_length[6]',
      'repassword' => 'required_with[password]|matches[password]'
    ];

    if (!$this->validate($validationRules)) {
      // Si la validación falla, redirigir de vuelta a la vista de edición con los errores
      $model = new usuario_Model();
      $dato = $model->getClient($id_usuario);

      $data['titulo'] = 'Editar usuario';
      echo view('front/head_view', $data);
      echo view('front/navbar_view');
      echo view('back/usuarios/edit_Profile', compact('dato'));
      echo view('front/footer_view');
    } else {
      $formModel = new usuario_Model();

      // Crea un array de los elementos que se van a actualizar
      $dataToUpdate = [
        'nombre' => $this->request->getVar('nombre'),
        'apellido' => $this->request->getVar('apellido'),
        'usuario' => $this->request->getVar('usuario'),
        'email' => $this->request->getVar('email'),
      ];

      // Verifica si se proporciona una nueva contraseña
      $newPassword = $this->request->getVar('password');
      if (!empty($newPassword)) {
        // Se aplica un hash a la contraseña antes de guardarla
        $dataToUpdate['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
      }

      // Actualiza el usuario en la base de datos
      $formModel->update($id_usuario, $dataToUpdate);

      // Si se ha cambiado la contraseña, cerrar sesión y redirigir al login
      if (!empty($newPassword)) {
        session()->setFlashdata('msg', 'Contraseña cambiada con éxito. Por favor, inicie sesión nuevamente.');
        // Cerrar sesión
        session()->destroy();
        return redirect()->to('/login'); // Cambia '/login' a la ruta de tu página de inicio de sesión
      } else {
        session()->setFlashdata('msg', 'Usuario editado con éxito');
        return redirect()->to('/user_Profile');
      }
    }
  }
}
