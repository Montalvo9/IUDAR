tablaControlAsistentes = $("#tablaAsistentes").DataTable({
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

    //peticion ajax
    ajax: {
        url: '/ROSARIO/controllers/controllerAsistentes.php',
        type: 'POST',
        data: {
            opcion: 'lista-asistencias'
        }
    },

    //Mapeamos los datos
    columns: [
        { data: 'id' },
        { data: 'nombre' },
        { data: 'sexo' },
        { data: 'edad' },
        { data: 'telefono' },
        { data: 'iglesia' },
        { data: 'observaciones' },
        { data: 'accion' },


    ]
});