<?php

namespace App\Service;

use App\Entities\User;
use App\Models\UserModel;

class UserService
{
    protected UserModel $userRepository;
    public function __construct()
    {
        $this->userRepository = new UserModel();
    }

    public function getUsers(): array
    {
        return $this->userRepository->findAll();
    }
    public function findUserByUsername(string $username): ?User
    {
        return $this->userRepository->where('nombre_usuario', $username)->first();
    }

}