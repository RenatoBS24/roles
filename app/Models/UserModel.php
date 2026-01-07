<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

/**
 * @method \App\Entities\User|null findUserByUsername(string $username)
 */

class UserModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $returnType = User::class;
    protected $allowedFields = [
        'nombre_usuario',
        'clave',
        'id_rol',
        'id_persona',
    ];
    protected $useTimestamps = false;

    public function userWithRole($username)
    {
        return $this->select('id_usuario,nombre_usuario,clave,rol.nombre_rol as rol')
            ->join('rol', 'rol.id_rol = usuario.id_rol')
            ->where('nombre_usuario', $username)->first();
    }
}
