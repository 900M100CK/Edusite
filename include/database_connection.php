<?php

$options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
try {
    // Database connection parameters
    $host = 'localhost';
    $db = 'edusite';
    $user = 'root';
    $password = '';
    $charset = 'utf8mb4';

    // Set up the DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; 
    // Create a new PDO instance
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>