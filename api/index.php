<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

require_once '../db/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'create.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once 'read.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    require_once 'update.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    require_once 'delete.php';
}
?>