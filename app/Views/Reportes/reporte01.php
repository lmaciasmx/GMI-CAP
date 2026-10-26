
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
        <h5 class="mb-0">Reporte de Tiempo Extra</h5>
    </div>

    <div class="card-body">

	<div class="row mb-3">

		<div class="col-md-2">
			<label>Año</label>
			<select id="Anio" class="form-control">
				<option value="">Todos</option>
				<option value="2026">2026</option>
				<option value="2025">2025</option>
				<option value="2024">2024</option>
				
			</select>
		</div>

		<div class="col-md-3">
			<label>Mes</label>
			<select id="Mes" class="form-control">
				<option value="">Todos</option>
				<option value="1">Enero</option>
				<option value="2">Febrero</option>
				<option value="3">Marzo</option>
				<option value="4">Abril</option>
				<option value="5">Mayo</option>
				<option value="6">Junio</option>
				<option value="7">Julio</option>
				<option value="8">Agosto</option>
				<option value="9">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
			</select>
		</div>

		<div class="col-md-3">
			<label>Periodo</label>
			<select id="Periodo" name="Periodo" class="form-control">
				<option value="">Todos</option>

				<?php for($i = 1; $i <= 100; $i++): ?>
					<option value="<?= $i ?>">
						<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>
					</option>
				<?php endfor; ?>

			</select>
		</div>

		<div class="col-md-3">
			<label>Centro Costos</label>
			<select id="CentroCostos" class="form-control">
				<option value="">Todos</option>
				<?php foreach ($centroscostos as $key){?>
					<option value="<?php echo $key->CentrosCostos?>"><?php echo $key->CCOTexto?></option>
				<?php }?>
			</select>
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
                        <th rowspan="2">Empleado</th>
                        <th rowspan="2">Nombre Empleado</th>
                        <th rowspan="2">Centro de Costos</th>
                        <th rowspan="2">Empresa</th>

                        <th colspan="2">Tiempo Extra Doble</th>

                        <th colspan="2">Tiempo Extra Triple</th>

                        <th colspan="2">Total</th>
                    </tr>

                    <tr class="table-secondary text-center">
                        <th>Tiempo</th>
                        <th>Importe</th>

                        <th>Tiempo</th>
                        <th>Importe</th>

                        <th>Tiempo</th>
                        <th>Importe</th>
                    </tr>

                </thead>

                <tbody>
                </tbody>

				   <tfoot>

					<tr class="fw-bold table-warning">

						<td colspan="4" class="text-end">
							TOTALES:
						</td>

						<td id="TotalTiempoDoble" class="text-end">0.00</td>
						<td id="TotalImporteDoble" class="text-end">$0.00</td>

						<td id="TotalTiempoTriple" class="text-end">0.00</td>
						<td id="TotalImporteTriple" class="text-end">$0.00</td>

						<td id="TotalTiempoGeneral" class="text-end">0.00</td>
						<td id="TotalImporteGeneral" class="text-end">$0.00</td>

					</tr>

				</tfoot>

            </table>

        </div>

    </div>
</div>

<script>
$(document).ready(function(){
	$('#btnExcel').click(function(){

		let parametros = $.param({
			Anio: $('#Anio').val(),
			Mes: $('#Mes').val(),
			Periodo: $('#Periodo').val(),
			CentroCostos: $('#CentroCostos').val()
		});

		window.open(
			'<?= base_url('TiempoExtra/reportes/exportarExcel') ?>?' + parametros,
			'_blank'
		);

	});
});

function buscar(){
	$.ajax({
        url: '<?= base_url('TiempoExtra/reportes/obtenerReporte') ?>',
        type: 'POST',
        dataType: 'json',
        data: {
            Anio: $('#Anio').val(),
            Mes: $('#Mes').val(),
            Periodo: $('#Periodo').val(),
            CentroCostos: $('#CentroCostos').val()
        },
        beforeSend: function()
        {
            $('#tblTiempoExtra tbody').html(
                '<tr><td colspan="10" class="text-center">Consultando...</td></tr>'
            );
        },
        success: function(response)
        {
			let totalTiempoDoble = 0;
			let totalImporteDoble = 0;

			let totalTiempoTriple = 0;
			let totalImporteTriple = 0;

			let totalTiempoGeneral = 0;
			let totalImporteGeneral = 0;
            let html = '';
		
            if(response.data.length === 0)
            {
                html = `
                    <tr>
                        <td colspan="10" class="text-center">
                            No se encontraron registros
                        </td>
                    </tr>
                `;
            }
            else
            {
                $.each(response.data, function(i,row){
					
					totalTiempoDoble += parseFloat(row.TiempoExtraDoble || 0);
					totalImporteDoble += parseFloat(row.ImporteDoble || 0);

					totalTiempoTriple += parseFloat(row.TiempoExtraTriple || 0);
					totalImporteTriple += parseFloat(row.ImporteTriple || 0);

					totalTiempoGeneral += parseFloat(row.TotalTiempo || 0);
					totalImporteGeneral += parseFloat(row.TotalImporte || 0);

                    html += `
                        <tr>

                            <td>${row.Empleado}</td>

                            <td>${row.NombreEmpleado}</td>

                            <td>${row.CCOTexto}</td>

                            <td>${row.Empresa}</td>

                            <td class="text-end">
                                ${parseFloat(row.TiempoExtraDoble).toFixed(2)}
                            </td>

                            <td class="text-end">
                                ${formatoMoneda(row.ImporteDoble)}
                            </td>

                            <td class="text-end">
                                ${parseFloat(row.TiempoExtraTriple).toFixed(2)}
                            </td>

                            <td class="text-end">
                                ${formatoMoneda(row.ImporteTriple)}
                            </td>

                            <td class="text-end">
                                ${parseFloat(row.TotalTiempo).toFixed(2)}
                            </td>

                            <td class="text-end">
                                ${formatoMoneda(row.TotalImporte)}
                            </td>

                        </tr>
                    `;
                });
					$('#TotalTiempoDoble').text(
						totalTiempoDoble.toFixed(2)
					);

					$('#TotalImporteDoble').text(
						formatoMoneda(totalImporteDoble)
					);

					$('#TotalTiempoTriple').text(
						totalTiempoTriple.toFixed(2)
					);

					$('#TotalImporteTriple').text(
						formatoMoneda(totalImporteTriple)
					);

					$('#TotalTiempoGeneral').text(
						totalTiempoGeneral.toFixed(2)
					);

					$('#TotalImporteGeneral').text(
						formatoMoneda(totalImporteGeneral)
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