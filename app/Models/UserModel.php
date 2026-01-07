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
}
