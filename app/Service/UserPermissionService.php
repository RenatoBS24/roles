<?php

namespace App\Service;

use App\Models\UserPermission;

class UserPermissionService
{
    protected UserPermission $userPermissionModel;
    public function __construct()
    {
        $this->userPermissionModel = new UserPermission();
    }

    public function findPermissionByUserId(int $userId): ?array{
        $data = $this->userPermissionModel->findPermissionByUserId($userId);
        return array_map(fn($item) => $item['id_permiso'], $data);
    }


}