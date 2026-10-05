# app-estacion

Réplica de la app de estaciones meteorológicas de mattprofe.com.ar, hecha con PHP (MVC), un motor de plantillas propio y JavaScript.

## Estructura

- `index.php`: router.
- `env.php`: constantes (no se sube a git).
- `app/controllers`, `app/models`, `app/views`, `app/core`: MVC y motor de plantillas.
- `public/`: CSS y JavaScript.

## Rutas

- `/`: landing
- `/panel`: lista de estaciones (JS con fetch)
- `/detalle/Z`: detalle de la estación con chipid `Z`

## API usada

`GET https://mattprofe.com.ar/proyectos/app-estacion/datos.php?mode=list-stations`

Devuelve un arreglo JSON con `chipid`, `ubicacion`, `apodo`, `visitas` y `dias_inactivo`.
