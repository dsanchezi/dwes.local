<?php 
use dwes\app\entity\Imagen;
use dwes\app\entity\Asociado;
   
$imagenesHome[]= new Imagen('1.jpg','descripción imagen 1',1,46,61,135);
$imagenesHome[]= new Imagen('2.jpg','descripción imagen 2',1,56,67,13);
$imagenesHome[]= new Imagen('3.jpg','descripción imagen 3',2,453,676,12);
$imagenesHome[]= new Imagen('4.jpg','descripción imagen 4',1,451,50,19);
$imagenesHome[]= new Imagen('5.jpg','descripción imagen 5',3,459,10,156);
$imagenesHome[]= new Imagen('6.jpg','descripción imagen 6',2,456,610,870);
$imagenesHome[]= new Imagen('7.jpg','descripción imagen 7',1,456,610,178);
$imagenesHome[]= new Imagen('8.jpg','descripción imagen 8',1,456,610,130);
$imagenesHome[]= new Imagen('9.jpg','descripción imagen 9',1,456,610,133);
$imagenesHome[]= new Imagen('10.jpg','descripción imagen 10',1,456,610,130);
$imagenesHome[]= new Imagen('11.jpg','descripción imagen 11',2,456,610,130);
$imagenesHome[]= new Imagen('12.jpg','descripción imagen 12',1,456,610,130);


$asociadosLogos[] = new Asociado('Adam Smith','log1.jpg','El hombre solitario');
$asociadosLogos[] = new Asociado('Lisa','log2.jpg','Segundo asociado');
$asociadosLogos[] = new Asociado('Aldred','log3.jpg','El tercer hombre');
$asociadosLogos[] = new Asociado('Shara','log2.jpg','El cuarto asociado');

require_once __DIR__ . '/../views/index.view.php';
