
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content shadow-sm card-bodys" id="modalCancelar">

	<div class="modal-header">
	  <h5 class="modal-title"><i class="ph-duotone ph-green-circle text-danger me-2"></i>Confirmación de Validación</h5>
	  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	</div>
	<div class="modal-body text-center">
		
		<!-- ICONO / MENSAJE -->
		<div class="text-center mb-4">

			<div class="mb-3">
				<div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center"
					 style="width:120px;height:120px;">

					<i class="ph-duotone ph-identification-card text-primary"
					   style="font-size:70px;"></i>

				</div>
			</div>

			<h3 class="fw-bold mb-2">
				Aceptar Solicitud
			</h3>

			<p class="text-muted mb-0">
				Pase su tarjeta para autorizar esta solicitud de tiempo extra.
			</p>

		</div>

		<!-- INPUT TARJETA -->
		<div class="mb-4">

			<label class="form-label fw-semibold">
				Tarjeta / Código de empleado
			</label>

			<div class="input-group input-group-lg">

				<span class="input-group-text bg-light">
					<i class="ph-duotone ph-credit-card"></i>
				</span>

				<input onChange="SenVal();" type="password"
					   class="form-control"
					   id="txtTarjetaAutorizacion"
					   placeholder="Esperando tarjeta..."
					   autocomplete="off">

			</div>

			<small class="text-muted">
				Puede pasar la tarjeta o capturar el código manualmente.
			</small>

		</div>

		

		<!-- ALERTA -->
		<div class="alert alert-success border-0 rounded-4 d-flex align-items-start gap-3 mb-0">

			<i class="ph-duotone ph-seal-check fs-1"></i>

			<div>

				<div class="fw-bold mb-1">
					Confirmación de autorización
				</div>

				<div class="small">
					Al pasar su tarjeta quedará registrado oficialmente
					como aprobador de esta solicitud de tiempo extra.
				</div>

			</div>

    </div>

    <!-- HIDDEN -->
    <input type="hidden" id="empleado" name="empleado" value="<?php echo $NumeroEmpleado?>">
	<input type="hidden" id="conselinea" name="conselinea" value="<?php echo $id?>">
	</div>

	<div class="modal-footer justify-content-center">
	 
	</div>
  </div>
</div>
<script>
	function SenVal(){
		// Tarjeta escaneada
		let tarjeta = $('#txtTarjetaAutorizacion').val().trim();

		// Número real del empleado
		let empleado = $('#empleado').val().trim();

		/*
			Ejemplos:

			empleado = 26688

			tarjeta:
			026688      
			02668801    
			26688       
			99926688    
		*/

		// Eliminar ceros iniciales del empleado
		empleado = empleado.replace(/^0+/, '');

		// Validar si la tarjeta contiene el número real
		let coincide = tarjeta.includes(empleado);

		if (coincide) {
			
			// consecutivo de la línea
			let conseLinea = $('#conselinea').val();

			// TD dinámico
			let td = $('#bAutoriza' + conseLinea);
			td.html(`
				<i class="ph-duotone ph-check-circle"
				   style="font-size:26px;color:#198754;"></i>

				<input type="hidden"
					   id="eFirma${conseLinea}"
					   name="eFirma${conseLinea}"
					   value="1">
			`);

			$.confirm({
				boxWidth: '370px',
				useBootstrap: false,
				type:'green',
				typeAnimated: true,
				title: 'Alerta',
				content: '<center>Validación realizada correctamente. La autorización de tiempo extra ha sido registrada.</center>',
				buttons: {
					cerrar: function () {
					}
				},
			});
		  $('#exampleModalLive').modal('hide');
		  $('#exampleModalLive').html('');

		} else {

			$.confirm({
				boxWidth: '370px',
				useBootstrap: false,
				type:'red',
				typeAnimated: true,
				title: 'Alerta',
				content: '<center>La tarjeta escaneada no coincide con el empleado seleccionado. La validación de la solicitud no puede completarse..</center>',
				buttons: {
					cerrar: function () {
					}
				},
			});
		}
	}
</script>