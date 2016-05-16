<?php
// *** Parámetros de configuración
// * Asterisk Manager
define('HOST','curadeuda.no-ip.org:35000');
define('USER','c2c');
define('PASS','ast3r!sk');

// * Formato de click2call
define('PREFIX','C2C ');					// Prefijo a anteponer al nombre del cliente

// * Plan de marcación
define('CONTEXT','from-internal');			// Contexto donde el numero XXXXXXXXXX debe ser permitido
define('AGENT','local/912@from-internal');					// Canal del/los agentes que recibiran la llamada
define('TIMEOUT',25000);					// Tiempo máximo para que el agente conteste

// * Redireccion en caso de exito
define('REDIRECT_SUCCESS','http://enlaza.mx/contacto+exitoso');
// * Redireccion en caso de falla
define('REDIRECT_FAILURE','http://enlaza.mx/contacto+error');





/* NO CAMBIA NADA A PARTIR DE ESTE PUNTO */

// Si no hay variable submit, entonces es la primera vez que llegamos y no hacemos nada
if (!isset($_POST['numero']) || !is_numeric($_POST['numero']) || !isset($_POST['nombre']))
	die("Alguno de los números no fue proporcionado o no está en formato numérico.");

// Todo está bien. Hay que hacer magia	

require_once "phpagi-asmanager.php";
$agi = new AGI_AsteriskManager();
if (!$agi->Connect(HOST,USER,PASS))
	die("No es posible conectar con el marcador. Revise su configuración o su conexión a la red.");

// Solicitamos la llamada
$exito = $agi->Originate(
	AGENT,												// Channel
	null,												// Exten
	null,												// Context
	null,												// Priority
	'Dial',
	sprintf("Local/%s@%s",$_POST['numero'],CONTEXT),
	TIMEOUT,											// Timeout
	sprintf("%s%s <%s>",PREFIX,$_POST['nombre'],$_POST['numero'])// CallerID a desplegar al agente
);
header('Location: '.(($exito)?REDIRECT_SUCCESS:REDIRECT_FAILURE));
die();
?>