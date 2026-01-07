<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{

    protected $datamap = [
        "userId" => "id_usuario",
        "userName" => "nombre_usuario",
        "password" => "clave",
        "rolId" => "id_rol",
        "personId" => "id_persona",
    ];
    protected $attributes = [];
}
