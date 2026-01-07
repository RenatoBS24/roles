<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Service\UsuarioMenuService;

class UsuarioMenuController extends ResourceController
{
    protected $format = 'json';
    private $usuario_menu_service;

    public function __construct()
    {
        $this->usuario_menu_service = new UsuarioMenuService();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
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

            $respuesta = $this->usuario_menu_service->darPermiso($data);

            if (!$respuesta['success']) {
                return $this->failValidationErrors($respuesta['error']);
            }

            return $this->respondCreated(['permisoCreado' => $respuesta['permisoCreate']]);
        } catch (\Throwable $th) {
            log_message('Error', $th->getMessage());
            return $this->fail("Error interno del servidor");
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
        try {
            if (!$id) {
                return $this->fail('ID de permiso no proporcionado');
            }

            $respuesta = $this->usuario_menu_service->eliminarPermiso($id);

            if (!$respuesta['success']) {
                return $this->failNotFound($respuesta['error']);
            }

            return $this->respondDeleted(['message' => $respuesta['message']]);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            return $this->fail('Error interno del servidor');
        }
    }
}
