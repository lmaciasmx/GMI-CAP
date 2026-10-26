
<script type="text/javascript" src="<?php echo base_url()?>plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>plugins/dataTables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
				"use strict";
				$('#data-tables').dataTable();
				$('.row2').css('position','absolute');
				$('.row2').css('width','101%');
				$('.row2').css('margin-top','20px');
			
				
				$('.row1').css('position','absolute');
				$('.row1').css('width','100%');
				$('.row1').css('margin-top','-30px');
				$('.row1').css('text-align','-webkit-right');
				
			
				
				
				$('#top').css('width','50px');
				$('#top').css('font-size','11px');
				$('#top').css('margin-right','216px');
				$('#top').css('height','25px');
				
				
				
				$('#search').css('height','26px');
				$('#search').css('font-size','12px');
				$('#search').css('margin-right','10px');
				$('#search').css('width','200px');
				
				$('.col-xs-62').css('margin-top','-32px');	
		} );
		
</script>
