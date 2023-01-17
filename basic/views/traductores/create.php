<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Traductores $model */

$this->title = Yii::t('app', 'Create Traductores');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Traductores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traductores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
