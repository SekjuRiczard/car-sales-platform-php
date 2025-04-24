<?php
require_once __DIR__ . '/vendor/autoload.php'; // JWT
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

header('Content-Type: application/json');

$headers = getallheaders();
$authHeader = $headers['Authorization'] ?? '';

if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Brak tokenu']);
    exit;
}

$jwt = str_replace('Bearer ', '', $authHeader);
$secretKey = $_ENV['JWT_SECRET'];

try {
    $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));

    // Token poprawny – możesz ustawić dane użytkownika
    $userId = $decoded->userId;
    $username = $decoded->username;
    // Możesz np. zapisać to do zmiennej globalnej lub przekazać do kontrolera

} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Token nieprawidłowy lub wygasł']);
    exit;
}

?>