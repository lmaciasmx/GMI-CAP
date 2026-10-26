
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
        url: '<?= base_url('TiempoExtra/reportes/obtenerReporte2') ?>',
        type: 'POST',
        dataType: 'json',
        data: {
            Anio: $('#Anio').val()
        },
        beforeSend: function()
        {
            $('#tblTiempoExtra tbody').html(
                '<tr><td colspan="10" class="text-center">Consultando...</td></tr>'
            );
        },
        success: function(response)
        {
            $('#tblTiempoExtra tbody').html(response);
			
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