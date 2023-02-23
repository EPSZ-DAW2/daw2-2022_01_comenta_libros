<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LibrosResumen $model */

$this->title = Yii::t('app', 'Create Libros Resumen');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros Resumens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-resumen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
