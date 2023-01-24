<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LibrosEventosAsistentes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="libros-eventos-asistentes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'libro_id')->textInput() ?>

    <?= $form->field($model, 'evento_id')->textInput() ?>

    <?= $form->field($model, 'usuario_id')->textInput() ?>

    <?= $form->field($model, 'fecha_alta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
