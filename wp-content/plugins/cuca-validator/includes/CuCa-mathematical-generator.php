<?php
	/* Generatore captcha matematico */
function CuCa_math_generator(){
	$outCuCa_math_generator .=	"<div class='CuCa_Math ".get_option('CuCa_math_skin')."' align='center'><div>";
	$outCuCa_math_generator .=		__( 'Simple anti-spam control, solve<br/>this operation to unlock the form','CuCa-Validator' );
	$outCuCa_math_generator .=		".</div><div class='CuCa-math-quest'>";
	$outCuCa_math_generator .=			"<label id='CuCa-math-question'></label><label> = </label><input type='text' id='CuCa-math-answer' autocomplete='off'></input>";
	$outCuCa_math_generator .=			"<img src='".CUCA_PLUGIN_URL."skins/".get_option('CuCa_math_skin')."_cross.png' id='CuCa-math-invalid'/>";
	$outCuCa_math_generator .=		"</div>";	
	$outCuCa_math_generator .=	"</div>";
	return $outCuCa_math_generator;
}


	/* Shortcode Generator */
function CuCa_math_shortcode_generator($atts) {
	return CuCa_math_generator();
}
add_shortcode("CuCaM", "CuCa_math_shortcode_generator");	
?>