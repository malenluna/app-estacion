<?php
require_once __DIR__ . "/../models/Estacion.php";

class EstacionController
{
    public function landing(): void
    {
        Template::render("landing", ["TITULO" => "Inicio"]);
    }

    public function panel(): void
    {
        Template::render("panel", ["TITULO" => "Panel"]);
    }

    public function detalle(?string $chipid): void
    {
        $estacion = $chipid ? Estacion::porChipid($chipid) : null;

        if (!$estacion) {
            http_response_code(404);
            $this->noEncontrado();
            return;
        }

        Template::render("detalle", [
            "TITULO" => $estacion["apodo"],
            "CHIPID" => $estacion["chipid"],
            "APODO" => $estacion["apodo"],
            "UBICACION" => $estacion["ubicacion"],
        ]);
    }

    public function noEncontrado(): void
    {
        Template::render("404", ["TITULO" => "No encontrado"]);
    }
}
