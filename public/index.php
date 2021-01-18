<?php

session_start();
require __DIR__.'/../vendor/autoload.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=storage",'root','');
}
catch (Exception $e) {
    die($e->getMessage());
}

$store = new App\Storage\FileStorage();
$store->set('name', 'Clement');
$store->set('age', 33);
echo $store->get('name');
$store->delete('name');
$store->destroy();
print_r($store->all());
