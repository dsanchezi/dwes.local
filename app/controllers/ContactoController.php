<?php

namespace dwes\app\controllers;

use dwes\core\App;
use dwes\app\utils\MyMail;
use dwes\core\Response;
use dwes\app\excepciones\QueryException;
use dwes\app\excepciones\MailException;
use Exception;

class ContactoController
{
    /**
     * @throws QueryException
     */
    public function index()
    {
        Response::renderView(
            'contact',
            'layout'
        );
    }

    public function enviar()
    {
        $mensaje = "";

        try {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = trim(htmlspecialchars($_POST['nombre'])) ?? "";
                $apellidos = trim(htmlspecialchars($_POST['apellidos'])) ?? "";
                $email = trim(htmlspecialchars($_POST['email'])) ?? "";
                $asunto = trim(htmlspecialchars($_POST['asunto'])) ?? "";
                $mensaje = trim(htmlspecialchars($_POST['mensaje'])) ?? "";

                if ($nombre != "" && $email != "" && $asunto != "") {
                    $mail = new MyMail();
                    $mail->send($email, $nombre . ' ' . $apellidos, $asunto, $mensaje);
                    $mensaje = "Mensaje enviado correctamente.";
                } else {
                    $mensaje = "Faltan campos por rellenar: Nombre, Email y Asunto.";
                }
            }
        } catch (MailException $mailException) {
            $mensaje = $mailException->getMessage();
        }

        App::get('router')->redirect('contact');
    }
}
