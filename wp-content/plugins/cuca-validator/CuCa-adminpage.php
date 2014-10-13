<?php
session_start();


	/* CuCa Math settings - Funzione che genera (e aggiorna ad ogni caricamento della pagina) il form per il Math CuCa */
function CuCa_math(){ ?>
<div class="CuCa_admContainer">
	<div class="CuCa_admSx">
		<form name="CuCa_math_settings_module_form" method="post" action="options.php">
			<?php settings_fields('CuCa_math_options_group'); update_option('CuCa_welcome', '1'); ?>
			<div class="CuCa_adm1lvl">
				<div class="CuCa_adm1lvl_sx">
					<table style="width: 100%" cellpadding="8">
						<tr><td colspan="2" align="right">CuCa Math Validator</td></tr>
						<tr>
							<td><?php _e('Range first number','CuCa-Validator') ?>:<br/><i><?php _e('Write the max amount for the first element','CuCa-Validator') ?></i></td>
							<td><input type="text" name="CuCa_math_first_number" value="<?php echo get_option('CuCa_math_first_number') ?>" maxlength="3" /></td>
						</tr>
						<tr>
							<td><?php _e('Range second number','CuCa-Validator') ?>:<br/><i><?php _e('Write the max amount for the second element','CuCa-Validator') ?></i></td>
							<td><input type="text" name="CuCa_math_second_number" value="<?php echo get_option('CuCa_math_second_number') ?>" maxlength="3" /></td></tr>
						<tr>
							<td><?php _e('Operations','CuCa-Validator') ?>:<br/><i><?php _e('Select which operations to use in the Captcha','CuCa-Validator') ?></i></td>
							<td><input type="checkbox" name="CuCa_math_sign_add" value="+" <?php checked(get_option('CuCa_math_sign_add'), '+', 1); ?> onclick="return false;" /> <?php _e('Addition <i>(Default)</i>','CuCa-Validator') ?><br/>
								<input type="checkbox" name="CuCa_math_sign_min" value="-" <?php checked(get_option('CuCa_math_sign_min'), '-', 1); ?> /> <?php _e('Subtraction','CuCa-Validator') ?><br/>
								<input type="checkbox" name="CuCa_math_sign_mul" value="x" <?php checked(get_option('CuCa_math_sign_mul'), 'x', 1); ?> /> <?php _e('Multiplication','CuCa-Validator') ?><br/>
								<input type="checkbox" name="CuCa_math_sign_div" value="/" <?php checked(get_option('CuCa_math_sign_div'), '/', 1); ?> /> <?php _e('Division <i>(Not Advised)</i>','CuCa-Validator') ?>
							</td>
						</tr>
						<tr>
							<td><?php _e('Select the Skin','CuCa-Validator') ?>:<br/><i><?php _e('Which fits best to your theme','CuCa-Validator') ?></i></td>
							<td><select name="CuCa_math_skin">
									<option value="CuCa_math_custom" <?php selected(get_option('CuCa_math_skin'), "CuCa_math_custom"); ?>>---</option>
									<option value="CuCa_math_classic" <?php selected(get_option('CuCa_math_skin'), "CuCa_math_classic"); ?>><?php _e('Classic','CuCa-Validator') ?></option>
									<option value="CuCa_math_modern" <?php selected(get_option('CuCa_math_skin'), "CuCa_math_modern"); ?>><?php _e('Modern','CuCa-Validator') ?></option>
									<option value="CuCa_math_vintage" <?php selected(get_option('CuCa_math_skin'), "CuCa_math_vintage"); ?>><?php _e('Vintage','CuCa-Validator') ?></option>
									<option value="CuCa_math_minimal" <?php selected(get_option('CuCa_math_skin'), "CuCa_math_minimal"); ?>><?php _e('Minimal','CuCa-Validator') ?></option>
									<option value="CuCa_math_lightwood" <?php selected(get_option('CuCa_math_skin'), "CuCa_math_lightwood"); ?>><?php _e('Light Wood','CuCa-Validator') ?></option>
									<option value="CuCa_math_darkwood" <?php selected(get_option('CuCa_math_skin'), "CuCa_math_darkwood"); ?>><?php _e('Dark Wood','CuCa-Validator') ?></option>								
								</select>
								<input type="checkbox" name="CuCa_math_skin_enable" value="1" <?php checked(get_option('CuCa_math_skin_enable'), '1', 1); ?> /> <?php _e('Enable','CuCa-Validator') ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: right;"><input type="submit" name="submit" value="<?php _e('Update','CuCa-Validator') ?>"/></td>
						</tr>
					</table>
				</div>
				<div class="CuCa_adm1lvl_dx"></div>
			</div>
		</form>
	</div>
	<div class="CuCa_admDx">
		<div class="CuCa_admPrevTrigger"></div>
	</div>
	
	<?php	/* CuCa Math preview */ ?>
	<div class="CuCa_admPrev">
		<div><?php echo CuCa_math_generator(); ?><br/><?php _e('Unlock this field','CuCa-Validator') ?><br/><input type="text" class="CuCaM"/></div>
		<div align="left">
			Math Validator:<br/>
			<i><?php _e('Solve the operation to unlock the blocked text field','CuCa-Validator') ?>.</i><br/><br/>
			<?php _e('Adding CuCa to your form','CuCa-Validator') ?>:
			<ol>
				<li><?php _e('Add this shortcode <strong>[CuCaM]</strong> to your page/post to generate the capthca','CuCa-Validator') ?>.</li>
				<li><?php _e('Add the <strong>class="CuCaM"</strong> to the<br/>field/form you want to control','CuCa-Validator') ?>.</li>
				<li><?php _e('Done','CuCa-Validator') ?>!</li>
			</ol>
		</div>
		<div></div>
	</div>
</div>
<?php }



	/* Donation - Funzione che genera l'area donazioni */
function CuCa_donation(){ ?>
<div class="CuCa_admContainer" id="CuCa_don">
	<div class="CuCa_don1lvl">
		<table>
			<tr>
				<td colspan="2" style="text-align: right; padding 4px 10px;"><?php _e('Support CuCa!','CuCa-Validator') ?><div class="CuCa_donTrigger"></div></td>
			</tr>
			<tr>
				<td style="width: 370px; padding-left: 30px;" align="right"><?php _e('Save your coffee coins.<br/>A few cents for you, a great help for us.<br/>','CuCa-Validator') ?></td>
				<td>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="SY358NSRQ7ZWG">
						<input type="image" style="height: 62px; width: auto; border: none;" src="<?php echo CUCA_PLUGIN_URL ?>imgs/CuCa_donate.png" border="0" name="submit" alt="PayPal - Il metodo rapido, affidabile e innovativo per pagare e farsi pagare.">
						<img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
					</form>				
				</td>				
			</tr>
		</table>
		<div class="CuCa_don2lvl">
			<table>
				<tr>
					<td colspan="5" align="right"><i><?php _e('Special thanks to:','CuCa-Validator') ?></i></td>
				</tr>
				<tr>
					<td>Davide Cantelli</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php }


?>