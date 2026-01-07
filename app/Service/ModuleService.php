<?php

namespace App\Service;

use App\Models\ModuleModel;

use Exception;

class ModuleService
{
    private $module;

    public function __construct()
    {
        $this->module = new ModuleModel();
    }

    public function findByModules()
    {
        $modules = $this->module->findAll();

        if (empty($modules)) {
            return [
                'success' => false,
                'listModules' => []
            ];
        }

        return [
            'success' => true,
            'listModules' => $modules
        ];
    }

    public function createModule($newModule)
    {

        $this->module->setValidationRules(
            $this->module->validationCreateRules
        );

        if (!$this->module->insert($newModule)) {
            return [
                'success' => false,
                'error' => $this->module->errors()
            ];
        }

        $newModule['id_module'] = $this->module->getInsertID();

        return [
            'success' => true,
            'moduleCreate' => $newModule
        ];
    }

    public function updateModule($idModulo, $dataModulo)
    {
        if ($idModulo == null || $idModulo <= 0) {
            throw new Exception("El id del modulo esta mal proporcionado");
        }

        if (!$this->module->find($idModulo)) {
            throw new Exception("Modulo no encontrado");
        }

        $dataModulo['id_modulo'] = $idModulo;

        if (!$this->module->save($dataModulo)) {
            return ['success' => false, 'error' => $this->module->errors()];
        }

        return ['success' => true, 'response' => $dataModulo];
    }
}
