<?php

namespace App\Service;

use App\Models\MenuSistemaModel;
use App\Models\UserPermission;
use App\Models\UserPermissionMenuModel;

class MenuSystemService
{
    protected MenuSistemaModel $menuSystemModel;
    protected UserPermissionMenuModel $userPermissionMenuService;
    protected UserPermission $userPermissionService;

    public function __construct()
    {
        $this->menuSystemModel = new MenuSistemaModel();
        $this->userPermissionMenuService = new UserPermissionMenuModel();
        $this->userPermissionService = new UserPermission();
    }

    public function getMenuSystem(int $userId):array{
        $idsPermission = $this->userPermissionService->findPermissionByUserId($userId);
        if(empty($idsPermission)){
            return [];
        }
        log_message('info', "Permisos del usuario {$userId}: " . json_encode($idsPermission));

        $idsMenuSystem = $this->userPermissionMenuService->getIdsByPermissionId($idsPermission);

        if(empty($idsMenuSystem)){
            return [];
        }
        return $this->menuSystemModel->find($idsMenuSystem);
    }

}