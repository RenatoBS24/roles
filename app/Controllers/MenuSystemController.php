<?php

namespace App\Controllers;

use App\Service\MenuSystemService;
use CodeIgniter\RESTful\ResourceController;

class MenuSystemController extends ResourceController
{
    protected MenuSystemService $menuSystemService;

    public function __construct()
    {
        $this->menuSystemService = new MenuSystemService();
    }

    public function show($id = null){
        $userId = (int)$id;
        if($userId <= 0){
            return $this->failValidationErrors("El id de usuario es invalido");
        }
        $menuSystem = $this->menuSystemService->getMenuSystem($userId);
        return $this->respond($menuSystem);

    }

}