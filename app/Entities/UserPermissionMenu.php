<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UserPermissionMenu extends Entity
{
    protected $datamap = [
        "permissionMenuId" => "id_permiso_menu_sistema",
        "permissionId" => "id_permiso",
        "menuId" => "id_menu_sistema",
    ];
    protected $attributes =[
        "permissionMenuId" => null,
        "permissionId" => null,
        "menuId" => null,
    ];

}