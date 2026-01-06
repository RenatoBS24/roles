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
        'id_menu_sistema' => 'required',
        'nombre_menu' => 'is_unique[menu_sistema.nombre_menu,id_menu_sistema,{id_menu_sistema}]|regex_match[/^[a-zA-Z0-9_]{3,50}$/]'
    ];

    protected $validationCreateRules = [];

    protected $validationMessages   = [];
}
