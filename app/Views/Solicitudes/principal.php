<!-- ========================================= -->
<!-- CONTENIDO ÁREA SOLICITUDES TIEMPO EXTRA -->
<!-- ========================================= -->
<style>
/* ========================= */
/* FLUJO APROBACIÓN */
/* ========================= */

.approval-card{
    border:1px solid #EAECEF;
    border-radius:12px;
    padding:20px;
    background:#fff;
}

.approval-title{
    font-size:15px;
    font-weight:700;
    color:#1E293B;
    margin-bottom:25px;
}

.approval-flow{
    position:relative;
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
}

.approval-line{
    position:absolute;
    top:16px;
    left:70px;
    right:70px;
    height:2px;
    background:#E5E7EB;
    z-index:1;
}

.approval-step{
    position:relative;
    z-index:2;
    text-align:center;
    width:25%;
}

.approval-circle{
    width:32px;
    height:32px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:0 auto 10px;
    font-size:14px;
    font-weight:700;
}

/* COMPLETADO */

.approval-step.completed .approval-circle{
    background:#16A34A;
    color:#fff;
}

/* ACTIVO */

.approval-step.active .approval-circle{
    background:#F59E0B;
    color:#fff;
}

/* PENDIENTE */

.approval-step.pending .approval-circle{
    background:#9CA3AF;
    color:#fff;
}

.approval-label{
    font-size:14px;
    font-weight:700;
    color:#111827;
    margin-bottom:4px;
}

.approval-user{
    font-size:13px;
    color:#374151;
    line-height:1.3;
}

.approval-date{
    font-size:13px;
    color:#374151;
    line-height:1.3;
}
.btn-action{
    height:42px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:14px;
    transition:all .2s ease;
}

.btn-action i{
    font-size:16px;
}

.btn-outline-primary{
    border:1.5px solid #2563EB;
    color:#2563EB;
    background:#fff;
}

.btn-outline-primary:hover{
    background:#2563EB;
    color:#fff;
}

.btn-light{
    background:#fff;
    color:#374151;
}

.btn-light:hover{
    background:#F3F4F6;
}
</style>
<div class="container-fluid">

    <!-- KPIs 
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex align-items-center">

                    <div class="icon-kpi warning me-3">
                        <i class="bi bi-hourglass-split"></i>
                    </div>

                    <div>
                        <h6 class="text-muted mb-1">Pendientes Jefe</h6>
                        <h2 class="fw-bold mb-0">12</h2>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex align-items-center">

                    <div class="icon-kpi info me-3">
                        <i class="bi bi-person-check"></i>
                    </div>

                    <div>
                        <h6 class="text-muted mb-1">Pendientes Gerente</h6>
                        <h2 class="fw-bold mb-0">5</h2>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex align-items-center">

                    <div class="icon-kpi success me-3">
                        <i class="bi bi-check-circle"></i>
                    </div>

                    <div>
                        <h6 class="text-muted mb-1">Autorizadas Hoy</h6>
                        <h2 class="fw-bold mb-0">18</h2>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex align-items-center">

                    <div class="icon-kpi primary me-3">
                        <i class="bi bi-clock-history"></i>
                    </div>

                    <div>
                        <h6 class="text-muted mb-1">Horas Extra Mes</h6>
                        <h2 class="fw-bold mb-0">245.50</h2>
                    </div>

                </div>
            </div>
        </div>

    </div>-->

    <!-- ÁREA PRINCIPAL -->
    <div class="row">

        <!-- TABLA -->
        <div class="col-xl-12">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <!-- HEADER -->
                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>
                            <h3 class="fw-bold mb-1">
                                Bandeja de Solicitudes
                            </h3>

                            <p class="text-muted mb-0">
                                Gestión y seguimiento de tiempo extra
                            </p>
                        </div>
						<?php if($Tipo==1){?>
							<button class="btn btn-primary rounded-3 px-4" onClick="newSol();">
								<i class="bi bi-plus-lg me-2"></i>
								
								
								Nueva Solicitud
							</button>
						<?php }?>
                    </div>

                    <!-- TABS -->
                    <ul class="nav nav-pills custom-tabs mb-4">
						<?php if($eCodTipoUsuario==1 || $eCodTipoUsuario==2 || $eCodTipoUsuario==3){?>
							<li class="nav-item " onClick="getTodos(<?php echo $eCodTipoUsuario?>);">
								
									<button class="nav-link active nav1">
										Todas
									</button>
								
							</li>
						<?php }?>
						<?php if($eCodTipoUsuario==2 || $eCodTipoUsuario==3){?>
							<li class="nav-item " onClick="getPendientes(<?php echo $eCodTipoUsuario?>);">
								<button class="nav-link nav2">
									Pendientes
								</button>
							</li>
						<?php }?>
						
						<?php if($eCodTipoUsuario==1){?>
							<li class="nav-item " onClick="getPendientesJefe(<?php echo $eCodTipoUsuario?>);">
								<button class="nav-link nav3">
									Pendiente Jefe
								</button>
							</li>
						<?php }?>
						<?php if($eCodTipoUsuario==1 || $eCodTipoUsuario==2){?>
							<li class="nav-item " onClick="getPendientesGerente(<?php echo $eCodTipoUsuario?>);">
								<button class="nav-link nav4">
									Pendiente Gerente
								</button>
							</li>
						<?php }?>
						<?php if($eCodTipoUsuario==1 || $eCodTipoUsuario==2 || $eCodTipoUsuario==3){?>
							<li class="nav-item " onClick="getAutorizadas(<?php echo $eCodTipoUsuario?>);">
								<button class="nav-link nav5">
									Autorizadas
								</button>
							</li>
						<?php }?>

						<?php if($eCodTipoUsuario==1 || $eCodTipoUsuario==2){?>
							<li class="nav-item " onClick="getRechazadas(<?php echo $eCodTipoUsuario?>);">
								<button class="nav-link nav6">
									Rechazadas
								</button>
							</li>
						<?php }?>

                    </ul>

                    <!-- FILTROS 
                    <div class="row g-3 mb-4">

                        <div class="col-md-3">
                            <input type="date" class="form-control rounded-3">
                        </div>

                        <div class="col-md-3">
                            <select class="form-select rounded-3">
                                <option>Estado</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select class="form-select rounded-3">
                                <option>Departamento</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <input type="text"
                                   class="form-control rounded-3"
                                   placeholder="Buscar folio...">
                        </div>

                    </div>-->

                    <!-- TABLA -->
                    <div class="table-responsive" id="ContenidoTablas">

                        <table class="table align-middle custom-table" id="tableAll">

                            <thead>

                                <tr>
                                    <th>Folio</th>
                                    <th>Fecha</th>
                                    <th>Supervisor</th>
                                    <th>Depto</th>
                                    <th class="text-center">Empleados</th>
                                    <th class="text-center">Horas</th>
                                    <th class="text-center">Estado</th>
                                    
                                    <th class="text-center">Acciones</th>
                                </tr>

                            </thead>

                            <tbody>
						<?php foreach($solicitudes as $key){if($key->eCodConsecutivo!=''){?>
                                <tr>

                                    <td class="fw-semibold text-primary">
                                        TE-<?php echo $key->eCodConsecutivo?>
                                    </td>

                                    <td><?php echo $key->fhFechaSolicitud?></td>

                                    <td><?php echo $key->Nombre.' '.$key->Apellidos ?></td>

                                    <td><?php echo $key->Area?></td>

                                    <td class="text-center"><?php echo $key->TotalEmpleados?></td>

                                    <td class="text-center"><?php echo number_format($key->TotalHoras)?></td>

                                    <td class="text-center">
									<?php if($Tipo==1){?>
									
										<?php if ($key->eCodEstatus==''){?>
											<span class="badge " style="background-color: #4ca8cb"> SIN ENVIAR </span>
										<?php }?>
										<?php if ($key->eCodEstatus==1){?>
											<span class="badge " style="background-color: #9C25C3"> EN ESPERA DE ACEPTACIÓN / JEFE</span>
										<?php }?>
										<?php if ($key->eCodEstatus==2){?>
											<span class="badge " style="background-color: #73bb7e"> VALIDADA / JEFE </span>
										<?php }?>
										<?php if ($key->eCodEstatus==3){?>
											<span class="badge " style="background-color: #AC1C1E"> RECHAZADA / JEFE</span>
										<?php }?>
										<?php if ($key->eCodEstatus==4){?>
											<span class="badge " style="background-color: #73bb7e"> AUTORIZADA POR GERENCIA</span>
										<?php }?>
										<?php if ($key->eCodEstatus==5){?>
											<span class="badge " style="background-color: #AC1C1E"> RECHAZADA / GERENCIA</span>
										<?php }?>
										<?php if ($key->eCodEstatus==6){?>
											<span class="badge " style="background-color: #080808"> AUTORIZADA POR DIRECCIÓN</span>
										<?php }?>
										<?php if ($key->eCodEstatus==7){?>
											<span class="badge " style="background-color: #AC1C1E"> RECHAZADA / DIRECCIÓN</span>
										<?php }?>
									
									
									<?php }?>
									
									<?php if($Tipo==2){?>
									
										<?php if ($key->eCodEstatus==1){?>
											<span class="badge" style="background-color: #FF9800"> PENDIENTE DE VALIDAR </span>
										<?php }?>
										<?php if ($key->eCodEstatus==2){?>
											<span class="badge" style="background-color: #3964ff"> EN ESPERA DE AUTORIZACIÓN </span>
										<?php }?>
										<?php if ($key->eCodEstatus==5){?>
											<span class="badge" style="background-color: #ff397b"> RECHAZADA </span>
										<?php }?>
										<?php if ($key->eCodEstatus==4){?>
											<span class="badge" style="background-color: #73bb7e"> AUTORIZADA POR GERENCIA </span>
										<?php }?>
										
									
									
									<?php }?>
									
									<?php if($Tipo==3){?>
										<?php if ($key->eCodEstatus==2){?>
											<span class="badge " style="background-color: #FF9800"> PENDIENTE DE VALIDAR </span>
										<?php }?>
										
										 <?php if ($key->eCodEstatus==4){?>
											<span class="badge " style="background-color: #3964ff"> AUTORIZADA </span>
										<?php }?>
										 
									<?php }?>
									
									
									
                                        
                                    </td>

                                   

                                    <td class="text-center align-middle">
    
										<div class="d-flex justify-content-center gap-1">

										<?php if ($eCodTipoUsuario==1 ){?>	
											
											
												<?php if ($key->eCodEstatus=='' ){?>
													<button class="btn btn-light border btn-sm" title="Editar" onclick="EditarSolicitud(<?php echo $key->eCodConsecutivo?>);">
														<i class="fa fa-pen text-warning"></i>
													</button>
													<button class="btn btn-light border btn-sm" title="Eliminar" onclick="EliminarSTE(<?php echo $key->eCodConsecutivo?>);"> 
														<i class="fa fa-trash text-danger"></i>
													</button>
												<?php }?>
												
												<?php if ($key->eCodEstatus==3 || $key->eCodEstatus==5 || $key->eCodEstatus==7 ){?>
													<button class="btn btn-light border btn-sm" title="Editar" onclick="EditarSolicitud(<?php echo $key->eCodConsecutivo?>);">
														<i class="fa fa-pen text-warning"></i>
													</button>
													<button class="btn btn-light border btn-sm" title="Eliminar" onclick="EliminarSTE(<?php echo $key->eCodConsecutivo?>);"> 
														<i class="fa fa-trash text-danger"></i>
													</button>
												<?php }?>
												<?php if ($key->eCodEstatus==2 || $key->eCodEstatus==4 | $key->eCodEstatus==6){?>
													<!--<a onclick="DescargarExcelsOL(<?php echo $key->eCodConsecutivo?>)"  data-toggle="tooltip" data-placement="top" class="btn menu-icon  vd_bd-green vd_green"> <i class="append-icon fa fa-fw   append-icon icon-docs"></i> </a>
										-->
													<button onclick="DescargarExcelsOL(<?php echo $key->eCodConsecutivo?>)"
															class="btn btn-light border btn-sm" 
															title="Descargar Excel">
														<i class="fa fa-file-excel text-success"></i>
													</button>
												<?php }?>
												
												<button onclick="verLista(<?php echo $key->eCodConsecutivo?>);" class="btn btn-light border btn-sm" title="Detalle">
													<i class="fa fa-eye text-primary"></i>
												</button>
										<?php }?>
										
										
										<?php if ($eCodTipoUsuario==2 ){?>	
												<?php if ($key->eCodEstatus==1){?>
													
													<button class="btn btn-light border btn-sm" title="validar" onclick="validaSolTE(<?php echo $key->eCodConsecutivo?>)">
														<i class="fas fa-check-circle text-success"></i>
													</button>
												<?php }?>
												<?php if ($key->eCodEstatus==2 || $key->eCodEstatus==4 || $key->eCodEstatus==6){?>
													<button onclick="DescargarExcelsOL(<?php echo $key->eCodConsecutivo?>)"
															class="btn btn-light border btn-sm" 
															title="Descargar Excel">
														<i class="fa fa-file-excel text-success"></i>
													</button>
												<?php }?>
												<button onclick="verLista(<?php echo $key->eCodConsecutivo?>);" class="btn btn-light border btn-sm" title="Detalle">
													<i class="fa fa-eye text-primary"></i>
												</button>
										
										<?php  } ?>
										
										<?php if ($eCodTipoUsuario==3 ){?>	
												<?php if ($key->eCodEstatus==2){?>
													
													<button class="btn btn-light border btn-sm" title="validar" onclick="validaSolTE(<?php echo $key->eCodConsecutivo?>)">
														<i class="fas fa-check-circle text-success"></i>
													</button>
												<?php }?>
												<?php if ($key->eCodEstatus==2 || $key->eCodEstatus==4 || $key->eCodEstatus==6){?>
													<button onclick="DescargarExcelsOL(<?php echo $key->eCodConsecutivo?>)"
															class="btn btn-light border btn-sm" 
															title="Descargar Excel">
														<i class="fa fa-file-excel text-success"></i>
													</button>
												<?php }?>
												<button onclick="verLista(<?php echo $key->eCodConsecutivo?>);" class="btn btn-light border btn-sm" title="Detalle">
													<i class="fa fa-eye text-primary"></i>
												</button>
										
										<?php  } ?>
										
										</div>

									</td>

                                </tr>
						<?php  } } ?>
                                <!--<tr>

                                    <td class="fw-semibold text-primary">
                                        TE-00024
                                    </td>

                                    <td>20/05/2026</td>

                                    <td>María González</td>

                                    <td>Producción</td>

                                    <td>5</td>

                                    <td>20.00</td>

                                    <td>
                                        <span class="badge bg-info-subtle text-info">
                                            Pendiente Gerente
                                        </span>
                                    </td>

                                    <td>
                                        <span class="text-warning fw-semibold">
                                            Media
                                        </span>
                                    </td>

                                    <td class="text-center">

                                        <button class="btn btn-light btn-sm rounded-3">
                                            <i class="bi bi-eye"></i>
                                        </button>

                                    </td>

                                </tr>

                                <tr>

                                    <td class="fw-semibold text-primary">
                                        TE-00023
                                    </td>

                                    <td>19/05/2026</td>

                                    <td>Carlos Ramírez</td>

                                    <td>Mantenimiento</td>

                                    <td>4</td>

                                    <td>16.00</td>

                                    <td>
                                        <span class="badge bg-success-subtle text-success">
                                            Autorizado
                                        </span>
                                    </td>

                                    <td>
                                        <span class="text-success fw-semibold">
                                            Baja
                                        </span>
                                    </td>

                                    <td class="text-center">

                                        <button class="btn btn-light btn-sm rounded-3">
                                            <i class="bi bi-eye"></i>
                                        </button>

                                    </td>

                                </tr>-->

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        <!-- PANEL DETALLE -->
        <div class="col-xl-4">

            <!-- =============================== -->
<!-- DETALLE SOLICITUD TIEMPO EXTRA -->
<!-- =============================== -->

<div class="card border-0 shadow-sm rounded-4" style="display:none">

    <div class="card-body p-4">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-start mb-2">

            <div>
                <h3 class="fw-bold text-dark mb-3">
                    Solicitud TE-00025
                </h3>

            </div>

            <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2 fw-semibold">
                Pendiente Jefe
            </span>

        </div>

        <hr>

        <!-- INFORMACIÓN -->
        <div class="row mb-4">

            <!-- DATOS -->
            <div class="col-lg-12">

                <h6 class="fw-bold mb-4 text-dark">
                    Información General
                </h6>

                <div class="row gy-3">

                    <div class="col-md-8">
                        <small class="text-muted d-block mb-1">
                            Supervisor:
                        </small>

                        <span class="fw-semibold text-dark">
                            LUIS FERNANDO MACIAS SEVILLA
                        </span>
                    </div>

                    <div class="col-md-4">
                        <small class="text-muted d-block mb-1">
                            Departamento:
                        </small>

                        <span class="fw-semibold text-dark">
                            Mantenimiento
                        </span>
                    </div>

                    <div class="col-md-4">
                        <small class="text-muted d-block mb-1">
                            Empleados:
                        </small>

                        <span class="fw-semibold text-dark">
                            8
                        </span>
                    </div>
					<div class="col-md-4">
                        <small class="text-muted d-block mb-1">
                            Horas:
                        </small>

                        <span class="fw-semibold text-dark">
                            24
                        </span>
                    </div>
					<div class="col-md-4">
                        <small class="text-muted d-block mb-1">
                            Fecha:
                        </small>

                        <span class="fw-semibold text-dark">
                            2026/05-22
                        </span>
                    </div>

                    <div class="col-12">
                        <small class="text-muted d-block mb-1">
                            Observaciones:
                        </small>

                        <span class="fw-semibold text-dark">
                            Apoyo en cierre de actividades del proyecto Alpha.
                        </span>
                    </div>

                </div>

            </div>
		
           

        </div>
 <hr>
        <!-- TABLA -->
        <div>

            <h6 class="fw-bold mb-3 text-dark">
                Detalle de Empleados
            </h6>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="50">#</th>

                            <th>Empleado</th>

                            <th>Fecha</th>

                            <th>Hora Entrada</th>

                            <th>Hora Salida</th>

                            <th>Horas Extra</th>

                            <th>Motivo</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>1</td>

                            <td class="fw-semibold">
                                Carlos López
                            </td>

                            <td>21/05/2026</td>

                            <td>18:00</td>

                            <td>22:00</td>

                            <td>4.00</td>

                            <td>Cierre de proyecto</td>

                        </tr>

                        <tr>

                            <td>2</td>

                            <td class="fw-semibold">
                                María González
                            </td>

                            <td>21/05/2026</td>

                            <td>18:30</td>

                            <td>22:30</td>

                            <td>4.00</td>

                            <td>Cierre de proyecto</td>

                        </tr>

                        <tr>

                            <td>3</td>

                            <td class="fw-semibold">
                                Juan Ramírez
                            </td>

                            <td>21/05/2026</td>

                            <td>19:00</td>

                            <td>23:00</td>

                            <td>4.00</td>

                            <td>Cierre de proyecto</td>

                        </tr>

                        <tr>

                            <td>4</td>

                            <td class="fw-semibold">
                                Sofía Herrera
                            </td>

                            <td>21/05/2026</td>

                            <td>18:00</td>

                            <td>22:00</td>

                            <td>4.00</td>

                            <td>Cierre de proyecto</td>

                        </tr>

                    </tbody>

                </table>

            </div>

            

        </div>
		<!-- ===================== -->
		<!-- FLUJO DE APROBACIÓN -->
		<!-- ===================== -->
		<hr>
		<div class="approval-card">

			<h6 class="approval-title">
				Flujo de Aprobación
			</h6>

			<div class="approval-flow">

				<!-- LINEA -->
				<div class="approval-line"></div>

				<!-- STEP -->
				<div class="approval-step completed">

					<div class="approval-circle">
						1
					</div>

					<div class="approval-label">
						Supervisor
					</div>

					<div class="approval-user">
						Juan Pérez
					</div>

					<div class="approval-date">
						21/05/2026 09:15
					</div>

				</div>

				<!-- STEP -->
				<div class="approval-step active">

					<div class="approval-circle">
						2
					</div>

					<div class="approval-label">
						Jefe
					</div>

					<div class="approval-user">
						Pendiente de
					</div>

					<div class="approval-date">
						revisión
					</div>

				</div>

				<!-- STEP -->
				<div class="approval-step pending">

					<div class="approval-circle">
						3
					</div>

					<div class="approval-label">
						Gerente
					</div>

					<div class="approval-user">
						Pendiente de
					</div>

					<div class="approval-date">
						revisión
					</div>

				</div>

				<!-- STEP -->
				<div class="approval-step pending">

					<div class="approval-circle">
						<i class="bi bi-check-lg"></i>
					</div>

					<div class="approval-label">
						Autorizado
					</div>

					<div class="approval-user">
						Pendiente
					</div>

				</div>

			</div>

		</div>
		<hr>
		<div class="d-flex align-items-center gap-3">

			<!-- VER PDF -->
			<button class="btn btn-outline-primary rounded-3 px-4 fw-semibold btn-action">

				<i class="bi bi-file-earmark-pdf me-2"></i>
				Ver PDF

			</button>

			<!-- VER SOLICITUD -->
			<button class="btn btn-light border rounded-3 px-4 fw-semibold btn-action">

				<i class="bi bi-eye me-2"></i>
				Ver Solicitud

			</button>

		</div>
    </div>

</div>
			
        </div>

    </div>

</div>
<form id="formuarioSolTE" name="formuarioSolTE" method="post" class="form-horizontal" action="<?php echo base_url()?>tiempoextra/inicio/excelTiempoExtra" role="form" target="_new">
	<input type="hidden" id="idSol" name="idSol">
</form>
<script>

	var t = $('#tableAll').DataTable({
		 deferRender: false,
		  searching: false, // Quita búsqueda
		  lengthChange: false ,// Quita registros por página,
		  columnDefs: [
			{	targets: [-1],
				className: 'dt-body-left'
			},
			{	targets: [0,1,2],
				className: 'dt-body-center'
			}
		  ],
		 keys: true,
		 select: {
			style: 'single', // o 'multi' según tus necesidades
			items: 'row'
		  }
	});	


function newSol(){
		var parametros='opcion=agregar';
		parametros+='&titulo=alta de trabajadores';
		$.ajax({
		   type:"POST",
		   url: "<?php echo base_url()?>tiempoextra/inicio/newSol",
		   dataType: 'html',
		   data:parametros,
		   success:function(html){
			   $("#ContenidoSeccion").html(html);
			 
		   }
		});
	
}
function verLista(eCodSolicitud){
	
	
	var parametros='opcion=detalle';
	parametros+='&titulo=Detalle de trabajadores';
	parametros+='&eCodConsecutivo='+eCodSolicitud;
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/newSol",
	   dataType: 'html',
	   data:parametros,
	   success:function(html){
		   $("#ContenidoSeccion").html(html);
	   }
	});
}
function EditarSolicitud(eCodSolicitud){
		
		var parametros='opcion=editar';
		parametros+='&titulo=Editar';
		parametros+='&eCodConsecutivo='+eCodSolicitud;
		$.ajax({
		   type:"POST",
		   url: "<?php echo base_url()?>tiempoextra/inicio/newSol",
		   dataType: 'html',
		   data:parametros,
		   success:function(html){
			    $("#ContenidoSeccion").html(html);
		   }
		});
}
function EliminarSTE(eCodSolicitud){
	
	var parametros='opcion=detalle ';
	parametros+='&titulo=Eliminar Solicitud';
	parametros+='&eCodConsecutivo='+eCodSolicitud;
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/viwDeleteSTE",
	   dataType: 'html',
	   data:parametros,
	   success:function(html){
		   $('#exampleModalLive').html(html);
		   $('#exampleModalLive').modal('show');
	   }
	});
}
function validaSolTE(eCodSolicitud){
	
	var parametros='opcion=validar';
	parametros+='&titulo=Validación de  Solicitud';
	parametros+='&eCodConsecutivo='+eCodSolicitud;
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/newSol",
	   dataType: 'html',
	   data:parametros,
	   success:function(html){
		   $("#ContenidoSeccion").html(html);
	   }
	});
}
function getTodos(TipoUsuario){
	//numero 1
	
	$('.nav1').removeClass('active');
	$('.nav2').removeClass('active');
	$('.nav3').removeClass('active');
	$('.nav4').removeClass('active');
	$('.nav5').removeClass('active');
	$('.nav6').removeClass('active');
	
	$('.nav1').addClass('active');
	
	var parametros='opcion=filtrado';
	parametros+='&TipoUsuario='+TipoUsuario;
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/getTodos",
	   dataType: 'html',
	   data:parametros,
	   success:function(html){
		   $("#ContenidoTablas").html(html);
	   }
	});
}
function getPendientes(TipoUsuario){
	//numero 2
	
	$('.nav1').removeClass('active');
	$('.nav2').removeClass('active');
	$('.nav3').removeClass('active');
	$('.nav4').removeClass('active');
	$('.nav5').removeClass('active');
	$('.nav6').removeClass('active');
	
	$('.nav2').addClass('active');
	
	var parametros='opcion=filtrado';
	parametros+='&TipoUsuario='+TipoUsuario;
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/getPendientes",
	   dataType: 'html',
	   data:parametros,
	   success:function(html){
		   $("#ContenidoTablas").html(html);
	   }
	});
}
function getPendientesJefe(TipoUsuario){
	//numero 3
	
	$('.nav1').removeClass('active');
	$('.nav2').removeClass('active');
	$('.nav3').removeClass('active');
	$('.nav4').removeClass('active');
	$('.nav5').removeClass('active');
	$('.nav6').removeClass('active');
	
	$('.nav3').addClass('active');
	
	var parametros='opcion=filtrado';
	parametros+='&TipoUsuario='+TipoUsuario;
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/getPendientesJefe",
	   dataType: 'html',
	   data:parametros,
	   success:function(html){
		   $("#ContenidoTablas").html(html);
	   }
	});
}
function getPendientesGerente(TipoUsuario){
	//numero 4
	
	$('.nav1').removeClass('active');
	$('.nav2').removeClass('active');
	$('.nav3').removeClass('active');
	$('.nav4').removeClass('active');
	$('.nav5').removeClass('active');
	$('.nav6').removeClass('active');
	
	$('.nav4').addClass('active');
	
	var parametros='opcion=filtrado';
	parametros+='&TipoUsuario='+TipoUsuario;
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/getPendientesGerente",
	   dataType: 'html',
	   data:parametros,
	   success:function(html){
		   $("#ContenidoTablas").html(html);
	   }
	});
}
function getAutorizadas(TipoUsuario){
	//numero 5
	
	$('.nav1').removeClass('active');
	$('.nav2').removeClass('active');
	$('.nav3').removeClass('active');
	$('.nav4').removeClass('active');
	$('.nav5').removeClass('active');
	$('.nav6').removeClass('active');
	
	$('.nav5').addClass('active');
	
	var parametros='opcion=filtrado';
	parametros+='&TipoUsuario='+TipoUsuario;
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/getAutorizadas",
	   dataType: 'html',
	   data:parametros,
	   success:function(html){
		   $("#ContenidoTablas").html(html);
	   }
	});
}	
function getRechazadas(TipoUsuario){
	//numero 5
	
	$('.nav1').removeClass('active');
	$('.nav2').removeClass('active');
	$('.nav3').removeClass('active');
	$('.nav4').removeClass('active');
	$('.nav5').removeClass('active');
	$('.nav6').removeClass('active');
	
	$('.nav6').addClass('active');
	
	var parametros='opcion=filtrado';
	parametros+='&TipoUsuario='+TipoUsuario;
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/getRechazadas",
	   dataType: 'html',
	   data:parametros,
	   success:function(html){
		   $("#ContenidoTablas").html(html);
	   }
	});
}	
function DescargarExcelsOL(eCodSolicitd){
	$("#idSol").val(eCodSolicitd);
	document.getElementById("formuarioSolTE").submit();
}
</script>