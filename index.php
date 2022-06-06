<?php 
function rutas() {
	$rutas = [];
	if (isset($_GET['url'])) {
		$rutas = rtrim($_GET['url'], '/');
		$rutas = explode('/', $rutas);
	}
	return $rutas;
}

const BASE_URL = 'http://localhost/pruebatecnicafrontend/';

require_once "controllers/Template.php";
require_once "controllers/Link.php";
require_once "models/Link.php";

$template = new Template();
$template->view();