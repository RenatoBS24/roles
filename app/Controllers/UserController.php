<?php

namespace App\Controllers;

use App\Service\UserService;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected UserService $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function index(){
        return $this->respond($this->userService->getUsers());
    }
    public function showByUsername($username = null):ResponseInterface{
        return $this->respond($this->userService->findUserByUsername($username));
    }
    public function showUserWithModules(int $userId):ResponseInterface{
        return $this->respond($this->userService->findUserWithModules($userId));
    }


}