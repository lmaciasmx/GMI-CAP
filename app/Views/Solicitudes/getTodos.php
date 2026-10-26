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
													<!--<a onclick="DescargarExcelsOL(<?php echo $key->eCodConsecutivo?>)"  data-toggle="tooltip" data-placement="top" class="btn menu-icon  vd_bd-green vd_green"> <i class="append-icon fa fa-fw   append-icon icon-docs"></i> </a>
													-->
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
													<!--<a onclick="DescargarExcelsOL(<?php echo $key->eCodConsecutivo?>)"  data-toggle="tooltip" data-placement="top" class="btn menu-icon  vd_bd-green vd_green"> <i class="append-icon fa fa-fw   append-icon icon-docs"></i> </a>
													-->
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
</script>