<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Libros $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="libros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'resumen')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'autor_id')->textInput() ?>

    <?= $form->field($model, 'ilustrador_id')->textInput() ?>

    <?= $form->field($model, 'traductor_id')->textInput() ?>

    <?= $form->field($model, 'editorial_id')->textInput() ?>

    <?= $form->field($model, 'genero_id')->textInput() ?>

    <?= $form->field($model, 'coleccion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'idioma_id')->textInput() ?>

    <?= $form->field($model, 'clase_formato_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paginas')->textInput() ?>

    <?= $form->field($model, 'imagen_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visible')->textInput() ?>

    <?= $form->field($model, 'terminado')->textInput() ?>

    <?= $form->field($model, 'fecha_terminacion')->textInput() ?>

    <?= $form->field($model, 'num_denuncias')->textInput() ?>

    <?= $form->field($model, 'fecha_denuncia1')->textInput() ?>

    <?= $form->field($model, 'bloqueado')->textInput() ?>

    <?= $form->field($model, 'fecha_bloqueo')->textInput() ?>

    <?= $form->field($model, 'notas_bloqueo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cerrado_comentar')->textInput() ?>

    <?= $form->field($model, 'sumaValores')->textInput() ?>

    <?= $form->field($model, 'totalVotos')->textInput() ?>

    <?= $form->field($model, 'cerrado_eventos')->textInput() ?>

    <?= $form->field($model, 'crea_usuario_id')->textInput() ?>

    <?= $form->field($model, 'crea_fecha')->textInput() ?>

    <?= $form->field($model, 'modi_usuario_id')->textInput() ?>

    <?= $form->field($model, 'modi_fecha')->textInput() ?>

    <?= $form->field($model, 'notas_admin')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
