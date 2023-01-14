<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Autores $model */

$this->title = 'Create Autores';
$this->params['breadcrumbs'][] = ['label' => 'Autores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
