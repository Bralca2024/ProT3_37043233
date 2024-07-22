<?php

namespace App\Models;

use CodeIgniter\Model;


class usuario_Model extends Model
{
  protected $table = "usuarios";
  protected $primaryKey = "id_usuario";
  protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'password', 'repassword', 'perfil_id', 'baja', 'created_at'];

  public function getClients()
  {
    return $this->findAll();
  }
  public function saveNewUser($dato)
  {
    return $this->save($dato);
  }
  public function getClient($id)
  {
    return $this->where('id_usuario', $id)->first();
  }
}
