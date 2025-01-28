<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Ensure the database file exists
$databasePath = env('DB_DATABASE');
if (!file_exists($databasePath)) {
    if (!is_dir(dirname($databasePath))) {
        mkdir(dirname($databasePath), 0755, true);
    }
    touch($databasePath);
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
