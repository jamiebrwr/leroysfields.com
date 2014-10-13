/* Variabili iniettate da php
	GENERALI				=>		pluginpath	|	welcomeMsg
*/

//----------------------- WORD CAPTCHA -------------------------//
//					Settings menu scripts						//
//--------------------------------------------------------------//
	/* Blocchiamo il form o il campo di testo all'esecuzione dello script */
jQuery('.CuCaM').attr('disabled',true);



	/* Welcome message */
function showWelcome(){
	jQuery('#CuCa_admWelcomeAd').fadeIn('slow');
	jQuery('.CuCa_admWelcome').animate({'left':'50%'},1000,'swing');
}
function hideWelcome(){
	jQuery('.CuCa_admWelcome').animate({'left':'250%'},700,'swing');		
	jQuery('#CuCa_admWelcomeAd').fadeOut('fast');
}
jQuery('.CuCa_admWelcome div').click(hideWelcome);
jQuery(document).keyup(function(e){	if (e.keyCode == 27 || e.which == 27){ hideWelcome(); } });
if(scriptAdminParams.welcomeMsg==0){
	showWelcome(); 
}



	/* Preview show hide */
jQuery('.CuCa_admPrevTrigger').click(function(e){
	e = jQuery(this);
	elem = jQuery(this).parent().next('.CuCa_admPrev');
	if(elem.hasClass('CuCa_admPrev|shown')){
		elem.animate({'marginTop':'-374px'},function(){
			elem.removeClass('CuCa_admPrev|shown');
			e.css('background','url('+scriptAdminParams.pluginpath+'imgs/CuCa_ptD.png)');
		})	
	}else{
		elem.animate({'marginTop':'-10px'},function(){
			elem.addClass('CuCa_admPrev|shown');
			e.css('background','url('+scriptAdminParams.pluginpath+'imgs/CuCa_ptU.png)');
		})
	}
});



	/* CuCa math setting scripts */
var Melem = jQuery('[name=CuCa_math_settings_module_form]');
if(jQuery('[name=CuCa_math_skin_enable]').prop('checked')==true){
	jQuery('[name=CuCa_math_skin]').prop('disabled', false);
	jQuery('[name=CuCa_math_skin] option:first').attr('disabled', true);
}else{
	jQuery('[name=CuCa_math_skin] option:first').attr('disabled', false);
	jQuery('[name=CuCa_math_skin]').val('CuCa_math_custom').prop('disabled', true);
}
jQuery('[name=CuCa_math_skin_enable]').click(function(){
	if(jQuery(this).prop('checked')==true){
		jQuery('[name=CuCa_math_skin]').prop('disabled', false);
		jQuery('[name=CuCa_math_skin] option:first').attr('disabled', true);
	}else{
		jQuery('[name=CuCa_math_skin] option:first').attr('disabled', false);
		jQuery('[name=CuCa_math_skin]').val('CuCa_math_custom').prop('disabled', true);
	}
});
Melem.submit(function(){ 
	jQuery('[name=CuCa_math_skin]').prop('disabled', false);	
	return true;
});




	/* Donazioni */
jQuery('.CuCa_donTrigger').click(function(){
	elem = jQuery(this).closest('.CuCa_don1lvl');
	if(elem.hasClass('CuCa_don|shown')){
		jQuery(this).css('background-position','0 0');
		elem.animate({'height':'26px'}, 400);
		elem.removeClass('CuCa_don|shown');
	}else{
		bH = jQuery('.CuCa_don1lvl table').height();
		jQuery(this).css('background-position','0 -21px');
		elem.animate({'height':bH+70}, 400);
		elem.addClass('CuCa_don|shown');
	}	
});