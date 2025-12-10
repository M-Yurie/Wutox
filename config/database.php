<?php

if ($_SERVER['HTTP_HOST'] === 'localhost') {
    // ===== CONEXIUNE LOCALĂ =====
    $host = 'localhost';
    $db   = 'wutox';
    $user = 'root';
    $pass = '';
} else {
    // ===== CONEXIUNE INFINITYFREE =====
    $host = 'sql102.infinityfree.com';
    $db   = 'if0_40626467_wutox';
    $user = 'if0_40626467';
    $pass = 'PAROLA_DE_PROD';
}

$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
