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