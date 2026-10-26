<script type="text/javascript">
$(document).ready(function() {
	
	
});

	
	
function Eliminar_Registro(id){
	
	var parametross='Opcion=delete';
	parametross+='&eCodConsecutivo='+id;
	$.ajax({
		type:"POST",
		url: "<?php echo base_url().'tiempoextra/inicio/deleteSolTEX';?>",
		cache: false,
		async: true,
		dataType: 'html',
		data:parametross,
		success:function(html){
			if(html==1){				
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'green',
					typeAnimated: true,
					title: 'Alerta',
					content: '<center>Registro eliminado con éxito.</center>',
					buttons: {
						cerrar: function () {
						}
					},
				});	
			   CargaSeccion(1);
			   $('#exampleModalLive').modal('hide');
			   $('#exampleModalLive').html('');
			}else{
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'green',
					typeAnimated: true,
					title: 'Alerta',
					content: '<center>El registro no puede ser eliminado ya que se encuentra en uso.</center>',
					buttons: {
						cerrar: function () {
						}
					},
				});	
			}
		}
	});
}

</script>
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content shadow-sm card-bodys" id="modalCancelar">

	<div class="modal-header">
	  <h5 class="modal-title"><i class="ph-duotone ph-warning-circle text-danger me-2"></i>Eliminar Solicitud </h5>
	  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	</div>
	<div class="modal-body text-center">
		<div style="text-align: center;font-size: 15px;">¿Seguro que desea ELIMINAR la solicitud ?</div><br>
	</div>

	<div class="modal-footer justify-content-center">
	  <button type="button"  class="btn btn-danger"  onClick="Eliminar_Registro('<?=trim($eCodConsecutivo)?>');">	<i class="ph-duotone ph-trash me-1"></i> Sí, eliminar </button>
	  <button type="button"  class="btn btn-light"  data-bs-dismiss="modal">Cancelar </button>
	</div>
  </div>
</div>
