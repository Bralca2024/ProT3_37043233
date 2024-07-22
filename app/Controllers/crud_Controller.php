<?php

namespace App\Controllers;

use App\Models\usuario_Model;

class crud_Controller extends BaseController
{
  public function index()
  {
    $model = new usuario_Model();
    $datos = $model->getClients();

    $data['titulo'] = 'Panel de control';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuarios/dashboard', compact('datos'));
    echo view('front/footer_view');
  }
  public function indexActivate()
  {
    $model = new usuario_Model();
    $datos = $model->getClients();

    $data['titulo'] = 'Usuario dados de baja';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuarios/activate', compact('datos'));
    echo view('front/footer_view');
  }
  public function addUser()
  {
    $data['titulo'] = 'Agregar cliente';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuarios/create');
    echo view('front/footer_view');
  }

  public function store()
  {
    $input = $this->validate([
      'nombre' => 'required|min_length[3]',
      'apellido' => 'required|min_length[3]|max_length[25]',
      'usuario' => 'required|min_length[3]|is_unique[usuarios.usuario]',
      'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
      'password' => 'required|min_length[6]|max_length[10]',
      'repassword' => 'required_with[password]|matches[password]'
    ]);

    $formModel = new usuario_Model();

    if (!$input) {
      $data['titulo'] = 'Create';
      echo view('front/head_view', $data);
      echo view('front/navbar_view');
      echo view('back/usuarios/create');
      echo view('front/footer_view');
    } else {
      $formModel->save([
        'nombre' => $this->request->getVar('nombre'),
        'apellido' => $this->request->getVar('apellido'),
        'usuario' => $this->request->getVar('usuario'),
        'email' => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
      ]);

      session()->setFlashdata('msg', 'Usuario agregado éxitosamente');
      return redirect()->to('/dashboard');
    }
  }

  public function edit($id)
  {
    $model = new usuario_Model();
    $dato = $model->getClient($id);

    $data['titulo'] = 'Editar usuario';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuarios/edit', compact('dato'));
    echo view('front/footer_view');
  }

  public function update($id_usuario)
  {
    // Validación de los campos
    $validationRules = [
      'nombre' => 'required|min_length[6]',
      'apellido' => 'required|min_length[3]|max_length[25]',
      'usuario' => 'required|min_length[3]|is_unique[usuarios.usuario,id_usuario,' . $id_usuario . ']',
      'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email,id_usuario,' . $id_usuario . ']'
    ];

    if (!$this->validate($validationRules)) {
      // Si la validación falla, redirigir de vuelta a la vista de edición con los errores
      /*   return redirect()->back()->withInput()->with('validation', $this->validator); */
      $model = new usuario_Model();
      $dato = $model->getClient($id_usuario);

      $data['titulo'] = 'Editar usuario';
      echo view('front/head_view', $data);
      echo view('front/navbar_view');
      echo view('back/usuarios/edit', compact('dato'));
      echo view('front/footer_view');
    } else {
      $formModel = new usuario_Model();

      // Crea un array de los elementos que se van a
      $dataToUpdate = [
        'nombre' => $this->request->getVar('nombre'),
        'apellido' => $this->request->getVar('apellido'),
        'usuario' => $this->request->getVar('usuario'),
        'email' => $this->request->getVar('email'),
      ];

      // // Verificar si se proporciona una nueva contraseña
      // $newPassword = $this->request->getVar('password');
      // if (!empty($newPassword)) {
      //   // Aquí puedes aplicar un hash a la contraseña antes de guardarla
      //   $dataToUpdate['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
      // }

      // Actualizar el usuario en la base de datos
      $formModel->update($id_usuario, $dataToUpdate);

      session()->setFlashdata('msg', 'Usuario editado con éxito');
      return redirect()->to('/dashboard');
    }
  }
  public function delete($id_usuario)
  {
    $model = new usuario_Model();

    // Verifica si el usuario existe
    if ($model->find($id_usuario)) {
      // Cambia el estado de baja a 'SI'
      $model->update($id_usuario, ['baja' => 'SI']);
      session()->setFlashdata('msg', 'Usuario dado de baja con éxito');
    } else {
      session()->setFlashdata('msg', 'Usuario no encontrado');
    }

    // Redirige de vuelta al panel de control
    return redirect()->to('/dashboard');
  }
  public function activate($id_usuario)
  {
    $model = new usuario_Model();

    // Verifica si el usuario existe
    if ($model->find($id_usuario)) {
      // Cambia el estado de baja a 'NO'
      $model->update($id_usuario, ['baja' => 'NO']);
      session()->setFlashdata('msg', 'Usuario activado con éxito');
    } else {
      session()->setFlashdata('msg', 'Usuario no encontrado');
    }

    // Redirige de vuelta al panel de control
    return redirect()->to('/dashboard');
  }
}
