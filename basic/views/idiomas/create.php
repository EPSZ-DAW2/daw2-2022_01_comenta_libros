<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Idioma $model */

$this->title = Yii::t('app', 'Create Idioma');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Idiomas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="idioma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
