<?php
return [
	'database' => [
		'name' => 'cursophp',
		'username' => 'userCurso',
		'password' => 'php',
		'connection' => 'mysql:host=localhost',
		'options' => [
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_PERSISTENT => true
		]
	],
	'mailer' => [
		'smtp_host' => 'portusapartamento.es',
		'smtp_port' => '465',
		'password' => 'P0rtusP0rtus#12',
		'smtp_security' => 'PHPMailer::ENCRYPTION_SMTPS;',   //Habilitar el cifrado TLS
		'username' => 'info@portusapartamento.es',
		'email' => 'info@portusapartamento.es',
		'nombre' => 'Darío Sánchez',
	]
];