$(document).ready(function() {

    var fechaFin = document.getElementById('fechaFin');
    fechaFin.min = '2023-11-01';
    $('#fechaFin').change(function(){
        // fechaFin.addEventListener('change', function(event) {

        var fechaInicio =  document.getElementById('fechaInicio').value;
        var fechaSeleccionada = event.target.value;
        if(fechaInicio !== "") {
            $.ajax({
                url: '/mostrarEstadisticas',
                method: 'POST',
                data: {
                    fechaInicio: fechaInicio,
                    fechaFin: fechaSeleccionada,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function(res){
                let informacion = JSON.parse(res);
                var sinAsignar = informacion.totalRegistros - informacion.respondida - informacion.asignada;

                document.getElementById('anonimas').innerHTML = informacion.solicitudesAnonimas;
                document.getElementById('natural').innerHTML = informacion.solicitudesNatural;
                document.getElementById('juridica').innerHTML = informacion.solicitudesJuridica;
                document.getElementById('total').innerHTML = informacion.totalRegistros;
                document.getElementById('peticiones').innerHTML = informacion.peticiones;
                document.getElementById('quejas').innerHTML = informacion.quejas;
                document.getElementById('reclamos').innerHTML = informacion.reclamos;
                document.getElementById('sugerencias').innerHTML = informacion.sugerencias;
                document.getElementById('felicitaciones').innerHTML = informacion.felicitaciones;
                document.getElementById('estudiante').innerHTML = informacion.estudiante;
                document.getElementById('egresado').innerHTML = informacion.egresado;
                document.getElementById('acudiente').innerHTML = informacion.acudiente;
                document.getElementById('administrativo').innerHTML = informacion.administrativo;
                document.getElementById('otro').innerHTML = informacion.otro;
                document.getElementById('recibidas').innerHTML = informacion.totalRegistros;
                document.getElementById('asignada').innerHTML = informacion.asignada;
                document.getElementById('sinAsignar').innerHTML = sinAsignar;
                document.getElementById('respondida').innerHTML = informacion.respondida;
            });
        }

    });

});


$(document).ready(function() {
    var fechaActual = new Date();
    var fechaActualFormateada = fechaActual.toISOString().split('T')[0];
    var fechaInicio = document.getElementById('fechaInicio');
    var fechaFin =  document.getElementById('fechaFin');
    fechaInicio.max = fechaActualFormateada;
    fechaFin.max = fechaActualFormateada;
    fechaInicio.addEventListener('change', function(event) {
        fechaFin.value = "";
        var fechaSeleccionada = event.target.value;
        fechaFin.min = fechaSeleccionada;
    });

});
