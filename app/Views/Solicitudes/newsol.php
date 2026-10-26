<!-- ===================================================== -->
<!-- CAPTURA SOLICITUD TIEMPO EXTRA -->
<!-- ===================================================== -->


<input type="hidden" id="codigoSolicitud" name="codigoSolicitud" value="<?php echo isset($eCodSolicitud) ? $eCodSolicitud:''?>">
<div class="container-fluid p-2 bg-main min-vh-100">

    <!-- HEADER -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        <!-- TOP BAR -->
        <div class="top-bar px-4 py-3 d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center">
			<?php if($Tipo==1){?>
				<?php if($opcion=="agregar"){?>
					<div class="step-number me-3">
						1
					</div>

					<div>
						<h5 class="text-white fw-bold mb-0">
							CAPTURA - SUPERVISOR
						</h5>

						<small class="text-light opacity-75">
							Solicitud de tiempo extra
						</small>
					</div>
				<?php }?>
				<?php if(trim($opcion)=="detalle" || trim($opcion)=="editar"){
					if($DatosSolicitud[0]->eCodEstatus==''){?>
						<div class="step-number me-3">
							1
						</div>

						<div>
							<h5 class="text-white fw-bold mb-0">
								SIN ENVIAR - SUPERVISOR
							</h5>

							<small class="text-light opacity-75">
								Solicitud sin enviar
							</small>
						</div>
					<?php }?>
					<?php if($DatosSolicitud[0]->eCodEstatus==1){?>
						<div class="step-number me-3">
							2
						</div>

						<div>
							<h5 class="text-white fw-bold mb-0">
								REVISION - JEFE
							</h5>

							<small class="text-light opacity-75">
								Se ha enviado la solicitud al siguiente nive y se encuentra en espera de validación
							</small>
						</div>
					<?php }?>
					<?php if($DatosSolicitud[0]->eCodEstatus==2){?>
						<div class="step-number me-3">
							3
						</div>

						<div>
							<h5 class="text-white fw-bold mb-0">
								REVISION - GERENTE
							</h5>

							<small class="text-light opacity-75">
								Solicitud validada por el jefe, en espera de aceptación del siguiente nivel 
							</small>
						</div>
					<?php }?>
					<?php if($DatosSolicitud[0]->eCodEstatus==3){?>
						<div class="step-number me-3">
							1
						</div>

						<div>
							<h5 class="text-white fw-bold mb-0">
								CAPTURA - SUPERVISOR 
							</h5>

							<small class="text-light opacity-75">
								Solicitud rechazada.
							</small>
						</div>
					<?php }?>
					<?php if($DatosSolicitud[0]->eCodEstatus==4){?>
						<div class="step-number me-3">
							1
						</div>

						<div>
							<h5 class="text-white fw-bold mb-0">
								VALIDADA - GERENTE 
							</h5>

							<small class="text-light opacity-75">
								Solicitud Validada.
							</small>
						</div>
					<?php }?>
					<?php if($DatosSolicitud[0]->eCodEstatus==5){?>
						<div class="step-number me-3">
							1
						</div>

						<div>
							<h5 class="text-white fw-bold mb-0">
								RECHAZADA - GERENTE 
							</h5>

							<small class="text-light opacity-75">
								Solicitud Rechazada.
							</small>
						</div>
					<?php }?>
				<?php }?>
			<?php }?>
			<?php if($Tipo==2){?>
					<?php if(trim($opcion)=="detalle" || trim($opcion)=="validar"){?>
						<?php if($DatosSolicitud[0]->eCodEstatus==1){?>
							<div class="step-number me-3">
								2
							</div>

							<div>
								<h5 class="text-white fw-bold mb-0">
									PENDIENTE - JEFE
								</h5>

								<small class="text-light opacity-75">
									Solicitud pendiente por validar , se requiere su autorización  
								</small>
							</div>
						<?php }?>
					<?php }?>
					<?php if(trim($opcion)=="detalle" || trim($opcion)=="validar"){?>
						<?php if($DatosSolicitud[0]->eCodEstatus==2){?>
							<div class="step-number me-3">
								3
							</div>

							<div>
								<h5 class="text-white fw-bold mb-0">
									REVISION - GERENTE
								</h5>

								<small class="text-light opacity-75">
									Solicitud Pendiente de Autorizar  
								</small>
							</div>
						<?php }?>
						<?php if($DatosSolicitud[0]->eCodEstatus==4){?>
							<div class="step-number me-3">
								3
							</div>

							<div>
								<h5 class="text-white fw-bold mb-0">
									VALIDADA - GERENTE
								</h5>

								<small class="text-light opacity-75">
									Solicitud Validada  
								</small>
							</div>
						<?php }?>
						<?php if($DatosSolicitud[0]->eCodEstatus==5){?>
							<div class="step-number me-3">
								3
							</div>

							<div>
								<h5 class="text-white fw-bold mb-0">
									RECHAZADA - GERENTE
								</h5>

								<small class="text-light opacity-75">
									Solicitud Rechazada  
								</small>
							</div>
						<?php }?>
					<?php }?>
			<?php }?>
			<?php if($Tipo==3){?>
					<?php if(trim($opcion)=="detalle" || trim($opcion)=="validar"){?>
						<?php if($DatosSolicitud[0]->eCodEstatus==2){?>
							<div class="step-number me-3">
								2
							</div>

							<div>
								<h5 class="text-white fw-bold mb-0">
									PENDIENTE - GERENTE
								</h5>

								<small class="text-light opacity-75">
									Solicitud pendiente por validar , se requiere su autorización  
								</small>
							</div>
						<?php }?>
					<?php }?>
					<?php if(trim($opcion)=="detalle" || trim($opcion)=="validar"){?>
						<?php if($DatosSolicitud[0]->eCodEstatus==4){?>
							<div class="step-number me-3">
								3
							</div>

							<div>
								<h5 class="text-white fw-bold mb-0">
									REVISION - GERENTE
								</h5>

								<small class="text-light opacity-75">
									Solicitud Pendiente de Autorizar  
								</small>
							</div>
						<?php }?>
					<?php }?>
			<?php }?>
			
			
			
            </div>

            <!-- FLOW -->
			
			<?php if($opcion=="agregar"){?>
				<div class="flow-container d-none d-lg-flex">

					<div class="flow-step active">
						<div class="circle">1</div>
						<span>Captura</span>
					</div>

					<div class="flow-line"></div>

					<div class="flow-step">
						<div class="circle">2</div>
						<span>Revisión Jefe</span>
					</div>

					<div class="flow-line"></div>

					<div class="flow-step">
						<div class="circle">3</div>
						<span>Gerente</span>
					</div>

					<div class="flow-line"></div>

					<div class="flow-step">
						<div class="circle">4</div>
						<span>Autorizado</span>
					</div>

				</div>
			<?php }?>
			
			<?php 
			if($Tipo==1){
				if(trim($opcion)=="detalle" || trim($opcion)=="editar"){
						if($DatosSolicitud[0]->eCodEstatus==''){
							?>
							<div class="flow-container d-none d-lg-flex">

								<div class="flow-step active">
									<div class="circle">1</div>
									<span>Captura</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step">
									<div class="circle">2</div>
									<span>Revisión Jefe</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step">
									<div class="circle">3</div>
									<span>Gerente</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step">
									<div class="circle">4</div>
									<span>Autorizado</span>
								</div>

							</div>
						<?php } 
						if($DatosSolicitud[0]->eCodEstatus==1){
							?>
							<div class="flow-container d-none d-lg-flex">

								<div class="flow-step active">
									<div class="circle">1</div>
									<span>Captura</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">2</div>
									<span>Revisión Jefe</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step">
									<div class="circle">3</div>
									<span>Gerente</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step">
									<div class="circle">4</div>
									<span>Autorizado</span>
								</div>

							</div>
						<?php } 
						if($DatosSolicitud[0]->eCodEstatus==3){
							?>
							<div class="flow-container d-none d-lg-flex">

								<div class="flow-step active">
									<div class="circle">1</div>
									<span>Captura</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step ">
									<div class="circle">2</div>
									<span>Revisión Jefe</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step">
									<div class="circle">3</div>
									<span>Gerente</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step">
									<div class="circle">4</div>
									<span>Autorizado</span>
								</div>

							</div>
						<?php } 
						if($DatosSolicitud[0]->eCodEstatus==5){
							?>
							<div class="flow-container d-none d-lg-flex">

								<div class="flow-step active">
									<div class="circle">1</div>
									<span>Captura</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">2</div>
									<span>Revisión Jefe</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">3</div>
									<span>Gerente</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step">
									<div class="circle">4</div>
									<span>Autorizado</span>
								</div>

							</div>
						<?php } 
						if($DatosSolicitud[0]->eCodEstatus==4){
							?>
							<div class="flow-container d-none d-lg-flex">

								<div class="flow-step active">
									<div class="circle">1</div>
									<span>Captura</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">2</div>
									<span>Revisión Jefe</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">3</div>
									<span>Gerente</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">4</div>
									<span>Autorizado</span>
								</div>

							</div>
						<?php } 
						
					}
			}
			if($Tipo==2){
				if(trim($opcion)=="detalle"  || trim($opcion)=="validar" ){
						if($DatosSolicitud[0]->eCodEstatus==1){
							?>
							<div class="flow-container d-none d-lg-flex">

								<div class="flow-step active">
									<div class="circle">1</div>
									<span>Captura</span>
								</div>

								<div class="flow-line "></div>

								<div class="flow-step active">
									<div class="circle">2</div>
									<span>Revisión Jefe</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step">
									<div class="circle">3</div>
									<span>Gerente</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step">
									<div class="circle">4</div>
									<span>Autorizado</span>
								</div>

							</div>
						<?php } 
						if($DatosSolicitud[0]->eCodEstatus==2){
							?>
							<div class="flow-container d-none d-lg-flex">

								<div class="flow-step active">
									<div class="circle">1</div>
									<span>Captura</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">2</div>
									<span>Revisión Jefe</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">3</div>
									<span>Gerente</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step">
									<div class="circle">4</div>
									<span>Autorizado</span>
								</div>

							</div>
						<?php } 
						if($DatosSolicitud[0]->eCodEstatus==4){
							?>
							<div class="flow-container d-none d-lg-flex">

								<div class="flow-step active">
									<div class="circle">1</div>
									<span>Captura</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">2</div>
									<span>Revisión Jefe</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">3</div>
									<span>Gerente</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">4</div>
									<span>Autorizado</span>
								</div>

							</div>
						<?php } 
						if($DatosSolicitud[0]->eCodEstatus==5){
							?>
							<div class="flow-container d-none d-lg-flex">

								<div class="flow-step active">
									<div class="circle">1</div>
									<span>Captura</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">2</div>
									<span>Revisión Jefe</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">3</div>
									<span>Gerente</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step ">
									<div class="circle">4</div>
									<span>Autorizado</span>
								</div>

							</div>
						<?php } 
					}
			}
			if($Tipo==3){
				if(trim($opcion)=="detalle"  || trim($opcion)=="validar" ){
						if($DatosSolicitud[0]->eCodEstatus==2){
							?>
							<div class="flow-container d-none d-lg-flex">

								<div class="flow-step active">
									<div class="circle">1</div>
									<span>Captura</span>
								</div>

								<div class="flow-line "></div>

								<div class="flow-step active">
									<div class="circle">2</div>
									<span>Revisión Jefe</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">3</div>
									<span>Gerente</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step">
									<div class="circle">4</div>
									<span>Autorizado</span>
								</div>

							</div>
						<?php } 
						if($DatosSolicitud[0]->eCodEstatus==4){
							?>
							<div class="flow-container d-none d-lg-flex">

								<div class="flow-step active">
									<div class="circle">1</div>
									<span>Captura</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">2</div>
									<span>Revisión Jefe</span>
								</div>

								<div class="flow-line "></div>

								<div class="flow-step active">
									<div class="circle">3</div>
									<span>Gerente</span>
								</div>

								<div class="flow-line"></div>

								<div class="flow-step active">
									<div class="circle">4</div>
									<span>Autorizado</span>
								</div>

							</div>
						<?php } 
					}
			}?>
        </div>

		<?php if($opcion=="agregar" || $opcion=="editar"){?>
        <!-- BODY -->
        <div class="card-body p-4">

            

            <!-- INFORMACION GENERAL -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-body p-4">

                    <h5 class="section-title mb-4">
                        Información General
                    </h5>

                    <div class="row g-4">

                        <!-- AREA -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Área <span class="text-danger">*</span>
                            </label>

                            
							
							<select id="teCodDepartamento" name="teCodDepartamento" required class="form-select custom-input">
							<?php foreach ($departamentos as $key){?>
								<option value="<?php echo $key->eCodConsecutivo?>" <?php echo (isset($DatosSolicitud[0]->eCodArea) ? $key->eCodConsecutivo==$DatosSolicitud[0]->eCodArea ? ' selected' :'' :'') ?> ><?php echo $key->tNombre?></option>

							<?php }?>

						</select>

                        </div>

                        <!-- FECHA -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Fecha Solicitud <span class="text-danger">*</span>
                            </label>

                            <input  id="inicio" name="inicio"
                                type="date"
                                class="form-control custom-input"
								value="<?php echo (isset($DatosSolicitud[0]->fhFechaSolicitud) ? date('Y-m-d', strtotime($DatosSolicitud[0]->fhFechaSolicitud)) : '') ?>"
                            >
					
                        </div>

                        <!-- OBSERVACIONES -->
                        <div class="col-12">

                            <label class="form-label fw-semibold">
                                Observaciones
                            </label>

                            <textarea
								id="tObservaciones" name="tObservaciones"
                                class="form-control custom-input"
                                rows="5"
                                placeholder="Escriba observaciones generales..."
								
                            ><?php echo (isset($DatosSolicitud[0]->tObservaciones) ? $DatosSolicitud[0]->tObservaciones : '') ?></textarea>

                        </div>

                    </div>

                </div>

            </div>

            <!-- DETALLE -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-body p-4">

                    <!-- HEADER -->
                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>

                            <h5 class="section-title mb-1">
                                Detalle de Tiempo Extra
                            </h5>

                            <p class="text-muted small mb-0">
                                Capture empleados y detalle de tiempo extra
                            </p>

                        </div>

                       

                    </div>

                    <!-- TABLA -->
                    <!-- WRAPPER SCROLL -->
					<div class="table-responsive custom-scroll">

						<table class="table custom-table align-middle table-nowrap" id="tablesAsis">

							<thead>

								<tr>
									<th >
										
									</th>
									<th></th>
									<th >
										Empleado
									</th>

									<th >
										Hora Entrada
									</th>

									<th >
										Hora Salida
									</th>

									<th >
										Total Horas
									</th>

									<th >
										Causa
									</th>

									<th >
										Centro Costo
									</th>
									
									<th >
										Centro Destino
									</th>
									<th >
										Descripción
									</th>
									


									

								</tr>

							</thead>

							<tbody id="TableTiempoExtra">
							<?php $i=1;?>
							
							<?php if(isset($DetalleSolicitud)){ $i=0; foreach($DetalleSolicitud as $key){$i++;?>
							
								<tr id="trTiempoExtra<?php echo $i?>">
									
									<td class="text-center">

										<button  onclick="EliminarTiempoE('trTiempoExtra<?php echo $i?>')"
											type="button"
											class="btn btn-delete-row"
											title="Eliminar"
										>
											<i class="fas fa-trash-alt"></i>
										</button>
										

									</td>
									<td class="text-center" id="bAutoriza<?php echo $i?>">
										<?php if($key->eFirma==1){?>
											<i class="ph-duotone ph-check-circle"
											   style="font-size:26px;color:#198754;"></i>

											<input type="hidden"
												   id="eFirma<?php echo $i?>"
												   name="eFirma<?php echo $i?>"
												   value="1">
										<?php }else{?>
												<button onClick="Autorizar(<?php echo $i?>)" type="button"
														class="btn btn-outline-dark btn-sm fw-semibold shadow-sm btn-abrir-validacion"
														data-id="">

													<i class="ph-duotone ph-identification-card me-1" ></i>
													Autorizar

												</button>
												<input type="hidden" id="eFirma<?php echo $i?>"  name="eFirma<?php echo $i?>" value="0">
										<?php } ?>
									
									

										
									</td>
									<!-- EMPLEADO -->
									<td>
										<input  placeholder="Número empleado" class="form-control custom-input" onclick="LimpiarEmpleado(<?php echo $i?>);" type="text" id="tNumeroEmpleado<?php echo $i?>" name="tNumeroEmpleado<?php echo $i?>" style="width:300px; height:27px; text-transform:uppercase" class="validate[required] formulario ui-autocomplete-input" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off" onChange="ValidaFila(<?php echo $i?>);" value="<?php echo $key->NombreEmpleado.' '.$key->ApellidoPaterno.' '.$key->ApellidoMaterno?>">

										<input type="hidden"  id="NumeroEmpleado<?php echo $i?>" name="NumeroEmpleado<?php echo $i?>" value="<?php echo $key->NumeroEmpleado?>" >  
								
									</td>

									<!-- ENTRADA -->
									<td>
										<input  value="<?php echo $key->Hora_Entrada?>" class="form-control custom-input" type="time"  id="Hora_Entrada<?php echo $i?>" name="Hora_Entrada<?php echo $i?>" style="width:130px;"  onChange="ValidaFila(<?php echo $i?>);"  >
						

									</td>

									<!-- SALIDA -->
									<td>

										<input  value="<?php echo $key->Hora_Salida?>" class="form-control custom-input" type="time"   id="Hora_Salida<?php echo $i?>" name="Hora_Salida<?php echo $i?>" style="width:130px;" maxlength="8" onChange="ValidaFila(<?php echo $i?>);"  >
									

									</td>

									<!-- TOTAL -->
									<td>
										<input value="<?php echo $key->TotalHoras?>" class="form-control custom-input" type="number"  id="TotalHoras<?php echo $i?>" name="TotalHoras<?php echo $i?>" style="width: 100px; text-align: center" onChange="ValidaFilaHora(<?php echo $i?>);" >

										

									</td>

									<!-- CAUSA -->
									<td>
										<select id="eCodCausa<?php echo $i?>" name="eCodCausa<?php echo $i?>" style="width: 200px;" class="form-select custom-input" onChange="ValidaFila(<?php echo $i?>);">
										<option value="">selecciona opción</option>
										 <?php foreach ($causas as $key2){?>
											<option value="<?php echo $key2->eCodConsecutivo?>" <?php echo ($key2->eCodConsecutivo==$key->eCodCausa ? 'selected' :'')?> > <?php echo $key2->tClave.' '.$key2->tNombre?></option>  
										 <?php }?>
									</select>  
										

									</td>

									<!-- CENTRO COSTO -->
									<td>

										<select id="tCodCentroCosto<?php echo $i?>" name="tCodCentroCosto<?php echo $i?>" style="width: 200px;" class="form-select custom-input" onChange="ValidaFila(<?php echo $i?>);" disabled >
										 <?php foreach ($centrocosto as $key2){?>
											<option value="<?php echo $key2->claveValor?>" <?php echo ($key2->claveValor==$key->tCodCentroCosto ? 'selected' :'')?>> <?php echo $key2->Valor?></option>  
										 <?php }?>
									   </select>  

									</td>
									<!-- DESTINO -->
									<td>

										<select id="tCodCentroCostoDestino<?php echo $i?>" name="tCodCentroCostoDestino<?php echo $i?>" style="width: 200px;" class="form-select custom-input" onChange="ValidaFila(<?php echo $i?>);">
										 <option value="">selecciona opción</option>
										  <?php foreach ($centrocosto as $key2){?>
											<option value="<?php echo $key2->claveValor?>" <?php echo ($key2->claveValor==$key->tCodCentroCostoDestino ? 'selected' :'')?>> <?php echo $key2->Valor?></option>  
										 <?php }?>
									   </select>   	

									</td>
									<!-- DESCRIPCION -->
									<td>

										
										<input type="text" id="tDescripcion<?php echo $i?>" name="tDescripcion<?php echo $i?>" maxlength="200" style="width: 200px;" class="form-control custom-input" onChange="ValidaFila(<?php echo $i?>);" value="<?php echo $key->tDescripcion?>"> 	
								

									</td>

									

									

								</tr>
							
							<?php }} $i++ ?>
								<tr id="trTiempoExtra<?php echo $i?>">
								
									<td class="text-center">

										<button  onclick="EliminarTiempoE('trTiempoExtra<?php echo $i?>')"
											type="button"
											class="btn btn-delete-row"
											title="Eliminar"
										>
											<i class="fas fa-trash-alt"></i>
										</button>

									</td>
									<td class="text-center" id="bAutoriza<?php echo $i?>">

										<button onClick="Autorizar(<?php echo $i?>)" type="button"
												class="btn btn-outline-dark btn-sm fw-semibold shadow-sm btn-abrir-validacion"
												>

											<i class="ph-duotone ph-identification-card me-1"></i>
											Autorizar
											
										</button> 
										<input type="hidden" id="eFirma<?php echo $i?>"  name="eFirma<?php echo $i?>" value="0">
									</td>
									<!-- EMPLEADO -->
									<td>
										<input  placeholder="Número empleado" class="form-control custom-input" onclick="LimpiarEmpleado(<?php echo $i?>);" type="text" id="tNumeroEmpleado<?php echo $i?>" name="tNumeroEmpleado<?php echo $i?>" style="width:300px; height:27px; text-transform:uppercase" class="validate[required] formulario ui-autocomplete-input" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off" onChange="ValidaFila(<?php echo $i?>);" >

										<input type="hidden"  id="NumeroEmpleado<?php echo $i?>" name="NumeroEmpleado<?php echo $i?>"  >  
								
									</td>

									<!-- ENTRADA -->
									<td>
										<input  class="form-control custom-input" type="time"  id="Hora_Entrada<?php echo $i?>" name="Hora_Entrada<?php echo $i?>" style="width:130px;"  onChange="ValidaFila(<?php echo $i?>);"  >
						

									</td>

									<!-- SALIDA -->
									<td>

										<input  class="form-control custom-input" type="time"   id="Hora_Salida<?php echo $i?>" name="Hora_Salida<?php echo $i?>" style="width:130px;" maxlength="8" onChange="ValidaFila(<?php echo $i?>);"  >
									

									</td>

									<!-- TOTAL -->
									<td>
										<input class="form-control custom-input" type="number"  id="TotalHoras<?php echo $i?>" name="TotalHoras<?php echo $i?>" style="width: 100px; text-align: center" onChange="ValidaFilaHora(<?php echo $i?>);" >

										

									</td>

									<!-- CAUSA -->
									<td>
										<select id="eCodCausa<?php echo $i?>" name="eCodCausa<?php echo $i?>" style="width: 200px;" class="form-select custom-input" onChange="ValidaFila(<?php echo $i?>);">
										<option value="">selecciona opción</option>
										 <?php foreach ($causas as $key){?>
											<option value="<?php echo $key->eCodConsecutivo?>" > <?php echo $key->tClave.' '.$key->tNombre?></option>  
										 <?php }?>
									</select>  
										

									</td>

									<!-- CENTRO COSTO -->
									<td>

										<select id="tCodCentroCosto<?php echo $i?>" name="tCodCentroCosto<?php echo $i?>" style="width: 200px;" class="form-select custom-input" onChange="ValidaFila(<?php echo $i?>);" disabled >
										 <?php foreach ($centrocosto as $key){?>
											<option value="<?php echo $key->claveValor?>" > <?php echo $key->Valor?></option>  
										 <?php }?>
									   </select>  

									</td>
									<!-- DESTINO -->
									<td>

										<select id="tCodCentroCostoDestino<?php echo $i?>" name="tCodCentroCostoDestino<?php echo $i?>" style="width: 200px;" class="form-select custom-input" onChange="ValidaFila(<?php echo $i?>);">
										 <option value="">selecciona opción</option>
										 <?php foreach ($centrocosto as $key){?>
											<option value="<?php echo $key->claveValor?>" > <?php echo $key->Valor?></option>  
										 <?php }?>
									   </select>   	

									</td>
									<!-- DESCRIPCION -->
									<td>

										
										<input type="text" id="tDescripcion<?php echo $i?>" name="tDescripcion<?php echo $i?>" maxlength="200" style="width: 200px;" class="form-control custom-input" onChange="ValidaFila(<?php echo $i?>);" > 	
								

									</td>

									

									

								</tr>

							</tbody>

						</table>

					</div>

                </div>

            </div>

           

            <!-- FOOTER -->
            <div class="d-flex justify-content-between">

                <button class="btn btn-light px-5 py-3 rounded-pill" onClick="CargaSeccion(1)">

                    Regresar

                </button>

                <div>
					<?php if($opcion=="agregar" || $opcion=="editar" ){?>
						<button class="btn btn-outline-primary px-5 py-3 rounded-pill me-2" onclick="GuardarSolicitud(1);" >

							Guardar

						</button>

						<button class="btn btn-success px-5 py-3 rounded-pill" onclick="GuardarSolicitud(2);">

							<i class="fas fa-paper-plane me-2"></i>

							Enviar a Jefe

						</button>
					<?php }?>
                </div>

            </div>

        </div>
		<?php }else{?>
			<!-- BODY -->
        <div class="card-body p-4">

            <!-- HEADER INFO -->
            
			<!-- INFORMACION -->
            <div class="row g-1 mb-4">

                <!-- DATOS -->
                <div class="col-lg-12">

                    <div class="card border-0 shadow-sm rounded-4 h-100">

                        <div class="card-body p-4">

                            <div class="row g-2">

                                <div class="col-md-4">

                                    <label class="label-title">
                                        <strong>Folio</strong>
                                    </label>

                                    <div class="info-box">
                                        TE-<?php echo (isset($DatosSolicitud[0]->eCodConsecutivo) ? $DatosSolicitud[0]->eCodConsecutivo : '') ?>
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <label class="label-title">
                                         <strong>Supervisor</strong>
                                    </label>

                                    <div class="info-box">
                                        <?php echo (isset($DatosSolicitud[0]->Supervisor) ? $DatosSolicitud[0]->Supervisor : '') ?>
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <label class="label-title">
                                         <strong>Fecha Solicitud</strong>
                                    </label>

                                    <div class="info-box">
                                        <?php echo (isset($DatosSolicitud[0]->fhFechaSolicitud) ? $DatosSolicitud[0]->fhFechaSolicitud : '') ?>
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <label class="label-title">
                                         <strong>Área</strong>
                                    </label>

                                    <div class="info-box">
                                        <?php echo (isset($DatosSolicitud[0]->Area) ? $DatosSolicitud[0]->Area : '') ?>
                                    </div>

                                </div>

                                <div class="col-md-8">

                                    <label class="label-title">
                                         <strong>Observaciones</strong>
                                    </label>

                                    <div class="info-box">
                                        <?php echo (isset($DatosSolicitud[0]->tObservaciones) ? $DatosSolicitud[0]->tObservaciones : '') ?>
                                    </div>

                                </div>
								<div class="col-md-4">
									<?php if($Tipo==1){?>
										<label class="label-title">
											 <strong>Jefe</strong>
										</label>

										<div class="info-box">
											 <?php echo (isset($DatosSolicitud[0]->Jefe) ? $DatosSolicitud[0]->Jefe : 'Pendiente Asignación') ;
											/*$bJefes=0;
											foreach($Jefes as $keyJ){
												echo $keyJ->Nombre.' '.$keyJ->Apellidos;
												echo '<br>';
											}*/
											 ?>
										</div>
									<?php }?>
									<?php if($Tipo==2){?>
										<label class="label-title">
											 <strong>Gerente</strong>
										</label>

										<div class="info-box">
											 <?php echo (isset($DatosSolicitud[0]->Gerente) ? $DatosSolicitud[0]->Gerente : 'Pendiente Asignación') ;
											/*$bJefes=0;
											foreach($Jefes as $keyJ){
												echo $keyJ->Nombre.' '.$keyJ->Apellidos;
												echo '<br>';
											}*/
											 ?>
										</div>
									<?php }?>
									<?php if($Tipo==3){?>
										<label class="label-title">
											 <strong>Jefe</strong>
										</label>

										<div class="info-box">
											 <?php echo (isset($DatosSolicitud[0]->Jefe) ? $DatosSolicitud[0]->Jefe : 'Pendiente Asignación') ;
											/*$bJefes=0;
											foreach($Jefes as $keyJ){
												echo $keyJ->Nombre.' '.$keyJ->Apellidos;
												echo '<br>';
											}*/
											 ?>
										</div>
									<?php }?>
                                </div>
								<?php if($Tipo==1 && $DatosSolicitud[0]->eCodEstatus==3){?>
									<div class="col-md-6">

										<label class="label-title" >
											 <strong>Motivo  Rechazo</strong>
										</label>

										<div class="info-box" style="color:red;">
											<?php echo (isset($DatosSolicitud[0]->tMotivoRechazo) ? $DatosSolicitud[0]->tMotivoRechazo : '') ?>
										</div>

									</div>
								<?php }?>
								<?php if($Tipo==2 && $DatosSolicitud[0]->eCodEstatus==5){?>
									<div class="col-md-6">

										<label class="label-title" >
											 <strong>Motivo  Rechazo</strong>
										</label>

										<div class="info-box" style="color:red;">
											<?php echo (isset($DatosSolicitud[0]->tMotivoRechazo2) ? $DatosSolicitud[0]->tMotivoRechazo2 : '') ?>
										</div>

									</div>
								<?php }?>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- RESUMEN -->
               
            </div>

            <!-- TABLA -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>

                            <h5 class="fw-bold mb-1">
                                Detalle de Empleados
                            </h5>

                            <small class="text-muted">
                                Información capturada por supervisor
                            </small>

                        </div>

                        <!--<button class="btn btn-outline-primary rounded-pill px-4">

                            <i class="fas fa-file-pdf me-2"></i>

                            Exportar PDF

                        </button>-->

                    </div>

                    <!-- TABLA -->
                    <div class="table-responsive custom-scroll">

                        <table class="table custom-table align-middle table-nowrap">

                            <thead>

                                <tr>

                                    <th>#</th>
                                    <th>Empleado</th>
                                    <th>Entrada</th>
                                    <th>Salida</th>
                                    <th>Total Horas</th>
                                    <th>Causa</th>
                                    <th>Centro Costo</th>
									<th>Centro Destino</th>
                                    <th>Descripción</th>                                    
                                    <th>Firma</th>

                                </tr>

                            </thead>

                            <tbody>
							<?php if(isset($DetalleSolicitud)){ $i=0; foreach($DetalleSolicitud as $key){$i++;
									
							?>
                                <tr>

                                    <td><?php echo $i?></td>

                                    <td>
                                        <?php echo $key->NumeroEmpleado.' '.$key->NombreEmpleado.' '.$key->ApellidoPaterno.' '.$key->ApellidoMaterno?>
                                    </td>

                                    <td>
                                        <?php echo $key->Hora_Entrada?>
                                    </td>

                                    <td>
                                        <?php echo $key->Hora_Salida?>
                                    </td>

                                    <td>

                                        <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                           <?php echo $key->TotalHoras?>
                                        </span>

                                    </td>

                                    <td>
                                       <?php echo $key->tClaveCausa.' '.$key->Causa?>
                                    </td>

                                    <td>
                                       <?php echo $key->CentroCostoCompleto?>
                                    </td>
									<td>
                                       <?php echo $key->CentroCostoDestino?>
                                    </td>
                             

                                    <td>
                                       <?php echo $key->tDescripcion?>
                                    </td>

                                    <td>
										<?php 
										
										if($key->eFirma==1){?>
											<span class="badge bg-success-subtle text-success px-3 py-2">
												Validado
											</span>
										<?php }?>
										<?php if($key->eFirma==0){?>
											<span class="badge bg-danger-subtle text-danger px-3 py-2">
												No Validado
											</span>
										<?php }?>
                                    </td>

                                </tr>
							<?php } }?>
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <!-- COMENTARIO -->
			<?php if($DatosSolicitud[0]->eCodEstatus==1 && $Tipo==2 && $opcion=='validar'){?>
            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-3">
                        Comentarios
                    </h5>

                    <textarea
						id="tMotivoRechazo" name="tMotivoRechazo"
                        class="form-control custom-input"
                        rows="5"
                        placeholder="Ingrese comentarios de autorización o rechazo..."
                    ></textarea>

                </div>

            </div>

            <!-- BOTONES -->
			
            <div class="d-flex justify-content-between flex-wrap gap-3">


				
					<button class="btn btn-light px-5 py-3 rounded-pill" onClick="CargaSeccion(1)">

						Regresar

					</button>

                <div>

					<button class="btn btn-danger px-5 py-3 rounded-pill" onClick="autoSolTEModal('<?=trim($DatosSolicitud[0]->eCodConsecutivo)?>',3);">

						<i class="fas fa-times me-2"></i>

						Rechazar

					</button>
                    <button class="btn btn-success px-5 py-3 rounded-pill" onClick="autoSolTEModal2('<?=trim($DatosSolicitud[0]->eCodConsecutivo)?>',2);">

                        <i class="fas fa-check me-2"></i>

                        Autorizar y Enviar a Gerente

                    </button>

                </div>

            </div>
			<?php }?>
			<?php if($DatosSolicitud[0]->eCodEstatus==2 && $Tipo==3 && $opcion=='validar'){?>
            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-3">
                        Comentarios
                    </h5>

                    <textarea
						id="tMotivoRechazo" name="tMotivoRechazo"
                        class="form-control custom-input"
                        rows="5"
                        placeholder="Ingrese comentarios de autorización o rechazo..."
                    ></textarea>

                </div>

            </div>

            <!-- BOTONES -->
			
            <div class="d-flex justify-content-between flex-wrap gap-3">


				
					<button class="btn btn-light px-5 py-3 rounded-pill" onClick="CargaSeccion(1)">

						Regresar

					</button>

                <div>

					<button class="btn btn-danger px-5 py-3 rounded-pill" onClick="autoSolTEModal('<?=trim($DatosSolicitud[0]->eCodConsecutivo)?>',5);">

						<i class="fas fa-times me-2"></i>

						Rechazar

					</button>
                    <button class="btn btn-success px-5 py-3 rounded-pill" onClick="autoSolTEModal2('<?=trim($DatosSolicitud[0]->eCodConsecutivo)?>',4);">

                        <i class="fas fa-check me-2"></i>

                        Autorizar y Enviar a Gerente

                    </button>

                </div>

            </div>
			<?php }?>
			<?php if($Tipo==1){?>
				<div class="d-flex justify-content-between">

					<button class="btn btn-light px-5 py-3 rounded-pill" onClick="CargaSeccion(1)">

						Regresar

					</button>


				</div>
			<?php }?>
			<?php if($Tipo==2 && $opcion=="detalle"){?>
				<div class="d-flex justify-content-between">

					<button class="btn btn-light px-5 py-3 rounded-pill" onClick="CargaSeccion(1)">

						Regresar

					</button>


				</div>
			<?php }?>
			<?php if($Tipo==3 && $opcion=="detalle"){?>
				<div class="d-flex justify-content-between">

					<button class="btn btn-light px-5 py-3 rounded-pill" onClick="CargaSeccion(1)">

						Regresar

					</button>


				</div>
			<?php }?>
			
        </div>
			
			
		<?php }?>

    </div>

</div>

<style>

body{
    background: #f4f7fb;
    font-family: 'Inter', sans-serif;
}

/* MAIN */

.bg-main{
    background: #f4f7fb;
}

/* TOP BAR */

.top-bar{
    background: linear-gradient(
        90deg,
        #3d414c,
        #2563eb
    );
}

/* STEP */

.step-number{
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: rgba(255,255,255,.2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-weight: bold;
}

/* FLOW */

.flow-container{
    display: flex;
    align-items: center;
}

.flow-step{
    text-align: center;
    color: rgba(255,255,255,.7);
    font-size: 12px;
}

.flow-step .circle{
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(255,255,255,.2);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    margin-bottom: 5px;
    font-weight: bold;
}

.flow-step.active{
    color: #fff;
}

.flow-step.active .circle{
    background: #fff;
    color: #2563eb;
}

.flow-line{
    width: 60px;
    height: 2px;
    background: rgba(255,255,255,.3);
    margin: 0 10px;
}

/* TITLES */

.section-title{
    font-weight: 700;
    color: #0f172a;
}

/* INPUTS */

.custom-input{
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    min-height: 38px;
    box-shadow: none !important;
}

.custom-input:focus{
    border-color: #2563eb;
}

/* TABLE */

.custom-table{
    border-collapse: separate;
    border-spacing: 0 5px;
}

.custom-table thead th{
    border: 0;
    color: #64748b;
    font-size: 13px;
    font-weight: 600;
}
.custom-table td select{
    height: 38px !important;
    min-height: 38px !important;
    padding-top: 3px !important;
    padding-bottom: 3px !important;
    font-size: 13px;
    border-radius: 10px;
}
.custom-table td input[type="time"],
.custom-table td input[type="number"],
.custom-table td input[type="text"]{

    height: 38px !important;
    min-height: 38px !important;

    padding: 4px 8px !important;

    font-size: 13px;

    border-radius: 10px;
}
.custom-table tbody tr{
    background: #fff;
    box-shadow: 0 4px 15px rgba(0,0,0,.04);
}

.custom-table tbody td{
    vertical-align: middle;
    border-top: 1px solid #f1f5f9;
    border-bottom: 1px solid #f1f5f9;
}

/* SUMMARY */

.summary-icon{
    width: 55px;
    height: 55px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    font-size: 22px;
}

.bg-primary-soft{
    background: rgba(37,99,235,.12);
}

.bg-success-soft{
    background: rgba(34,197,94,.12);
}

.bg-warning-soft{
    background: rgba(245,158,11,.12);
}

.bg-info-soft{
    background: rgba(6,182,212,.12);
}

/* BUTTON DELETE */

.btn-light-danger{
    width: 42px;
    height: 42px;
    border-radius: 12px;
    border: 0;
    background: rgba(239,68,68,.12);
    color: #ef4444;
}

.btn-light-danger:hover{
    background: #ef4444;
    color: #fff;
}
/* ======================================= */
/* SCROLL TABLA */
/* ======================================= */


</style>

<script type="text/javascript">
$(document).ready(function() {
	
	/*$("#inicio" ).datepicker({ 
		dateFormat: 'yy-mm-dd',
		//beforeShowDay: noExcursion,
	});*/
	
	let hoy = new Date().toISOString().split('T')[0];
	<?php if ($opcion=="agregar"){?>
		$('#inicio').val(hoy);
	<?php }?>
	 jQuery("[id^='tNumeroEmpleado']").each(function(){  
		var ID=this.id;
		 ID=ID.split("tNumeroEmpleado");
  		$("#tNumeroEmpleado"+ID[1]).autocomplete({
			open: function(){
				setTimeout(function () {
					$('.ui-autocomplete').css('z-index', 99999999999999);
				}, 0);
			},
			source: "<?php echo base_url().'tiempoextra/inicio/getTrabjadorbyNumeroEmpleado';?>",
			select: function(event,ui){
				$("#NumeroEmpleado"+ID[1]).val( ui.item.id);
				$("#tCodCentroCosto"+ID[1]).val(ui.item.tClaveCentro);
				//$("#tCodCentroCostoDestino"+ID[1]).val(ui.item.tClaveCentro);
				
				var TotalRepe=0;
				jQuery("[id^='NumeroEmpleado']").each(function(){  
					if(this.id==ui.item.id){
						TotalRepe++;
					}
					
				});
				
			}
		});
		 
		/* $('#Hora_Entrada'+ID[1]).timepicker({
			minuteStep: 1,
			showSeconds: false,
			showMeridian: false,
		});	
		 $('#Hora_Salida'+ID[1]).timepicker({
			minuteStep: 1,
			showSeconds: false,
			showMeridian: false,
		});	*/
	 });
});
function LimpiarEmpleado(id){
	$("#tNumeroEmpleado"+id).val('');
	$("#NumeroEmpleado"+id).val('');
}
function ValidaFila(consecutivo){
		var primero=0;
		if($("#NumeroEmpleado"+consecutivo).val()!='' && $("#Hora_Entrada"+consecutivo).val()!='' && $("#Hora_Salida"+consecutivo).val()!=''  && $("#eCodCausa"+consecutivo).val()!='' && $("#tCodCentroCosto"+consecutivo).val()!='' && $("#tCodCentroCostoDestino"+consecutivo).val()!=''){
			
			
			if($("#Hora_Salida"+consecutivo).val()>0){
				let horaEntrada = $("#Hora_Entrada"+consecutivo).val();
				let horaSalida  = $("#Hora_Salida"+consecutivo).val();
				
				let totalInput = $("#TotalHoras"+consecutivo).val();
				
				let entrada = new Date('2000-01-01 ' + horaEntrada);
				let salida  = new Date('2000-01-01 ' + horaSalida);

				//  Si la salida es menor o igual, significa que cruza medianoche
				if (salida <= entrada) {
					salida.setDate(salida.getDate() + 1);
				}
				
				// Validación opcional (si quieres evitar errores reales)
				if (horaEntrada === horaSalida) {
					$.confirm({
						boxWidth: '370px',
						useBootstrap: false,
						type: 'red',
						typeAnimated: true,
						title: 'Alerta',
						content: '<center>La hora salida no puede ser igual a la hora entrada.</center>',
						buttons: {
							cerrar: function () {}
						},
					});

					$("#TotalHoras" + consecutivo).val('');
					return;
				}

				let diferenciaMs = salida - entrada;

				let maximo = diferenciaMs / 1000 / 60 / 60;
				
				

				let valor = parseFloat($("#TotalHoras"+consecutivo).val()) || 0;

				// NO MAYOR AL RANGO
				if(valor > maximo){

					
					$.confirm({
						boxWidth: '370px',
						useBootstrap: false,
						type:'red',
						typeAnimated: true,
						title: 'Alerta',
						content: '<center>Las horas no pueden superar las horas calculadas del rango.</center>',
						buttons: {
							cerrar: function () {
							}
						},
					});
					$("#TotalHoras"+consecutivo).val('');
					return;

				}

				// NO NEGATIVO
				if(valor < 0){

					$("#TotalHoras"+consecutivo).val('');

				}
			}else{
				//validamos fechas
				
				let horaEntrada = $("#Hora_Entrada"+consecutivo).val();
				let horaSalida  = $("#Hora_Salida"+consecutivo).val();
				
				let totalInput = $("#TotalHoras"+consecutivo).val();
				
				let entrada = new Date('2000-01-01 ' + horaEntrada);
				let salida  = new Date('2000-01-01 ' + horaSalida);

				//  Si la salida es menor o igual, significa que cruza medianoche
				if (salida <= entrada) {
					salida.setDate(salida.getDate() + 1);
				}
				
				// Validación opcional (si quieres evitar errores reales)
				if (horaEntrada === horaSalida) {
					$.confirm({
						boxWidth: '370px',
						useBootstrap: false,
						type: 'red',
						typeAnimated: true,
						title: 'Alerta',
						content: '<center>La hora salida no puede ser igual a la hora entrada.</center>',
						buttons: {
							cerrar: function () {}
						},
					});

					$("#TotalHoras" + consecutivo).val('');
					return;
				}
				let diferenciaMs = salida - entrada;

				let horas = diferenciaMs / 1000 / 60 / 60;

				horas = horas.toFixed(2);
				$("#TotalHoras"+consecutivo).val(horas);
			}
			
			//add line
			var contador=1;
			var ultimoid='';
			var ultimo=0;
			var FechaUltima='';
			
			var vacios=0;
			jQuery("[id^='NumeroEmpleado']").each(function(){  
				if($("#"+this.id).val()==''){
					vacios++;
				}
			});
			
			jQuery("[id^='NumeroEmpleado']").each(function(){  
				contador++;
				
				
				ultimoid=this.id;
				ultimoid=ultimoid.split('NumeroEmpleado');  
				if(parseInt(ultimoid[1])>parseInt(ultimo)){
					ultimo=ultimoid[1];
					FechaUltima=$("#"+this.id).val();
				}
				if(contador==2){
					 primero=ultimoid[1];
				}
				
				
		   });
		   
		   
		   //validamos primero si tres dias y 9 Horas
		   
		   $.ajax({
			   type:"POST",
			   url: "<?php echo base_url()?>tiempoextra/inicio/validardiashoras",
			   dataType: 'json',
			   data:'NumeroEmpleado='+$("#NumeroEmpleado"+consecutivo).val()+'&fhFecha='+$("#inicio").val()+'&Horas='+$("#TotalHoras"+consecutivo).val(),
			   success:function(response){
				   
				if(response.success){
					
				   var tds=$("#TableTiempoExtra tr:first td").length;
				   var trs=ultimo;
				   trs++;
				  
				   if(vacios<1){
					   for(var i=0;i<tds;i++){
							i++;
							var aa="'trTiempoExtra"+trs+"'";
							var nuevaFila="<tr id='trTiempoExtra"+trs+"'>";	

						   //nuevaFila+='<td class="menu-action" style="text-align: center; min-width:100px;"><a onclick="EliminarTiempoE('+aa+')" data-original- data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-grey vd_grey"> <i class="fa fa-times"></i> </a><a data-original-title="view" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-grey vd_grey"> <i class="append-icon fa fa-fw fa-key" data-id="" onclick="firmar('+aa+');"></i> </a></td><td id="row'+trs+'" style="text-align: center"><i class="fa fa-times vd_bd-red vd_red"></i><input type="hidden" id="bValida'+trs+'" name="bValida'+trs+'" value="0"><input type="hidden" id="fhFechaFirma'+trs+'" name="fhFechaFirma'+trs+'" value=""></td><td style="text-align: center"><input onclick="LimpiarEmpleado('+trs+');" type="text" id="tNumeroEmpleado'+trs+'" name="tNumeroEmpleado'+trs+'" style="width:300px; height:27px; text-transform:uppercase" class="validate[required] formulario ui-autocomplete-input" onkeyup="javascript:this.value=this.value.toUpperCase();" required="" autocomplete="off" onChange="ValidaFila('+trs+');"><input type="hidden" placeholder="" id="NumeroEmpleado'+trs+'" name="NumeroEmpleado'+trs+'" style="height: 27px;"> </td><td style="text-align: center"><div class="input-group bootstrap-timepicker"><input  type="text"  id="Hora_Entrada'+trs+'" name="Hora_Entrada'+trs+'" style="height: 27px; width: 80px; text-align: center" maxlength="8" onChange="ValidaFila('+trs+');" ></div></td><td style="text-align: center"><div class="input-group bootstrap-timepicker"><input  type="text"  id="Hora_Salida'+trs+'" name="Hora_Salida'+trs+'" style="height: 27px; width: 80px; text-align: center" maxlength="8" onChange="ValidaFila('+trs+');" ></div></td><td style="text-align: center"><input type="text"  id="TotalHoras'+trs+'" name="TotalHoras'+trs+'" style="height: 27px; width: 80px; text-align: center" maxlength="8"   onChange="ValidaFila('+trs+');"></td><td><select id="eCodCausa'+trs+'" name="eCodCausa'+trs+'" style="height: 27px; width: 200px;" class="formulario" onChange="ValidaFila('+trs+');"></select></td><td><select id="tCodCentroCosto'+trs+'" name="tCodCentroCosto'+trs+'" style="height: 28px; width: 200px;" class="formulario" onChange="ValidaFila('+trs+');" disabled></td><td><select id="tCodCentroCostoDestino'+trs+'" name="tCodCentroCostoDestino'+trs+'" style="height: 28px; width: 200px;" class="formulario" onChange="ValidaFila('+trs+');"></td>	 <td><input type="text" id="tDescripcion'+trs+'" name="tDescripcion'+trs+'" maxlength="200" style="height: 28px; width: 250px;" class="formulario" onChange="ValidaFila('+trs+');"><td>';
						   
						   nuevaFila+='<td class="text-center"><button  onclick="EliminarTiempoE('+aa+')" type="button" class="btn btn-delete-row"	title="Eliminar"><i class="fas fa-trash-alt"></i></button></td><td class="text-center" id="bAutoriza'+trs+'"><button onClick="Autorizar('+trs+')" type="button"	class="btn btn-outline-dark btn-sm fw-semibold shadow-sm btn-abrir-validacion" data-id=""><i class="ph-duotone ph-identification-card me-1" ></i>Autorizar</button><input type="hidden" id="eFirma'+trs+'"  name="eFirma'+trs+'" value="0"></td><td><input  placeholder="Número empleado" class="form-control custom-input" onclick="LimpiarEmpleado('+trs+');" type="text" id="tNumeroEmpleado'+trs+'" name="tNumeroEmpleado'+trs+'" style="width:300px; height:27px; text-transform:uppercase" class="validate[required] formulario ui-autocomplete-input" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off" onChange="ValidaFila('+trs+');" ><input type="hidden"  id="NumeroEmpleado'+trs+'" name="NumeroEmpleado'+trs+'"  >  </td><td><input  class="form-control custom-input" type="time"  id="Hora_Entrada'+trs+'" name="Hora_Entrada'+trs+'" style="width:130px;"  onChange="ValidaFila('+trs+');"  ></td><td><input  class="form-control custom-input" type="time"   id="Hora_Salida'+trs+'" name="Hora_Salida'+trs+'" style="width:130px;" maxlength="8" onChange="ValidaFila('+trs+');"  ></td><td><input class="form-control custom-input" type="number"  id="TotalHoras'+trs+'" name="TotalHoras'+trs+'" style="width: 100px; text-align: center" onChange="ValidaFilaHora('+trs+');" ></td><td><select id="eCodCausa'+trs+'" name="eCodCausa'+trs+'" style="width: 200px;" class="form-select custom-input" onChange="ValidaFila('+trs+');"><option value="">selecciona opción</option></select></td><td><select id="tCodCentroCosto'+trs+'" name="tCodCentroCosto'+trs+'" style="width: 200px;" class="form-select custom-input" onChange="ValidaFila('+trs+');" disabled ></select> 	</td><td><select id="tCodCentroCostoDestino'+trs+'" name="tCodCentroCostoDestino'+trs+'" style="width: 200px;" class="form-select custom-input" onChange="ValidaFila('+trs+');"><option value="">selecciona opción</option></select>   </td><td><input type="text" id="tDescripcion'+trs+'" name="tDescripcion'+trs+' maxlength="200" style="width: 200px;" class="form-control custom-input" onChange="ValidaFila('+trs+');" ></td>';
						   
						 }

						$("#tablesAsis").append(nuevaFila);

						$("#tNumeroEmpleado"+trs).autocomplete({
							open: function(){
								setTimeout(function () {
									$('.ui-autocomplete').css('z-index', 99999999999999);
								}, 0);
							},
							source: "<?php echo base_url().'tiempoextra/inicio/getTrabjadorbyNumeroEmpleado';?>",
							select: function(event,ui){
								$("#NumeroEmpleado"+trs).val( ui.item.id);
								$("#tCodCentroCosto"+trs).val(ui.item.tClaveCentro);
								//$("#tCodCentroCostoDestino"+trs).val(ui.item.tClaveCentro);

								var TotalRepe=0;
								jQuery("[id^='NumeroEmpleado']").each(function(){  
									if(this.value==ui.item.id){
										TotalRepe++;
									}

								});
								if(TotalRepe>1){
									alert('El trabajador ya se encuentra seleccionado.');
									$("#NumeroEmpleado"+trs).val('');
									$("#tNumeroEmpleado"+trs).val('');
								}

							}
						});
						 
						
						$('#Hora_Entrada'+trs).val($('#Hora_Entrada'+ultimo).val());
						$('#Hora_Salida'+trs).val($('#Hora_Salida'+ultimo).val());

						
						
						$("#TotalHoras"+trs).val($("#TotalHoras"+ultimo).val());			
						$('#eCodCausa'+trs).html($('#eCodCausa'+ultimo).html());			
						$('#eCodCausa'+trs).val($('#eCodCausa'+ultimo).val());

						$('#tCodCentroCosto'+trs).html($('#tCodCentroCosto'+ultimo).html());
						$('#tCodCentroCostoDestino'+trs).html($('#tCodCentroCostoDestino'+ultimo).html());
						$('#tCodCentroCostoDestino'+trs).val($('#tCodCentroCostoDestino'+ultimo).val());
				   }
				}else{
					$("#TotalHoras"+consecutivo).val('')
					$.confirm({
						boxWidth: '370px',
						useBootstrap: false,
						type:'red',
						typeAnimated: true,
						title: 'Alerta',
						content: '<center>'+(response.mensaje)+'</center>',
						buttons: {
							cerrar: function () {
							}
						},
					});
				}
				  
			   }
			});
		   
		   
		  
			
			
			
		}else{
			
		}
	}
function ValidaFila2(consecutivo){
		var primero=0;
		if($("#NumeroEmpleado"+consecutivo).val()!='' && $("#Hora_Entrada"+consecutivo).val()!='' && $("#Hora_Salida"+consecutivo).val()!=''  && $("#eCodCausa"+consecutivo).val()!='' && $("#tCodCentroCosto"+consecutivo).val()!='' && $("#tCodCentroCostoDestino"+consecutivo).val()!=''){
			
			
			if($("#Hora_Salida"+consecutivo).val()>0){
				let horaEntrada = $("#Hora_Entrada"+consecutivo).val();
				let horaSalida  = $("#Hora_Salida"+consecutivo).val();
				
				let totalInput = $("#TotalHoras"+consecutivo).val();
				
				let entrada = new Date('2000-01-01 ' + horaEntrada);
				let salida  = new Date('2000-01-01 ' + horaSalida);

				//  Si la salida es menor o igual, significa que cruza medianoche
				if (salida <= entrada) {
					salida.setDate(salida.getDate() + 1);
				}
				
				// Validación opcional (si quieres evitar errores reales)
				if (horaEntrada === horaSalida) {
					$.confirm({
						boxWidth: '370px',
						useBootstrap: false,
						type: 'red',
						typeAnimated: true,
						title: 'Alerta',
						content: '<center>La hora salida no puede ser igual a la hora entrada.</center>',
						buttons: {
							cerrar: function () {}
						},
					});

					$("#TotalHoras" + consecutivo).val('');
					return;
				}
				let diferenciaMs = salida - entrada;

				let maximo = diferenciaMs / 1000 / 60 / 60;
				
				

				let valor = parseFloat($("#TotalHoras"+consecutivo).val()) || 0;

				// NO MAYOR AL RANGO
				if(valor > maximo){

					
					$.confirm({
						boxWidth: '370px',
						useBootstrap: false,
						type:'red',
						typeAnimated: true,
						title: 'Alerta',
						content: '<center>Las horas no pueden superar las horas calculadas del rango.</center>',
						buttons: {
							cerrar: function () {
							}
						},
					});
					$("#TotalHoras"+consecutivo).val('');
					return;

				}

				// NO NEGATIVO
				if(valor < 0){

					$("#TotalHoras"+consecutivo).val('');

				}
			}else{
				//validamos fechas
				
				let horaEntrada = $("#Hora_Entrada"+consecutivo).val();
				let horaSalida  = $("#Hora_Salida"+consecutivo).val();
				
				let totalInput = $("#TotalHoras"+consecutivo).val();
				
				let entrada = new Date('2000-01-01 ' + horaEntrada);
				let salida  = new Date('2000-01-01 ' + horaSalida);

				//  Si la salida es menor o igual, significa que cruza medianoche
				if (salida <= entrada) {
					salida.setDate(salida.getDate() + 1);
				}
				
				// Validación opcional (si quieres evitar errores reales)
				if (horaEntrada === horaSalida) {
					$.confirm({
						boxWidth: '370px',
						useBootstrap: false,
						type: 'red',
						typeAnimated: true,
						title: 'Alerta',
						content: '<center>La hora salida no puede ser igual a la hora entrada.</center>',
						buttons: {
							cerrar: function () {}
						},
					});

					$("#TotalHoras" + consecutivo).val('');
					return;
				}
				
				let diferenciaMs = salida - entrada;

				let horas = diferenciaMs / 1000 / 60 / 60;

				horas = horas.toFixed(2);
				
			}
			
			//add line
			var contador=1;
			var ultimoid='';
			var ultimo=0;
			var FechaUltima='';
			
			var vacios=0;
			jQuery("[id^='NumeroEmpleado']").each(function(){  
				if($("#"+this.id).val()==''){
					vacios++;
				}
			});
			
			jQuery("[id^='NumeroEmpleado']").each(function(){  
				contador++;
				
				
				ultimoid=this.id;
				ultimoid=ultimoid.split('NumeroEmpleado');  
				if(parseInt(ultimoid[1])>parseInt(ultimo)){
					ultimo=ultimoid[1];
					FechaUltima=$("#"+this.id).val();
				}
				if(contador==2){
					 primero=ultimoid[1];
				}
				
				
		   });
		   
		   
		   //validamos primero si tres dias y 9 Horas
		   
		   $.ajax({
			   type:"POST",
			   url: "<?php echo base_url()?>tiempoextra/inicio/validardiashoras",
			   dataType: 'json',
			   data:'NumeroEmpleado='+$("#NumeroEmpleado"+consecutivo).val()+'&fhFecha='+$("#inicio").val()+'&Horas='+$("#TotalHoras"+consecutivo).val(),
			   success:function(response){
				   
				if(response.success){
					
				   var tds=$("#TableTiempoExtra tr:first td").length;
				   var trs=ultimo;
				   trs++;
				  
				   if(vacios<1){
					   for(var i=0;i<tds;i++){
							i++;
							var aa="'trTiempoExtra"+trs+"'";
							var nuevaFila="<tr id='trTiempoExtra"+trs+"'>";	

						   //nuevaFila+='<td class="menu-action" style="text-align: center; min-width:100px;"><a onclick="EliminarTiempoE('+aa+')" data-original- data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-grey vd_grey"> <i class="fa fa-times"></i> </a><a data-original-title="view" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-grey vd_grey"> <i class="append-icon fa fa-fw fa-key" data-id="" onclick="firmar('+aa+');"></i> </a></td><td id="row'+trs+'" style="text-align: center"><i class="fa fa-times vd_bd-red vd_red"></i><input type="hidden" id="bValida'+trs+'" name="bValida'+trs+'" value="0"><input type="hidden" id="fhFechaFirma'+trs+'" name="fhFechaFirma'+trs+'" value=""></td><td style="text-align: center"><input onclick="LimpiarEmpleado('+trs+');" type="text" id="tNumeroEmpleado'+trs+'" name="tNumeroEmpleado'+trs+'" style="width:300px; height:27px; text-transform:uppercase" class="validate[required] formulario ui-autocomplete-input" onkeyup="javascript:this.value=this.value.toUpperCase();" required="" autocomplete="off" onChange="ValidaFila('+trs+');"><input type="hidden" placeholder="" id="NumeroEmpleado'+trs+'" name="NumeroEmpleado'+trs+'" style="height: 27px;"> </td><td style="text-align: center"><div class="input-group bootstrap-timepicker"><input  type="text"  id="Hora_Entrada'+trs+'" name="Hora_Entrada'+trs+'" style="height: 27px; width: 80px; text-align: center" maxlength="8" onChange="ValidaFila('+trs+');" ></div></td><td style="text-align: center"><div class="input-group bootstrap-timepicker"><input  type="text"  id="Hora_Salida'+trs+'" name="Hora_Salida'+trs+'" style="height: 27px; width: 80px; text-align: center" maxlength="8" onChange="ValidaFila('+trs+');" ></div></td><td style="text-align: center"><input type="text"  id="TotalHoras'+trs+'" name="TotalHoras'+trs+'" style="height: 27px; width: 80px; text-align: center" maxlength="8"   onChange="ValidaFila('+trs+');"></td><td><select id="eCodCausa'+trs+'" name="eCodCausa'+trs+'" style="height: 27px; width: 200px;" class="formulario" onChange="ValidaFila('+trs+');"></select></td><td><select id="tCodCentroCosto'+trs+'" name="tCodCentroCosto'+trs+'" style="height: 28px; width: 200px;" class="formulario" onChange="ValidaFila('+trs+');" disabled></td><td><select id="tCodCentroCostoDestino'+trs+'" name="tCodCentroCostoDestino'+trs+'" style="height: 28px; width: 200px;" class="formulario" onChange="ValidaFila('+trs+');"></td>	 <td><input type="text" id="tDescripcion'+trs+'" name="tDescripcion'+trs+'" maxlength="200" style="height: 28px; width: 250px;" class="formulario" onChange="ValidaFila('+trs+');"><td>';
						   
						   nuevaFila+='<td class="text-center"><button  onclick="EliminarTiempoE('+aa+')" type="button" class="btn btn-delete-row"	title="Eliminar"><i class="fas fa-trash-alt"></i></button></td><td class="text-center" id="bAutoriza'+trs+'"><button onClick="Autorizar('+trs+')" type="button"	class="btn btn-outline-dark btn-sm fw-semibold shadow-sm btn-abrir-validacion" data-id=""><i class="ph-duotone ph-identification-card me-1" ></i>Autorizar</button><input type="hidden" id="eFirma'+trs+'"  name="eFirma'+trs+'" value="0"></td><td><input  placeholder="Número empleado" class="form-control custom-input" onclick="LimpiarEmpleado('+trs+');" type="text" id="tNumeroEmpleado'+trs+'" name="tNumeroEmpleado'+trs+'" style="width:300px; height:27px; text-transform:uppercase" class="validate[required] formulario ui-autocomplete-input" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off" onChange="ValidaFila('+trs+');" ><input type="hidden"  id="NumeroEmpleado'+trs+'" name="NumeroEmpleado'+trs+'"  >  </td><td><input  class="form-control custom-input" type="time"  id="Hora_Entrada'+trs+'" name="Hora_Entrada'+trs+'" style="width:130px;"  onChange="ValidaFila('+trs+');"  ></td><td><input  class="form-control custom-input" type="time"   id="Hora_Salida'+trs+'" name="Hora_Salida'+trs+'" style="width:130px;" maxlength="8" onChange="ValidaFila('+trs+');"  ></td><td><input class="form-control custom-input" type="number"  id="TotalHoras'+trs+'" name="TotalHoras'+trs+'" style="width: 100px; text-align: center" onChange="ValidaFilaHora('+trs+');" ></td><td><select id="eCodCausa'+trs+'" name="eCodCausa'+trs+'" style="width: 200px;" class="form-select custom-input" onChange="ValidaFila('+trs+');"><option value="">selecciona opción</option></select></td><td><select id="tCodCentroCosto'+trs+'" name="tCodCentroCosto'+trs+'" style="width: 200px;" class="form-select custom-input" onChange="ValidaFila('+trs+');" disabled ></select> 	</td><td><select id="tCodCentroCostoDestino'+trs+'" name="tCodCentroCostoDestino'+trs+'" style="width: 200px;" class="form-select custom-input" onChange="ValidaFila('+trs+');"><option value="">selecciona opción</option></select>   </td><td><input type="text" id="tDescripcion'+trs+'" name="tDescripcion'+trs+' maxlength="200" style="width: 200px;" class="form-control custom-input" onChange="ValidaFila('+trs+');" ></td>';
						   
						 }

						$("#tablesAsis").append(nuevaFila);

						$("#tNumeroEmpleado"+trs).autocomplete({
							open: function(){
								setTimeout(function () {
									$('.ui-autocomplete').css('z-index', 99999999999999);
								}, 0);
							},
							source: "<?php echo base_url().'tiempoextra/inicio/getTrabjadorbyNumeroEmpleado';?>",
							select: function(event,ui){
								$("#NumeroEmpleado"+trs).val( ui.item.id);
								$("#tCodCentroCosto"+trs).val(ui.item.tClaveCentro);
								//$("#tCodCentroCostoDestino"+trs).val(ui.item.tClaveCentro);

								var TotalRepe=0;
								jQuery("[id^='NumeroEmpleado']").each(function(){  
									if(this.value==ui.item.id){
										TotalRepe++;
									}

								});
								if(TotalRepe>1){
									alert('El trabajador ya se encuentra seleccionado.');
									$("#NumeroEmpleado"+trs).val('');
									$("#tNumeroEmpleado"+trs).val('');
								}

							}
						});
						 
						
						$('#Hora_Entrada'+trs).val($('#Hora_Entrada'+ultimo).val());
						$('#Hora_Salida'+trs).val($('#Hora_Salida'+ultimo).val());

						
						
						$("#TotalHoras"+trs).val($("#TotalHoras"+ultimo).val());			
						$('#eCodCausa'+trs).html($('#eCodCausa'+ultimo).html());			
						$('#eCodCausa'+trs).val($('#eCodCausa'+ultimo).val());

						$('#tCodCentroCosto'+trs).html($('#tCodCentroCosto'+ultimo).html());
						$('#tCodCentroCostoDestino'+trs).html($('#tCodCentroCostoDestino'+ultimo).html());
						$('#tCodCentroCostoDestino'+trs).val($('#tCodCentroCostoDestino'+ultimo).val());
				   }
				}else{
					$("#TotalHoras"+consecutivo).val('')
					$.confirm({
						boxWidth: '370px',
						useBootstrap: false,
						type:'red',
						typeAnimated: true,
						title: 'Alerta',
						content: '<center>'+(response.mensaje)+'</center>',
						buttons: {
							cerrar: function () {
							}
						},
					});
				}
				  
			   }
			});
		   
		   
		  
			
			
			
		}else{
			
		}
	}
function EliminarTiempoE(id){
		
		var FILA=id.split('trTiempoExtra');   
	  	var ultimoid='';
	  	var bEliminar=0;
	  	var conta=0;
	  	jQuery("[id^='tNumeroEmpleado']").each(function(){  
			conta++;
			ultimoid=this.id;
			ultimoid=ultimoid.split('tNumeroEmpleado');  
	   	});
	   	if(ultimoid[1]!=FILA[1]){
			if(conta>1){
				$("#"+id).remove();
				bEliminar=1;
			}
	   }
}
function ValidaFilaHora(consecutivo){
	
	var totalh=	$("#TotalHoras"+consecutivo).val();
	let horaEntrada = $("#Hora_Entrada"+consecutivo).val();
	let horaSalida  = $("#Hora_Salida"+consecutivo).val();
	
	let totalInput = $("#TotalHoras"+consecutivo).val();
	
	let entrada = new Date('2000-01-01 ' + horaEntrada);
	let salida  = new Date('2000-01-01 ' + horaSalida);
	
	if(salida <= entrada){

		
		$.confirm({
			boxWidth: '370px',
			useBootstrap: false,
			type:'red',
			typeAnimated: true,
			title: 'Alerta',
			content: '<center>La hora salida no puede ser menor o igual a la hora entrada.</center>',
			buttons: {
				cerrar: function () {
				}
			},
		});
		$("#TotalHoras"+consecutivo).val('');

		return;
	}
	let diferenciaMs = salida - entrada;

	let maximo = diferenciaMs / 1000 / 60 / 60;
	
	

    let valor = parseFloat($("#TotalHoras"+consecutivo).val()) || 0;

    // NO MAYOR AL RANGO
    if(valor > maximo){
		$.confirm({
			boxWidth: '370px',
			useBootstrap: false,
			type:'red',
			typeAnimated: true,
			title: 'Alerta',
			content: '<center>Las horas no pueden superar las horas calculadas del rango.</center>',
			buttons: {
				cerrar: function () {
				}
			},
		});
        $("#TotalHoras"+consecutivo).val('');
		return;
    }

    // NO NEGATIVO
    if(valor < 0){

        $("#TotalHoras"+consecutivo).val('');

    }
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/validardiashoras",
	   dataType: 'json',
	   data:'NumeroEmpleado='+$("#NumeroEmpleado"+consecutivo).val()+'&fhFecha='+$("#inicio").val()+'&Horas='+totalh,
	   success:function(response){
		   
			if(response.success){
				ValidaFila2(consecutivo);
			}else{
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'red',
					typeAnimated: true,
					title: 'Alerta',
					content: '<center>'+(response.mensaje)+'</center>',
					buttons: {
						cerrar: function () {
						}
					},
				});
				$("#TotalHoras"+consecutivo).val('')
				
			}
	   }
  });

}
function GuardarSolicitud(tipoenvio){
	if($("#inicio").val()!='' && $("#teCodDepartamento").val()!=''){
		var cuenta=0;
		jQuery("[id^='NumeroEmpleado']").each(function(){  
			var consecutivo=this.id;
			consecutivo=consecutivo.split('NumeroEmpleado');  
			consecutivo=consecutivo[1];
			if($("#NumeroEmpleado"+consecutivo).val()!='' && $("#Hora_Entrada"+consecutivo).val()!='' && $("#Hora_Salida"+consecutivo).val()!='' && $("#TotalHoras"+consecutivo).val()!=''  && $("#eCodCausa"+consecutivo).val()!='' && $("#tCodCentroCosto"+consecutivo).val()!='' && $("#tCodCentroCostoDestino"+consecutivo).val()!='' ){
				cuenta++;
			}
		});
											  
		if(cuenta>0){
			
			var lista='';
			var cuenta1=0;
			jQuery("[id^='NumeroEmpleado']").each(function(){  
				var consecutivo=this.id;
				consecutivo=consecutivo.split('NumeroEmpleado');  
				consecutivo=consecutivo[1];
				if($("#NumeroEmpleado"+consecutivo).val()!='' && $("#Hora_Entrada"+consecutivo).val()!='' && $("#Hora_Salida"+consecutivo).val()!='' && $("#TotalHoras"+consecutivo).val()!=''  && $("#eCodCausa"+consecutivo).val()!='' && $("#tCodCentroCosto"+consecutivo).val()!='' && $("#tCodCentroCostoDestino"+consecutivo).val()!=''){
					cuenta1++;					
					lista=lista+'*'+$("#NumeroEmpleado"+consecutivo).val()+'|'+$("#Hora_Entrada"+consecutivo).val()+'|'+$("#Hora_Salida"+consecutivo).val()+'|'+ $("#TotalHoras"+consecutivo).val()+'|'+$("#eFolioComedor"+consecutivo).val()+'|'+$("#eCodCausa"+consecutivo).val()+'||'+$("#tCodCentroCosto"+consecutivo).val()+'|'+$("#tCodCentroCostoDestino"+consecutivo).val()+'|'+$("#tDescripcion"+consecutivo).val()+'|'+$("#eFirma"+consecutivo).val()+'|'+$("#fhFechaFirma"+consecutivo).val();
					
				}
			
			});
			
			
			if(lista!=''){
				
				if(tipoenvio==2){
					 let valido = true;

					$('#tablesAsis tbody tr').each(function () {

						let inputEmpleado = $(this).find('input[id^="NumeroEmpleado"]');
						let inputFirma    = $(this).find('input[id^="eFirma"]');

						let empleado = inputEmpleado.val()?.trim() || '';
						let firma    = inputFirma.val();

						/*
							SOLO validar si NumeroEmpleado tiene valor
						*/

						if (empleado !== '') {

							if (firma != 1) {

								valido = false;

								inputEmpleado.addClass('is-invalid');

								$(this).find('td').addClass('table-danger');

								//return false;
							}

						}

					});

					if (!valido) {

						$.confirm({
							boxWidth: '370px',
							useBootstrap: false,
							type:'red',
							typeAnimated: true,
							title: 'Alerta',
							content: '<center>La solicitud no puede continuar al siguiente nivel hasta que todos los empleados hayan validado su autorización de tiempo extra.</center>',
							buttons: {
								cerrar: function () {
								}
							},
						});

						return false;
					}

					
				}
				
				$.ajax({
				   type:"POST",
				   url: "<?php echo base_url().'tiempoextra/inicio/guardarTiempoExtra';?>",
				   dataType: 'json',
				   data:'teCodDepartamento='+$("#teCodDepartamento").val()+'&fhFecha='+$("#inicio").val()+'&Lista='+lista+'&codigoSolicitud='+$("#codigoSolicitud").val()+'&TipoEnvio='+tipoenvio+'&tObservaciones='+$("#tObservaciones").val(),
				   success:function(html){
						if (html.error === true) {
						   
						   if(tipoenvio==2){
							   $.confirm({
									boxWidth: '370px',
									useBootstrap: false,
									type:'green',
									typeAnimated: true,
									title: 'Alerta',
									content: '<center>Solicitud enviada con éxito.</center>',
									buttons: {
										cerrar: function () {
										}
									},
								});	
							   CargaSeccion(1);
							   EnviarCorreo(html.codigo);
						   }else{
								$.confirm({
									boxWidth: '370px',
									useBootstrap: false,
									type:'green',
									typeAnimated: true,
									title: 'Alerta',
									content: '<center>Solicitud guardada con éxito.</center>',
									buttons: {
										cerrar: function () {
										}
									},
								});	
							   CargaSeccion(1);
						   }
					   }else{
						   $.confirm({
								boxWidth: '370px',
								useBootstrap: false,
								type:'red',
								typeAnimated: true,
								title: 'Alerta',
								content: '<center>Error al intentar guardar la solicitud.</center>',
								buttons: {
									cerrar: function () {
									}
								},
							});						   
					   }
					   
				   }
				});
			}
			
		}else{
			
			$.confirm({
				boxWidth: '370px',
				useBootstrap: false,
				type:'red',
				typeAnimated: true,
				title: 'Alerta',
				content: '<center>debe ingresar al menos un trabajador a la lista.</center>',
				buttons: {
					cerrar: function () {
					}
				},
			});
		}
											  
	}else{
		
		$.confirm({
			boxWidth: '370px',
			useBootstrap: false,
			type:'red',
			typeAnimated: true,
			title: 'Alerta',
			content: '<center>La fecha de solicitud y área no puede ir vacia.</center>',
			buttons: {
				cerrar: function () {
				}
			},
		});
	}
}

function autoSolTEModal(id,estatus){
	var parametros='opcion=detalle ';
	parametros+='&estatus='+estatus;
	parametros+='&eCodConsecutivo='+id;
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/viwRechazaSol",
	   dataType: 'html',
	   data:parametros,
	   success:function(html){
		   $('#exampleModalLive').html(html);
		   $('#exampleModalLive').modal('show');
	   }
	});
}
function autoSolTEModal2(id,estatus){
	var parametros='opcion=detalle ';
	parametros+='&estatus='+estatus;
	parametros+='&eCodConsecutivo='+id;
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/viwAceptarSol",
	   dataType: 'html',
	   data:parametros,
	   success:function(html){
		   $('#exampleModalLive').html(html);
		   $('#exampleModalLive').modal('show');
	   }
	});
}

function autoSolTE(id,estatus){
	if($("#tMotivoRechazo").val()=='' && (estatus==3 || estatus==5)){
		$.confirm({
			boxWidth: '370px',
			useBootstrap: false,
			type:'red',
			typeAnimated: true,
			title: 'Alerta',
			content: '<center>Favor de ingresar el motivo de rechazo.</center>',
			buttons: {
				cerrar: function () {
				}
			},
		});
	}else{
		var parametross='Opcion=delete';
		parametross+='&eCodConsecutivo='+id;
		parametross+='&eCodEstatus='+estatus;
		parametross+='&tMotivoRechazo='+$("#tMotivoRechazo").val();
		$.ajax({
			type:"POST",
			url: "<?php echo base_url().'tiempoextra/inicio/AutorizarSolTEX';?>",
			cache: false,
			async: true,
			dataType: 'html',
			data:parametross,
			success:function(html){
				if(html==1){				
					
					$('#exampleModalLive').modal('hide');
					$('#exampleModalLive').html('');
					if(estatus==2 || estatus==4){	
						
						$.confirm({
							boxWidth: '370px',
							useBootstrap: false,
							type:'green',
							typeAnimated: true,
							title: 'Alerta',
							content: '<center>Solicitud validada con éxito.</center>',
							buttons: {
								cerrar: function () {
								}
							},
						});
						EnviarCorreoNivel2(id,1);
					}
					if(estatus==3 || estatus==5){	
						
						$.confirm({
							boxWidth: '370px',
							useBootstrap: false,
							type:'green',
							typeAnimated: true,
							title: 'Alerta',
							content: '<center>Solicitud rechazada con éxito.</center>',
							buttons: {
								cerrar: function () {
								}
							},
						});
						EnviarCorreoNivel2(id,2);
					}
					CargaSeccion(1);
				}else{
					$.confirm({
						boxWidth: '370px',
						useBootstrap: false,
						type:'red',
						typeAnimated: true,
						title: 'Alerta',
						content: '<center>Error al intentar validar.</center>',
						buttons: {
							cerrar: function () {
							}
						},
					});
					
				}
			}
		});
	}
}
function Autorizar(id){
	if($("#NumeroEmpleado"+id).val()!=''){
		var parametros='opcion=valiacion ';
		parametros+='&id='+id;
		parametros+='&NumeroEmpleado='+$("#NumeroEmpleado"+id).val();
		$.ajax({
		   type:"POST",
		   url: "<?php echo base_url()?>tiempoextra/inicio/viewValidaEmpleado",
		   dataType: 'html',
		   data:parametros,
		   success:function(html){
			   $('#exampleModalLive').html(html);
			   $('#exampleModalLive').modal('show');
		   }
		});
	}else{
		$.confirm({
			boxWidth: '370px',
			useBootstrap: false,
			type:'red',
			typeAnimated: true,
			title: 'Alerta',
			content: '<center>Es necesrio ingresar el colaborador a validar</center>',
			buttons: {
				cerrar: function () {
				}
			},
		});
	}
	
	
}
function EnviarCorreo(codigo){
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/sendmailSolicitud",
	   dataType: 'html',
	   data:'eCodSolicitud='+codigo,
	   success:function(html){
	
	   }
	});
}
function EnviarCorreoNivel2(codigo,Tipo){
	// 1 aprobado nivel 2
	// 2 rechazado nivel 2
	$.ajax({
	   type:"POST",
	   url: "<?php echo base_url()?>tiempoextra/inicio/sendmailSolicitudNivel2",
	   dataType: 'html',
	   data:'eCodSolicitud='+codigo+'&tipo='+Tipo,
	   success:function(html){
	
	   }
	});
}
</script>