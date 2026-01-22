<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

try {
    new PDO($_ENV['DB_DSN'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    echo "✅ Database connection OK";
} catch (PDOException $e) {
    echo "❌ DB error: " . $e->getMessage();
}
