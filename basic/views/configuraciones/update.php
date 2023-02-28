<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Configuraciones */

$this->title = Yii::t('app', 'Update Configuraciones: {name}', [
    'name' => $model->variable,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuraciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->variable, 'url' => ['view', 'variable' => $model->variable]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="configuraciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
