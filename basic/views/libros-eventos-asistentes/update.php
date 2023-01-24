<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LibrosEventosAsistentes $model */

$this->title = Yii::t('app', 'Update Libros Eventos Asistentes: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros Eventos Asistentes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="libros-eventos-asistentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
