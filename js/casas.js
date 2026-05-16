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
            // console.log("Que tiene este response:", response);
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


/**Funcion de registrar casa */

function registrarCasa() {
    const formulario = document.getElementById('frmRegistrarCasa');

    if (!formulario.checkValidity()) {
        formulario.reportValidity();
        return;
    }

    /**Recolectamos los datos que vienen en los imputs que rellena el usuario y los que 
     * y son los que pasaran al controller y del controller al modelo para hacer la insersion a la bd
     */

    let casas = {
        opcion: 'insertar-casa',
        nombre: document.getElementById('nombre_casa').value,
        propietario: document.getElementById('propietario').value,
        telefono: document.getElementById('telefono').value,
        ubicacion: document.getElementById('ubicacion').value,
        capacidad: document.getElementById('capacidad').value,
        colchonetas: document.getElementById('colchonetas').value,
        preferencia: document.getElementById('id_preferencia').value,
        transporte: document.getElementById('transporte').value,
        observaciones: document.getElementById('observaciones').value
    };

    //Peticion ajax
    $.ajax({
        url: '/ROSARIO/controllers/controllerCasa.php',
        type: 'POST',
        data: casas,
        dataType: 'json',
        success: function(response) {
            //  console.log("Que esta devolviendo el server:", response);  
            if (response.status == "success") {
                Swal.fire({
                    title: response.mensaje,
                    icon: "success",
                    timer: 1500,
                    showConfirmButton: false
                });
                formulario.reset();

                if (typeof tabalaControlCasas !== 'undefined') {
                    tabalaControlCasas.ajax.reload(null, false);
                }

            } else {
                Swal.fire({
                    icon: "error",
                    title: "error",
                    text: response.mensaje
                });

            }
        },
        error: function() {
            Swal.fire({
                icon: "error",
                title: "Error de conexión",
                text: "No se pudo conectar al servidor"
            });
        }
    });



}