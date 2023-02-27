<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatrocinadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patrocinador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'usuario_id') ?>

    <?= $form->field($model, 'nif_cif') ?>

    <?= $form->field($model, 'razon_social') ?>

    <?= $form->field($model, 'telefono_comercial') ?>

    <?php // echo $form->field($model, 'telefono_contacto') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'fecha_alta') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
