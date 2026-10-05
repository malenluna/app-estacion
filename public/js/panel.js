// Carga las estaciones desde la API y clona el <template> por cada una.
async function cargarEstaciones() {
  const estado = document.getElementById("estado");
  const lista = document.getElementById("lista");
  const plantilla = document.getElementById("tpl-estacion");

  try {
    const respuesta = await fetch(`${API_URL}?mode=list-stations`);
    if (!respuesta.ok) throw new Error(respuesta.status);
    const estaciones = await respuesta.json();

    estado.hidden = true;

    estaciones.forEach((e) => {
      const nodo = plantilla.content.cloneNode(true);
      nodo.querySelector("a").href = `${BASE_URL}/detalle/${e.chipid}`;
      nodo.querySelector(".tarjeta-apodo").textContent = e.apodo;
      nodo.querySelector(".tarjeta-ubicacion").textContent = e.ubicacion;
      nodo.querySelector(".tarjeta-visitas").textContent = `${e.visitas} visitas`;
      if (Number(e.dias_inactivo) > 30) {
        nodo.querySelector("a").classList.add("inactiva");
      }
      lista.appendChild(nodo);
    });
  } catch (error) {
    estado.textContent = "No se pudieron cargar las estaciones. Probá de nuevo en unos minutos.";
  }
}

cargarEstaciones();
