<?php

namespace App\Service;

use App\Models\UsuarioMenuModel;

class UsuarioMenuService
{
    private UsuarioMenuModel $usuario_menu_model;

    public function __construct()
    {
        $this->usuario_menu_model = new UsuarioMenuModel();
    }

    public function darPermiso($data)
    {
        if (!$this->usuario_menu_model->insert($data)) {
            return [
                'success' => false,
                'error' => $this->usuario_menu_model->errors()
            ];
        }

        $data['id_permiso'] = $this->usuario_menu_model->getInsertID();

        return [
            'success' => true,
            'permisoCreate' => $data
        ];
    }

    public function eliminarPermiso($id)
    {
        $permiso = $this->usuario_menu_model->find($id);

        if (!$permiso) {
            return [
                'success' => false,
                'error' => 'El permiso no existe'
            ];
        }

        if (!$this->usuario_menu_model->delete($id)) {
            return [
                'success' => false,
                'error' => 'No se pudo eliminar el permiso'
            ];
        }

        return [
            'success' => true,
            'message' => 'Permiso eliminado correctamente'
        ];
    }
}
