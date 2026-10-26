// JavaScript Document
+function ($) {
	$.fn.Preload=function(Modal){  
		if ($("#Preload").length == 0){
			$('body').append('<div id="Preload" class="modal-backdrop fade in"><div class="Preloader"><span class="Leyenda"></span></div></div>');			
		}
    }
    $.fn.CPreload=function(){		
		$("#Preload").remove();
    }
}(window.jQuery);