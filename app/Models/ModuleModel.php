<?php

namespace App\Models;

use CodeIgniter\Model;

class ModuleModel extends Model
{
    protected $table      = 'modulo';
    protected $primaryKey = 'id_modulo';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_modulo',
        'nombre_modulo'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected $cleanValidationRules = true;

    protected $validationRules = [
        'id_modulo' => 'required',
        'nombre_modulo' => 'required|is_unique[modulo.nombre_modulo,id_modulo,{id_modulo}]|regex_match[/^[a-zA-Z0-9_ ]{3,100}$/]'
    ];

    protected $validationCreateRules = [
        'nombre_modulo' => 'required|min_length[3]|max_length[100]|is_unique[modulo.nombre_modulo]|regex_match[/^[a-zA-Z0-9_ ]{3,100}$/]'
    ];

    protected $validationMessages   = [
        'nombre_modulo' => [
            'required' => 'El nombre del modulo es requerido',
            'is_unique' => 'El nombre del modulo ya existe.',
            'regex_match' => 'El nombre contiene caracteres no permitidos.',
            'min_length' => 'El nombre debe tener al menos 3 caracteres.',
            'max_length' => 'El nombre no debe exceder los 100 caracteres.'
        ],
    ];
}
