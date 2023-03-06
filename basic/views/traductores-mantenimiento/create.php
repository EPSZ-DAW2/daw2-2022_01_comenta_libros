<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Traductores */

$this->title = 'Create Traductores';
$this->params['breadcrumbs'][] = ['label' => 'Traductores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traductores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
