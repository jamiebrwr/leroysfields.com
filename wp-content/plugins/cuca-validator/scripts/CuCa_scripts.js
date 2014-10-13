/* Variabili iniettate da php
	MATHEMATCICAL CAPTCHA 	=>		pluginpath	|	primoNum	|	secondoNum	|	plus	|	minus	|	mul		|	div		|	skin
	WORD CAPTCHA			=>		pluginpath	|
	COLOR CAPTCHA			=>		CuCa_color_trialN
*/


	/* Blocchiamo il form o il campo di testo all'esecuzione dello script */
jQuery('.CuCaM').attr('disabled',true);


	/* Esito captcha try - Form */
jQuery('.CuCaM, .CuCaW, .CuCaC').submit(function(){
	switch (jQuery(this).attr('class')){
		case 'CuCaM':
			if(CuCaMathValidated != true){
				jQuery('#CuCa-math-answer').focus();
				return false;
			}else{
				return true;
			}
			break;
	}
});
	/* Esito captcha try - Field */
function CuCaFieldLock(elem,lock){
	elem.attr('disabled',lock);
	if(lock==false) elem.focus();
}

	

//----------- MATHEMATICAL CAPTCHA (class="CuCa-mUnlock")---------------//
//----------------------------------------------------------------------//
var segni = [],
Risultato = '',
CuCaMathValidated = false;


if(scriptParams.plus != 0){ segni.push(scriptParams.plus); }
if(scriptParams.minus != 0){ segni.push(scriptParams.minus); }
if(scriptParams.mul != 0){ segni.push(scriptParams.mul); }
if(scriptParams.div != 0){ segni.push(scriptParams.div); }
	
	
function renderMathCuCa(){
	scriptParams.primoNum = Math.floor(Math.random()*scriptParams.primoNum);
	scriptParams.secondoNum = Math.floor(Math.random()*scriptParams.secondoNum);
	segni = segni[Math.floor(Math.random()*segni.length)]
	switch (segni){
		case '+':
			Risultato = scriptParams.primoNum+scriptParams.secondoNum;
			break;
		case '-':
			Risultato = scriptParams.primoNum-scriptParams.secondoNum;
			break;		
		case 'x':
			Risultato = scriptParams.primoNum*scriptParams.secondoNum;
			break;		
		case '/':
			Risultato = scriptParams.primoNum/scriptParams.secondoNum;
			break;
	}
	jQuery('#CuCa-math-question').html(scriptParams.primoNum+' '+segni+' '+scriptParams.secondoNum);
}
function ValidateCuCaMath(){
	if( jQuery('#CuCa-math-answer').val() != Risultato || jQuery('#CuCa-math-answer').val() == '' ){
		jQuery('#CuCa-math-invalid').attr('src',scriptParams.pluginpath+'skins/'+scriptParams.skin+'_cross.png');
		CuCaMathValidated = false;
		CuCaFieldLock(jQuery('.CuCaM'),true);
	}else{
		jQuery('#CuCa-math-invalid').attr('src',scriptParams.pluginpath+'skins/'+scriptParams.skin+'_tick.png');		
		CuCaMathValidated = true;
		CuCaFieldLock(jQuery('.CuCaM'),false);
	}
}
renderMathCuCa();
jQuery('#CuCa-math-answer').bind('keyup',ValidateCuCaMath);