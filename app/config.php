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
		'password' => 'xxxxxx',
		'smtp_security' => 'PHPMailer::ENCRYPTION_SMTPS;',   //Habilitar el cifrado TLS
		'username' => 'info@portusapartamento.es',
		'email' => 'info@portusapartamento.es',
		'nombre' => 'Darío Sánchez',
	],
	'logs' => [
		'filename' => 'curso.log',
		'level' => \Monolog\Logger::WARNING
	],
	'routes' => [
		'filename' => 'routes.php'
	],
	 'project' => [
		'namespace' => 'dwes'
	 ],
	 'security' => [
        'roles' => [
            'ROLE_ADMIN' => 3,
            'ROLE_USER' => 2,
            'ROLE_ANONYMOUS' => 1
        ]
    ] 

];
