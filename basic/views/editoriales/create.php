<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Editorial $model */

$this->title = Yii::t('app', 'Create Editorial');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Editorials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editorial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
