

var slidetime = 6000, tagtime = 6000;
var s = jQuery.noConflict();

function progo_checkcart() {
	s('#hcartcount').html(s('.shoppingcart .cart-widget-count strong').html());
}

s(document).ready( function(){
	s('.index_slide ul').cycle({
		fx: 'fade',
		speed: 1000, 
		timeout: slidetime
	});
	s('.highlight_txt').cycle({
		fx: 'fade',
		speed: 1000, 
		timeout: tagtime
	});					
	//Cufon.replace('.hotel_coral', { fontFamily: 'Hotel Coral Essex' });
	
	var body_width=s('body').width();
	if(body_width>1000)
	s('body').width(body_width).css({'overflow-x':'hidden'});
	
	s('.nav>li>a').wrapInner('<span />');
	s('.nav>li:not(:last-child)').append('|');
	s('.side_box:last').addClass('side_box_last');

	s('.aq_list li a').click(function(){
		if(s(this).next().is(':visible')==true){
			s(this).next().hide();
		} else {
			s(this).next().show();
		}
		return false;
	});

	s(".wpsc_variation_forms select").uniform();
	
	s('.nav').superfish();
	
	s('a.menu-item-840').click(function() {
		s('#kblinks').slideToggle();
		return false;
	});
	
	if ( s('#mc_mv_EMAIL').size() > 0 ) {
		s('#mc_mv_EMAIL').bind({
			focus: function() {
				if ( s(this).val() == 'enter your email' ) s(this).val('');
			}, blur: function() {
				if ( s(this).val() == '' ) s(this).val('enter your email');
			}
		}).trigger('blur').parents('form').submit(function() {
			s('#mc_mv_EMAIL').trigger('focus');
		});
	}
});
