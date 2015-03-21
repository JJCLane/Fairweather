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
});