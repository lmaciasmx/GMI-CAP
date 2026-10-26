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
#modalExpediente{
	z-index:1080 !important;
}

.modal-backdrop.backdrop-expediente-candidato{
	z-index:1070 !important;
}


.candidatos-page{
	padding:24px;
}

.candidatos-header{
	display:flex;
	align-items:flex-start;
	justify-content:space-between;
	gap:20px;
	margin-bottom:20px;
}

.candidatos-header h2{
	margin:0;
	font-size:24px;
	font-weight:700;
	color:#243746;
}

.candidatos-header p{
	margin:5px 0 0;
	font-size:13px;
	color:#8a949f;
}

.candidatos-resumen{
	display:grid;
	grid-template-columns:repeat(5,minmax(0,1fr));
	gap:14px;
	margin-bottom:20px;
}

.candidato-kpi{
	background:#fff;
	border:1px solid #e3e8ed;
	border-radius:14px;
	padding:16px 18px;

	box-shadow:0 4px 14px rgba(16,24,40,.04);

	transition:
		transform .18s ease,
		box-shadow .18s ease,
		border-color .18s ease;
}

.candidato-kpi:hover{
	transform:translateY(-2px);
	box-shadow:0 8px 20px rgba(16,24,40,.08);
	border-color:#d5dde5;
}

.candidato-kpi-top{
	display:flex;
	align-items:center;
	justify-content:space-between;
	gap:10px;
	margin-bottom:10px;
}

.candidato-kpi-label{
	font-size:12px;
	font-weight:500;
	color:#7b8794;
}

.candidato-kpi-icon{
	width:36px;
	height:36px;

	display:flex;
	align-items:center;
	justify-content:center;

	flex-shrink:0;

	border-radius:10px;

	background:#f4f7fa;
	color:#527394;

	font-size:19px;
}

.candidato-kpi-valor{
	font-size:28px;
	font-weight:700;
	line-height:1;
	color:#243746;
}

.candidato-kpi-detalle{
	margin-top:7px;
	font-size:11px;
	color:#98a2ad;
}

/*
|--------------------------------------------------------------------------
| KPI que requiere atención
|--------------------------------------------------------------------------
*/
.candidato-kpi.kpi-alerta{
	border-color:#f2c9c9;
	background:#fffafa;
}

.candidato-kpi.kpi-alerta .candidato-kpi-icon{
	background:#fdecec;
	color:#b34e4e;
}

.candidato-kpi.kpi-alerta .candidato-kpi-valor{
	color:#a94444;
}

.candidato-kpi:hover{
	transform:translateY(-2px);
	box-shadow:0 8px 20px rgba(16,24,40,.08);
	border-color:#d5dde5;
}





.candidatos-layout{
	display:grid;
	grid-template-columns:300px minmax(0,1fr);
	gap:18px;
}

.candidatos-panel{
	background:#fff;
	border:1px solid #e3e8ed;
	border-radius:12px;
	overflow:hidden;
}

.candidatos-panel-header{
	padding:14px 16px;
	border-bottom:1px solid #e7ebef;
}

.candidatos-panel-title{
	font-size:14px;
	font-weight:600;
	color:#344054;
}

.candidatos-panel-subtitle{
	margin-top:2px;
	font-size:12px;
	color:#8b96a1;
}


.agenda-lista{
	padding:12px;
	max-height:620px;
	overflow-y:auto;
}

.agenda-item{
	position:relative;

	padding:13px 13px 13px 16px;

	border:1px solid #e5eaee;
	border-radius:12px;

	margin-bottom:10px;

	background:#fff;

	box-shadow:0 3px 10px rgba(16,24,40,.035);

	transition:
		transform .18s ease,
		box-shadow .18s ease,
		border-color .18s ease;
}

.agenda-item::before{
	content:"";

	position:absolute;

	left:0;
	top:12px;
	bottom:12px;

	width:3px;

	border-radius:0 4px 4px 0;

	background:#3778ba;
}

.agenda-item:hover{
	transform:translateX(2px);
	border-color:#d8e0e7;
	box-shadow:0 6px 16px rgba(16,24,40,.07);
}

.agenda-item:last-child{
	margin-bottom:0;
}

.agenda-item-superior{
	display:flex;
	align-items:center;
	justify-content:space-between;
	gap:8px;
	margin-bottom:7px;
}

.agenda-hora{
	display:flex;
	align-items:center;
	gap:5px;

	font-size:13px;
	font-weight:700;

	color:#3778ba;
}


.agenda-nombre{
	font-size:13px;
	font-weight:700;
	color:#344054;
	line-height:1.3;
}

.agenda-vacante{
	margin-top:4px;

	display:flex;
	align-items:center;
	gap:5px;

	font-size:11px;
	color:#697586;
}


.agenda-reclutador{
	display:flex;
	align-items:center;
	gap:5px;

	margin-top:7px;

	padding-top:7px;

	border-top:1px solid #f0f2f4;

	font-size:11px;
	color:#7b8794;
}

.agenda-reclutador i{
	font-size:14px;
	color:#697586;
}

.agenda-item:last-child{
	margin-bottom:0;
}



.candidatos-filtros{
	display:grid;
	grid-template-columns:
		minmax(220px,1.6fr)
		minmax(150px,1fr)
		minmax(150px,1fr)
		minmax(150px,1fr);

	gap:10px;
	padding:14px 16px;

	background:#fbfcfd;
	border-bottom:1px solid #e7ebef;
}

.candidatos-filtros input,
.candidatos-filtros select{
	width:100%;
	height:38px;

	padding:0 11px;

	border:1px solid #dfe5ea;
	border-radius:9px;

	background:#fff;

	font-size:12px;
	color:#4d5967;

	outline:none;

	transition:
		border-color .18s ease,
		box-shadow .18s ease;
}

.candidatos-filtros input:focus,
.candidatos-filtros select:focus{
	border-color:#8bb4dc;
	box-shadow:0 0 0 3px rgba(55,120,186,.08);
}

.candidatos-tabla-wrap{
	overflow-x:auto;
}

.candidatos-tabla{
	width:100%;
	border-collapse:collapse;
}

.candidatos-tabla th{
	padding:11px 13px;

	background:#f8fafb;

	border-bottom:1px solid #e5eaee;

	text-align:left;

	font-size:10px;
	font-weight:600;
	text-transform:uppercase;

	letter-spacing:.03em;

	color:#7c8793;
}

.candidatos-tabla td{
	padding:13px;

	border-bottom:1px solid #edf0f2;

	font-size:12px;
	color:#4f5c69;

	vertical-align:middle;
}

.candidatos-tabla tbody tr{
	transition:background .15s ease;
}

.candidatos-tabla tbody tr:hover{
	background:#fafcfe;
}

.candidatos-tabla tbody tr:last-child td{
	border-bottom:0;
}

.candidato-nombre{
	font-size:13px;
	font-weight:700;
	color:#2f3e4d;
}

.candidato-secundario{
	margin-top:3px;
	font-size:11px;
	color:#8a949f;
}

.candidato-badge{
	display:inline-flex;
	align-items:center;

	padding:4px 7px;

	border-radius:999px;

	font-size:10px;
	font-weight:600;
}

.badge-programada{
	background:#eef4fb;
	color:#4777a8;
}

.badge-confirmada{
	background:#eaf7ef;
	color:#34835a;
}

.badge-reagendada{
	background:#fff5df;
	color:#a87514;
}

.badge-presentado{
	background:#e8f7ee;
	color:#2f855a;
}

.badge-no-presentado{
	background:#fdecec;
	color:#b34e4e;
}

.badge-revision{
	background:#fff0e5;
	color:#b76832;
}

.candidato-acciones{
	display:flex;
	align-items:center;
	gap:5px;
}

.candidato-btn{
	width:32px;
	height:32px;

	display:flex;
	align-items:center;
	justify-content:center;

	border-radius:8px;

	font-size:16px;
	cursor:pointer;

	transition:
		transform .15s ease,
		box-shadow .15s ease;
}

.candidato-btn:hover{
	transform:translateY(-2px);
	box-shadow:0 4px 9px rgba(16,24,40,.08);
}


/* Expediente */

.candidato-btn.btnExpediente{
	background:#eef4fb;
	border:1px solid #d6e5f4;
	color:#3778ba;
}


/* Seguimiento */

.candidato-btn.btnSeguimiento{
	background:#eaf7ef;
	border:1px solid #d2eadb;
	color:#34835a;
}


/* Reagendar */

.candidato-btn.btnReagendar{
	background:#fff5df;
	border:1px solid #f1dfb8;
	color:#a87514;
}
.candidatos-vacio{
	padding:40px 20px;
	text-align:center;
	font-size:11px;
	color:#8a949f;
}

@media(max-width:1100px){

	.candidatos-resumen{
		grid-template-columns:repeat(2,minmax(0,1fr));
	}

	.candidatos-layout{
		grid-template-columns:1fr;
	}

}
.agenda-item-superior{
	display:flex;
	align-items:center;
	justify-content:space-between;

	gap:8px;
}

.agenda-reclutador{
	display:flex;
	align-items:center;

	gap:4px;

	margin-top:5px;

	font-size:11px;

	color:#8a949f;
}

.agenda-reclutador i{
	font-size:11px;
}

/* Citas de hoy */
.candidato-kpi-icon.icon-citas{
	background:#eef4fb;
	color:#3778ba;
}

/* Confirmadas */
.candidato-kpi-icon.icon-confirmadas{
	background:#eaf7ef;
	color:#34835a;
}

/* Pendientes */
.candidato-kpi-icon.icon-pendientes{
	background:#fff5df;
	color:#a87514;
}

/* Reagendadas */
.candidato-kpi-icon.icon-reagendadas{
	background:#f1edfb;
	color:#7357a8;
}

/* Requieren revisión */
.candidato-kpi-icon.icon-revision{
	background:#fdecec;
	color:#b34e4e;
}
.candidato-kpi.kpi-alerta{
	border-color:#efcaca;
	box-shadow:0 4px 14px rgba(179,78,78,.08);
}

.candidato-kpi.kpi-alerta .candidato-kpi-valor{
	color:#b34e4e;
}
.agenda-panel-header{
	display:flex;
	align-items:center;
	justify-content:space-between;
	gap:12px;
}

.agenda-panel-title{
	display:flex;
	align-items:center;
	gap:7px;
}

.agenda-panel-title i{
	font-size:18px;
	color:#3778ba;
}

.agenda-total{
	padding:5px 8px;

	border-radius:999px;

	background:#eef4fb;
	color:#4777a8;

	font-size:10px;
	font-weight:600;

	white-space:nowrap;
}
.agenda-item.agenda-confirmada::before{
	background:#34835a;
}

.agenda-item.agenda-programada::before{
	background:#3778ba;
}

.agenda-item.agenda-reagendada::before{
	background:#a87514;
}

.agenda-item.agenda-presentado::before{
	background:#2f855a;
}

.agenda-item.agenda-no_presentado::before{
	background:#b34e4e;
}
.agenda-hora i{
	font-size:15px;
	color:#3778ba;
}
.agenda-vacante i{
	font-size:13px;
	color:#8b96a1;
}
.candidato-btn{
	width:30px;
	height:30px;

	display:flex;
	align-items:center;
	justify-content:center;

	border:1px solid #dfe5ea;
	border-radius:8px;

	background:#fff;
	color:#617080;

	font-size:15px;

	cursor:pointer;

	transition:
		background .15s ease,
		color .15s ease,
		border-color .15s ease,
		transform .15s ease;
}

.candidato-btn:hover{
	transform:translateY(-1px);
}

.candidato-btn.btnExpediente:hover{
	background:#eef4fb;
	border-color:#cddff1;
	color:#3778ba;
}

.candidato-btn.btnSeguimiento:hover{
	background:#eaf7ef;
	border-color:#cbe9d7;
	color:#34835a;
}

.candidato-btn.btnReagendar:hover{
	background:#fff5df;
	border-color:#f1ddb0;
	color:#a87514;
}
.seguimiento-header{
	display:flex;
	align-items:center;
	justify-content:space-between;
	gap:15px;
}

.seguimiento-title{
	display:flex;
	align-items:center;
	gap:7px;
}

.seguimiento-title i{
	font-size:18px;
	color:#3778ba;
}

.seguimiento-total{
	padding:5px 9px;

	border-radius:999px;

	background:#f1f4f7;
	color:#66727f;

	font-size:10px;
	font-weight:600;

	white-space:nowrap;
}
.seguimiento-tipo{
	font-size:11px;
	font-weight:600;
	color:#44515f;
}

.seguimiento-descripcion{
	margin-top:3px;
	font-size:10px;
	color:#8a949f;
}

.candidatos-paginacion{
	display:flex;
	align-items:center;
	justify-content:space-between;
	gap:15px;

	padding:12px 15px;

	border-top:1px solid #e7ebef;

	background:#fff;
}

.paginacion-info{
	font-size:11px;
	color:#7b8794;
}

.paginacion-botones{
	display:flex;
	align-items:center;
	gap:5px;
}

.paginacion-btn{
	min-width:30px;
	height:30px;

	padding:0 9px;

	display:flex;
	align-items:center;
	justify-content:center;

	border:1px solid #dfe5ea;
	border-radius:7px;

	background:#fff;
	color:#596675;

	font-size:11px;

	cursor:pointer;
}

.paginacion-btn:hover{
	background:#f4f7f9;
}

.paginacion-btn.activa{
	background:#3778ba;
	border-color:#3778ba;
	color:#fff;
}

.paginacion-btn:disabled{
	opacity:.45;
	cursor:default;
	background:#f7f8f9;
}
.candidato-datos{
	display:flex;
	flex-direction:column;
	gap:3px;
	margin-top:4px;
}

.candidato-datos span{
	display:flex;
	align-items:center;
	gap:5px;

	font-size:10px;
	color:#8a949f;
}

.candidato-datos i{
	font-size:12px;
	color:#98a2ad;
}
.candidato-vacante{
	display:flex;
	align-items:center;
	gap:6px;

	font-weight:500;
	color:#4d5967;
}

.candidato-vacante i{
	font-size:15px;
	color:#7f91a3;
}
.candidato-cita-fecha{
	font-size:11px;
	font-weight:600;
	color:#4d5967;
	white-space:nowrap;
}

.candidato-cita-hora{
	display:flex;
	align-items:center;
	gap:4px;

	margin-top:3px;

	font-size:10px;
	color:#7e8995;
}

.candidato-cita-hora i{
	font-size:12px;
	color:#3778ba;
}
.candidato-reclutador{
	display:flex;
	align-items:center;
	gap:7px;
}

.candidato-reclutador-icon{
	width:27px;
	height:27px;

	display:flex;
	align-items:center;
	justify-content:center;

	flex-shrink:0;

	border-radius:50%;

	background:#f1f4f7;
	color:#647789;

	font-size:13px;
}
.candidatos-tabla th:last-child,
.candidatos-tabla td:last-child{
	width:125px;
	white-space:nowrap;
}

.candidato-acciones{
	display:flex;
	align-items:center;
	gap:6px;
}
.modal-expediente-subtitulo{
	margin-top:3px;
	font-size:11px;
	color:#8a949f;
}

.expediente-grid{
	display:grid;
	grid-template-columns:repeat(3,minmax(0,1fr));
	gap:14px;
}

.expediente-bloque{
	background:#fff;
	border:1px solid #e4e9ed;
	border-radius:12px;
	padding:14px;
}

.expediente-bloque.full{
	grid-column:1 / -1;
}

.expediente-titulo{
	display:flex;
	align-items:center;
	gap:6px;

	margin-bottom:12px;

	font-size:12px;
	font-weight:700;
	color:#344054;
}

.expediente-titulo i{
	font-size:16px;
	color:#3778ba;
}

.expediente-campo{
	margin-bottom:10px;
}

.expediente-campo:last-child{
	margin-bottom:0;
}

.expediente-label{
	font-size:10px;
	color:#8a949f;
	margin-bottom:2px;
}

.expediente-valor{
	font-size:12px;
	font-weight:500;
	color:#344054;
}

@media(max-width:900px){

	.expediente-grid{
		grid-template-columns:1fr;
	}

}
.expediente-respuestas{
	display:grid;
	grid-template-columns:repeat(2,minmax(0,1fr));
	gap:10px 18px;
}

.expediente-respuesta{
	padding:10px 0;
	border-bottom:1px solid #edf0f2;
}

.expediente-respuesta-pregunta{
	margin-bottom:4px;

	font-size:10px;
	font-weight:500;

	color:#8a949f;
}

.expediente-respuesta-valor{
	font-size:12px;
	font-weight:600;

	color:#344054;
}

@media(max-width:800px){

	.expediente-respuestas{
		grid-template-columns:1fr;
	}

}
#modalExpediente{
	z-index:1055;
}


.modal-backdrop.backdrop-conversacion-candidato{
	z-index:1070;
}

.modal-expediente-subtitulo,
.conversacion-modal-subtitulo{
	font-size:11px;
	color:#7b8794;
}

.modal-conversacion-candidato{
	max-width:480px;
	width:calc(100% - 40px);
}

#modalConversacionCandidato{
	z-index:1110 !important;
}

.modal-backdrop.backdrop-conversacion-candidato{
	z-index:1100 !important;
}

.conversacion-modal-header{
	align-items:flex-start;
}

.conversacion-modal-subtitulo{
	font-size:11px;
	color:#7b8794;
}
</style>


<div class="candidatos-page">

	<div class="candidatos-header">

		<div>

			<h2>Candidatos</h2>

			<p>
				Seguimiento operativo de citas, confirmaciones y atención de candidatos.
			</p>

		</div>

	</div>


	<div class="candidatos-resumen">

		<div class="candidato-kpi">

			<div class="candidato-kpi-top">

				<div class="candidato-kpi-label">
					Citas de hoy
				</div>

				<div class="candidato-kpi-icon icon-citas">
					<i class="ph-duotone ph-calendar-check"></i>
				</div>

			</div>

			<div class="candidato-kpi-valor" id="kpiCitasHoy">
				0
			</div>

			<div class="candidato-kpi-detalle">
				Programadas para hoy
			</div>

		</div>


		<div class="candidato-kpi">

			<div class="candidato-kpi-top">

				<div class="candidato-kpi-label">
					Confirmadas
				</div>

				<div class="candidato-kpi-icon icon-confirmadas">
					<i class="ph-duotone ph-check-circle"></i>
				</div>

			</div>

			<div class="candidato-kpi-valor" id="kpiConfirmadas">
				0
			</div>

			<div class="candidato-kpi-detalle">
				Asistencia confirmada
			</div>

		</div>


		<div class="candidato-kpi">

			<div class="candidato-kpi-top">

				<div class="candidato-kpi-label">
					Pendientes
				</div>

				<div class="candidato-kpi-icon icon-pendientes">
					<i class="ph-duotone ph-clock"></i>
				</div>

			</div>

			<div class="candidato-kpi-valor" id="kpiPendientes">
				0
			</div>

			<div class="candidato-kpi-detalle">
				Pendientes de confirmar
			</div>

		</div>


		<div class="candidato-kpi">

			<div class="candidato-kpi-top">

				<div class="candidato-kpi-label">
					Reagendadas
				</div>

				<div class="candidato-kpi-icon icon-reagendadas">
					<i class="ph-duotone ph-calendar-check"></i>
				</div>

			</div>

			<div class="candidato-kpi-valor" id="kpiReagendadas">
				0
			</div>

			<div class="candidato-kpi-detalle">
				Citas modificadas
			</div>

		</div>


		<div class="candidato-kpi" id="kpiRevisionCard">

			<div class="candidato-kpi-top">

				<div class="candidato-kpi-label">
					Requieren revisión
				</div>

				<div class="candidato-kpi-icon icon-revision">
					<i class="ph-duotone ph-warning-circle"></i>
				</div>

			</div>

			<div class="candidato-kpi-valor" id="kpiRevision">
				0
			</div>

			<div class="candidato-kpi-detalle">
				Necesitan atención
			</div>

		</div>

	</div>


	<div class="candidatos-layout">


		<div class="candidatos-panel">

			<div class="candidatos-panel-header agenda-panel-header">

				<div>

					<div class="candidatos-panel-title agenda-panel-title">

						<i class="ph-duotone ph-calendar-check"></i>

						Agenda de hoy

					</div>

					<div class="candidatos-panel-subtitle">
						Candidatos programados para presentarse.
					</div>

				</div>

				<div class="agenda-total" id="agendaTotal">
					0 citas
				</div>

			</div>


			<div class="agenda-lista" id="agendaHoy">

				<div class="candidatos-vacio">
					Cargando agenda...
				</div>

			</div>

		</div>


		<div class="candidatos-panel">


			<div class="candidatos-panel-header seguimiento-header">

				<div>

					<div class="candidatos-panel-title seguimiento-title">

						<i class="ph-duotone ph-users-three"></i>

						Seguimiento de candidatos

					</div>

					<div class="candidatos-panel-subtitle">
						Consulta y administra el estado operativo de cada candidato.
					</div>

				</div>

				<div class="seguimiento-total" id="totalCandidatos">
					0 candidatos
				</div>

			</div>


			<div class="candidatos-filtros">

				<input
					type="text"
					id="filtroBuscar"
					placeholder="Nombre, teléfono o folio"
				>


				<select id="filtroEstatusCita">

					<option value="">
						Todos los estatus
					</option>

					<option value="programada">
						Programada
					</option>

					<option value="confirmada">
						Confirmada
					</option>

					<option value="reagendada">
						Reagendada
					</option>

					<option value="presentado">
						Se presentó
					</option>

					<option value="no_presentado">
						No se presentó
					</option>

				</select>


				<select id="filtroSeguimiento">

					<option value="">
						Todo seguimiento
					</option>

					<option value="normal">
						Normal
					</option>

					<option value="pendiente_contacto">
						Pendiente contacto
					</option>

					<option value="requiere_revision">
						Requiere revisión
					</option>

					<option value="en_seguimiento">
						En seguimiento
					</option>

					<option value="cerrado">
						Cerrado
					</option>

				</select>


				<input
					type="date"
					id="filtroFecha"
				>

			</div>


			<div class="candidatos-tabla-wrap">
				

				<table class="candidatos-tabla">

					<thead>

						<tr>

							<th>Candidato</th>
							<th>Vacante</th>
							<th>Cita</th>
							<th>Reclutador</th>
							<th>Estatus</th>
							<th>Último seguimiento</th>
							<th>Acciones</th>

						</tr>

					</thead>


					<tbody id="tablaCandidatos">

						<tr>

							<td colspan="7">

								<div class="candidatos-vacio">
									Cargando candidatos...
								</div>

							</td>

						</tr>

					</tbody>

				</table>
				<div class="candidatos-paginacion" id="paginacionCandidatos"></div>
			</div>

		</div>

	</div>

</div>

<div class="modal fade" id="modalExpediente" tabindex="-1">
	<div class="modal-dialog modal-xl modal-dialog-scrollable">
		<div class="modal-content">

			<div class="modal-header">

				<div>
					<h5 class="modal-title">
						Expediente del candidato
					</h5>

					<div class="modal-expediente-subtitulo" id="expedienteFolio"></div>
				</div>

				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
				></button>

			</div>

			<div class="modal-body" id="contenidoExpediente">

				<div class="candidatos-vacio">
					Cargando expediente...
				</div>

			</div>

		</div>
	</div>
</div>
<div
	class="modal fade"
	id="modalConversacionCandidato"
	tabindex="-1"
	aria-hidden="true"
>
	<div
		class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-conversacion-candidato"
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
				id="contenidoConversacionCandidato"
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


<div
	class="modal fade"
	id="modalSeguimientoCandidato"
	tabindex="-1"
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-centered">

		<div class="modal-content">

			<div class="modal-header">

				<div>

					<h5 class="modal-title mb-1">
						Registrar seguimiento
					</h5>

					<div class="candidatos-panel-subtitle">
						Registra una nueva actividad en el expediente del candidato.
					</div>

				</div>

				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
				></button>

			</div>


			<div class="modal-body">

				<input
					type="hidden"
					id="seguimientoCandidatoId"
				>


				<div class="mb-3">

					<label class="form-label">
						Estatus
					</label>

				
					

					<select
							class="form-select"
							id="seguimientoEstatus"
						>
							<option value="">
								Seleccionar estatus
							</option>

							<option value="pendiente_contacto">
								Pendiente de contacto
							</option>

							<option value="contactado">
								Contactado
							</option>

							<option value="pendiente_documentos">
								Pendiente de documentos
							</option>

							<option value="pendiente_revision">
								Pendiente de revisión
							</option>

							<option value="en_evaluacion">
								En evaluación
							</option>

							<option value="pendiente_respuesta">
								Pendiente de respuesta
							</option>

							<option value="sin_interes">
								Sin interés
							</option>

							<option value="no_localizado">
								No localizado
							</option>

							<option value="cerrado">
								Cerrado
							</option>
						

					</select>

				</div>


				<div>

					<label class="form-label">
						Observaciones
					</label>

					<textarea
						class="form-control"
						id="seguimientoDescripcion"
						rows="4"
						placeholder="Describe brevemente el seguimiento realizado..."
					></textarea>

				</div>

			</div>


			<div class="modal-footer">

				<button
					type="button"
					class="btn btn-light"
					data-bs-dismiss="modal"
				>
					Cancelar
				</button>

				<button
					type="button"
					class="btn btn-primary"
					id="btnGuardarSeguimiento"
				>
					<i class="ph-duotone ph-check me-1"></i>
					Guardar seguimiento
				</button>

			</div>

		</div>

	</div>
</div>
<script>

$(document).ready(function(){
	limpiarModalesCandidatos();
	cargarResumen();
	cargarAgendaHoy();
	cargarCandidatos();

	
	$("#filtroBuscar").on(
		"keyup",
		function(){
			cargarCandidatos(1);
		}
	);

	$("#filtroEstatusCita, #filtroSeguimiento, #filtroFecha").on(
		"change",
		function(){
			cargarCandidatos(1);
		}
	);

});
function limpiarModalesCandidatos(){

	[
		"modalExpediente",
		"modalConversacionCandidato"
	].forEach(function(id){

		const elementos =
			document.querySelectorAll(
				"#" + id
			);

		/*
		|------------------------------------------------------------------
		| Conservamos únicamente el último.
		| El último corresponde a la vista que acabamos de cargar.
		|------------------------------------------------------------------
		*/
		if (elementos.length > 1){

			for (
				let i = 0;
				i < elementos.length - 1;
				i++
			){

				const instancia =
					bootstrap.Modal.getInstance(
						elementos[i]
					);

				if (instancia){
					instancia.dispose();
				}

				elementos[i].remove();
			}

		}

	});


	/*
	|--------------------------------------------------------------------------
	| Limpiar capas residuales
	|--------------------------------------------------------------------------
	*/
	$(".modal-backdrop").remove();

	$("body")
		.removeClass("modal-open")
		.css({
			overflow: "",
			paddingRight: ""
		});

}

function cargarResumen(){

	$.getJSON(
		"<?= base_url('Reclutamiento/Candidatos/resumen') ?>",
		function(resp){

			if (
				resp.estado !== "success"
			){
				return;
			}


			const d =
				resp.datos || {};


			$("#kpiCitasHoy")
				.text(
					d.citas_hoy || 0
				);

			$("#kpiConfirmadas")
				.text(
					d.confirmadas || 0
				);

			$("#kpiPendientes")
				.text(
					d.pendientes || 0
				);

			$("#kpiReagendadas")
				.text(
					d.reagendadas || 0
				);

			const revision = parseInt(d.requieren_revision || 0);

			$("#kpiRevision").text(revision);

			$("#kpiRevisionCard").toggleClass(
				"kpi-alerta",
				revision > 0
			);

		}
	);

}


function cargarCandidatos(pagina = 1){

	

	$.getJSON(
		"<?= base_url('Reclutamiento/Candidatos/listar') ?>",
		{
			buscar: $("#filtroBuscar").val(),
			estatus_cita: $("#filtroEstatusCita").val(),
			estatus_seguimiento: $("#filtroSeguimiento").val(),
			fecha: $("#filtroFecha").val(),
			pagina: pagina
		},
		function(resp){

			if (resp.estado !== "success"){
				return;
			}

			renderCandidatos(resp.datos || []);
			renderPaginacion(resp.paginacion || {});
		}
	);

}


function renderCandidatos(datos){

	$("#totalCandidatos").text(
		datos.length + (
			datos.length === 1
				? " candidato"
				: " candidatos"
		)
	);
	let html = "";


	if (
		!Array.isArray(datos) ||
		datos.length === 0
	){

		html = `
			<tr>
				<td colspan="7">
					<div class="candidatos-vacio">
						No se encontraron candidatos.
					</div>
				</td>
			</tr>
		`;

		$("#tablaCandidatos").html(html);
		$("#totalCandidatos").text("0 candidatos");
		return;
	}


	datos.forEach(function(item){

		const vacante =
			item.vacante_nombre
				? item.vacante_nombre
				: "Sin vacante asignada";


		const cita =
			formatearCita(
				item.fecha_cita,
				item.hora_cita
			);


		const reclutador =
			item.reclutador_nombre
				? item.reclutador_nombre
				: "Sin asignar";


		const estatus =
			renderEstatusCita(
				item.estatus_cita
			);


		const seguimiento =
			renderUltimoSeguimiento(
				item
			);


		html += `
			<tr>

				<td>

					<div class="candidato-nombre">
						${escapeHtml(item.nombre || "Sin nombre")}
					</div>

					<div class="candidato-datos">

						<span>
							<i class="ph-duotone ph-phone"></i>
							${escapeHtml(item.telefono || "Sin teléfono")}
						</span>

						${item.folio ? `
							<span>
								<i class="ph-duotone ph-identification-card"></i>
								${escapeHtml(item.folio)}
							</span>
						` : ""}

					</div>

				</td>


				<td>

					<div class="candidato-vacante">
						<i class="ph-duotone ph-briefcase"></i>

						<span>
							${escapeHtml(vacante)}
						</span>
					</div>

				</td>


				<td>
					${cita}
				</td>


				<td>

					<div class="candidato-reclutador">

						<div class="candidato-reclutador-icon">
							<i class="ph-duotone ph-user"></i>
						</div>

						<span>
							${escapeHtml(reclutador)}
						</span>

					</div>

				</td>


				<td>
					${estatus}
				</td>


				<td>
					${seguimiento}
				</td>


				<td>

					<div class="candidato-acciones">

						<button
							type="button"
							class="candidato-btn btnExpediente"
							data-id="${item.id}"
							title="Ver expediente"
						>
							<i class="ph-duotone ph-user-square"></i>
						</button>

						<button
							type="button"
							class="candidato-btn btnSeguimiento"
							data-id="${item.id}"
							title="Registrar seguimiento"
						>
							<i class="ph-duotone ph-note-pencil"></i>
						</button>

						<button
							type="button"
							class="candidato-btn btnReagendar"
							data-id="${item.id}"
							title="Reagendar cita"
						>
							<i class="ph-duotone ph-calendar"></i>
						</button>

					</div>

				</td>

			</tr>
		`;

	});


	$("#tablaCandidatos")
		.html(html);

}


function cargarAgendaHoy(){

	$.getJSON(
		"<?= base_url('Reclutamiento/Candidatos/agenda-hoy') ?>",
		function(resp){

			if (
				resp.estado !== "success"
			){

				$("#agendaHoy")
					.html(`
						<div class="candidatos-vacio">
							No fue posible cargar la agenda.
						</div>
					`);

				return;
			}


			renderAgendaHoy(
				resp.datos || []
			);

		}
	);

}


function renderAgendaHoy(datos){

	if (
		!Array.isArray(datos) ||
		datos.length === 0
	){

		$("#agendaHoy")
			.html(`
				<div class="candidatos-vacio">
					No hay citas programadas para hoy.
				</div>
			`);
		$("#agendaTotal").text("0 citas");
		return;
	}

	$("#agendaTotal").text(
		datos.length + (
			datos.length === 1
				? " cita"
				: " citas"
		)
	);
	let html = "";


	datos.forEach(function(item){

		const estatus =
			item.estatus_cita
				? renderEstatusCita(
					item.estatus_cita
				)
				: "";


		html += `
			<div
				class="agenda-item agenda-${item.estatus_cita || "programada"}"
				data-id="${item.id}"
			>

				<div class="agenda-item-superior">

					<div class="agenda-hora">
						<i class="ph-duotone ph-clock"></i>
						${formatearHora(item.hora_cita)}
					</div>

					${estatus}

				</div>


				<div class="agenda-nombre">

					${escapeHtml(
						item.nombre
						|| "Sin nombre"
					)}

				</div>


				<div class="agenda-vacante">
					<i class="ph-duotone ph-briefcase"></i>

					${escapeHtml(
						item.vacante_nombre || "Sin vacante asignada"
					)}
				</div>


				${
					item.reclutador_nombre
						? `
							<div class="agenda-reclutador">

								<i class="ph-duotone ph-user-circle"></i>

								${escapeHtml(
									item.reclutador_nombre
								)}

							</div>
						`
						: ""
				}

			</div>
		`;

	});


	$("#agendaHoy")
		.html(html);

}

function formatearCita(fecha,hora){

	if (!fecha){
		return `
			<span class="candidato-secundario">
				Sin cita
			</span>
		`;
	}

	const partes = fecha.split("-");

	const meses = [
		"Ene","Feb","Mar","Abr","May","Jun",
		"Jul","Ago","Sep","Oct","Nov","Dic"
	];

	let fechaTexto = fecha;

	if (partes.length === 3){

		const mes = parseInt(partes[1]) - 1;

		fechaTexto =
			partes[2] + " " +
			meses[mes] + " " +
			partes[0];
	}

	return `
		<div class="candidato-cita-fecha">
			${escapeHtml(fechaTexto)}
		</div>

		<div class="candidato-cita-hora">
			<i class="ph-duotone ph-clock"></i>
			${formatearHora(hora)}
		</div>
	`;
}

function formatearHora(hora){

	if (!hora){
		return "";
	}

	return String(hora)
		.substring(0,5);

}


function renderEstatusCita(estatus){

	const estados = {

		programada:{
			texto:"Programada",
			clase:"badge-programada"
		},

		confirmada:{
			texto:"Confirmada",
			clase:"badge-confirmada"
		},

		reagendada:{
			texto:"Reagendada",
			clase:"badge-reagendada"
		},

		presentado:{
			texto:"Se presentó",
			clase:"badge-presentado"
		},

		no_presentado:{
			texto:"No se presentó",
			clase:"badge-no-presentado"
		}

	};


	const estado =
		estados[estatus]
		|| {
			texto:
				estatus
					? estatus
					: "Pendiente",

			clase:
				"badge-programada"
		};


	return `
		<span class="candidato-badge ${estado.clase}">
			${escapeHtml(estado.texto)}
		</span>
	`;

}


function renderUltimoSeguimiento(item){

	if (
		!item.ultimo_seguimiento_tipo
	){

		if (
			item.estatus_seguimiento ===
			"requiere_revision"
		){

			return `
				<span class="candidato-badge badge-revision">
					Requiere revisión
				</span>
			`;
		}


		return `
			<span class="candidato-secundario">
				Sin seguimiento
			</span>
		`;
	}


	return `
		<div class="seguimiento-tipo">
			${escapeHtml(
				formatearTipoSeguimiento(
					item.ultimo_seguimiento_tipo
				)
			)}
		</div>

		<div class="seguimiento-descripcion">
			${escapeHtml(
				item.ultimo_seguimiento_descripcion || ""
			)}
		</div>
	`;

}


function formatearTipoSeguimiento(tipo){

	return String(tipo || "")
		.replaceAll("_"," ")
		.replace(
			/\b\w/g,
			function(letra){
				return letra.toUpperCase();
			}
		);

}


function escapeHtml(texto){

	return $("<div>")
		.text(
			texto == null
				? ""
				: String(texto)
		)
		.html();

}
function renderPaginacion(paginacion){

	const pagina =
		parseInt(paginacion.pagina || 1);

	const totalPaginas =
		parseInt(paginacion.total_paginas || 1);

	const total =
		parseInt(paginacion.total || 0);

	const limite =
		parseInt(paginacion.limite || 20);


	const inicio =
		total === 0
			? 0
			: ((pagina - 1) * limite) + 1;

	const fin =
		Math.min(
			pagina * limite,
			total
		);


	let botones = "";


	/*
	|--------------------------------------------------------------------------
	| Anterior
	|--------------------------------------------------------------------------
	*/
	botones += `
		<button
			type="button"
			class="paginacion-btn"
			${pagina <= 1 ? "disabled" : ""}
			onclick="cargarCandidatos(${pagina - 1})"
		>
			<i class="ph-duotone ph-caret-left"></i>
		</button>
	`;


	/*
	|--------------------------------------------------------------------------
	| Páginas visibles
	|--------------------------------------------------------------------------
	*/
	let desde =
		Math.max(
			1,
			pagina - 2
		);

	let hasta =
		Math.min(
			totalPaginas,
			pagina + 2
		);


	if (pagina <= 3) {
		hasta = Math.min(5, totalPaginas);
	}

	if (pagina >= totalPaginas - 2) {
		desde = Math.max(1, totalPaginas - 4);
	}


	for (
		let i = desde;
		i <= hasta;
		i++
	){

		botones += `
			<button
				type="button"
				class="paginacion-btn ${i === pagina ? "activa" : ""}"
				onclick="cargarCandidatos(${i})"
			>
				${i}
			</button>
		`;

	}


	/*
	|--------------------------------------------------------------------------
	| Siguiente
	|--------------------------------------------------------------------------
	*/
	botones += `
		<button
			type="button"
			class="paginacion-btn"
			${pagina >= totalPaginas ? "disabled" : ""}
			onclick="cargarCandidatos(${pagina + 1})"
		>
			<i class="ph-duotone ph-caret-right"></i>
		</button>
	`;


	$("#paginacionCandidatos")
		.html(`
			<div class="paginacion-info">
				Mostrando ${inicio} - ${fin} de ${total} candidatos
			</div>

			<div class="paginacion-botones">
				${botones}
			</div>
		`);

}

$(document).on(
	"click",
	".btnExpediente",
	function(){

		const id = $(this).data("id");

		cargarExpediente(id);

	}
);
function cargarExpediente(id){

	$("#contenidoExpediente").html(`
		<div class="text-center py-5">
			<div
				class="spinner-border spinner-border-sm"
				role="status"
			></div>

			<div class="mt-2 text-muted">
				Cargando expediente...
			</div>
		</div>
	`);


	const modalElement =
		document.getElementById(
			"modalExpediente"
		);

	if (
		modalElement.parentElement
		!== document.body
	){
		document.body.appendChild(
			modalElement
		);
	}


	const modal =
		bootstrap.Modal.getOrCreateInstance(
			modalElement
		);

	modal.show();


	$.getJSON(
		"<?= base_url('Reclutamiento/Candidatos/detalle') ?>/" + id,
		function(resp){

			if (resp.estado){

				$("#contenidoExpediente")
					.html(
						resp.html
					);

				return;
			}


			$("#contenidoExpediente").html(`
				<div class="alert alert-warning mb-0">
					${escapeHtml(
						resp.mensaje
						|| "No fue posible cargar el expediente."
					)}
				</div>
			`);

		}
	)
	.fail(function(){

		$("#contenidoExpediente").html(`
			<div class="alert alert-danger mb-0">
				Ocurrió un error al consultar el expediente.
			</div>
		`);

	});

}

$(document)
	.off(
		"click.expedienteCandidato",
		"#modalExpediente .expediente-tab"
	)
	.on(
		"click.expedienteCandidato",
		"#modalExpediente .expediente-tab",
		function(){

			const tab =
				$(this).data("tab");

			$("#modalExpediente .expediente-tab")
				.removeClass("active");

			$(this)
				.addClass("active");


			$("#modalExpediente .expediente-tab-content")
				.removeClass("active");

			$(
				'#modalExpediente .expediente-tab-content[data-content="' +
				tab +
				'"]'
			)
				.addClass("active");

		}
	);
function verConversacionCandidato(sessionId){

	if (!sessionId){
		return;
	}


	$("#contenidoConversacionCandidato").html(`
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


	const modalElement =
		document.getElementById(
			"modalConversacionCandidato"
		);


	if (
		modalElement.parentElement
		!== document.body
	){
		document.body.appendChild(
			modalElement
		);
	}


	const modal =
		bootstrap.Modal.getOrCreateInstance(
			modalElement
		);

	modal.show();


	$.ajax({

		type: "POST",

		url:
			"<?= base_url('Reclutamiento/Candidatos/conversacion') ?>",

		data: {
			session_id: sessionId
		},

		dataType: "json",

		success: function(resp){

			if (resp.estado){

				$("#contenidoConversacionCandidato")
					.html(resp.html)
					.scrollTop(0);

				return;
			}


			$("#contenidoConversacionCandidato").html(`
				<div class="alert alert-warning mb-0">
					${escapeHtml(
						resp.mensaje ||
						"No fue posible consultar la conversación."
					)}
				</div>
			`);

		},

		error: function(){

			$("#contenidoConversacionCandidato").html(`
				<div class="alert alert-danger mb-0">
					Ocurrió un error al consultar la conversación.
				</div>
			`);

		}

	});

}
$(document)
	.off(
		"shown.bs.modal.conversacionCandidato",
		"#modalConversacionCandidato"
	)
	.on(
		"shown.bs.modal.conversacionCandidato",
		"#modalConversacionCandidato",
		function(){

			$(".modal-backdrop")
				.last()
				.addClass(
					"backdrop-conversacion-candidato"
				);

		}
	);


$(document)
	.off(
		"hidden.bs.modal.conversacionCandidato",
		"#modalConversacionCandidato"
	)
	.on(
		"hidden.bs.modal.conversacionCandidato",
		"#modalConversacionCandidato",
		function(){

			$(".modal-backdrop")
				.removeClass(
					"backdrop-conversacion-candidato"
				);

			if (
				$("#modalExpediente")
					.hasClass("show")
			){
				$("body").addClass("modal-open");
			}

		}
	);
	
$(document)
	.off(
		"shown.bs.modal.expedienteCandidato",
		"#modalExpediente"
	)
	.on(
		"shown.bs.modal.expedienteCandidato",
		"#modalExpediente",
		function(){

			$(".modal-backdrop")
				.last()
				.addClass(
					"backdrop-expediente-candidato"
				);

		}
	);


$(document)
	.off(
		"hidden.bs.modal.expedienteCandidato",
		"#modalExpediente"
	)
	.on(
		"hidden.bs.modal.expedienteCandidato",
		"#modalExpediente",
		function(){

			$(".modal-backdrop")
				.removeClass(
					"backdrop-expediente-candidato"
				);

		}
	);
	
$(document)
	.off(
		"click.seguimientoCandidato",
		".btnSeguimiento"
	)
	.on(
		"click.seguimientoCandidato",
		".btnSeguimiento",
		function(){

			const id = $(this).data("id");

			$("#seguimientoCandidatoId").val(id);
			$("#seguimientoEstatus").val("");
			$("#seguimientoDescripcion").val("");

			const modalElement =
				document.getElementById(
					"modalSeguimientoCandidato"
				);

			if (
				modalElement.parentElement
				!== document.body
			){
				document.body.appendChild(
					modalElement
				);
			}

			bootstrap.Modal
				.getOrCreateInstance(
					modalElement
				)
				.show();

		}
	);
	
$(document)
	.off(
		"click.guardarSeguimiento",
		"#btnGuardarSeguimiento"
	)
	.on(
		"click.guardarSeguimiento",
		"#btnGuardarSeguimiento",
		function(){

			const id =
				$("#seguimientoCandidatoId").val();

			const estatus =
				$("#seguimientoEstatus").val();

			const descripcion =
				$("#seguimientoDescripcion").val().trim();


			if (!estatus){

				alert(
					"Selecciona un estatus de seguimiento."
				);

				return;
			}


			const boton = $(this);

			boton
				.prop("disabled", true)
				.html(`
					<span
						class="spinner-border spinner-border-sm me-1"
					></span>
					Guardando...
				`);


			$.ajax({

				type: "POST",

				url:
					"<?= base_url('Reclutamiento/Candidatos/guardar-seguimiento') ?>",

				dataType: "json",

				data: {
					id: id,
					estatus: estatus,
					descripcion: descripcion
				},

				success: function(resp){

					if (!resp.estado){

						alert(
							resp.mensaje
							|| "No fue posible registrar el seguimiento."
						);

						return;
					}


					const modalElement =
						document.getElementById(
							"modalSeguimientoCandidato"
						);

					bootstrap.Modal
						.getInstance(
							modalElement
						)
						?.hide();


					cargarCandidatos(1);
					cargarResumen();

				},

				error: function(){

					alert(
						"Ocurrió un error al registrar el seguimiento."
					);

				},

				complete: function(){

					boton
						.prop("disabled", false)
						.html(`
							<i class="ph-duotone ph-check me-1"></i>
							Guardar seguimiento
						`);

				}

			});

		}
	);
</script>