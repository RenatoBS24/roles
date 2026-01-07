<?php

use CodeIgniter\Model;

class MenuSistemaModel extends Model
{
    protected $table      = 'menu_sistema';
    protected $primaryKey = 'id_menu_sistema';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_menu_sistema',
        'nombre_menu',
        'id_modulo',
        'id_menu_sistema_padre'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected $cleanValidationRules = true;

    protected $validationRules = [
        'nombre_menu' => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9_ ]$/]',
        'id_modulo' => 'required|is_not_unique[modulo.id_modulo]',
        'id_menu_sistema_padre' => 'permit_empty|is_not_unique[menu_sistema.id_menu_sistema]|matches_id_menu_sistema'
    ];

    protected $validationMessages   = [
        'nombre_menu' => [
            'required' => 'El nombre es requerido',
            'min_length' => 'El nombre debe tener al menos 3 caracteres',
            'max_length' => 'El nombre no debe exceder los 50 caracteres',
            'regex_match' => 'El nombre no debe contener caracteres raros'
        ],
        'id_modulo' => [
            'required' => 'El id del modulo es requerido',
            'is_not_unique' => 'El modulo seleccionado no existe'
        ],
        'id_menu_sistema_padre' => [
            'is_not_unique' => 'El menu padre seleccionado no existe'
        ]
    ];
}
