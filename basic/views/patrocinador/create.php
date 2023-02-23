<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Patrocinador */

$this->title = Yii::t('app', 'Create Patrocinador');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patrocinadors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patrocinador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
