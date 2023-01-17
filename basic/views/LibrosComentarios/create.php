<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LibrosComentarios $model */

$this->title = Yii::t('app', 'Create Libros Comentarios');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros Comentarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-comentarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
