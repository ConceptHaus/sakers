<?php
	function envia_mail($cuerpo,$para,$asunto) {
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= "From:Sakers <contacto@sakers.com.mx> \r\n";
		
		if(mail($para,$asunto,$cuerpo,$headers))		
		return 1;
		else return 0;
	}
	
	$subject = utf8_decode('Sakers - Contacto');
	$to=$_POST['email'];
	$message_usuario = utf8_decode('<div style="color:#27384a">
						<img src="https://webtestdevelopment.com/sakers/img/sakers-logo-azul.png" width="150">
						<br /><br /><br />  
						Su mensaje se ha enviado con &eacute;xito, en breve <strong>Sakers</strong> se podr&aacute; en contacto con usted.
						<br><br>
						<strong>Nombre:</strong> '.$_POST['name'].'<br>
						<strong>Correo Electr&oacute;nico:</strong> '.$_POST['email'].'<br>
						<strong>Tel&eacute;fono:</strong> '.$_POST['tel'].'<br>
						<strong>Ciudad:</strong> '.$_POST['ciudad'].'<br>
						<strong>Mensaje:</strong><br>
						<pre>'.$_POST['message'].'</pre>
						
						<br><br>
						Saludos Cordiales<br>Sakers
						<br><i style="color:#000000">Este es un mensaje autom&aacute;tico y no es necesario responder</i>
						</div>');
	$message_contacto = utf8_decode('
						<div style="color:#27384a"><img src="https://webtestdevelopment.com/sakers/img/sakers-logo-azul.png" width="150">
						<br /><br /><br />  
						Nuevo mensaje recibido
						<br><br>
						<strong>Nombre:</strong> '.$_POST['name'].'<br>
						<strong>Correo Electr&oacute;nico:</strong> '.$_POST['email'].'<br>
						<strong>Tel&eacute;fono:</strong> '.$_POST['tel'].'<br>
						<strong>Ciudad:</strong> '.$_POST['ciudad'].'<br>
						<strong>Mensaje:</strong><br>
						<pre>'.$_POST['message'].'</pre>
						<br><br>
						Saludos Cordiales<br>Sakers
						<br><i style="color:#000000">Este es un mensaje autom&aacute;tico y no es necesario responder</i>
						</div>');
						
	if( $_POST['email'] != '' ) 
	{					
		if (@envia_mail($message_usuario,$to,$subject)) {
			
			$subject = utf8_decode('Sakers - Nuevo Mensaje');
			envia_mail($message_contacto,'contacto@sakers.com.mx',$subject);
			echo 'success';
		}
		else
			echo 'error';
	}
	else
		echo 'error';
	
?>