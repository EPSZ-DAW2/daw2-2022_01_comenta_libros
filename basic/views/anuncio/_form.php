<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Anuncio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anuncio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patrocinador_id')->textInput() ?>

    <?= $form->field($model, 'titulo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'prioridad')->textInput() ?>

    <?= $form->field($model, 'visible')->textInput() ?>

    <?= $form->field($model, 'editorial_id')->textInput() ?>

    <?= $form->field($model, 'libro_id')->textInput() ?>

    <?= $form->field($model, 'genero_id')->textInput() ?>

    <?= $form->field($model, 'evento_id')->textInput() ?>

    <?= $form->field($model, 'crea_usuario_id')->textInput() ?>

    <?= $form->field($model, 'crea_fecha')->textInput() ?>

    <?= $form->field($model, 'modi_usuario_id')->textInput() ?>

    <?= $form->field($model, 'modi_fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
