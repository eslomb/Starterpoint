<div class="datos">
<?php
global $starterpoint;
$email = $starterpoint->options->getOption('email');
$direccion = $starterpoint->options->getFormattedOption('direccion','<span>%s</span>');
$tel = $starterpoint->options->getOption('telefono');
$tel_link = $starterpoint->options->getOption('telefono_link');

if(!empty($email)){
	echo sprintf('<span><a href="mailto:%s"><i class="fas fa-envelope"></i> %s</a></span>', $email, $email );
}



if( !empty($tel) ){
	$tel_completo = '<span>';
	if($tel_link!=''){
		$tel_completo .= sprintf('<a href="tel://%s"><i class="fas fa-phone"></i> %s</a>', $tel_link, $tel );
	}else{
		$tel_completo .= sprintf('<i class="fas fa-phone"></i> %s', $tel );
	}
	$tel_completo .= '</span>';
	echo $tel_completo;
}


echo $direccion;
?>
</div>
