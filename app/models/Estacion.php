<?php
// Modelo: acceso a la API de estaciones desde el servidor.
class Estacion
{
    public static function todas(): array
    {
        $json = @file_get_contents(API_URL . "?mode=list-stations");
        $datos = json_decode($json ?: "[]", true);
        return is_array($datos) ? $datos : [];
    }

    public static function porChipid(string $chipid): ?array
    {
        foreach (self::todas() as $e) {
            if ($e["chipid"] === $chipid) {
                return $e;
            }
        }
        return null;
    }
}
