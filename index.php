<?php
// Router: único punto de entrada de la aplicación.
require_once __DIR__ . "/env.php";
require_once __DIR__ . "/app/core/Template.php";
require_once __DIR__ . "/app/controllers/EstacionController.php";

// Ruta solicitada, sin la carpeta base ni parámetros.
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = substr($path, strlen(BASE_URL));
$partes = array_values(array_filter(explode("/", trim($path, "/")), "strlen"));

$accion = $partes[0] ?? "landing";
$parametro = $partes[1] ?? null;

$controlador = new EstacionController();

switch ($accion) {
    case "landing":
        $controlador->landing();
        break;
    case "panel":
        $controlador->panel();
        break;
    case "detalle":
        $controlador->detalle($parametro);
        break;
    default:
        http_response_code(404);
        $controlador->noEncontrado();
}
