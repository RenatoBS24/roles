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
        $existPermission = $this->usuario_menu_model->where('id_usuario', $data['id_usuario'])
            ->where('id_modulo', $data['id_modulo'])
            ->first();
        if($existPermission){
            if(!$this->usuario_menu_model->delete($existPermission['id_permiso'])){
                return [
                    'success' => false,
                    'error' => 'No se pudo eliminar el permiso existente'
                ];
            }
            return [
                'success' => true,
                'action' => 'removed',
                'message' => 'Permiso eliminado correctamente'
            ];
        }
        if (!$this->usuario_menu_model->insert($data)) {
            return [
                'success' => false,
                'error' => $this->usuario_menu_model->errors()
            ];
        }
        return [
            'success' => true,
            'action' => 'added',
            'id_permiso' => $this->usuario_menu_model->getInsertID(),
            'message' => 'Permiso agregado correctamente'
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
