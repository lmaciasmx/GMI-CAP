<style>
  .input-error {
    border: 2px solid red;
    background-color: #ffe6e6;
  }
</style>
<div class="page-header">
  <div class="page-block">
	<div class="row align-items-center">
	  <div class="col-md-12" >
		<ul class="breadcrumb" id="menu-seccion">
			<li class="breadcrumb-item"><a>Inicio</a></li>  
			<li class="breadcrumb-item">Panel</li> 
			<li class="breadcrumb-item" aria-current="page">Perfil</li>
		</ul>
	  </div>
	  <div class="col-md-12">
		<div class="page-header-title" >
		  <h2 class="mb-0" id="title-seccion">Configuración de Perfil</h2>
		</div>
	  </div>
	</div>
  </div>
</div>

 <div class="row">
              <div class="col-lg-5 col-xxl-3">
                <div class="card overflow-hidden">
                
                  <div
                    class="nav flex-column nav-pills list-group list-group-flush account-pills mb-0"
                    id="user-set-tab"
                    role="tablist"
                    aria-orientation="vertical"
                  >
                    <a
                      class="nav-link active list-group-item list-group-item-action"
                      id="user-set-information-tab"
                      data-bs-toggle="pill"
                      href="#user-set-information"
                      role="tab"
                      aria-controls="user-set-information"
                      aria-selected="false"
                    >
                      <span class="f-w-500"><i class="ph-duotone ph-clipboard-text m-r-10"></i>Datos de Facturación</span>
                    </a>
                    
                    <a
                      class="nav-link list-group-item list-group-item-action"
                      id="user-set-passwort-tab"
                      data-bs-toggle="pill"
                      href="#user-set-passwort"
                      role="tab"
                      aria-controls="user-set-passwort"
                      aria-selected="false"
                    >
                      <span class="f-w-500"><i class="ph-duotone ph-key m-r-10"></i>Cambiar Contraseña</span>
                    </a>
                   
                  </div>
                </div>
                
              
                  
              </div>
              <div class="col-lg-7 col-xxl-9">
                <div class="tab-content" id="user-set-tabContent">
                  
                  <div class="tab-pane fade show active " id="user-set-information" role="tabpanel" aria-labelledby="user-set-information-tab">
                    <form class="form-2" method="post" role="form" id="register-form-fiscal"  action="<?php echo base_url();?>../Login/changeDFiscal"  >
										  
					<div class="card">
                      <div class="card-header">
                        <h5>Domicilio de Facturación</h5>
                      </div>
                      <div class="card-body">
						<div class="mb-1 row">
							<label class="col-lg-2 col-form-label text-lg-end">Regimen Fiscal:</label>
							<div class="col-lg-8">
							  <select class="form-control form-control w-100" id="tClaveRegimenFiscal" name="tClaveRegimenFiscal" required>
								  <option value="">Selecciona opción...</option>
									<?php foreach($regimen as $key){?>
										<option value="<?php echo $key->tClave?>" 
										<?php echo (isset($datos->tClaveRegimenFiscal) ? ($datos->tClaveRegimenFiscal==$key->tClave ? 'selected' :''):'')?>
										><?php echo $key->tClave.' '.$key->tDescripcion;?></option>
									<?php }?>
							  </select>
							</div>
						</div>
                        <div class="mb-1 row">
							<label class="col-lg-2 col-form-label text-lg-end">Calle:</label>
							<div class="col-sm-8 controls">
							 <input class="form-control form-control w-100"   type="text" id="Domicilio_Facturacion" name="Domicilio_Facturacion" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  maxlength="150" value="<?php echo (isset($datos->Domicilio_Facturacion) ? $datos->Domicilio_Facturacion :'')?>" >

							 </div>
						</div>
						<div class="mb-1 row">
							<label class="col-lg-2 col-form-label text-lg-end">No. Exterior:</label>
							<div class="col-lg-4">
							 <input class="form-control form-control w-50"   type="text" id="NoExterior_Facturacion" name="NoExterior_Facturacion" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  maxlength="10" value="<?php echo (isset($datos->NoExterior_Facturacion) ? $datos->NoExterior_Facturacion :'')?>" >

							 </div>
							 <label class="col-lg-2 col-form-label text-lg-end">No. Interior:</label>
							 <div class="col-lg-4">
							 <input class="form-control form-control w-50"   type="text" id="NoInterior_Facturacion" name="NoInterior_Facturacion" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  maxlength="10" value="<?php echo (isset($datos->NoInterior_Facturacion) ? $datos->NoInterior_Facturacion :'')?>">

							 </div>
						</div>	

						<div class="mb-1 row">
							<label class="col-lg-2 col-form-label text-lg-end">País:</label>
							<div class="col-lg-4">
							  <select class="form-control form-control w-100" id="Pais_Facturacion" name="Pais_Facturacion" onChange="CargaEstadosF();">
								  <option value="">Selecciona opción...</option>
									<?php foreach($paises as $key){?>
										<option value="<?php echo $key->tClave?>" 
										<?php echo (isset($datos->Pais_Facturacion) ? ($datos->Pais_Facturacion==$key->tClave):'')?>
										><?php echo $key->tDescripcion.' ('.$key->tClave.')';?></option>
									<?php }?>
							  </select>

							 </div>
							<label class="col-lg-2 col-form-label text-lg-end">CP:</label>
							<div class="col-lg-4">
								<input onChange="BuscaInformacionPostalF();" class="form-control form-control w-50"   type="text" id="CP_Facturacion" name="CP_Facturacion" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  maxlength="8" value="<?php echo (isset($datos->CP_Facturacion) ? $datos->CP_Facturacion :'')?>" required>
							</div>
						</div>	
						<div class="mb-1 row">
							<label class="col-lg-2 col-form-label text-lg-end">Estado:</label>

							<div class="col-lg-4" id="EstadoSF">
							 <select onChange="CargaMunicipiosF();"  id="Estado_FacturacionS" name="Estado_FacturacionS"  class="form-control form-control w-100"  >
								<option value="">Selecciona opción...</option>
							 </select>
							</div>
							<div class="col-lg-4" id="EstadoIF" style="display: none;">
							 <input class="form-control form-control w-100"   type="text" id="Estado_FacturacionI" name="Estado_FacturacionI" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  maxlength="45">
							</div>
							<label class="col-lg-2 col-form-label text-lg-end">Municipio:</label>
							 <div class="col-lg-4" id="MunicipioSF">
							 <select id="Ciudad_FacturacionS" name="Ciudad_FacturacionS"  class="form-control form-control w-100"  >
								<option value="">Selecciona opción...</option>
							 </select>
							</div>
							<div class="col-lg-4" id="MunicipioIF" style="display: none;">
							 <input class="form-control form-control w-100"   type="text" id="Ciudad_FacturacionI" name="Ciudad_FacturacionI" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  maxlength="45">
						   </div>
						</div>				
						<div class="mb-1 row">
							<label class="col-lg-2 col-form-label text-lg-end">Localidad:</label>

							<div class="col-lg-4" id="LocalidadSF">
							 <select  id="Localidad_FacturacionS" name="Localidad_FacturacionS"  class="form-control form-control w-100"  >
								<option value="">Selecciona opción...</option>
							 </select>
							</div>
							<div class="col-lg-4" id="LocalidadIF" style="display: none;">
							 <input class="form-control form-control w-100"   type="text" id="Localidad_FacturacionI" name="Localidad_FacturacionI" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  maxlength="45">
							</div>
							<label class="col-lg-2 col-form-label text-lg-end">Colonia:</label>

							<div class="col-lg-4" id="ColoniaSF">
							 <select  id="Colonia_FacturacionS" name="Colonia_FacturacionS"  class="form-control form-control w-100"  >
								<option value="">Selecciona opción...</option>
							 </select>
							</div>
							<div class="col-sm-3 control" id="ColoniaIF" style="display: none;">
							 <input class="form-control form-control w-100"   type="text" id="Colonia_FacturacionI" name="Colonia_FacturacionI" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  maxlength="45">

						   </div>
						</div>
						<div class="mb-1 row">
							<label class="col-lg-2 col-form-label text-lg-end">Telefono:</label>

							<div class="col-lg-4" id="LocalidadSC">
								<input class="form-control form-control w-100"   type="text" id="Telefono_Facturacion" name="Telefono_Facturacion" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"   maxlength="100" value="<?php echo (isset($datos->Telefono_Facturacion) ? $datos->Telefono_Facturacion :'')?>" >
							</div>
						</div> <br>   
                      </div>
                    </div>
            
                    <div class="text-end btn-page">
                      <button type="submit" class="btn btn-shadow btn-primary d-inline-flex btnFacturacion" ><span class="append-icon"><i class="append-icon fa fa-fw fa-save"></i></span>Guardar</button>
                    </div>
					</form>
                  </div>
                 
                  <div class="tab-pane fade" id="user-set-passwort" role="tabpanel" aria-labelledby="user-set-passwort-tab">
                    <form class="form-2" method="post" role="form" id="register-form-pass"  action="<?php echo base_url();?>../Login/changePassword"  >
                    <div class="card">
                      <div class="card-header">
                        <h5>Cambiar Accesos al Sistema</h5>
                      </div>
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item pt-0 px-0">
                            <div class="row mb-0">
                              <label class="col-form-label col-md-4 col-sm-12 text-md-end"
                                >Contraseña Actual <span class="text-danger">*</span>
                              </label>
                              <div class="col-md-8 col-sm-12">
                                <input type="password" class="form-control" id="PassAnterior" name="PassAnterior" required title="" maxlength="15" />
                              </div>
                            </div>
                          </li>
                          <li class="list-group-item px-0">
                            <div class="row mb-0">
                              <label class="col-form-label col-md-4 col-sm-12 text-md-end"
                                >Nueva Contraseña <span class="text-danger">*</span></label
                              >
                              <div class="col-md-8 col-sm-12">
                                <input type="password" class="form-control" id="newPass" name="newPass" required  title=""  maxlength="15" />
                              </div>
                            </div>
                          </li>
                          <li class="list-group-item pb-0 px-0">
                            <div class="row mb-0">
                              <label class="col-form-label col-md-4 col-sm-12 text-md-end"
                                >Confirmar Contraseña <span class="text-danger">*</span></label
                              >
                              <div class="col-md-8 col-sm-12">
                                <input type="password" class="form-control" id="repeatPass" name="repeatPass" required   title="" maxlength="15" />
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div >
                      <div class="card-body text-end">
                        <div class="btn btn-shadow btn-outline-secondary me-2 btnCancelP">Cancelar</div>
                       <button type="submit" class="btn btn-shadow btn-primary d-inline-flex btnChangePass" ><span class="append-icon"><i class="append-icon fa fa-fw fa-save"></i></span>Cambiar Contraseña</button>
                      </div>
                    </div>
					</form>
                  </div>
                  
                </div>
              </div>
            </div>

<script type="text/javascript">
$(function(){
	
	<?php if(isset($datos->Pais_Facturacion)){?>

		$("#Pais_Facturacion").val('<?php echo $datos->Pais_Facturacion; ?>');
		CargaEstadosF('<?php echo $datos->Estado_Facturacion; ?>','<?php echo $datos->Ciudad_Facturacion; ?>','<?php echo $datos->Localidad_Facturacion; ?>');

		CargarColoniasF($("#CP_Facturacion").val(),'<?php echo $datos->Colonia_Facturacion; ?>');
		$("#Estado_FacturacionI").val('<?php echo $datos->Estado_Facturacion; ?>');
		$("#Ciudad_FacturacionI").val('<?php echo $datos->Ciudad_Facturacion; ?>');
		$("#Localidad_FacturacionI").val('<?php echo $datos->Localidad_Facturacion; ?>');
		$("#Colonia_FacturacionI").val('<?php echo $datos->Colonia_Facturacion; ?>');

	<?php } ?>
	
	
	
	
	$('.btnCancelP').click(function() {
		$("#PassAnterior").val('');
		$("#newPass").val('');
		$("#repeatPass").val('');
		$('#register-form-pass').find('input, textarea, select').removeClass('input-error');
	});
	
	
	$('#register-form-pass').form({
		onSubmit:function(){
			$(".btnChangePass").prop('disabled', true);			
			$('#register-form-pass').find('input, textarea, select').removeClass('input-error');
		}, 
		success:function(data){
			if(data==1){
				$(".btnChangePass").prop('disabled', false);
				//$("#carga").css("display",'none');
				$("#PassAnterior").val('');
				$("#newPass").val('');
				$("#repeatPass").val('');
				$('#register-form-pass').find('input, textarea, select').removeClass('input-error');
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'green',
					typeAnimated: true,
					title: 'Confirmación',
					content: '<center>Contraseña Actualizada con éxito</center>',
					buttons: {
						cerrar: function () {
						}
					},
				});
			}
			if(data==2){
				$(".btnChangePass").prop('disabled', false);
				//$("#carga").css("display",'none');
				$('#PassAnterior').addClass('input-error');
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'red',
					typeAnimated: true,
					title: 'Alerta',
					content: '<center>La Contraseña actual no es la correcta</center>',
					buttons: {
						cerrar: function () {
						}
					},
				});
			}
			if(data==3){
				$(".btnChangePass").prop('disabled', false);
				//$("#carga").css("display",'none');
				$('#newPass').addClass('input-error');
				$('#repeatPass').addClass('input-error');
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'red',
					typeAnimated: true,
					title: 'Alerta',
					content: '<center>Las contraseñas no son iguales</center>',
					buttons: {
						cerrar: function () {
						}
					},
				});
			}
			if(data==4){
				$(".btnChangePass").prop('disabled', false);
				//$("#carga").css("display",'none');
				$('#newPass').addClass('input-error');
				$('#repeatPass').addClass('input-error');
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'red',
					typeAnimated: true,
					title: 'Alerta',
					content: '<center>La contraseña debe tener entre 7 y 12 caracteres, al menos una letra, un numero y un simbolo.</center>',
					buttons: {
						cerrar: function () {
						}
					},
				});
			}
		}
	});
	$('#register-form-fiscal').form({
		onSubmit:function(){
			$(".btnFacturacion").prop('disabled', true);			
			$('#register-form-fiscal').find('input, textarea, select').removeClass('input-error');
		}, 
		success:function(data){
			if(data==1){
				$(".btnFacturacion").prop('disabled', false);
				$("#carga").css("display",'none');
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'green',
					typeAnimated: true,
					title: 'Confirmación',
					content: '<center>Datos Fiscales Actualizados con éxito</center>',
					buttons: {
						cerrar: function () {
						}
					},
				});
			}else{
			
				$(".btnFacturacion").prop('disabled', false);
				$("#carga").css("display",'none');
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'red',
					typeAnimated: true,
					title: 'Alerta',
					content: '<center>Error al intentar actualizar</center>',
					buttons: {
						cerrar: function () {
						}
					},
				});
			}
			
		}
	});
});

//Facturacion
function CargaEstadosF(tClaveEstado,tClaveMunicipio,tClaveLocalidad){
	var Pais=$("#Pais_Facturacion").val();
	if(Pais=='MEX' || Pais=='USA' || Pais=='CAN'){
		$("#EstadoSF").css("display","");
		$("#EstadoIF").css("display","none");
		
		$("#MunicipioSF").css("display","");
		$("#MunicipioIF").css("display","none");
		
		$("#LocalidadSF").css("display","");
		$("#LocalidadIF").css("display","none");
		
		$("#ColoniaSF").css("display","");
		$("#ColoniaIF").css("display","none");
		
		$("#Ciudad_FacturacionS").html('<option value="">Seleccione opción</option>');
		$("#Localidad_FacturacionS").html('<option value="">Seleccione opción</option>');
		$("#Colonia_FacturacionS").html('<option value="">Seleccione opción</option>');

		$.ajax({
			type:"POST",
			url: "<?php echo base_url().'../C010201/inicio/getEstadosbyPais';?>",
			cache: false,
			async: true,
			dataType: 'html',
			data:'tCodPais='+Pais,
			success:function(html){
				 
				$("#Estado_FacturacionS").html(html);
				if(tClaveEstado!=''){
					$("#Estado_FacturacionS").val(tClaveEstado);
					CargaMunicipiosF(tClaveMunicipio,tClaveLocalidad);
				}
			}
		});
					
		}else{

			$("#EstadoSF").css("display","none");
			$("#EstadoIF").css("display","");
			
			
			$("#MunicipioSF").css("display","none");
			$("#MunicipioIF").css("display","");
			
			$("#LocalidadSF").css("display","none");
			$("#LocalidadIF").css("display","");
			
			$("#ColoniaSF").css("display","none");
			$("#ColoniaIF").css("display","");
			
		}
}
function CargaMunicipiosF(tClaveMunicipio,tClaveLocalidad){
	var Pais=$("#Pais_Facturacion").val();
	if(Pais=='MEX'){
		$("#MunicipioSF").css("display","");
		$("#MunicipioIF").css("display","none");
		
		$.ajax({
			type:"POST",
			url: "<?php echo base_url().'../C010201/inicio/getMunicipiosbyEstado';?>",
			cache: false,
			async: true,
			dataType: 'html',
			data:'tCodEstado='+$("#Estado_FacturacionS").val(),
			success:function(html){
				 
				$("#Ciudad_FacturacionS").html(html);
				if(tClaveMunicipio!=''){
					$("#Ciudad_FacturacionS").val(tClaveMunicipio);
				}
			}
		});

		$.ajax({
			type:"POST",
			url: "<?php echo base_url().'../C010201/inicio/getLocalidadesbyEstado';?>",
			cache: false,
			async: true,
			dataType: 'html',
			data:'tCodEstado='+$("#Estado_FacturacionS").val(),
			success:function(html){
				 
				$("#Localidad_FacturacionS").html(html);
				if(tClaveLocalidad!=''){
					$("#Localidad_FacturacionS").val(tClaveLocalidad);
				}
			}
		});

	}else{
		$("#MunicipioSF").css("display","none");
		$("#MunicipioIF").css("display","");
		

		$("#LocalidadSF").css("display","none");
		$("#LocalidadIF").css("display","");
	}
}	
function BuscaInformacionPostalF(){
	if($("#CP_Facturacion").val()==''){
		$("#Pais_Facturacion").val('');
		CargaEstadosC();
	}else{
		$.ajax({
			type:"POST",
			url: "<?php echo base_url().'../C010201/inicio/getinforpostalbyCP';?>",
			cache: false,
			async: true,
			dataType: 'html',
			data:'CP='+$("#CP_Facturacion").val(),
			success:function(html){
				 
				var Datos=JSON.parse(html);
				if(Datos.error==1){
					$("#Pais_Facturacion").val('MEX');
					CargaEstadosF(Datos.tClaveEstado,Datos.tClaveMunicipio,Datos.tClaveLocalidad);

					CargarColoniasF($("#CP_Facturacion").val());

					
				}else{
					$("#Pais_Facturacion").val('');
					CargaEstadosF();
				}
			}
		});
	}
}
function CargarColoniasF(CP,Colonia){
	$.ajax({
		type:"POST",
		url: "<?php echo base_url().'../C010201/inicio/getColoniasbyCP';?>",
		cache: false,
		async: true,
		dataType: 'html',
		data:'CP='+$("#CP_Facturacion").val(),
		success:function(html){
			$("#Colonia_FacturacionS").html(html);
			if(Colonia!=''){
				$("#Colonia_FacturacionS").val(Colonia);
			}
		}
	});
}
</script>