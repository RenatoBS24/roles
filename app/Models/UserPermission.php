<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPermission extends Model
{
    protected $table = 'usuario_permiso_menu';
    protected $primaryKey = 'id_permiso';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_usuario',
        'id_modulo'
    ];

    public function findPermissionByUserId(int $userId): ?array
    {
        $result = $this->select("id_permiso")->where('id_usuario', $userId)->findAll();
        return array_column($result, 'id_permiso');
    }
}