<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LibrosEventosAsistentes $model */

$this->title = Yii::t('app', 'Create Libros Eventos Asistentes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros Eventos Asistentes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-eventos-asistentes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
