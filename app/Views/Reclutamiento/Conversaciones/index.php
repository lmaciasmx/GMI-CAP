<style>
.conversaciones-wrapper{
	padding:20px;
}

.conversaciones-header{
	display:flex;
	align-items:center;
	justify-content:space-between;
	margin-bottom:20px;
}

.conversaciones-title{
	font-size:22px;
	font-weight:700;
	color:#243447;
}

.conversaciones-subtitle{
	font-size:13px;
	color:#7b8794;
	margin-top:3px;
}

.conversaciones-panel{
	background:#fff;
	border:1px solid #e6e9ed;
	border-radius:10px;
	overflow:hidden;
}

.conversaciones-filtros{
	display:flex;
	gap:10px;
	padding:15px;
	border-bottom:1px solid #edf0f2;
}

.conversaciones-filtros input{
	height:38px;
	border:1px solid #dce1e6;
	border-radius:6px;
	padding:0 12px;
	font-size:13px;
}

#filtroBuscar{
	flex:1;
}

.conversaciones-tabla{
	width:100%;
	border-collapse:collapse;
}

.conversaciones-tabla th{
	padding:12px 14px;
	background:#f7f9fb;
	text-align:left;
	font-size:12px;
	font-weight:600;
	color:#64748b;
	border-bottom:1px solid #e6e9ed;
}

.conversaciones-tabla td{
	padding:13px 14px;
	font-size:13px;
	color:#334155;
	border-bottom:1px solid #edf0f2;
	vertical-align:middle;
}

.conversacion-preview{
	max-width:360px;
	white-space:nowrap;
	overflow:hidden;
	text-overflow:ellipsis;
}

.conversacion-session{
	font-family:monospace;
	font-size:11px;
	color:#64748b;
}

.conversacion-total{
	display:inline-flex;
	align-items:center;
	gap:5px;
	padding:4px 8px;
	background:#f1f5f9;
	border-radius:5px;
	font-size:11px;
	font-weight:600;
}

.btn-conversacion{
	width:34px;
	height:34px;
	border:1px solid #dbe2e8;
	background:#fff;
	border-radius:6px;
	display:inline-flex;
	align-items:center;
	justify-content:center;
	cursor:pointer;
}

.btn-conversacion:hover{
	background:#f6f8fa;
}

.conversaciones-vacio{
	padding:30px;
	text-align:center;
	color:#88939f;
}

.chat-modal-body{
	max-height:65vh;
	overflow-y:auto;
	padding:20px;
	background:#f6f8fa;
}

.chat-msg{
	display:flex;
	margin-bottom:13px;
}

.chat-msg.user{
	justify-content:flex-end;
}

.chat-msg.assistant{
	justify-content:flex-start;
}

.chat-bubble{
	max-width:75%;
	padding:10px 13px;
	border-radius:10px;
	font-size:13px;
	line-height:1.45;
	white-space:pre-wrap;
}

.chat-msg.user .chat-bubble{
	background:#2563eb;
	color:#fff;
	border-bottom-right-radius:3px;
}

.chat-msg.assistant .chat-bubble{
	background:#fff;
	border:1px solid #e3e7eb;
	color:#334155;
	border-bottom-left-radius:3px;
}

.chat-fecha{
	font-size:10px;
	opacity:.65;
	margin-top:5px;
}
</style>

<div class="conversaciones-wrapper">

	<div class="conversaciones-header">
		<div>
			<div class="conversaciones-title">
				Conversaciones
			</div>

			<div class="conversaciones-subtitle">
				Consultas realizadas en el asistente que no generaron una postulación.
			</div>
		</div>
	</div>

	<div class="conversaciones-panel">

		<div class="conversaciones-filtros">

			<input
				type="text"
				id="filtroBuscar"
				placeholder="Buscar por mensaje o sesión"
			>

			<input
				type="date"
				id="filtroFecha"
			>

		</div>

		<div style="overflow-x:auto;">

			<table class="conversaciones-tabla">

				<thead>
					<tr>
						<th>Inicio</th>
						<th>Conversación</th>
						<th>Último mensaje</th>
						<th>Mensajes</th>
						<th>Última actividad</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<tbody id="tablaConversaciones">
					<tr>
						<td colspan="6">
							<div class="conversaciones-vacio">
								Cargando conversaciones...
							</div>
						</td>
					</tr>
				</tbody>

			</table>

		</div>

	</div>

</div>

<div
	class="modal fade"
	id="ModalConversacionGeneral"
	tabindex="-1"
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-conversacion-solicitud">

		<div class="modal-content">

			<div class="modal-header conversacion-modal-header">

				<div>
					<h5 class="modal-title mb-1">
						Conversación
					</h5>

					<div class="conversacion-modal-subtitulo">
						Historial completo de la conversación
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
				id="ContenidoConversacionGeneral">
			</div>

			<div class="modal-footer">
				<button
					type="button"
					class="btn btn-light"
					data-bs-dismiss="modal">
					Cerrar
				</button>
			</div>

		</div>

	</div>
</div>


<script>

$(document).ready(function(){

	cargarConversaciones();

	$("#filtroBuscar").on("keyup",function(){
		cargarConversaciones();
	});

	$("#filtroFecha").on("change",function(){
		cargarConversaciones();
	});

});


function cargarConversaciones(){

	$.getJSON(
		"<?= base_url('Reclutamiento/Conversaciones/listar') ?>",
		{
			buscar:$("#filtroBuscar").val(),
			fecha:$("#filtroFecha").val()
		},
		function(resp){

			if(resp.estado !== "success"){
				return;
			}

			renderConversaciones(resp.datos || []);
		}
	);
}


function renderConversaciones(datos){

	let html = "";

	if(!Array.isArray(datos) || datos.length === 0){

		$("#tablaConversaciones").html(`
			<tr>
				<td colspan="6">
					<div class="conversaciones-vacio">
						No se encontraron conversaciones sin postulación.
					</div>
				</td>
			</tr>
		`);

		return;
	}

	datos.forEach(function(item){

		html += `
			<tr>

				<td>
					${formatearFecha(item.fecha_inicio)}
					<div class="conversacion-session">
						${escapeHtml(item.session_id)}
					</div>
				</td>

				<td>
					<div class="conversacion-preview">
						${escapeHtml(item.primer_mensaje || "")}
					</div>
				</td>

				<td>
					<div class="conversacion-preview">
						${escapeHtml(item.ultimo_mensaje || "")}
					</div>
				</td>

				<td>
					<span class="conversacion-total">
						<i class="ph-duotone ph-chats"></i>
						${item.total_mensajes || 0}
					</span>
				</td>

				<td>
					${formatearFecha(item.ultima_actividad)}
				</td>

				<td>
					<button
						type="button"
						class="btn-conversacion"
						onclick="verConversacion('${item.session_id}')"
						title="Ver conversación"
					>
						<i class="ph-duotone ph-chat-circle-text"></i>
					</button>
				</td>

			</tr>
		`;
	});

	$("#tablaConversaciones").html(html);
}


$(document).on("click",".btnVerConversacion",function(){

	const sessionId = $(this).data("session");

	$("#contenidoConversacion").html(`
		<div class="conversaciones-vacio">
			Cargando conversación...
		</div>
	`);

	$.getJSON(
		"<?= base_url('Reclutamiento/Conversaciones/detalle') ?>",
		{
			session_id:sessionId
		},
		function(resp){

			if(resp.estado !== "success"){
				return;
			}

			renderDetalleConversacion(
				resp.resumen || {},
				resp.mensajes || []
			);
		}
	);

	const modal = new bootstrap.Modal(
		document.getElementById("ModalConversacionGeneral")
	);

	modal.show();
});


function verConversacion(sessionId){

	if(!sessionId){
		return;
	}

	$("#ContenidoConversacionGeneral").html(`
		<div class="conversacion-cargando">
			<div class="spinner-border spinner-border-sm" role="status"></div>
			<span>Cargando conversación...</span>
		</div>
	`);

	$("#ModalConversacionGeneral").modal("show");

	$.ajax({
		type:"POST",
		url:"<?= base_url('Reclutamiento/Conversaciones/detalle') ?>",
		data:{
			session_id:sessionId
		},
		dataType:"json",

		success:function(response){

			if(response.estado){

				$("#ContenidoConversacionGeneral")
					.html(response.html)
					.scrollTop(0);

				return;
			}

			$("#ContenidoConversacionGeneral").html(`
				<div class="alert alert-warning mb-0">
					${response.mensaje ?? "No fue posible consultar la conversación."}
				</div>
			`);
		},

		error:function(){

			$("#ContenidoConversacionGeneral").html(`
				<div class="alert alert-danger mb-0">
					Ocurrió un error al consultar la conversación.
				</div>
			`);
		}
	});
}


function formatearFecha(fecha){

	if(!fecha){
		return "";
	}

	const d = new Date(
		fecha.replace(" ","T")
	);

	return d.toLocaleString("es-MX",{
		day:"2-digit",
		month:"2-digit",
		year:"numeric",
		hour:"2-digit",
		minute:"2-digit"
	});
}


function escapeHtml(text){

	return $("<div>")
		.text(text || "")
		.html();
}

</script>