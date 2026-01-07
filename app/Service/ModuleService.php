<?php

namespace App\Service;

use App\Models\ModuleModel;

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
}
