<?php

namespace App\Service;

use App\Models\UserPermissionMenuModel;

class UserPermissionMenuService
{
    protected UserPermissionMenuModel $userPermissionMenu;
    public function __construct($userPermissionMenuModel)
    {
        $this->userPermissionMenu = $userPermissionMenuModel;
    }

    public function getIdsByPermissionId(int $permissionId): array
    {
        if($permissionId <= 0){
            return [];
        }
        return $this->userPermissionMenu->getIdsByPermissionId($permissionId);
    }

}