<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioMenuModel extends Model
{
    protected $table      = 'usuario_permiso_menu';
    protected $primaryKey = 'id_permiso';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_permiso',
        'id_usuario',
        'id_modulo'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected $cleanValidationRules = true;

    protected $validationRules = [
        'id_usuario' => 'required|integer|is_not_unique[usuario.id_usuario]',
        'id_modulo' => 'required|integer|is_not_unique[modulo.id_modulo]'
    ];

    protected $validationMessages = [
        'id_usuario' => [
            'required' => 'El ID del usuario es obligatorio',
            'integer' => 'El ID del usuario debe ser un número entero',
            'is_not_unique' => 'El usuario especificado no existe en el sistema'
        ],
        'id_modulo' => [
            'required' => 'El ID del módulo es obligatorio',
            'integer' => 'El ID del módulo debe ser un número entero',
            'is_not_unique' => 'El módulo especificado no existe en el sistema'
        ]
    ];
}
