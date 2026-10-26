
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content shadow-sm card-bodys" id="modalCancelar">

	<div class="modal-header">
	  <h5 class="modal-title"><i class="ph-duotone ph-warning-circle text-danger me-2"></i>Confirmación de Rechazo</h5>
	  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	</div>
	<div class="modal-body text-center">
		<div style="text-align: center;font-size: 17px;">¿Seguro que desea rechazar la solicitud ?</div><br>
	</div>

	<div class="modal-footer justify-content-center">
	  <button type="button"  class="btn btn-danger"  onClick="autoSolTE(<?php echo $eCodConsecutivo?>,<?php echo $eCodEstatus?>)">	<i class="ph-duotone ph-trash me-1"></i> Sí, rechazar </button>
	  <button type="button"  class="btn btn-light"  data-bs-dismiss="modal">Cancelar </button>
	</div>
  </div>
</div>
