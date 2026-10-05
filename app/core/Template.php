<?php
// Motor de plantillas mínimo: reemplaza {{variable}} y arma la página con un layout.
// Ajustar a la versión desarrollada en clase si difiere.
class Template
{
    public static function render(string $vista, array $datos = []): void
    {
        $datos += [
            "BASE_URL" => BASE_URL,
            "API_URL" => API_URL,
            "APP_NAME" => APP_NAME,
        ];

        $dir = __DIR__ . "/../views/";
        $contenido = self::reemplazar(file_get_contents($dir . $vista . ".html"), $datos);

        $datos["CONTENIDO"] = $contenido;
        echo self::reemplazar(file_get_contents($dir . "layout.html"), $datos, false);
    }

    private static function reemplazar(string $html, array $datos, bool $escapar = true): string
    {
        return preg_replace_callback("/\{\{\s*(\w+)\s*\}\}/", function ($m) use ($datos, $escapar) {
            $valor = $datos[$m[1]] ?? "";
            return $escapar ? htmlspecialchars((string)$valor, ENT_QUOTES, "UTF-8") : (string)$valor;
        }, $html);
    }
}
