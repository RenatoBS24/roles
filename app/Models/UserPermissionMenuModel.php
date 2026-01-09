<?php

namespace App\Models;

use App\Entities\UserPermissionMenu;
use CodeIgniter\Model;

class UserPermissionMenuModel extends Model
{
    protected $table = "usuario_permiso_menu_sistema";
    protected $primaryKey = "id_permiso_menu_sistema";
    protected $returnType = UserPermissionMenu::class;
    protected $allowedFields = [
        "id_permiso",
        "id_menu_sistema",
    ];
    protected $useTimestamps = false;

    public function getIdsByPermissionId($permissionIds): array
    {
        if (!is_array($permissionIds)) {
            $permissionIds = [$permissionIds];
        }

        $result = $this->select('id_menu_sistema')
            ->whereIn('id_permiso', $permissionIds)
            ->findAll();

        return array_map(fn($item) => $item->id_menu_sistema, $result);
    }

}