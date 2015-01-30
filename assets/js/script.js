$(function(){
	var toggled = false;
	$('#toggleMenu').on('click touchstart', function(){
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
});