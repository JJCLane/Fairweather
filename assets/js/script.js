$(function(){
	var toggled = false;
	var $toggleMenu = $('#toggleMenu');
	$toggleMenu.on('click touchstart', function(){
		toggled = !toggled;
		$this = $(this);
		if(toggled) {
			$this.html('Close menu');
		} else {
			$this.html('Menu');
		}
		$this.toggleClass('toggled');
		$('.header__links').stop().slideToggle();
		return false;
	});
	
	$('.header__links').on('click touchstart', 'a', function(){
		if($toggleMenu.is(':visible')) {
			$('#toggleMenu').trigger('click');
		}
	});

	$('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	});

	// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
	if (!String.prototype.trim) {
		(function() {
			// Make sure we trim BOM and NBSP
			var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
			String.prototype.trim = function() {
				return this.replace(rtrim, '');
			};
		})();
	}

	$('.input__field').each(function() {

		// Checkif the input is already filled
		if( this.value.trim() !== '' ) {
			$(this).parent().addClass('input--filled');
		}

	});

	$('.input__field').on('focus', function() {
		$(this).parent().addClass('input--filled');
	});

	$('.input__field').on('blur', function() {
		if( this.value.trim() === '' ) {
			$(this).parent().removeClass('input--filled');
		}
	});
});