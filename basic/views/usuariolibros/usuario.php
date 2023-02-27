<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\controllers\LibrosComentarios;


// var_dump($fecha);
?>
<div class="grid container row">
    <div class="col-4">
        <h2><?= Html::encode("Datos Usuario:") ?></h2>
        <h3><?= Html::encode("Nombre: ".$usuario->nombre. " ". $usuario->apellidos) ?></h3>
        <h3><?= Html::encode("Nick: ".$usuario->nick) ?></h3>
        <p><?= Html::encode("Email: ".$usuario->email) ?></p>
        <p><?= Html::encode("Fecha Nacimiento: ".$usuario->fecha_nacimiento) ?></p>
        <p><?= Html::encode("Direccion: ".$usuario->direccion) ?></p>

        <img src="" style="width=:'10px', height: 10px">
    </div>


</div>