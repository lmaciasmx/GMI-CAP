
<style>
.tabla-tiempo-extra{
    max-height: 650px;
    overflow-y: auto;
    overflow-x: auto;
}

#tblTiempoExtra thead th{
    position: sticky;
    top: 0;
    z-index: 100;
    background: #e9ecef;
}

#tblTiempoExtra tfoot td{
    position: sticky;
    bottom: 0;
    z-index: 100;
    background: #fff3cd;
    font-weight: bold;
}
#tblTiempoExtra thead tr:nth-child(2) th{
    top: 40px;
}
</style>
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Reporte de Tiempo Extra Semanal</h5>
    </div>

    <div class="card-body">

	<div class="row mb-3">

		<div class="col-md-2">
			<label>Semana</label>
			<input type="text" id="semana" class="form-control">
			<input type="hidden" id="FechaInicio">
			<input type="hidden" id="FechaFin">
		</div>


	

	</div>

<div class="row mb-3">

    <div class="col-md-12 text-end">

        <button onClick="buscar();" type="button"
                class="btn btn-primary"
                id="btnConsultar">
            <i class="fas fa-search"></i> Consultar
        </button>

        <button type="button"
                class="btn btn-success"
                id="btnExcel">
            <i class="fas fa-file-excel"></i> Excel
        </button>

    </div>

</div>

        <div class="table-responsive tabla-tiempo-extra" id="tblDiv">
			<table id="tblTiempoExtra"
       class="table table-bordered table-striped table-hover table-sm w-100">

    <thead>

        <!-- Fila 1 -->
        <tr class="table-secondary text-center">

            <th rowspan="2" id="thClaveEmpleado">Clave Empleado</th>
            <th rowspan="2" id="thNombreEmpleado">Nombre Empleado</th>
            <th rowspan="2" id="thHoraEntrada">Hora Entrada</th>
            <th rowspan="2" id="thHoraSalida">Hora Salida</th>
            <th rowspan="2" id="thTotalHoras">Total Horas</th>

            <th id="thLunesDia">Lunes</th>
            <th id="thMartesDia">Martes</th>
            <th id="thMiercolesDia">Miércoles</th>
            <th id="thJuevesDia">Jueves</th>
            <th id="thViernesDia">Viernes</th>
            <th id="thSabadoDia">Sábado</th>
            <th id="thDomingoDia">Domingo</th>

            <th rowspan="2" id="thCentroCostos">Centro de Costos</th>
            <th rowspan="2" id="thTipoTrabajo">Tipo de Trabajo</th>

        </tr>

        <!-- Fila 2 -->
        <tr class="table-secondary text-center">

            <th id="thLunesFecha">2026-06-15</th>
            <th id="thMartesFecha">2026-06-16</th>
            <th id="thMiercolesFecha">2026-06-17</th>
            <th id="thJuevesFecha">2026-06-18</th>
            <th id="thViernesFecha">2026-06-19</th>
            <th id="thSabadoFecha">2026-06-20</th>
            <th id="thDomingoFecha">2026-06-21</th>

        </tr>

    </thead>

    <tbody>

        
    </tbody>

    <tfoot>

        <tr class="table-warning fw-bold">

            <td colspan="4" class="text-end">
                Total Horas:
            </td>

            <td id="TotalHorasSemana" class="text-center">
                0.00
            </td>

            <td colspan="9"></td>

        </tr>

    </tfoot>

</table>

        </div>

    </div>
</div>

<script>
$(document).ready(function(){
	
	 flatpickr("#semana", {

		dateFormat: "Y-m-d",

		// Solo permitir lunes
		enable: [
			function(date) {
				return date.getDay() === 1;
			}
		],

		onChange: function(selectedDates, dateStr, instance) {

			if (!selectedDates.length) return;

			let lunes = selectedDates[0];

			let domingo = new Date(lunes);
			domingo.setDate(lunes.getDate() + 6);

			$('#FechaInicio').val(formato(lunes));
			$('#FechaFin').val(formato(domingo));

			instance.input.value =
				formatoMX(lunes) +
				' al ' +
				formatoMX(domingo);
		}

	});
	$('#btnExcel').click(function(){

		let parametros = $.param({
			FechaInicio: $('#FechaInicio').val(),
            FechaFin: $('#FechaFin').val()
		});
		
		window.open(
			'<?= base_url('TiempoExtra/reportes/exportarExcel06') ?>?' + parametros,
			'_blank'
		);

	});

	function formato(fecha){
		return fecha.toISOString().split('T')[0];
	}

	function formatoMX(fecha){
		return ('0'+fecha.getDate()).slice(-2) + '/' +
			   ('0'+(fecha.getMonth()+1)).slice(-2) + '/' +
			   fecha.getFullYear();
	}
		
});
function llenarEncabezadoSemana()
{
    let fecha = $('#FechaInicio').val();

    if(!fecha)
    {
        return;
    }

    let lunes = new Date(fecha + 'T00:00:00');

    let dias = [
        'thLunesFecha',
        'thMartesFecha',
        'thMiercolesFecha',
        'thJuevesFecha',
        'thViernesFecha',
        'thSabadoFecha',
        'thDomingoFecha'
    ];

    dias.forEach(function(id, indice){

        let f = new Date(lunes);

        f.setDate(lunes.getDate() + indice);

        $('#' + id).text(formatoFecha(f));

    });
}

function formatoFecha(fecha)
{
    let dia = ('0' + fecha.getDate()).slice(-2);
    let mes = ('0' + (fecha.getMonth() + 1)).slice(-2);
    let anio = fecha.getFullYear();

    return dia + '/' + mes + '/' + anio;
}
function buscar()
{
	llenarEncabezadoSemana();
    $.ajax({
        url: '<?= base_url('TiempoExtra/reportes/obtenerReporte06') ?>',
        type: 'POST',
        dataType: 'json',
        data: {
            FechaInicio: $('#FechaInicio').val(),
            FechaFin: $('#FechaFin').val()
        },

        beforeSend: function()
        {
            $('#tblTiempoExtra tbody').html(
                '<tr><td colspan="14" class="text-center">Consultando...</td></tr>'
            );
        },

        success: function(response)
        {
            let totalHorasSemana = 0;

            let html = '';

            if(response.data.length === 0)
            {
                html = `
                    <tr>
                        <td colspan="14" class="text-center">
                            No se encontraron registros
                        </td>
                    </tr>
                `;

                $('#TotalHorasSemana').text('0.00');
            }
            else
            {
                $.each(response.data, function(i,row){

                    totalHorasSemana += parseFloat(row.TotalHoras || 0);

					let lunes     = '';
					let martes    = '';
					let miercoles = '';
					let jueves    = '';
					let viernes   = '';
					let sabado    = '';
					let domingo   = '';

					let diaSemana = new Date(row.fhFecha + 'T00:00:00').getDay();

					switch(diaSemana)
					{
						case 1:
							lunes = row.TotalHoras;
							break;

						case 2:
							martes = row.TotalHoras;
							break;

						case 3:
							miercoles = row.TotalHoras;
							break;

						case 4:
							jueves = row.TotalHoras;
							break;

						case 5:
							viernes = row.TotalHoras;
							break;

						case 6:
							sabado = row.TotalHoras;
							break;

						case 0:
							domingo = row.TotalHoras;
							break;
					}

					html += `
						<tr>

							<td class="text-center">${row.NumeroEmpleado}</td>

							<td>${row.NombreEmpleado}</td>

							<td class="text-center">${row.Hora_Entrada}</td>

							<td class="text-center">${row.Hora_Salida}</td>

							<td class="text-center">
								${parseFloat(row.TotalHoras || 0).toFixed(2)}
							</td>

							<td class="text-center">${lunes}</td>
							<td class="text-center">${martes}</td>
							<td class="text-center">${miercoles}</td>
							<td class="text-center">${jueves}</td>
							<td class="text-center">${viernes}</td>
							<td class="text-center">${sabado}</td>
							<td class="text-center">${domingo}</td>

							<td class="text-center">${row.tCodCentroCostoDestino || ''}</td>

							<td>${row.tDescripcion || ''}</td>

						</tr>
					`;
                });

                $('#TotalHorasSemana').text(
                    totalHorasSemana.toFixed(2)
                );
            }

            $('#tblTiempoExtra tbody').html(html);
        }
    });
}
function formatoMoneda(valor)
{
    return Number(valor).toLocaleString(
        'es-MX',
        {
            style: 'currency',
            currency: 'MXN'
        }
    );
}
</script>