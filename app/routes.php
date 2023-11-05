<?php
$router->get ('', 'app/controllers/index.php');
$router->get ('about', 'app/controllers/about.php');

$router->get ('asociados', 'app/controllers/asociados.php');
$router->post('asociados/nuevo', 'app/controllers/nuevo-asociado.php');

$router->get ('blog', 'app/controllers/blog.php');

$router->get ('contact', 'app/controllers/contact.php');
$router->post('contact/enviar', 'app/controllers/contact-enviar.php');

$router->get ('post', 'app/controllers/single_post.php');

$router->get ('galeria', 'app/controllers/galeria.php');
$router->post('galeria/nueva', 'app/controllers/nueva-imagen-galeria.php');
