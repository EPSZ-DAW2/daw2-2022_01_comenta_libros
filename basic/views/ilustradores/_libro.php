<?php
use yii\helpers\Html;
?>

<div class="libro-item">
    <h2><?= Html::encode($model->titulo) ?></h2>
    <p><?= Html::encode($model->resumen) ?></p>
    <p>El autor terminó de escribir este libro en: <?= Html::encode($model->fecha_terminacion) ?></p>
   
</div>
