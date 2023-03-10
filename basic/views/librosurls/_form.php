<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LibrosUrls $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="libros-urls-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'libro_id')->textInput() ?>

    <?= $form->field($model, 'orden')->textInput() ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'titulo')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
