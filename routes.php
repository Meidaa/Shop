<?php
require_once "config/Database.php";
require_once "controllers/ProductController.php";

$database = Database::getInstance()->getConnection();
$controller = new ProductController($database);

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'list':
        $controller->list();
        break;
    case 'add':
        $controller->create(json_decode(file_get_contents("php://input"), true));

        break;
    case 'update':
        $controller->update($_POST);
        break;
    case 'delete':
        $controller->delete($_POST);
        break;
    default:
        echo json_encode(["message" => "Invalid request"]);
}
?>
