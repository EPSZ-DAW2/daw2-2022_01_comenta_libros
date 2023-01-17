<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LibrosUrls $model */

$this->title = Yii::t('app', 'Create Libros Urls');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros Urls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-urls-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
