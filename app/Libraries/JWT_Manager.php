<?php

namespace App\Libraries;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWT_Manager
{
    private $key;
    public function __construct($key)
    {
        $this->key = $key;
    }
    //extraer token
    public function extraerToken($header)
    {
        if (empty($header)) {
            throw new \Exception("Token no proporcionado");
        }
        return str_replace('Bearer ', '', $header);
    }

    //funcion para validar el token
    public function validateToken($token)
    {
        try {
            $decodedToken = JWT::decode($token, new Key($this->key, 'HS256'));

            return $decodedToken;
        } catch (\Firebase\JWT\ExpiredException $exp) {
            throw new \Exception("El token ha expirado");
        } catch (\Exception $ex) {
            throw new \Exception("Token invalido o mal formado");
        }
    }

    //funcion para generar token
    function generarToken($usuario)
    {
        $fechaEmitidaToken = time();
        $tiempoVidaToken = getenv('JWT_TIME_TO_LIVE');
        $expiracionToken = $fechaEmitidaToken + $tiempoVidaToken;
        $payload = [
            'sub' => $usuario['id_usuario'],
            'iat' => $fechaEmitidaToken,
            'exp' => $expiracionToken,
            'data' => $usuario
        ];

        $jwt = JWT::encode($payload, $this->key, 'HS256');

        return $jwt;
    }
}
