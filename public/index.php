<?php

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'protected' . DIRECTORY_SEPARATOR . 'bootstrap.php';

use lib\App;

try {
    $app = new App();
    $app->run();
} catch (Exception $e) {
    echo 'Ошибка: ' . $e->getMessage();
}