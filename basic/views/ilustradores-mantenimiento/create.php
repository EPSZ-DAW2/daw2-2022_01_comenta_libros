<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ilustradores */

$this->title = 'Create Ilustradores';
$this->params['breadcrumbs'][] = ['label' => 'Ilustradores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ilustradores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
