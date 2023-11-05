<?php
require_once __DIR__ . '/inicio.part.php';
require_once __DIR__. '/navegacion.part.php';
?>

<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Asociados</h1>
                    <p class="text-white">Introduce tus datos para registrarte:</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Principal Content Start -->
<div id="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <hr>
            <!-- Sección que muestra la confirmación del formulario o bien sus errores -->
            <?php if($_SERVER['REQUEST_METHOD']==='POST') : ?>
                <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <?php if(empty($errores)) : ?>
                        <p><?= $mensaje ?></p>
                    <?php else : ?>
                        <ul>
                            <?php foreach ($errores as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach;?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <form clas="form-horizontal" action="/asociados/nuevo" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Nombre*</label>
                        <input class="form-control" type="text" name="nombre" value="<?= $nombre ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Logo</label>
                        <input class="form-control-file" type="file" name="logo">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Descripción</label>
                        <textarea class="form-control" name="descripcion"><?= $descripcion ?></textarea>
                        <!-- CAPTCAHA -->
                        <label class="label-control">Introduce el captcha <img style="border: 1px solid #D3D0D0 " src="../../src/utils/captcha.php" id='captcha'></label>
                        <input class="form-control" type="text" name="captcha">
                        <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                    </div>
                </div>
            </form>
            <br><br>
            <hr class="divider">
            <div class="imagenes_galeria">
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__. '/fin.part.php';
