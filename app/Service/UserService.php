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
    public function findUserWithModules(int $userId):array{
        $builder = $this->userRepository->builder();
        $builder->from('usuario u',true);
        $builder->select('u.id_usuario as userId, u.nombre_usuario as userName, r.id_rol as roleId, r.nombre_rol as roleName, o.nombre_oficina as officeName');
        $builder->join('rol r', 'u.id_rol = r.id_rol');
        $builder->join('persona p', 'u.id_persona = p.id_persona');
        $builder->join('trabajador t', 'p.id_persona = t.id_persona');
        $builder->join('oficina o', 't.id_oficina = o.id_oficina');
        $builder->where('u.id_usuario', $userId);
        $query = $builder->get();
        $firstArray= $query->getRowArray();
        $modules = $this->findModulesByUserId($userId);
        $firstArray['modules'] = $modules;
        return $firstArray;

    }
    public function findModulesByUserId(int $userId): array
    {
        $builder = $this->userRepository->builder();
        $builder->from('usuario u',true);
        $builder->select('m.id_modulo AS moduleId, m.nombre_modulo as ModuleName');
        $builder->join('usuario_permiso_menu upm', 'u.id_usuario = upm.id_usuario');
        $builder->join('modulo m', 'upm.id_modulo = m.id_modulo');
        $builder->where('u.id_usuario', $userId);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function findUserByUsername(string $username): ?User
    {
        return $this->userRepository->where('nombre_usuario', $username)->first();
    }

}