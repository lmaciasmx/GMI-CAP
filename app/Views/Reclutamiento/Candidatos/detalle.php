<style>

/* =========================================================
   EXPEDIENTE DE CANDIDATO
   ========================================================= */

.expediente-solicitud{
	color:#344054;
	font-size:13px;
}


/* =========================================================
   HEADER
   ========================================================= */

.expediente-header{
	display:flex;
	align-items:flex-start;
	justify-content:space-between;
	gap:25px;

	padding:8px 5px 22px;

	border-bottom:1px solid #e7ebef;
}

.expediente-identidad{
	display:flex;
	align-items:flex-start;
	gap:22px;
	min-width:0;
}

.expediente-foto{
	width:145px;
	height:155px;

	flex:0 0 145px;

	border-radius:10px;
	overflow:hidden;

	background:#eef1f4;
	border:1px solid #e1e5e9;
}

.expediente-foto img{
	width:100%;
	height:100%;
	object-fit:cover;
	display:block;
}

.expediente-foto-placeholder{
	width:100%;
	height:100%;

	display:flex;
	align-items:center;
	justify-content:center;

	color:#9aa4af;
}

.expediente-foto-placeholder i{
	font-size:60px;
}

.expediente-datos-personales{
	padding-top:5px;
}

.expediente-nombre{
	font-size:22px;
	font-weight:700;
	color:#192334;
	line-height:1.2;
	margin-bottom:7px;
}

.expediente-folio{
	display:inline-flex;
	align-items:center;

	padding:5px 11px;

	background:#eaf3ff;
	color:#1769c2;

	border-radius:7px;

	font-size:12px;
	font-weight:700;

	margin-bottom:16px;
}

.expediente-meta{
	display:flex;
	align-items:center;
	flex-wrap:wrap;

	gap:9px 22px;

	color:#506079;
	margin-bottom:18px;
}

.expediente-meta > div{
	display:flex;
	align-items:center;
	gap:6px;
}

.expediente-meta i{
	font-size:17px;
	color:#637797;
}

.expediente-registro{
	display:flex;
	align-items:center;
	gap:6px;

	font-size:12px;
	color:#697586;
}

.expediente-registro i{
	font-size:16px;
}


/* =========================================================
   ESTADO
   ========================================================= */

.expediente-estado-box{
	min-width:190px;

	padding:13px 15px;

	background:#fafbfc;
	border:1px solid #e0e6ec;
	border-radius:8px;
}

.expediente-estado-label{
	font-size:10px;
	font-weight:700;

	text-transform:uppercase;
	letter-spacing:.45px;

	color:#718096;

	margin-bottom:8px;
}


/* =========================================================
   GRID RESUMEN
   ========================================================= */

.expediente-grid-resumen{
	display:grid;
	grid-template-columns:.9fr 1.1fr;
	gap:15px;

	padding:18px 5px;
}

.expediente-card{
	background:#fff;

	border:1px solid #e1e6eb;
	border-radius:9px;

	padding:17px 18px;
}

.expediente-card-title{
	display:flex;
	align-items:center;
	gap:7px;

	font-size:12px;
	font-weight:700;

	text-transform:uppercase;
	letter-spacing:.25px;

	color:#26354a;

	margin-bottom:17px;
}

.expediente-card-title i{
	color:#1c78db;
	font-size:18px;
}

.expediente-resumen-lista{
	display:flex;
	flex-direction:column;
	gap:10px;
}

.expediente-resumen-row{
	display:grid;
	grid-template-columns:1fr 1fr;
	gap:15px;
}

.expediente-resumen-row span{
	color:#677386;
}

.expediente-resumen-row strong{
	color:#253044;
	font-weight:600;
}

.texto-si{
	color:#23874d;
}

.texto-no{
	color:#5d6877;
}


/* =========================================================
   CITA
   ========================================================= */

.expediente-cita-layout{
	display:grid;
	grid-template-columns:115px 1fr 170px;
	gap:18px;

	align-items:center;
}

.expediente-fecha-box{
	padding:10px;

	background:#f6f8fb;
	border-radius:8px;

	text-align:center;
}

.expediente-fecha-dia{
	font-size:39px;
	line-height:1;

	font-weight:700;
	color:#162033;
}

.expediente-fecha-mes{
	font-size:14px;
	font-weight:700;

	margin-top:7px;

	color:#40526c;
}

.expediente-fecha-anio{
	font-size:12px;
	color:#69768a;

	margin-top:2px;
}

.expediente-cita-info{
	display:flex;
	flex-direction:column;
	gap:12px;
}

.expediente-cita-hora,
.expediente-cita-localidad{
	display:flex;
	align-items:center;
	gap:7px;

	color:#35445c;
	font-weight:600;
}

.expediente-cita-hora i,
.expediente-cita-localidad i{
	font-size:18px;
	color:#637b9c;
}

.expediente-reclutador{
	border-left:1px dashed #dce2e8;
	padding-left:18px;
}

.expediente-reclutador-label{
	font-size:10px;
	font-weight:700;

	text-transform:uppercase;
	letter-spacing:.35px;

	color:#637084;

	margin-bottom:10px;
}

.expediente-reclutador-dato{
	display:flex;
	align-items:center;
	gap:10px;
}

.expediente-reclutador-dato > i{
	display:flex;
	align-items:center;
	justify-content:center;

	width:38px;
	height:38px;

	background:#f0f3f7;

	border-radius:50%;

	font-size:20px;
	color:#58708f;
}

.expediente-reclutador-dato div{
	display:flex;
	flex-direction:column;
	gap:2px;
}

.expediente-reclutador-dato strong{
	font-size:12px;
	color:#283448;
}

.expediente-reclutador-dato span{
	font-size:11px;
	color:#7a8492;
}

.expediente-sin-cita{
	display:flex;
	align-items:center;
	gap:12px;

	padding:18px;

	background:#f7f9fb;
	border:1px dashed #d7dee6;
	border-radius:8px;
}

.expediente-sin-cita > i{
	font-size:28px;
	color:#8994a0;
}

.expediente-sin-cita div{
	display:flex;
	flex-direction:column;
	gap:3px;
}

.expediente-sin-cita span{
	color:#7d8894;
	font-size:11px;
}


/* =========================================================
   TABS
   ========================================================= */

.expediente-tabs{
	display:flex;
	align-items:center;
	gap:14px;

	padding:0 5px;

	border-bottom:1px solid #dfe5eb;
}

.expediente-tab{
	display:flex;
	align-items:center;
	gap:7px;

	padding:12px 17px;

	border:0;
	background:transparent;

	color:#657287;

	font-size:12px;
	font-weight:500;

	border-bottom:2px solid transparent;

	cursor:pointer;

	transition:.15s ease;
}

.expediente-tab i{
	font-size:17px;
}

.expediente-tab:hover{
	color:#176dcc;
}

.expediente-tab.active{
	color:#126fd1;
	font-weight:600;

	border-bottom-color:#1b79df;
}


/* =========================================================
   CONTENIDO TABS
   ========================================================= */

.expediente-tab-content{
	display:none;

	padding:18px 5px 5px;
}

.expediente-tab-content.active{
	display:block;
}

.expediente-section-title{
	font-size:12px;
	font-weight:700;

	text-transform:uppercase;

	color:#273448;

	margin-bottom:13px;
}

.expediente-grid-datos{
	display:grid;
	grid-template-columns:repeat(4,minmax(0,1fr));
	gap:10px;

	margin-bottom:13px;
}

.expediente-dato-box{
	padding:12px 13px;

	background:#f9fafc;

	border:1px solid #e5e9ee;
	border-radius:7px;
}

.expediente-dato-box span{
	display:block;

	font-size:10px;
	color:#697588;

	margin-bottom:5px;
}

.expediente-dato-box strong{
	display:block;

	font-size:12px;
	font-weight:600;

	color:#26354b;

	word-break:break-word;
}

.expediente-texto-box{
	padding:12px 14px;

	background:#f9fafc;

	border:1px solid #e5e9ee;
	border-radius:7px;

	margin-bottom:12px;
}

.expediente-texto-box > span{
	display:block;

	font-size:10px;
	color:#697588;

	margin-bottom:5px;
}

.expediente-texto-box p{
	margin:0;

	color:#354157;
	line-height:1.5;

	font-size:12px;
}


/* =========================================================
   RESTRICCIÓN
   ========================================================= */

.expediente-alerta{
	display:flex;
	align-items:flex-start;
	gap:10px;

	padding:12px 14px;

	background:#fff9eb;

	border:1px solid #f0dfb4;
	border-left:3px solid #dca32f;

	border-radius:7px;
}

.expediente-alerta > i{
	font-size:20px;
	color:#ae7415;
}

.expediente-alerta div{
	display:flex;
	flex-direction:column;
	gap:3px;
}

.expediente-alerta strong{
	font-size:11px;
	color:#815d1b;
}

.expediente-alerta span{
	font-size:11px;
	color:#6c5e43;
}


/* =========================================================
   ACTIVIDADES
   ========================================================= */

.expediente-actividades{
	display:flex;
	flex-wrap:wrap;
	gap:8px;

	margin-top:8px;
}

.expediente-actividad-label{
	display:inline-flex;
	align-items:center;
	gap:6px;

	padding:6px 10px;

	background:#f1f6fc;
	border:1px solid #dbe7f4;
	border-radius:6px;

	font-size:11px;
	font-weight:600;

	color:#45627f;
}

.expediente-actividad-label i{
	font-size:13px;
	color:#2f81c7;
}


/* =========================================================
   DOCUMENTOS
   ========================================================= */

.expediente-documentos-grid{
	display:grid;
	grid-template-columns:repeat(2,minmax(0,1fr));
	gap:10px 25px;

	max-width:800px;
}

.expediente-documento{
	display:flex;
	align-items:center;
	gap:8px;

	padding:9px 11px;

	border-radius:7px;

	font-size:12px;
	font-weight:500;

	border:1px solid transparent;
}

.expediente-documento.documento-disponible{
	background:#edf8f1;
	border-color:#d2eadb;
	color:#287648;
}

.expediente-documento.documento-disponible i{
	color:#2f9658;
	font-size:17px;
}

.expediente-documento.documento-no-disponible{
	background:#f5f6f8;
	border-color:#e4e7eb;
	color:#8a939f;
}

.expediente-documento.documento-no-disponible i{
	color:#a5adb7;
	font-size:17px;
}


/* =========================================================
   VACÍOS
   ========================================================= */

.expediente-vacio{
	display:flex;
	align-items:center;
	gap:7px;

	padding:15px;

	background:#f7f9fb;
	border:1px dashed #dbe1e7;
	border-radius:7px;

	color:#7b8793;
	font-size:11px;
}


/* =========================================================
   FOOTER
   ========================================================= */

.expediente-footer{
	display:flex;
	align-items:center;
	justify-content:space-between;

	gap:12px;

	margin-top:20px;
	padding:15px 5px 0;

	border-top:1px solid #e4e8ec;
}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media(max-width:991px){

	.expediente-grid-resumen{
		grid-template-columns:1fr;
	}

	.expediente-cita-layout{
		grid-template-columns:100px 1fr;
	}

	.expediente-reclutador{
		grid-column:1 / -1;

		border-left:0;
		border-top:1px dashed #dce2e8;

		padding-left:0;
		padding-top:15px;
	}

	.expediente-grid-datos{
		grid-template-columns:repeat(2,minmax(0,1fr));
	}

}

@media(max-width:700px){

	.expediente-header{
		flex-direction:column;
	}

	.expediente-identidad{
		flex-direction:column;
	}

	.expediente-estado-box{
		width:100%;
	}

	.expediente-tabs{
		overflow-x:auto;
	}

	.expediente-tab{
		white-space:nowrap;
	}

	.expediente-grid-datos{
		grid-template-columns:1fr;
	}

	.expediente-documentos-grid{
		grid-template-columns:1fr;
	}

	.expediente-footer{
		flex-direction:column;
		align-items:stretch;
	}

}
.expediente-cita-badge{
	width:max-content;

	display:inline-flex;
	align-items:center;
	gap:6px;

	padding:6px 10px;

	border-radius:6px;

	background:#eaf8ef;
	border:1px solid #d0ead9;

	color:#23804a;

	font-size:11px;
	font-weight:600;
}
</style>


<?php

$c = $candidato ?? [];
$documentosDeclarados = $documentosDeclarados ?? [];


$valor = static function ($dato){

	if ($dato !== null && trim((string)$dato) !== ''){
		return esc($dato);
	}

	return '<span class="text-muted">Sin registrar</span>';
};


$siNo = static function ($dato){

	if ($dato === null || $dato === ''){
		return '<span class="text-muted">Sin registrar</span>';
	}

	return (int)$dato === 1
		? '<span class="texto-si">Sí</span>'
		: '<span class="texto-no">No</span>';
};


/*
|--------------------------------------------------------------------------
| Selfie
|--------------------------------------------------------------------------
*/

$selfie = trim((string)($c['selfie'] ?? ''));


/*
|--------------------------------------------------------------------------
| Registro
|--------------------------------------------------------------------------
*/

$fechaRegistroTexto = 'Sin registrar';

if (!empty($c['created_at'])) {

	try {

		$fecha = new \DateTime($c['created_at']);
		$fechaRegistroTexto = $fecha->format('d/m/Y · H:i');

	} catch (\Exception $e) {

		$fechaRegistroTexto = $c['created_at'];
	}

}


/*
|--------------------------------------------------------------------------
| Cita
|--------------------------------------------------------------------------
*/

$fechaCita = trim((string)($c['fecha_cita'] ?? ''));
$horaCita = trim((string)($c['hora_cita'] ?? ''));

$diaCita = '--';
$mesCita = '---';
$anioCita = '----';

if ($fechaCita !== '') {

	try {

		$fechaObjeto = new \DateTime($fechaCita);

		$meses = [
			1 => 'ENE',
			2 => 'FEB',
			3 => 'MAR',
			4 => 'ABR',
			5 => 'MAY',
			6 => 'JUN',
			7 => 'JUL',
			8 => 'AGO',
			9 => 'SEP',
			10 => 'OCT',
			11 => 'NOV',
			12 => 'DIC'
		];

		$diaCita = $fechaObjeto->format('d');
		$mesCita = $meses[(int)$fechaObjeto->format('n')] ?? '---';
		$anioCita = $fechaObjeto->format('Y');

	} catch (\Exception $e) {
	}

}


$horaCitaTexto = 'Sin horario';

if ($horaCita !== '') {

	try {

		$horaObjeto = new \DateTime($horaCita);
		$horaCitaTexto = $horaObjeto->format('h:i A');

	} catch (\Exception $e) {

		$horaCitaTexto = $horaCita;
	}

}


/*
|--------------------------------------------------------------------------
| Estatus cita
|--------------------------------------------------------------------------
*/

$estatusCita = strtolower(
	trim((string)($c['estatus_cita'] ?? ''))
);

$estatusTexto = $estatusCita !== ''
	? ucfirst(str_replace('_', ' ', $estatusCita))
	: 'Pendiente';

$estatusClase = 'badge-programada';

switch ($estatusCita) {

	case 'confirmada':
		$estatusClase = 'badge-confirmada';
		break;

	case 'reagendada':
		$estatusClase = 'badge-reagendada';
		break;

	case 'presentado':
		$estatusClase = 'badge-presentado';
		break;

	case 'no_presentado':
		$estatusClase = 'badge-no-presentado';
		break;
}


/*
|--------------------------------------------------------------------------
| Actividades servicios
|--------------------------------------------------------------------------
*/

$actividadesServicios = [];

$actividadesRaw = trim(
	(string)($c['actividades_servicios'] ?? '')
);

if ($actividadesRaw !== '') {

	$actividadesJson = json_decode(
		$actividadesRaw,
		true
	);

	if (is_array($actividadesJson)) {

		$actividadesServicios = $actividadesJson;

	} else {

		$actividadesServicios = [$actividadesRaw];
	}

}


$mapaActividades = [
	'apoyo_general' => 'Apoyo general',
	'acomodo_materiales' => 'Acomodo de materiales',
	'servicios_generales' => 'Servicios generales'
];

?>


<div class="expediente-solicitud">


	<!-- ======================================================
	     HEADER
	     ====================================================== -->

	<div class="expediente-header">

		<div class="expediente-identidad">

			<div class="expediente-foto">

				<?php if ($selfie !== '') { ?>

					<img
						src="<?= base_url($selfie) ?>"
						alt="Fotografía candidato"
					>

				<?php } else { ?>

					<div class="expediente-foto-placeholder">
						<i class="ph-duotone ph-user"></i>
					</div>

				<?php } ?>

			</div>


			<div class="expediente-datos-personales">

				<div class="expediente-nombre">
					<?= esc($c['nombre'] ?? 'Sin nombre') ?>
				</div>


				<div class="expediente-folio">
					<?= esc($c['folio'] ?? 'Sin folio') ?>
				</div>


				<div class="expediente-meta">

					<div>
						<i class="ph-duotone ph-map-pin"></i>
						<?= $valor($c['ubicacion'] ?? null) ?>
					</div>


					<?php if (!empty($c['edad'])) { ?>

						<div>
							<i class="ph-duotone ph-calendar"></i>
							<?= (int)$c['edad'] ?> años
						</div>

					<?php } ?>


					<div>
						<i class="ph-duotone ph-phone"></i>
						<?= $valor($c['telefono'] ?? null) ?>
					</div>

				</div>


				<div class="expediente-registro">

					<i class="ph-duotone ph-calendar-check"></i>

					Registrado:
					<?= esc($fechaRegistroTexto) ?>

				</div>

			</div>

		</div>
		
		<?php

		/*
		|--------------------------------------------------------------------------
		| Estado general
		|--------------------------------------------------------------------------
		*/

		$estado = strtolower(
			trim((string)($c['estado'] ?? ''))
		);

		$claseEstado = 'estado-default';

		$textoEstado = $estado !== ''
			? ucfirst(str_replace('_', ' ', $estado))
			: 'Sin estatus';


		switch ($estado) {

			case 'en_proceso':

				$claseEstado =
					'estado-en-proceso';

				$textoEstado =
					'En proceso';

				break;


			case 'cita_programada':

				$claseEstado =
					'estado-cita-programada';

				$textoEstado =
					'Cita programada';

				break;


			case 'pendiente_evaluacion':

				$claseEstado =
					'estado-pendiente-evaluacion';

				$textoEstado =
					'Pendiente evaluación';

				break;


			case 'finalizado':

				$claseEstado =
					'estado-finalizado';

				$textoEstado =
					'Finalizado';

				break;


			case 'finalizado_menor_edad':
			case 'finalizado_mayor_rango':

				$claseEstado =
					'estado-finalizado-edad';

				$textoEstado =
					$estado === 'finalizado_menor_edad'
						? 'Finalizado menor edad'
						: 'Finalizado mayor rango';

				break;


			case 'cancelado':

				$claseEstado =
					'estado-cancelado';

				$textoEstado =
					'Cancelado';

				break;

		}
		?>
		<div class="expediente-estado-box">

			<div class="expediente-estado-label">
				Estado actual
			</div>

			<span class="badge-postulacion <?= $claseEstado ?>">

				<i class="ph-duotone ph-circle"></i>

				<?= esc($textoEstado) ?>

			</span>

		</div>

	</div>


	<!-- ======================================================
	     RESUMEN + CITA
	     ====================================================== -->

	<div class="expediente-grid-resumen">


		<div class="expediente-card">

			<div class="expediente-card-title">
				<i class="ph-duotone ph-user"></i>
				Resumen del candidato
			</div>


			<div class="expediente-resumen-lista">

				<div class="expediente-resumen-row">

					<span>Vacante</span>

					<strong>
						<?= $valor($c['vacante_nombre'] ?? null) ?>
					</strong>

				</div>


				<div class="expediente-resumen-row">

					<span>Localidad</span>

					<strong>
						<?= $valor($c['ubicacion'] ?? null) ?>
					</strong>

				</div>


				<div class="expediente-resumen-row">

					<span>Trabajó anteriormente</span>

					<strong>
						<?= $siNo($c['trabajo_previo'] ?? null) ?>
					</strong>

				</div>


				<div class="expediente-resumen-row">

					<span>Recomendado</span>

					<strong>
						<?= $siNo($c['recomendado'] ?? null) ?>
					</strong>

				</div>


				<div class="expediente-resumen-row">

					<span>Restricción física</span>

					<strong>
						<?= $siNo($c['tiene_restriccion_fisica'] ?? null) ?>
					</strong>

				</div>

			</div>

		</div>


		<div class="expediente-card">

			<div class="expediente-card-title">
				<i class="ph-duotone ph-calendar-check"></i>
				Próxima entrevista
			</div>


			<?php if ($fechaCita !== '') { ?>

				<div class="expediente-cita-layout">


					<div class="expediente-fecha-box">

						<div class="expediente-fecha-dia">
							<?= esc($diaCita) ?>
						</div>

						<div class="expediente-fecha-mes">
							<?= esc($mesCita) ?>
						</div>

						<div class="expediente-fecha-anio">
							<?= esc($anioCita) ?>
						</div>

					</div>


					<div class="expediente-cita-info">

						<div class="expediente-cita-hora">

							<i class="ph-duotone ph-clock"></i>

							<?= esc($horaCitaTexto) ?>

						</div>


						<div class="expediente-cita-localidad">

							<i class="ph-duotone ph-map-pin"></i>

							<?= $valor($c['ubicacion'] ?? null) ?>

						</div>


						<span class="expediente-cita-badge">

							<i class="ph-duotone ph-calendar-check"></i>

							<?= esc($estatusTexto) ?>

						</span>

					</div>


					<div class="expediente-reclutador">

						<div class="expediente-reclutador-label">
							Reclutador asignado
						</div>


						<div class="expediente-reclutador-dato">

							<i class="ph-duotone ph-user-circle"></i>

							<div>

								<strong>
									<?= !empty($c['reclutador_nombre'])
										? esc($c['reclutador_nombre'])
										: 'Sin asignar'
									?>
								</strong>

								<span>
									<?= !empty($c['reclutador_nombre'])
										? 'Asignado'
										: 'Pendiente'
									?>
								</span>

							</div>

						</div>

					</div>


				</div>

			<?php } else { ?>

				<div class="expediente-sin-cita">

					<i class="ph-duotone ph-calendar-x"></i>

					<div>

						<strong>
							Entrevista no programada
						</strong>

						<span>
							El candidato aún no tiene una cita registrada.
						</span>

					</div>

				</div>

			<?php } ?>

		</div>

	</div>


	<!-- ======================================================
	     TABS
	     ====================================================== -->

	<div class="expediente-tabs">

		<button
			type="button"
			class="expediente-tab active"
			data-tab="experiencia"
		>
			<i class="ph-duotone ph-briefcase"></i>
			Experiencia
		</button>


		<button
			type="button"
			class="expediente-tab"
			data-tab="antecedentes"
		>
			<i class="ph-duotone ph-clock-counter-clockwise"></i>
			Antecedentes
		</button>


		<button
			type="button"
			class="expediente-tab"
			data-tab="documentos"
		>
			<i class="ph-duotone ph-folder"></i>
			Documentos
		</button>


		<button
			type="button"
			class="expediente-tab"
			data-tab="seguimiento"
		>
			<i class="ph-duotone ph-note-pencil"></i>
			Seguimiento
		</button>

	</div>


	<!-- ======================================================
	     EXPERIENCIA
	     ====================================================== -->

	<div
		class="expediente-tab-content active"
		data-content="experiencia"
	>

		<div class="expediente-section-title">
			Experiencia laboral
		</div>


		<div class="expediente-grid-datos">


			<div class="expediente-dato-box">

				<span>
					Experiencia principal
				</span>

				<strong>

					<?php

					$experienciaPrincipal = trim(
						(string)($c['experiencia_principal'] ?? '')
					);

					if ($experienciaPrincipal === '') {

						echo '<span class="text-muted">Sin registrar</span>';

					} elseif (
						$experienciaPrincipal === 'otras' &&
						!empty($c['experiencia_principal_otra'])
					) {

						echo esc(
							$c['experiencia_principal_otra']
						);

					} else {

						echo esc(
							ucwords(
								str_replace(
									'_',
									' ',
									$experienciaPrincipal
								)
							)
						);

					}

					?>

				</strong>

			</div>


			<div class="expediente-dato-box">

				<span>
					Lugar de experiencia
				</span>

				<strong>

					<?php

					if (
						($c['lugar_experiencia'] ?? '') === 'otro' &&
						!empty($c['lugar_experiencia_otro'])
					) {

						echo esc(
							$c['lugar_experiencia_otro']
						);

					} else {

						echo $valor(
							$c['lugar_experiencia']
							?? null
						);

					}

					?>

				</strong>

			</div>


			<div class="expediente-dato-box">

				<span>
					Esfuerzo físico
				</span>

				<strong>
					<?= $valor($c['esfuerzo_fisico'] ?? null) ?>
				</strong>

			</div>


			<div class="expediente-dato-box">

				<span>
					Trabajo de pie
				</span>

				<strong>
					<?= $valor($c['trabajo_de_pie'] ?? null) ?>
				</strong>

			</div>

		</div>


		<?php if (!empty($actividadesServicios)) { ?>

			<div class="expediente-texto-box">

				<span>
					Actividades de servicios
				</span>


				<div class="expediente-actividades">

					<?php foreach ($actividadesServicios as $actividad) { ?>

						<?php

						$actividad = trim(
							(string)$actividad
						);

						if ($actividad === ''){
							continue;
						}

						$textoActividad =
							$mapaActividades[$actividad]
							?? ucfirst(
								str_replace(
									'_',
									' ',
									$actividad
								)
							);

						?>

						<span class="expediente-actividad-label">

							<i class="ph-duotone ph-check"></i>

							<?= esc($textoActividad) ?>

						</span>

					<?php } ?>

				</div>

			</div>

		<?php } ?>


		<?php if (
			(int)($c['tiene_restriccion_fisica'] ?? 0) === 1
		) { ?>

			<div class="expediente-alerta">

				<i class="ph-duotone ph-warning"></i>

				<div>

					<strong>
						Restricción física registrada
					</strong>

					<span>
						<?= $valor($c['restriccion_fisica'] ?? null) ?>
					</span>

				</div>

			</div>

		<?php } ?>

	</div>


	<!-- ======================================================
	     ANTECEDENTES
	     ====================================================== -->

	<div
		class="expediente-tab-content"
		data-content="antecedentes"
	>

		<div class="expediente-section-title">
			Antecedentes laborales
		</div>


		<div class="expediente-grid-datos">


			<div class="expediente-dato-box">

				<span>
					Trabajó anteriormente
				</span>

				<strong>
					<?= $siNo($c['trabajo_previo'] ?? null) ?>
				</strong>

			</div>


			<div class="expediente-dato-box">

				<span>
					Recomendado
				</span>

				<strong>
					<?= $siNo($c['recomendado'] ?? null) ?>
				</strong>

			</div>


			<?php if (
				(int)($c['trabajo_previo'] ?? 0) === 1
			) { ?>

				<div class="expediente-dato-box">

					<span>
						Fechas laboradas
					</span>

					<strong>
						<?= $valor($c['fechas_laboradas'] ?? null) ?>
					</strong>

				</div>


				<div class="expediente-dato-box">

					<span>
						Motivo de salida
					</span>

					<strong>
						<?= $valor($c['motivo_salida'] ?? null) ?>
					</strong>

				</div>

			<?php } ?>


			<?php if (
				(int)($c['recomendado'] ?? 0) === 1
			) { ?>

				<div class="expediente-dato-box">

					<span>
						Persona que recomendó
					</span>

					<strong>
						<?= $valor($c['recomendado_nombre'] ?? null) ?>
					</strong>

				</div>

			<?php } ?>

		</div>

	</div>


	<!-- ======================================================
	     DOCUMENTOS
	     ====================================================== -->

	<div
		class="expediente-tab-content"
		data-content="documentos"
	>

		<div class="expediente-section-title">
			Documentos declarados
		</div>


		<?php if (!empty($documentosDeclarados)) { ?>

			<div class="expediente-documentos-grid">

				<?php foreach ($documentosDeclarados as $documento) { ?>

					<?php

					$tieneDocumento =
						(int)(
							$documento['cuenta_con_documento']
							?? 0
						) === 1;

					?>

					<div
						class="
							expediente-documento
							<?= $tieneDocumento
								? 'documento-disponible'
								: 'documento-no-disponible'
							?>
						"
					>

						<i
							class="
								ph-duotone
								<?= $tieneDocumento
									? 'ph-check-circle'
									: 'ph-minus-circle'
								?>
							"
						></i>

						<span>
							<?= esc($documento['nombre']) ?>
						</span>

					</div>

				<?php } ?>

			</div>

		<?php } else { ?>

			<div class="expediente-vacio">

				<i class="ph-duotone ph-folder-open"></i>

				No declaró documentos disponibles.

			</div>

		<?php } ?>

	</div>


	<!-- ======================================================
	     SEGUIMIENTO
	     ====================================================== -->

	<div
		class="expediente-tab-content"
		data-content="seguimiento"
	>

		<div class="expediente-section-title">
			Seguimiento administrativo
		</div>


		<div class="expediente-grid-datos">

			<div class="expediente-dato-box">

				<span>
					Estatus de cita
				</span>

				<strong>
					<?= esc($estatusTexto) ?>
				</strong>

			</div>


			<div class="expediente-dato-box">

				<span>
					Estatus seguimiento
				</span>

				<strong>

					<?= !empty($c['estatus_seguimiento'])
						? esc(
							ucfirst(
								str_replace(
									'_',
									' ',
									$c['estatus_seguimiento']
								)
							)
						)
						: 'Sin seguimiento'
					?>

				</strong>

			</div>


			<div class="expediente-dato-box">

				<span>
					Reclutador
				</span>

				<strong>

					<?= !empty($c['reclutador_nombre'])
						? esc($c['reclutador_nombre'])
						: 'Sin asignar'
					?>

				</strong>

			</div>


			<div class="expediente-dato-box">

				<span>
					Última actualización
				</span>

				<strong>
					<?= $valor(
						$c['updated_at']
						?? $c['created_at']
						?? null
					) ?>
				</strong>

			</div>

		</div>


		<div class="expediente-texto-box">

			<span>
				Observaciones / motivo
			</span>

			<p>

				<?= !empty($c['motivo_seguimiento'])
					? esc($c['motivo_seguimiento'])
					: 'Sin observaciones registradas.'
				?>

			</p>

		</div>

	</div>


	<!-- ======================================================
	     FOOTER
	     ====================================================== -->

	<div class="expediente-footer">

		<button
			type="button"
			class="btn btn-light-primary"
			onclick="verConversacionCandidato(
				'<?= esc($c['session_id'] ?? '') ?>'
			)"
		>

			<i class="ph-duotone ph-chats-circle me-1"></i>

			Ver conversación

		</button>


		<button
			type="button"
			class="btn btn-light"
			data-bs-dismiss="modal"
		>
			Cerrar
		</button>

	</div>


</div>