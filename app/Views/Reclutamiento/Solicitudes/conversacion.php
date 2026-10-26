
<style>


.conversacion-modal-header{
	align-items:flex-start;
}

.conversacion-modal-subtitulo{
	font-size:11px;
	color:#7b8794;
}


/* =========================================================
   CONTENEDOR
   ========================================================= */

.conversacion-expediente{
	min-height:500px;
}


/* Información superior */

.conversacion-info{
	display:flex;
	align-items:center;
	gap:11px;

	padding:14px 20px;

	background:#fff;

	border-bottom:
		1px solid #e5e9ed;
}

.conversacion-info-icono{
	display:flex;
	align-items:center;
	justify-content:center;

	width:35px;
	height:35px;

	flex:0 0 35px;

	background:#edf4ff;

	border-radius:8px;

	color:#3778ba;
}

.conversacion-info-icono i{
	font-size:18px;
}

.conversacion-info-titulo{
	font-size:12px;
	font-weight:600;
	color:#344054;
}

.conversacion-info-texto{
	font-size:10px;
	color:#8993a0;

	margin-top:2px;
}


/* =========================================================
   MENSAJES
   ========================================================= */

.conversacion-mensajes{
	display:flex;
	flex-direction:column;

	gap:17px;

	padding:22px 25px 30px;

	min-height:470px;
}

.conversacion-fila{
	display:flex;
	align-items:flex-start;

	gap:10px;

	max-width:78%;
}


/* Usuario alineado derecha */

.conversacion-usuario{
	align-self:flex-end;

	flex-direction:row-reverse;
}


/* Asistente izquierda */

.conversacion-asistente{
	align-self:flex-start;
}


/* Avatar */

.conversacion-avatar{
	display:flex;
	align-items:center;
	justify-content:center;

	width:32px;
	height:32px;

	flex:0 0 32px;

	border-radius:50%;

	margin-top:19px;
}

.conversacion-asistente .conversacion-avatar{
	background:#eaf2ff;
	color:#3578bd;
}

.conversacion-usuario .conversacion-avatar{
	background:#e8f7ee;
	color:#308558;
}

.conversacion-avatar i{
	font-size:17px;
}


/* Contenido */

.conversacion-contenido{
	min-width:0;
}

.conversacion-cabecera{
	display:flex;
	align-items:center;

	gap:10px;

	margin-bottom:5px;
}

.conversacion-usuario .conversacion-cabecera{
	justify-content:flex-end;
}

.conversacion-autor{
	font-size:10px;
	font-weight:600;

	color:#596678;
}

.conversacion-fecha{
	display:flex;
	align-items:center;
	gap:3px;

	font-size:9px;

	color:#98a1ac;
}

.conversacion-fecha i{
	font-size:11px;
}


/* =========================================================
   BURBUJAS
   ========================================================= */

.conversacion-burbuja{
	padding:10px 13px;

	border-radius:10px;

	font-size:12px;
	line-height:1.55;

	word-break:break-word;

	box-shadow:
		0 1px 2px rgba(16,24,40,.03);
}


/* Asistente */

.conversacion-asistente .conversacion-burbuja{
	background:#fff;

	border:
		1px solid #e2e7ec;

	color:#364152;

	border-top-left-radius:3px;
}


/* Candidato */

.conversacion-usuario .conversacion-burbuja{
	background:#edf7f1;

	border:
		1px solid #d5eadc;

	color:#344c3d;

	border-top-right-radius:3px;
}


/* =========================================================
   VACÍO
   ========================================================= */

.conversacion-vacia{
	min-height:450px;

	display:flex;
	flex-direction:column;

	align-items:center;
	justify-content:center;

	text-align:center;

	padding:40px;
}

.conversacion-vacia-icono{
	display:flex;
	align-items:center;
	justify-content:center;

	width:65px;
	height:65px;

	background:#eef1f4;

	border-radius:50%;

	color:#99a3ae;

	margin-bottom:13px;
}

.conversacion-vacia-icono i{
	font-size:32px;
}

.conversacion-vacia-titulo{
	font-size:13px;
	font-weight:600;

	color:#4f5b69;

	margin-bottom:4px;
}

.conversacion-vacia-texto{
	font-size:11px;
	color:#8a949f;
}


/* =========================================================
   LOADING
   ========================================================= */

.conversacion-cargando{
	min-height:450px;

	display:flex;
	flex-direction:column;

	align-items:center;
	justify-content:center;

	gap:9px;

	font-size:11px;

	color:#7e8995;
}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media(max-width:700px){

	.modal-conversacion-solicitud{
		width:calc(100% - 20px);
	}

	.conversacion-mensajes{
		padding:
			18px 13px 25px;
	}

	.conversacion-fila{
		max-width:92%;
	}

}
/* =========================================================
   CONTENIDO ESTRUCTURADO DEL CHAT
   ========================================================= */

.conversacion-texto{
	line-height:1.55;
}


/* =========================================================
   VACANTES MOSTRADAS AL CANDIDATO
   ========================================================= */

.conversacion-vacantes{
	display:flex;
	flex-direction:column;

	gap:7px;

	margin-top:11px;
}

.conversacion-vacante-card{
	padding:9px 11px;

	background:#f9fbfc;

	border:
		1px solid #dfe5ea;

	border-radius:8px;
}

.conversacion-vacante-titulo{
	font-size:11px;
	font-weight:600;

	color:#344054;
}

.conversacion-vacante-subtitulo{
	margin-top:2px;

	font-size:10px;

	color:#7b8794;
}
/* =========================================================
   ITINERARIO MOSTRADO AL CANDIDATO
   ========================================================= */

.conversacion-itinerario{
	margin-top:12px;

	border:
		1px solid #dfe5ea;

	border-radius:9px;

	background:#fbfcfd;

	overflow:hidden;
}

.conversacion-itinerario-header{
	display:flex;
	align-items:center;
	gap:9px;

	padding:10px 11px;

	background:#f5f8fb;

	border-bottom:
		1px solid #e3e8ed;
}

.conversacion-itinerario-icono{
	display:flex;
	align-items:center;
	justify-content:center;

	width:31px;
	height:31px;

	flex:0 0 31px;

	background:#eaf2ff;

	border-radius:8px;

	color:#3778ba;
}

.conversacion-itinerario-icono i{
	font-size:16px;
}

.conversacion-itinerario-datos{
	flex:1;
	min-width:0;
}

.conversacion-itinerario-ruta{
	font-size:11px;
	font-weight:600;

	color:#344054;
}

.conversacion-itinerario-turno{
	margin-top:1px;

	font-size:9px;

	color:#7b8794;
}

.conversacion-itinerario-horario{
	display:flex;
	align-items:center;
	gap:4px;

	font-size:9px;
	font-weight:600;

	color:#596879;

	white-space:nowrap;
}

.conversacion-itinerario-horario i{
	font-size:10px;

	color:#9aa4af;
}


/* Paradas */

.conversacion-paradas{
	padding:10px 11px 7px;
}

.conversacion-parada{
	display:grid;

	grid-template-columns:
		22px
		40px
		minmax(0,1fr);

	align-items:start;

	min-height:34px;
}

.conversacion-parada-indicador{
	position:relative;

	display:flex;
	justify-content:center;

	height:100%;
}

.conversacion-parada-numero{
	position:relative;
	z-index:2;

	display:flex;
	align-items:center;
	justify-content:center;

	width:18px;
	height:18px;

	background:#edf4ff;

	border:
		1px solid #cdddf0;

	border-radius:50%;

	font-size:8px;
	font-weight:600;

	color:#3778ba;
}

.conversacion-parada-indicador:after{
	content:"";

	position:absolute;

	top:18px;
	bottom:0;
	left:50%;

	width:1px;

	background:#dfe5ea;
}

.conversacion-parada:last-child
.conversacion-parada-indicador:after{
	display:none;
}

.conversacion-parada-hora{
	padding-top:1px;

	font-size:9px;
	font-weight:600;

	color:#596879;
}

.conversacion-parada-nombre{
	padding:
		0
		0
		8px
		3px;

	font-size:10px;
	line-height:1.4;

	color:#59636f;
}


/* Mapa */

.conversacion-itinerario-mapa{
	padding:
		9px
		11px
		10px;

	border-top:
		1px solid #e6eaee;
}

.conversacion-itinerario-mapa a{
	display:inline-flex;
	align-items:center;
	gap:5px;

	padding:6px 9px;

	background:#edf4ff;

	border-radius:6px;

	font-size:9px;
	font-weight:600;

	color:#3778ba;

	text-decoration:none;
}


/* Continuación */

.conversacion-itinerario-continuacion{
	margin-top:10px;

	padding:9px 10px;

	background:#f8fafb;

	border-left:
		3px solid #bcc8d3;

	border-radius:
		0
		7px
		7px
		0;
}

.conversacion-itinerario-continuacion-label{
	margin-bottom:3px;

	font-size:8px;
	font-weight:600;

	text-transform:uppercase;

	color:#8a95a1;
}

.conversacion-itinerario-continuacion-texto{
	font-size:10px;

	color:#556270;

	line-height:1.45;
}
/* Itinerario necesita mayor espacio horizontal */

.conversacion-fila-itinerario{
	width:100%;
	max-width:100%;
}

.conversacion-fila-itinerario .conversacion-contenido{
	flex:1;
	width:100%;
}

.conversacion-fila-itinerario .conversacion-burbuja{
	width:100%;
}
/* =========================================================
   RUTAS MOSTRADAS AL CANDIDATO
   ========================================================= */

.conversacion-rutas{
	display:flex;
	flex-direction:column;

	gap:7px;

	margin-top:11px;
}

.conversacion-ruta-card{
	padding:9px 11px;

	background:#f9fbfc;

	border:
		1px solid #dfe5ea;

	border-radius:8px;
}

.conversacion-ruta-header{
	display:flex;
	align-items:center;
	justify-content:space-between;

	gap:10px;
}

.conversacion-ruta-nombre{
	font-size:11px;
	font-weight:600;

	color:#344054;
}

.conversacion-ruta-turno{
	padding:3px 7px;

	background:#edf4ff;

	border-radius:999px;

	font-size:8px;
	font-weight:600;

	color:#3778ba;

	white-space:nowrap;
}

.conversacion-ruta-detalle{
	display:flex;
	align-items:center;
	justify-content:space-between;

	gap:10px;

	margin-top:6px;
}

.conversacion-ruta-horario{
	display:flex;
	align-items:center;

	gap:4px;

	font-size:9px;
	font-weight:500;

	color:#647182;
}

.conversacion-ruta-horario i{
	font-size:10px;
}

.conversacion-ruta-paradas{
	display:flex;
	align-items:center;

	gap:3px;

	font-size:9px;

	color:#8a949f;

	white-space:nowrap;
}

.conversacion-ruta-paradas i{
	font-size:10px;
}


/* =========================================================
   ACCIONES MOSTRADAS AL CANDIDATO
   ========================================================= */

.conversacion-acciones{
	margin-top:10px;
}

.conversacion-accion-disabled{
	display:inline-flex;
	align-items:center;

	gap:5px;

	padding:6px 9px;

	background:#f2f4f6;

	border:
		1px solid #e0e5e9;

	border-radius:7px;

	font-size:9px;
	font-weight:600;

	color:#75808c;
}

.conversacion-accion-disabled i{
	font-size:10px;
}
/* =========================================================
   BOTONES MOSTRADOS AL CANDIDATO
   ========================================================= */

.conversacion-botones{
	display:flex;
	flex-wrap:wrap;

	gap:7px;

	margin-top:10px;
}

.conversacion-boton-disabled{
	display:inline-flex;
	align-items:center;
	justify-content:center;

	min-width:58px;

	padding:6px 12px;

	background:#f5f8fb;

	border:1px solid #d8e1e8;
	border-radius:7px;

	font-size:10px;
	font-weight:600;

	color:#536474;
}
/* =========================================================
   CHECKLIST MOSTRADO AL CANDIDATO
   ========================================================= */

.conversacion-checklist{
	display:flex;
	flex-direction:column;

	gap:6px;

	margin-top:10px;
}

.conversacion-checklist-item{
	display:flex;
	align-items:center;

	gap:8px;

	padding:7px 9px;

	background:#f9fbfc;

	border:
		1px solid #e0e5ea;

	border-radius:7px;
}

.conversacion-checklist-box{
	display:flex;
	align-items:center;
	justify-content:center;

	width:18px;
	height:18px;

	flex:0 0 18px;

	color:#8a96a3;
}

.conversacion-checklist-box i{
	font-size:16px;
}

.conversacion-checklist-texto{
	font-size:10px;

	color:#4e5d6c;
}

/* =========================================================
   DETALLE DE VACANTE MOSTRADO AL CANDIDATO
   ========================================================= */

.conversacion-vacante-detalle{
	margin-top:11px;

	border:1px solid #dfe5ea;
	border-radius:9px;

	background:#fbfcfd;

	overflow:hidden;
}

.conversacion-vacante-detalle-header{
	display:flex;
	align-items:center;

	gap:10px;

	padding:11px 12px;

	background:#f7f9fb;

	border-left:4px solid #3778ba;
	border-bottom:1px solid #e3e8ed;
}

.conversacion-vacante-detalle-icono{
	display:flex;
	align-items:center;
	justify-content:center;

	width:34px;
	height:34px;

	flex:0 0 34px;

	border-radius:8px;

	color:#fff;
}

.conversacion-vacante-detalle-icono i{
	font-size:16px;
}

.conversacion-vacante-detalle-titulo{
	font-size:12px;
	font-weight:600;

	color:#344054;
}

.conversacion-vacante-detalle-sueldo{
	margin-top:2px;

	font-size:10px;
	font-weight:600;

	color:#308558;
}

.conversacion-vacante-seccion{
	padding:10px 12px;

	border-bottom:1px solid #edf0f2;
}

.conversacion-vacante-seccion:last-child{
	border-bottom:none;
}

.conversacion-vacante-seccion-titulo{
	margin-bottom:4px;

	font-size:9px;
	font-weight:600;

	text-transform:uppercase;
	letter-spacing:.25px;

	color:#8a95a1;
}

.conversacion-vacante-seccion-texto{
	font-size:10px;
	line-height:1.45;

	color:#556270;
}

.conversacion-vacante-lista{
	display:flex;
	flex-direction:column;

	gap:5px;
}

.conversacion-vacante-lista-item{
	display:flex;
	align-items:flex-start;

	gap:6px;

	font-size:10px;
	line-height:1.4;

	color:#556270;
}

.conversacion-vacante-lista-item i{
	margin-top:1px;

	font-size:11px;

	color:#4f8f70;
}

.conversacion-vacante-jornada{
	display:grid;

	grid-template-columns:
		repeat(
			2,
			minmax(0,1fr)
		);

	gap:10px;

	font-size:10px;

	color:#556270;
}

.conversacion-vacante-jornada-label{
	display:block;

	margin-bottom:2px;

	font-size:8px;
	font-weight:600;

	text-transform:uppercase;

	color:#8a95a1;
}
</style>
<?php

$mensajes =
	$mensajes ?? [];

?>


<div class="conversacion-expediente">


	<div class="conversacion-info">

		<div class="conversacion-info-icono">
			<i class="ph-duotone ph-chats-circle"></i>
		</div>

		<div>

			<div class="conversacion-info-titulo">
				Historial de conversación
			</div>

			<div class="conversacion-info-texto">
				Conversación registrada durante el proceso de postulación.
			</div>

		</div>

	</div>



	<?php if (!empty($mensajes)) { ?>


		<div class="conversacion-mensajes">


			<?php foreach ($mensajes as $mensaje) { ?>

				<?php

				$role =
					strtolower(
						trim(
							(string)($mensaje['role'] ?? '')
						)
					);

				$esUsuario =
					$role === 'user';


				$texto =
					trim(
						(string)($mensaje['message'] ?? '')
					);
					
					
				$payload = null;

				if (
					!empty($mensaje['payload'])
				) {

					$payloadDecodificado =
						json_decode(
							$mensaje['payload'],
							true
						);

					if (
						json_last_error() === JSON_ERROR_NONE &&
						is_array($payloadDecodificado)
					) {
						$payload = $payloadDecodificado;
					}
				}
				
				


				/*
				|--------------------------------------------------------------------------
				| Texto visible real del candidato
				|--------------------------------------------------------------------------
				|
				| Ejemplo:
				| message = 19
				| payload.texto_visible = "Tecomán Indeco - Turno 2"
				|--------------------------------------------------------------------------
				*/
				$textoMostrar =
					$texto;

				if (
					$esUsuario &&
					is_array($payload) &&
					!empty($payload['texto_visible'])
				) {

					$textoMostrar =
						trim(
							(string)$payload['texto_visible']
						);
				}


				$fechaTexto = '';

				if (
					!empty(
						$mensaje['created_at']
					)
				) {

					try {

						$fecha =
							new \DateTime(
								$mensaje['created_at']
							);

						$fechaTexto =
							$fecha->format(
								'd/m/Y · h:i A'
							);

					} catch (\Exception $e) {

						$fechaTexto =
							$mensaje['created_at'];
					}
				}

				?>


				<div
					class="
						conversacion-fila
						<?= $esUsuario
							? 'conversacion-usuario'
							: 'conversacion-asistente'
						?>
						<?= (
							!$esUsuario &&
							in_array(
								($payload['tipo'] ?? ''),
								[
									'itinerario',
									'cards',
									'vacante_detalle'
								],
								true
							)
						)
							? 'conversacion-fila-itinerario'
							: ''
						?>
					"
				>


					<div class="conversacion-avatar">

						<?php if ($esUsuario) { ?>

							<i class="ph-duotone ph-user"></i>

						<?php } else { ?>

							<i class="ph-duotone ph-sparkle"></i>

						<?php } ?>

					</div>


					<div class="conversacion-contenido">


						<div class="conversacion-cabecera">

							<span class="conversacion-autor">

								<?= $esUsuario
									? 'Candidato'
									: 'Asistente'
								?>

							</span>


							<?php if ($fechaTexto !== '') { ?>

								<span class="conversacion-fecha">

									<i class="ph-duotone ph-clock"></i>

									<?= esc(
										$fechaTexto
									) ?>

								</span>

							<?php } ?>

						</div>


						<div class="conversacion-burbuja">

							<?php

							$tipoPayload =
								$payload['tipo'] ?? '';

							?>


							<?php if (
								!$esUsuario &&
								$tipoPayload === 'vacantes_cards'
							) { ?>


								<div class="conversacion-texto">

									<?= nl2br(
										esc(
											$payload['mensaje']
											?? $texto
										)
									) ?>

								</div>


								<?php

								$vacantes =
									$payload['datos'] ?? [];

								?>


								<?php if (
									is_array($vacantes) &&
									!empty($vacantes)
								) { ?>


									<div class="conversacion-vacantes">


										<?php foreach (
											$vacantes
											as $vacante
										) { ?>


											<div class="conversacion-vacante-card">


												<div class="conversacion-vacante-titulo">

													<?= esc(
														$vacante['title']
														?? ''
													) ?>

												</div>


												<?php if (
													!empty(
														$vacante['subtitle']
													)
												) { ?>

													<div class="conversacion-vacante-subtitulo">

														<?= esc(
															$vacante['subtitle']
														) ?>

													</div>

												<?php } ?>


											</div>


										<?php } ?>


									</div>


								<?php } ?>

							<?php } elseif (
	!$esUsuario &&
	$tipoPayload === 'itinerario'
) { ?>

	<?php

	$datosItinerario =
		is_array(
			$payload['datos'] ?? null
		)
			? $payload['datos']
			: [];

	$ruta =
		is_array(
			$datosItinerario['ruta'] ?? null
		)
			? $datosItinerario['ruta']
			: [];

	$paradas =
		is_array(
			$datosItinerario['paradas'] ?? null
		)
			? $datosItinerario['paradas']
			: [];

	$mapa =
		is_array(
			$datosItinerario['mapa'] ?? null
		)
			? $datosItinerario['mapa']
			: [];

	$continuacion =
		is_array(
			$payload['continuacion'] ?? null
		)
			? $payload['continuacion']
			: [];

	?>


	<div class="conversacion-texto">

		<?= nl2br(
			esc(
				$payload['mensaje']
				?? $texto
			)
		) ?>

	</div>


	<?php if (!empty($ruta)) { ?>

		<div class="conversacion-itinerario">


			<div class="conversacion-itinerario-header">


				<div class="conversacion-itinerario-icono">

					<i class="ph-duotone ph-bus"></i>

				</div>


				<div class="conversacion-itinerario-datos">


					<div class="conversacion-itinerario-ruta">

						<?= esc(
							$ruta['route_name']
							?? ''
						) ?>

					</div>


					<div class="conversacion-itinerario-turno">

						<?= esc(
							$ruta['shift_name']
							?? ''
						) ?>

					</div>


				</div>


				<div class="conversacion-itinerario-horario">

					<span>
						<?= esc(
							$ruta['salida']
							?? ''
						) ?>
					</span>

					<i class="ph ph-arrow-right"></i>

					<span>
						<?= esc(
							$ruta['llegada']
							?? ''
						) ?>
					</span>

				</div>


			</div>


			<?php if (!empty($paradas)) { ?>

				<div class="conversacion-paradas">


					<?php foreach (
						$paradas
						as $parada
					) { ?>


						<div class="conversacion-parada">


							<div class="conversacion-parada-indicador">

								<div class="conversacion-parada-numero">

									<?= esc(
										$parada['orden']
										?? ''
									) ?>

								</div>

							</div>


							<div class="conversacion-parada-hora">

								<?= esc(
									$parada['hora']
									?? ''
								) ?>

							</div>


							<div class="conversacion-parada-nombre">

								<?= esc(
									$parada['nombre']
									?? ''
								) ?>

							</div>


						</div>


					<?php } ?>


				</div>

			<?php } ?>


			<?php if (
				!empty($mapa['url'])
			) { ?>

				<div class="conversacion-itinerario-mapa">

					<a
						href="<?= esc(
							$mapa['url']
						) ?>"
						target="_blank"
						rel="noopener noreferrer"
					>

						<i class="ph-duotone ph-map-trifold"></i>

						<?= esc(
							$mapa['texto']
							?? 'Consultar mapa'
						) ?>

					</a>

				</div>

			<?php } ?>


		</div>

	<?php } ?>


	<?php if (
		!empty(
			$continuacion['mensaje']
		)
	) { ?>

		<div class="conversacion-itinerario-continuacion">

			<div class="conversacion-itinerario-continuacion-label">
				Continuación
			</div>

			<div class="conversacion-itinerario-continuacion-texto">

				<?= nl2br(
					esc(
						$continuacion['mensaje']
					)
				) ?>

			</div>

		</div>

	<?php } ?>
	
	<?php } elseif (
	!$esUsuario &&
	$tipoPayload === 'cards'
) { ?>

	<div class="conversacion-texto">

		<?= nl2br(
			esc(
				$payload['mensaje']
				?? $texto
			)
		) ?>

	</div>


	<?php

	$rutas =
		is_array(
			$payload['datos'] ?? null
		)
			? $payload['datos']
			: [];

	$acciones =
		is_array(
			$payload['acciones'] ?? null
		)
			? $payload['acciones']
			: [];

	?>


	<?php if (!empty($rutas)) { ?>

		<div class="conversacion-rutas">

			<?php foreach ($rutas as $rutaCard) { ?>

				<?php

				$dataRuta =
					is_array(
						$rutaCard['data'] ?? null
					)
						? $rutaCard['data']
						: [];

				?>

				<div class="conversacion-ruta-card">


					<div class="conversacion-ruta-header">

						<div class="conversacion-ruta-nombre">

							<?= esc(
								$dataRuta['route_name']
								?? ''
							) ?>

						</div>


						<?php if (
							!empty(
								$dataRuta['shift_name']
							)
						) { ?>

							<div class="conversacion-ruta-turno">

								<?= esc(
									$dataRuta['shift_name']
								) ?>

							</div>

						<?php } ?>

					</div>


					<div class="conversacion-ruta-detalle">


						<div class="conversacion-ruta-horario">

							<i class="ph-duotone ph-clock"></i>

							<span>
								<?= esc(
									$dataRuta['salida']
									?? ''
								) ?>
							</span>

							<i class="ph ph-arrow-right"></i>

							<span>
								<?= esc(
									$dataRuta['llegada']
									?? ''
								) ?>
							</span>

						</div>


						<?php if (
							isset(
								$dataRuta['total_stops']
							)
						) { ?>

							<div class="conversacion-ruta-paradas">

								<i class="ph-duotone ph-map-pin"></i>

								<?= esc(
									$dataRuta['total_stops']
								) ?>
								paradas

							</div>

						<?php } ?>


					</div>


				</div>

			<?php } ?>

		</div>

	<?php } ?>


	<?php if (!empty($acciones)) { ?>

		<div class="conversacion-acciones">

			<?php foreach ($acciones as $accion) { ?>

				<div class="conversacion-accion-disabled">

					<i class="ph-duotone ph-arrow-right"></i>

					<?= esc(
						$accion['text']
						?? ''
					) ?>

				</div>

			<?php } ?>

		</div>

	<?php } ?>
	
	<?php } elseif (
	!$esUsuario &&
	$tipoPayload === 'buttons'
) { ?>

	<div class="conversacion-texto">

		<?= nl2br(
			esc(
				$payload['mensaje']
				?? $texto
			)
		) ?>

	</div>


	<?php

	$botones =
		is_array(
			$payload['datos'] ?? null
		)
			? $payload['datos']
			: [];

	?>


	<?php if (!empty($botones)) { ?>

		<div class="conversacion-botones">

			<?php foreach ($botones as $boton) { ?>

				<div class="conversacion-boton-disabled">

					<?= esc(
						$boton['text']
						?? ''
					) ?>

				</div>

			<?php } ?>

		</div>

	<?php } ?>
	
	<?php } elseif (
	!$esUsuario &&
	$tipoPayload === 'checklist'
) { ?>

	<div class="conversacion-texto">

		<?= nl2br(
			esc(
				$payload['mensaje']
				?? $texto
			)
		) ?>

	</div>

	<?php

	$opcionesChecklist =
		is_array(
			$payload['datos'] ?? null
		)
			? $payload['datos']
			: [];

	?>

	<?php if (!empty($opcionesChecklist)) { ?>

		<div class="conversacion-checklist">

			<?php foreach (
				$opcionesChecklist
				as $opcion
			) { ?>

				<div class="conversacion-checklist-item">

					<div class="conversacion-checklist-box">

						<i class="ph ph-square"></i>

					</div>

					<div class="conversacion-checklist-texto">

						<?= esc(
							$opcion['text']
							?? ''
						) ?>

					</div>

				</div>

			<?php } ?>

		</div>

	<?php } ?>
	
	<?php } elseif (
	!$esUsuario &&
	$tipoPayload === 'vacante_detalle'
) { ?>

	<?php

	$detalleVacante =
		is_array(
			$payload['datos'] ?? null
		)
			? $payload['datos']
			: [];

	$beneficios =
		!empty($detalleVacante['beneficios'])
			? preg_split(
				'/\r\n|\r|\n/',
				$detalleVacante['beneficios']
			)
			: [];

	$horarios =
		!empty($detalleVacante['horarios'])
			? preg_split(
				'/\r\n|\r|\n/',
				$detalleVacante['horarios']
			)
			: [];

	?>

	<div class="conversacion-texto">

		<?= nl2br(
			esc(
				$payload['mensaje']
				?? $texto
			)
		) ?>

	</div>


	<?php if (!empty($detalleVacante)) { ?>

		<div class="conversacion-vacante-detalle">


			<div
				class="conversacion-vacante-detalle-header"
				style="
					border-left-color:
					<?= esc(
						$detalleVacante['color']
						?? '#3778ba'
					) ?>;
				"
			>


				<div
					class="conversacion-vacante-detalle-icono"
					style="
						background:
						<?= esc(
							$detalleVacante['color']
							?? '#3778ba'
						) ?>;
					"
				>

					<i class="<?= esc(
						$detalleVacante['icono']
						?? 'fa-solid fa-briefcase'
					) ?>"></i>

				</div>


				<div>

					<div class="conversacion-vacante-detalle-titulo">

						<?= esc(
							$detalleVacante['nombre']
							?? ''
						) ?>

					</div>

					<?php if (
						!empty(
							$detalleVacante['sueldo']
						)
					) { ?>

						<div class="conversacion-vacante-detalle-sueldo">

							<?= esc(
								$detalleVacante['sueldo']
							) ?>

						</div>

					<?php } ?>

				</div>


			</div>


			<?php if (
				!empty(
					$detalleVacante['descripcion']
				)
			) { ?>

				<div class="conversacion-vacante-seccion">

					<div class="conversacion-vacante-seccion-titulo">
						Descripción
					</div>

					<div class="conversacion-vacante-seccion-texto">

						<?= esc(
							$detalleVacante['descripcion']
						) ?>

					</div>

				</div>

			<?php } ?>


			<?php if (
				!empty(
					$detalleVacante['actividades']
				)
			) { ?>

				<div class="conversacion-vacante-seccion">

					<div class="conversacion-vacante-seccion-titulo">
						Actividades
					</div>

					<div class="conversacion-vacante-seccion-texto">

						<?= esc(
							$detalleVacante['actividades']
						) ?>

					</div>

				</div>

			<?php } ?>


			<?php if (!empty($beneficios)) { ?>

				<div class="conversacion-vacante-seccion">

					<div class="conversacion-vacante-seccion-titulo">
						Beneficios
					</div>

					<div class="conversacion-vacante-lista">

						<?php foreach ($beneficios as $beneficio) { ?>

							<?php if (
								trim($beneficio) !== ''
							) { ?>

								<div class="conversacion-vacante-lista-item">

									<i class="ph-duotone ph-check-circle"></i>

									<span>
										<?= esc(
											trim($beneficio)
										) ?>
									</span>

								</div>

							<?php } ?>

						<?php } ?>

					</div>

				</div>

			<?php } ?>


			<?php if (!empty($horarios)) { ?>

				<div class="conversacion-vacante-seccion">

					<div class="conversacion-vacante-seccion-titulo">
						Horarios
					</div>

					<div class="conversacion-vacante-lista">

						<?php foreach ($horarios as $horario) { ?>

							<?php if (
								trim($horario) !== ''
							) { ?>

								<div class="conversacion-vacante-lista-item">

									<i class="ph-duotone ph-clock"></i>

									<span>
										<?= esc(
											trim($horario)
										) ?>
									</span>

								</div>

							<?php } ?>

						<?php } ?>

					</div>

				</div>

			<?php } ?>


			<?php if (
				!empty(
					$detalleVacante['dias_laborales']
				) ||
				!empty(
					$detalleVacante['descanso']
				)
			) { ?>

				<div class="conversacion-vacante-seccion conversacion-vacante-jornada">

					<?php if (
						!empty(
							$detalleVacante['dias_laborales']
						)
					) { ?>

						<div>

							<span class="conversacion-vacante-jornada-label">
								Días laborales
							</span>

							<span>
								<?= esc(
									$detalleVacante['dias_laborales']
								) ?>
							</span>

						</div>

					<?php } ?>


					<?php if (
						!empty(
							$detalleVacante['descanso']
						)
					) { ?>

						<div>

							<span class="conversacion-vacante-jornada-label">
								Descanso
							</span>

							<span>
								<?= esc(
									$detalleVacante['descanso']
								) ?>
							</span>

						</div>

					<?php } ?>

				</div>

			<?php } ?>


		</div>

	<?php } ?>
							<?php } else { ?>


								<?= nl2br(
									esc($texto)
								) ?>


							<?php } ?>


						</div>


					</div>

				</div>


			<?php } ?>


		</div>


	<?php } else { ?>


		<div class="conversacion-vacia">

			<div class="conversacion-vacia-icono">

				<i class="ph-duotone ph-chats"></i>

			</div>

			<div class="conversacion-vacia-titulo">
				No hay conversación registrada
			</div>

			<div class="conversacion-vacia-texto">
				No se encontraron mensajes asociados a esta solicitud.
			</div>

		</div>


	<?php } ?>


</div>