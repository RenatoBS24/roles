<?php

namespace App\Controllers;

use App\Service\ModuleService;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ModuleController extends ResourceController
{
    protected $format = 'json';
    private ModuleService $moduleService;

    public function __construct()
    {
        $this->moduleService = new ModuleService();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data = $this->moduleService->findByModules();

        if (!$data['success']) {
            return $this->respondNoContent();
        }

        return $this->respond(['modules' => $data['listModules']]);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        try {
            $data = $this->request->getJSON(true);
            $result = $this->moduleService->createModule($data);

            if (!$result['success']) {
                return $this->failValidationErrors($result['error']);
            }

            return $this->respondCreated($result['moduleCreate']);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            return $this->failServerError("Error interno del servidor");
        }
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
