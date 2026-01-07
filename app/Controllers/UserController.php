<?php

namespace App\Controllers;

use App\Service\UserService;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $format = 'json';
    protected UserService $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function index()
    {
        return $this->respond($this->userService->getUsers());
    }
    public function showByUsername($username = null): ResponseInterface
    {
        return $this->respond($this->userService->findUserByUsername($username));
    }
    public function showUserWithModules(string $userName): ResponseInterface
    {
        return $this->respond($this->userService->findUserWithModules($userName));
    }

    public function login()
    {
        try {
            $data = $this->request->getJSON(true);
            $respuesta = $this->userService->login($data['userName'], $data['password']);

            $token = service('JWT')->generarToken($respuesta);

            return $this->respond([
                'success' => 'Login exitoso',
                'token' => $token
            ]);
        } catch (\Exception $ex) {
            return $this->fail($ex->getMessage());
        } catch (\Throwable $th) {
            \log_message('error', $th->getMessage());
            return $this->failServerError("Error interno del servidor");
        }
    }
}
