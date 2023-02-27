<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\EditorialMantenimiento $model */

$this->title = Yii::t('app', 'Create Editorial Mantenimiento');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Editorial Mantenimientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editorial-mantenimiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
