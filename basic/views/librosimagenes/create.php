<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LibrosImagenes $model */

$this->title = Yii::t('app', 'Create Libros Imagenes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros Imagenes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-imagenes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
