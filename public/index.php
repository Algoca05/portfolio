<?php

use Illuminate\Http\Request;
use Dotenv\Dotenv;

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

// Ensure the database file exists and has the correct permissions
$databasePath = env('DB_DATABASE');
$tmpDatabasePath = '/tmp/' . basename($databasePath);

if (!file_exists($tmpDatabasePath)) {
    if (!is_dir(dirname($tmpDatabasePath))) {
        mkdir(dirname($tmpDatabasePath), 0755, true);
    }
    touch($tmpDatabasePath);
    chmod($tmpDatabasePath, 0666);
} else {
    chmod($tmpDatabasePath, 0666);
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
);

$response->send();

$kernel->terminate($request, $response);