<?php
define('HOST','server');
define('USER','amiuser');
define('PASS','amipass');
define('PREFIX','wp-c2c ');
define('CONTEXT','context');
define('AGENT','agemt');
define('TIMEOUT',25000);
define('REDIRECT_SUCCESS','urlsuccess');
define('REDIRECT_FAILURE','urlfail');
if (!isset($_POST['number']) || !is_numeric($_POST['number']) || !isset($_POST['name']))
	die("Incorrect input data");
require_once "phpagi-asmanager.php";
$agi = new AGI_AsteriskManager();
if (!$agi->Connect(HOST,USER,PASS))
	die("No connection to host, check data.");
$success = $agi->Originate(
	AGENT,
	null,
	null,
	null,
	'Dial',
	sprintf("Local/%s@%s",$_POST['number'],CONTEXT),
	TIMEOUT,
	sprintf("%s%s <%s>",PREFIX,$_POST['name'],$_POST['number'])
);
header('Location: '.(($success)?REDIRECT_SUCCESS:REDIRECT_FAILURE));
die();
?>
