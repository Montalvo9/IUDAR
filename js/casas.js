/**DATA TABLE*/
tabalaControlCasas = $("#tablaCasas").DataTable({
    language: {
        lengthMenu: "Mostrar MENU filas por página",
        zeroRecords: "No hay elementos que coincidan",
        info: "Mostrando página PAGE de PAGES",
        infoEmpty: "Mostrando 0 a 0 de 0 filas",
        infoFiltered: "(filtradas de MAX filas totales)",
        search: "Buscar:",
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior",
        },
    },
    pageLength: 10,
    responsive: true,
    processing: true,

    //ajax
    ajax: {
        url: '/ROSARIO/controllers/controllerCasa.php',
        type: 'POST',
        data: {
            opcion: 'lista-casas'
        }
    },

    //Mapeamos esos datos para mostrarlo en el DataTable
    columns: [
        { data: 'id' },
        { data: 'nombre_casa' },
        { data: 'propietario' },
        { data: 'telefono' },
        { data: 'ubicacion' },
        { data: 'capacidad' },
        { data: 'colchonetas' },
        { data: 'preferencia' },
        { data: 'transporte' },
        { data: 'observaciones' },
        { data: 'accion' }
    ]

});

/**Funcion que carga los datos de preferencia en el select de (preferencias) */
function cargarPreferencias() {
    $.post('/ROSARIO/controllers/controllerCasa.php', { opcion: 'obtener-preferencias' },
        function(response) {
            console.log("Que tiene este response:", response);
            let select = $('#id_preferencia');
            select.find('option:not(:first)').remove(); // elimina todas las opciones excepto la primera
            response.forEach(t => {
                select.append(`<option value="${t.id_preferencia}">${t.nombre}</option>`)
            });

        },
        'json'

    );
}
$(document).ready(function() {
    cargarPreferencias();
});