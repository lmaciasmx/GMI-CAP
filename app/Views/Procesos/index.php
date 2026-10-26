

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Reporte de Tiempo Extra</h5>
    </div>

    <div class="card-body">

	<div class="row">
		<div class="col-md-3">
			<label>Semana</label>
			<input type="text" id="fhSemana" class="form-control" readonly>
		</div>

		<div class="col-md-6">
			<label>Rango seleccionado</label>
			<input type="text" id="rangoSemana" class="form-control" readonly>
		</div>
</div>

<input type="hidden" id="fechaInicio" name="fechaInicio">
<input type="hidden" id="fechaFin" name="fechaFin">

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

      <!--<button type="button"
                class="btn btn-danger"
                id="btnPDF">
            <i class="fas fa-file-pdf"></i> PDF
        </button>-->

    </div>

</div>

        <div class="table-responsive tabla-tiempo-extra" id="tblDiv">

            <table id="tblTiempoExtra"
                   class="table table-bordered table-striped table-hover table-sm w-100">

                <thead>

                    <tr class="table-secondary text-center">
                        <th rowspan="1">CONCEPTO</th>
                        <th rowspan="1">NUMERO EMPLEADO</th>
                        <th rowspan="1">CONSTANTE</th>
                        <th rowspan="1">HORAS</th>

                        <th colspan="1">CONSTANTE</th>

                        <th colspan="1">FECHA</th>

                        
                    </tr>

                    

                </thead>

                <tbody>
                </tbody>

				   

            </table>

        </div>

    </div>
</div>

<script>
$(document).ready(function(){
	flatpickr("#fhSemana", {

    locale: "es",

    dateFormat: "Y-m-d",

    disable: [
        function(date) {
            // Deshabilita todo excepto lunes
            return date.getDay() !== 1;
        }
    ],

    onChange: function(selectedDates, dateStr) {

        if (!selectedDates.length) {
            return;
        }

        let inicio = selectedDates[0];

        let fin = new Date(inicio);
        fin.setDate(fin.getDate() + 6);

        function formatDate(fecha) {

            let y = fecha.getFullYear();
            let m = String(fecha.getMonth() + 1).padStart(2, '0');
            let d = String(fecha.getDate()).padStart(2, '0');

            return `${y}-${m}-${d}`;
        }

        $('#fechaInicio').val(
            formatDate(inicio)
        );

        $('#fechaFin').val(
            formatDate(fin)
        );

        $('#rangoSemana').val(
            formatDate(inicio) + ' al ' + formatDate(fin)
        );
    }
});
	
	$('#btnExcel').click(function(){

		let parametros = $.param({
			 fhSemana: $('#fhSemana').val()
		});

		window.open(
			'<?= base_url('Procesos/inicio/exportarExcel') ?>?' + parametros,
			'_blank'
		);

	});
	
});

function buscar(){
	$.ajax({
        url: '<?= base_url('Procesos/inicio/obtenerReporte') ?>',
        type: 'POST',
        dataType: 'json',
        data: {
            fhSemana: $('#fhSemana').val()
        },
        beforeSend: function()
        {
            $('#tblTiempoExtra tbody').html(
                '<tr><td colspan="6" class="text-center">Consultando...</td></tr>'
            );
        },
        success: function(response)
        {
            let html = '';
		
            if(response.data.length === 0)
            {
                html = `
                    <tr>
                        <td colspan="6" class="text-center">
                            No se encontraron registros
                        </td>
                    </tr>
                `;
            }
            else
            {
                $.each(response.data, function(i,row){
                    html += `
						<tr>

							<td>${row.Concepto}</td>

							<td>${row.NumeroEmpleado}</td>

							<td class="text-end">
								${parseFloat(row.Valor)}
							</td>

							<td class="text-end">
								${parseFloat(row.Horas).toFixed(1)}
							</td>

							<td>${row.Observaciones}</td>

							<td>${formatoFecha(row.Fecha)}</td>

						</tr>
					`;
                });
					
            }

            $('#tblTiempoExtra tbody').html(html);
			
        }
    });
}
function formatoFecha(fecha) {

    let partes = fecha.split('-');

    return partes[2] + '/' + partes[1] + '/' + partes[0];
}
</script>