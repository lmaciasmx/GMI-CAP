<style>

/* =========================================================
   LABEL ESTATUS POSTULACIÓN
   ========================================================= */

.badge-postulacion{
	
	align-items:center;
	justify-content:flex-start;
	gap:7px;

	min-width:145px;
	padding:7px 11px;

	/* Menos píldora, más label */
	border-radius:7px;

	font-size:11px;
	font-weight:600;
	line-height:1.2;
	white-space:nowrap;

	border:1px solid transparent;

	/* Un poco de profundidad sin parecer botón */
	box-shadow:0 1px 2px rgba(0,0,0,.025);

	letter-spacing:.1px;
}

.badge-postulacion i{
	font-size:14px;
}


/* =========================================
   EN PROCESO
   ========================================= */

.badge-postulacion.estado-en-proceso{
	background:#fff8e8;
	color:#b76e00;
	border-color:#f6e2ad;
}

.badge-postulacion.estado-en-proceso i{
	color:#e89b16;
}


/* =========================================
   CITA PROGRAMADA
   ========================================= */

.badge-postulacion.estado-cita-programada{
	background:#edf6ff;
	color:#1769a8;
	border-color:#d3e8fa;
}

.badge-postulacion.estado-cita-programada i{
	color:#268bd2;
}


/* =========================================
   PENDIENTE EVALUACIÓN
   ========================================= */

.badge-postulacion.estado-pendiente-evaluacion{
	background:#f5f0ff;
	color:#6848a5;
	border-color:#e5d9fa;
}

.badge-postulacion.estado-pendiente-evaluacion i{
	color:#8264bd;
}


/* =========================================
   FINALIZADO
   ========================================= */

.badge-postulacion.estado-finalizado{
	background:#edf8f1;
	color:#287648;
	border-color:#d2eadb;
}

.badge-postulacion.estado-finalizado i{
	color:#38945c;
}


/* =========================================
   FINALIZADO POR EDAD / RANGO
   ========================================= */

.badge-postulacion.estado-finalizado-edad{
	background:#f3f5f7;
	color:#5f6874;
	border-color:#e1e5e9;
}

.badge-postulacion.estado-finalizado-edad i{
	color:#7c8794;
}


/* =========================================
   CANCELADO
   ========================================= */

.badge-postulacion.estado-cancelado{
	background:#fff0f0;
	color:#b83a3a;
	border-color:#f5d3d3;
}

.badge-postulacion.estado-cancelado i{
	color:#d65252;
}


/* =========================================
   OTROS / SIN ESTATUS
   ========================================= */

.badge-postulacion.estado-default{
	background:#f4f6f8;
	color:#626c78;
	border-color:#e1e5e9;
}

.badge-postulacion.estado-default i{
	color:#85909d;
}
.modal-detalle-solicitud{
	max-width:1180px;
	width:calc(100% - 40px);
}

#ModalDetalleSolicitud .modal-content{
	border:0;
	border-radius:11px;
	overflow:hidden;

	box-shadow:
		0 18px 55px rgba(16,24,40,.18);
}

#ModalDetalleSolicitud .modal-header{
	padding:16px 22px;

	border-bottom:1px solid #e5e9ed;
}

#ModalDetalleSolicitud .modal-title{
	font-size:17px;
	font-weight:700;
	color:#202b3c;
}

#ModalDetalleSolicitud .modal-body{
	padding:16px 22px 20px;
	background:#fff;
}
/* Modal detalle */
#ModalDetalleSolicitud{
	z-index: 1055;
}

/* Modal conversación debe ir arriba */
#ModalConversacionSolicitud{
	z-index: 1080;
}

/* Backdrop de la modal conversación */
.modal-backdrop.backdrop-conversacion{
	z-index: 1075;
}
</style>

<div class="row">

	<div class="col-12">
		<div class="card">

			<div class="card-header">

				<div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

					<div>
						<h5 class="mb-1">Solicitudes de Reclutamiento</h5>
						<small class="text-muted">
							Consulta y seguimiento de postulaciones registradas desde el chatbot.
						</small>
					</div>

					<button
						type="button"
						class="btn btn-outline-secondary btn-sm"
						onclick="aplicarFiltrosSolicitudes();">
						<i class="ph-duotone ph-arrows-clockwise me-1"></i>
						Actualizar
					</button>

				</div>

			</div>

			<div class="card-body">

				<!-- ===================================================== -->
				<!-- INDICADORES -->
				<!-- ===================================================== -->

				<div class="row g-3 mb-4">

					<div class="col-xl-3 col-md-6">
						<div class="card border mb-0">
							<div class="card-body py-3">

								<div class="d-flex align-items-center justify-content-between">

									<div>
										<div class="text-muted small">
											Total solicitudes
										</div>

										<h4
											class="mb-0 mt-1"
											id="TotalSolicitudes">
											0
										</h4>
									</div>

									<div class="avtar avtar-s bg-light-primary">
										<i class="ph-duotone ph-files fs-4"></i>
									</div>

								</div>

							</div>
						</div>
					</div>


					<div class="col-xl-3 col-md-6">
						<div class="card border mb-0">
							<div class="card-body py-3">

								<div class="d-flex align-items-center justify-content-between">

									<div>
										<div class="text-muted small">
											En proceso
										</div>

										<h4
											class="mb-0 mt-1"
											id="SolicitudesProceso">
											0
										</h4>
									</div>

									<div class="avtar avtar-s bg-light-warning">
										<i class="ph-duotone ph-hourglass fs-4"></i>
									</div>

								</div>

							</div>
						</div>
					</div>


					<div class="col-xl-3 col-md-6">
						<div class="card border mb-0">
							<div class="card-body py-3">

								<div class="d-flex align-items-center justify-content-between">

									<div>
										<div class="text-muted small">
											Con cita
										</div>

										<h4
											class="mb-0 mt-1"
											id="SolicitudesCita">
											0
										</h4>
									</div>

									<div class="avtar avtar-s bg-light-success">
										<i class="ph-duotone ph-calendar-check fs-4"></i>
									</div>

								</div>

							</div>
						</div>
					</div>


					<div class="col-xl-3 col-md-6">
						<div class="card border mb-0">
							<div class="card-body py-3">

								<div class="d-flex align-items-center justify-content-between">

									<div>
										<div class="text-muted small">
											Reingresos
										</div>

										<h4
											class="mb-0 mt-1"
											id="SolicitudesReingreso">
											0
										</h4>
									</div>

									<div class="avtar avtar-s bg-light-info">
										<i class="ph-duotone ph-arrow-u-up-left fs-4"></i>
									</div>

								</div>

							</div>
						</div>
					</div>

				</div>


				<!-- ===================================================== -->
				<!-- FILTROS -->
				<!-- ===================================================== -->

				<div class="row g-3 mb-4">

					<div class="col-xl-4 col-md-6">
						<label class="form-label">
							Buscar
						</label>

						<div class="input-group">
							<span class="input-group-text">
								<i class="ph-duotone ph-magnifying-glass"></i>
							</span>

							<input
								type="text"
								id="FiltroBuscarSolicitud"
								class="form-control"
								placeholder="Nombre, teléfono o folio">
						</div>
					</div>


					<div class="col-xl-2 col-md-6">
						<label class="form-label">
							Estatus
						</label>

						<select
							id="FiltroEstadoSolicitud"
							class="form-select">

							<option value="">
								Todos
							</option>

							<?php foreach (($estatus ?? []) as $item) { ?>

								<option value="<?= esc($item['estado']) ?>">
									<?= esc(ucfirst(str_replace('_', ' ', $item['estado']))) ?>
								</option>

							<?php } ?>

						</select>
					</div>


					<div class="col-xl-2 col-md-6">
						<label class="form-label">
							Localidad
						</label>

						<select
							id="FiltroLocalidadSolicitud"
							class="form-select">

							<option value="">
								Todas
							</option>

							<?php foreach (($localidades ?? []) as $item) { ?>

								<option value="<?= esc($item['name']) ?>">
									<?= esc($item['name']) ?>
								</option>

							<?php } ?>

						</select>
					</div>


					<div class="col-xl-2 col-md-6">
						<label class="form-label">
							Desde
						</label>

						<input
							type="date"
							id="FiltroFechaDesde"
							class="form-control">
					</div>


					<div class="col-xl-2 col-md-6">
						<label class="form-label">
							Hasta
						</label>

						<input
							type="date"
							id="FiltroFechaHasta"
							class="form-control">
					</div>

				</div>


				<div class="d-flex justify-content-end gap-2 mb-4">

					<button
						type="button"
						class="btn btn-light"
						onclick="limpiarFiltrosSolicitudes();">

						<i class="ph-duotone ph-eraser me-1"></i>
						Limpiar

					</button>

					<button
						type="button"
						class="btn btn-primary"
						onclick="aplicarFiltrosSolicitudes();">

						<i class="ph-duotone ph-funnel me-1"></i>
						Aplicar filtros

					</button>

				</div>


				<!-- ===================================================== -->
				<!-- TABLA -->
				<!-- ===================================================== -->

				<div class="table-responsive">

					<table
						id="TablaSolicitudes"
						class="table table-hover align-middle"
						style="width:100%;">

						<thead>
							<tr>
								<th class="text-center">Acciones</th>
								<th class="text-center">Estatus</th>
								<th class="text-center">Folio</th>
								<th class="text-start">Candidato</th>
								<th class="text-center">Teléfono</th>
								<th class="text-start">Localidad</th>
								<th class="text-center">Cita</th>
								<th class="text-center">Registro</th>
							</tr>
						</thead>

						<tbody></tbody>

					</table>

				</div>

			</div>

		</div>
	</div>

</div>

<div
	class="modal fade"
	id="ModalDetalleSolicitud"
	tabindex="-1"
	aria-hidden="true"
>
	<div	class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-detalle-solicitud">

		<div class="modal-content">

			<div class="modal-header">

				<h5 class="modal-title">
					Detalle de solicitud
				</h5>

				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Cerrar"
				></button>

			</div>


			<div
				class="modal-body"
				id="ContenidoDetalleSolicitud"
			>
			</div>

		</div>

	</div>
</div>
<div
	class="modal fade"
	id="ModalConversacionSolicitud"
	tabindex="-1"
	aria-hidden="true"
>
	<div
		class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-conversacion-solicitud"
	>

		<div class="modal-content">

			<div class="modal-header conversacion-modal-header">

				<div>

					<h5 class="modal-title mb-1">
						Conversación
					</h5>

					<div class="conversacion-modal-subtitulo">
						Historial completo de la postulación
					</div>

				</div>


				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Cerrar"
				></button>

			</div>


			<div
				class="modal-body"
				id="ContenidoConversacionSolicitud"
			>
			</div>


			<div class="modal-footer">

				<button
					type="button"
					class="btn btn-light"
					data-bs-dismiss="modal"
				>
					Cerrar
				</button>

			</div>

		</div>

	</div>
</div>
<script>



$(function(){
	
	var timerBuscarSolicitud = null;

	$("#FiltroBuscarSolicitud")	.off("input.solicitudes").on("input.solicitudes", function(){

		clearTimeout(timerBuscarSolicitud);

		timerBuscarSolicitud = setTimeout(function(){

			if ($.fn.DataTable.isDataTable("#TablaSolicitudes")) {

				$("#TablaSolicitudes")
					.DataTable()
					.ajax
					.reload();
			}

		}, 450);

	});

	/*
	 * Como esta vista se carga dinámicamente por AJAX,
	 * puede ejecutarse más de una vez.
	 *
	 * Si DataTable ya existe, primero lo destruimos.
	 */
	if ($.fn.DataTable.isDataTable("#TablaSolicitudes")) {

		$("#TablaSolicitudes")
			.DataTable()
			.destroy();
	}


	$("#TablaSolicitudes").DataTable({

		processing: true,
		serverSide: true,

		pageLength: 25,
		searching: false,      // Quita el buscador de DataTables
		lengthChange: false,   // Quita selector de registros por página
		lengthMenu: [
			[10, 25, 50, 100],
			[10, 25, 50, 100]
		],

		order: [
			[7, "desc"]
		],

		ajax: {

			url: "<?php echo base_url()?>reclutamiento/solicitudes/listar",

			type: "POST",

			data: function(d){

				d.buscar =
					$("#FiltroBuscarSolicitud").val();

				d.estado =
					$("#FiltroEstadoSolicitud").val();

				d.localidad =
					$("#FiltroLocalidadSolicitud").val();

				d.fecha_desde =
					$("#FiltroFechaDesde").val();

				d.fecha_hasta =
					$("#FiltroFechaHasta").val();
			}
		},

		columns: [

			{
				data: "acciones",
				orderable: false,
				searchable: false
			},

			{
				data: "estado"
			},

			{
				data: "folio"
			},

			{
				data: "candidato"
			},

			{
				data: "telefono"
			},

			{
				data: "ubicacion"
			},

			{
				data: "cita"
			},

			{
				data: "created_at"
			}

		],
		columnDefs: [

			{
				targets: [0, 1, 2, 4, 6, 7],
				className: "text-center align-middle"
			},

			{
				targets: [3, 5],
				className: "text-start align-middle"
			},

			{
				targets: [0, 1, 2, 4, 6, 7],
				createdCell: function(td){
					$(td).css("white-space", "nowrap");
				}
			}

		],
		language: {

			processing: "Procesando...",
			search: "Buscar:",
			lengthMenu: "Mostrar _MENU_ registros",
			info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
			infoEmpty: "Mostrando 0 a 0 de 0 registros",
			infoFiltered: "(filtrado de _MAX_ registros)",
			zeroRecords: "No se encontraron registros",
			emptyTable: "No hay solicitudes registradas",

			paginate: {
				first: "Primero",
				previous: "Anterior",
				next: "Siguiente",
				last: "Último"
			}
		}

	});

	cargarResumenSolicitudes();

});



function limpiarFiltrosSolicitudes(){

	$("#FiltroEstadoSolicitud").val("");
	$("#FiltroLocalidadSolicitud").val("");
	$("#FiltroFechaDesde").val("");
	$("#FiltroFechaHasta").val("");

	if ($.fn.DataTable.isDataTable("#TablaSolicitudes")) {

		$("#TablaSolicitudes")
			.DataTable()
			.search("")
			.draw();
	}

	cargarResumenSolicitudes();
}

function aplicarFiltrosSolicitudes(){

	if ($.fn.DataTable.isDataTable("#TablaSolicitudes")) {

		$("#TablaSolicitudes")
			.DataTable()
			.ajax
			.reload();
	}

	cargarResumenSolicitudes();
}



function formatearFechaSolicitud(fecha){

	if(!fecha){
		return "-";
	}

	let partes = fecha.split("-");

	if(partes.length !== 3){
		return fecha;
	}

	return `${partes[2]}/${partes[1]}/${partes[0]}`;

}


function formatearHoraSolicitud(hora){

	if(!hora){
		return "";
	}

	let partes =
		hora.split(":");

	let h =
		parseInt(partes[0]);

	let m =
		partes[1];

	let periodo =
		h >= 12 ? "pm" : "am";

	let hora12 =
		h % 12;

	if(hora12 === 0){
		hora12 = 12;
	}

	return `${hora12}:${m} ${periodo}`;

}


function formatearFechaHoraSolicitud(fecha){

	if(!fecha){
		return "-";
	}

	let partes =
		fecha.split(" ");

	let fechaFormateada =
		formatearFechaSolicitud(
			partes[0]
		);

	if(partes.length < 2){
		return fechaFormateada;
	}

	return `
		${fechaFormateada}
		<br>
		<small class="text-muted">
			${formatearHoraSolicitud(partes[1])}
		</small>
	`;

}


function escaparHtml(valor){

	return $("<div>")
		.text(valor)
		.html();

}


function verSolicitud(id){

	console.log(
		"Ver solicitud:",
		id
	);

	/*
	 * En el siguiente paso abriremos
	 * el detalle completo de la solicitud.
	 */

}
function cargarResumenSolicitudes(){

	$.ajax({

		type: "POST",

		url: "<?php echo base_url()?>reclutamiento/solicitudes/resumen",

		dataType: "json",

		data: {

			estado:
				$("#FiltroEstadoSolicitud").val(),

			localidad:
				$("#FiltroLocalidadSolicitud").val(),

			fecha_desde:
				$("#FiltroFechaDesde").val(),

			fecha_hasta:
				$("#FiltroFechaHasta").val()

		},

		success: function(resp){

			if(!resp.success){
				return;
			}

			let datos =
				resp.datos || {};

			$("#TotalSolicitudes")
				.text(
					datos.total || 0
				);

			$("#SolicitudesProceso")
				.text(
					datos.en_proceso || 0
				);

			$("#SolicitudesCita")
				.text(
					datos.con_cita || 0
				);

			$("#SolicitudesReingreso")
				.text(
					datos.reingresos || 0
				);

		}

	});

}
function verSolicitud(id){

	$("#ContenidoDetalleSolicitud").html(`
		<div class="text-center py-5">
			<div class="spinner-border spinner-border-sm" role="status"></div>
			<div class="mt-2 text-muted">
				Cargando solicitud...
			</div>
		</div>
	`);

	$("#ModalDetalleSolicitud").modal("show");


	$.ajax({

		type: "POST",

		url:
			"<?php echo base_url()?>reclutamiento/solicitudes/detalle",

		data: {
			id: id
		},

		dataType: "json",

		success: function(response){

			if(response.estado){

				$("#ContenidoDetalleSolicitud")
					.html(response.html);

				return;
			}

			$("#ContenidoDetalleSolicitud").html(`
				<div class="alert alert-warning mb-0">
					${response.mensaje ?? "No fue posible consultar la solicitud."}
				</div>
			`);
		},

		error: function(){

			$("#ContenidoDetalleSolicitud").html(`
				<div class="alert alert-danger mb-0">
					Ocurrió un error al consultar la solicitud.
				</div>
			`);
		}

	});

}
$(document)
	.off(
		"click.detalleSolicitud",
		".expediente-tab"
	)
	.on(
		"click.detalleSolicitud",
		".expediente-tab",
		function(){

			const tab =
				$(this).data("tab");

			$(".expediente-tab")
				.removeClass("active");

			$(this)
				.addClass("active");


			$(".expediente-tab-content")
				.removeClass("active");

			$(
				'.expediente-tab-content[data-content="' +
				tab +
				'"]'
			)
				.addClass("active");
		}
	);
function verConversacionSolicitud(sessionId){

	if(!sessionId){
		return;
	}


	$("#ContenidoConversacionSolicitud").html(`
		<div class="conversacion-cargando">

			<div
				class="spinner-border spinner-border-sm"
				role="status"
			></div>

			<span>
				Cargando conversación...
			</span>

		</div>
	`);


	$("#ModalConversacionSolicitud")
		.modal("show");


	$.ajax({

		type: "POST",

		url:
			"<?php echo base_url()?>reclutamiento/solicitudes/conversacion",

		data: {
			session_id: sessionId
		},

		dataType: "json",


		success: function(response){

			if(response.estado){

				$("#ContenidoConversacionSolicitud")
					.html(
						response.html
					);

				/*
				 * Llevar automáticamente al inicio.
				 */
				$("#ContenidoConversacionSolicitud")
					.scrollTop(0);

				return;
			}


			$("#ContenidoConversacionSolicitud")
				.html(`
					<div class="alert alert-warning mb-0">
						${
							response.mensaje
							?? "No fue posible consultar la conversación."
						}
					</div>
				`);
		},


		error: function(){

			$("#ContenidoConversacionSolicitud")
				.html(`
					<div class="alert alert-danger mb-0">
						Ocurrió un error al consultar la conversación.
					</div>
				`);
		}

	});

}
$(document)
	.off(
		"shown.bs.modal.conversacion",
		"#ModalConversacionSolicitud"
	)
	.on(
		"shown.bs.modal.conversacion",
		"#ModalConversacionSolicitud",
		function(){

			$(".modal-backdrop")
				.last()
				.addClass("backdrop-conversacion");
		}
	);
$(document)
	.off(
		"hidden.bs.modal.conversacion",
		"#ModalConversacionSolicitud"
	)
	.on(
		"hidden.bs.modal.conversacion",
		"#ModalConversacionSolicitud",
		function(){

			$(".modal-backdrop")
				.removeClass("backdrop-conversacion");

			if (
				$("#ModalDetalleSolicitud")
					.hasClass("show")
			) {
				$("body")
					.addClass("modal-open");
			}
		}
	);
</script>