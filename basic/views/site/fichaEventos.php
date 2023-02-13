<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row">
        <h3><?= Html::encode($evento->libro_id) ?></h3>
        <p>Descripción: <?= Html::encode($evento->texto) ?></p>
        <p>Fecha inicio: <?= Html::encode($evento->fecha_desde) ?></p>
        <p>Fecha fin: <?= Html::encode($evento->fecha_hasta) ?></p>
</div>