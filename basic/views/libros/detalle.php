<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
?>
<div class="grid container row">
    <div class="col-4">
        <h3><?= Html::encode($libro->titulo) ?></h3>
        <h5><?= Html::encode($autor->nombre) ?></h5>
        <img src="" style="width=:'10px', height: 10px">
    </div>
    <div class="col-8" style="margin-top:15vh; text-align: justify;">
        <p>Estado: <?= Html::encode($estado) ?>. <?= Html::encode($terminacion) ?>.</p>
        <p>Puntuación: <?= Html::encode($libro->sumaValores) ?> con <?= Html::encode($libro->totalVotos) ?> votos.</p>
        <p><?= Html::encode($libro->resumen) ?></p>
        <?= Html::a(Yii::t('app', 'Denunciar'), ['denunciar', 'id'=>$libro->id, 'ruta'=>'detalle'], ['class' => 'btn btn-danger']);?>
    </div>
</div>