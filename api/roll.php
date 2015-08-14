<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$application = new \Slim\Slim();

$application->get(
	'/hello/:firstname/:lastname',
	function ($first, $last){
		echo "Hello $first $last";
	}
);
	
$application->map(
	'/products(/:id)',
	function () {
		global $application;
		$id = $application->request->get('id');
		if ($id == null) {
			$id = $application->request->post('id');
		}
		echo "showing info about product #" . $id;
	})->via('GET', 'POST');	

$application->run();