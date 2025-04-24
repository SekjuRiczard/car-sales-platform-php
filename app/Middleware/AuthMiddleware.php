<?php
namespace App\Middleware;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class AuthMiddleware{

    public function handle(){
        if (empty($_COOKIE['auth_token'])) {
            throw new Exception("Missing auth token");
        }

        $jwt       = $_COOKIE['auth_token'];
        $secretKey = $_ENV['JWT_SECRET'];

        try {
            return JWT::decode($jwt, new Key($secretKey, 'HS256'));
        } catch (Exception $e) {
            throw new Exception("Invalid or expired token");
        }
    }

}