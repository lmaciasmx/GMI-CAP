<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('TiempoExtra', 'TiempoExtra::inicio');
$routes->post('inicio/obtenerHorarios','Inicio::obtenerHorarios');

$routes->group(
	'reclutamiento',
	[
		'namespace' => 'App\Controllers\Reclutamiento'
	],
	function($routes){

		$routes->post(
			'solicitudes',
			'Solicitudes::index'
		);

		$routes->post(
			'solicitudes/listar',
			'Solicitudes::listar'
		);

		$routes->post(
			'solicitudes/detalle',
			'Solicitudes::detalle'
		);

	}
);
$routes->post(
	'reclutamiento/solicitudes/resumen',
	'Reclutamiento\Solicitudes::resumen'
);



$routes->get(
    'Reclutamiento/candidatos',
    'Reclutamiento\Candidatos::index'
);

$routes->get(
    'Reclutamiento/candidatos/listar',
    'Reclutamiento\Candidatos::listar'
);

$routes->get(
    'Reclutamiento/candidatos/resumen',
    'Reclutamiento\Candidatos::resumen'
);

$routes->get(
    'Reclutamiento/candidatos/seguimientos/(:num)',
    'Reclutamiento\Candidatos::seguimientos/$1'
);
$routes->get(
    'Reclutamiento/Candidatos/agenda-hoy',
    'Reclutamiento\Candidatos::agendaHoy'
);

$routes->get('Reclutamiento/Candidatos/detalle/(:num)', 'Reclutamiento\Candidatos::detalle/$1');

$routes->post(
	'Reclutamiento/Candidatos/conversacion',
	'Reclutamiento\Candidatos::conversacion'
);
$routes->post(
	'Reclutamiento/Candidatos/guardar-seguimiento',
	'Reclutamiento\Candidatos::guardarSeguimiento'
);

$routes->get('Reclutamiento/Conversaciones', 'Reclutamiento\Conversaciones::index');
$routes->get('Reclutamiento/Conversaciones/listar', 'Reclutamiento\Conversaciones::listar');
$routes->get('Reclutamiento/Conversaciones/detalle', 'Reclutamiento\Conversaciones::detalle');


$routes->setAutoRoute(true);

// ==========================================
// MODULO TIEMPO EXTRA
// ==========================================

$routes->group('tiempoextra', ['namespace' => 'App\Controllers\TiempoExtra'], static function ($routes) {

    // Carga principal del módulo
    $routes->match(['get', 'post'], 'inicio', 'Inicio::index');

    // Solicitudes
    $routes->post('inicio/newSol', 'Inicio::newSol');
    $routes->post('inicio/guardarTiempoExtra', 'Inicio::guardarTiempoExtra');
    $routes->post('inicio/deleteSolTEX', 'Inicio::deleteSolTEX');
    $routes->post('inicio/AutorizarSolTEX', 'Inicio::AutorizarSolTEX');

    // Consultas y listados
    $routes->post('inicio/getTodos', 'Inicio::getTodos');
    $routes->post('inicio/getPendientes', 'Inicio::getPendientes');
    $routes->post('inicio/getPendientesJefe', 'Inicio::getPendientesJefe');
    $routes->post('inicio/getPendientesGerente', 'Inicio::getPendientesGerente');
    $routes->post('inicio/getAutorizadas', 'Inicio::getAutorizadas');
    $routes->post('inicio/getRechazadas', 'Inicio::getRechazadas');

    // Vistas y validaciones
    $routes->post('inicio/viwDeleteSTE', 'Inicio::viwDeleteSTE');
    $routes->post('inicio/viwRechazaSol', 'Inicio::viwRechazaSol');
    $routes->post('inicio/viwAceptarSol', 'Inicio::viwAceptarSol');
    $routes->post('inicio/viewValidaEmpleado', 'Inicio::viewValidaEmpleado');
    $routes->post('inicio/validardiashoras', 'Inicio::validardiashoras');

    // Búsquedas
    $routes->match(['get', 'post'], 'inicio/getTrabjadorbyNumeroEmpleado', 'Inicio::getTrabjadorbyNumeroEmpleado');

    // Exportación Excel
    $routes->post('inicio/excelTiempoExtra', 'Inicio::excelTiempoExtra');

    // Notificaciones
    $routes->post('inicio/sendmailSolicitud', 'Inicio::sendmailSolicitud');
    $routes->post('inicio/sendmailSolicitudNivel2', 'Inicio::sendmailSolicitudNivel2');
});