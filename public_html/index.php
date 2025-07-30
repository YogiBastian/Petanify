<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Autoload & Bootstrap Laravel
require __DIR__.'/../web_petanify/vendor/autoload.php';
$app = require_once __DIR__.'/../web_petanify/bootstrap/app.php';

$app->handleRequest(Request::capture());
