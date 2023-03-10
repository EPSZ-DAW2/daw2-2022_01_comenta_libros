<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LibrosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="libros-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'resumen') ?>

    <?= $form->field($model, 'autor_id') ?>

    <?= $form->field($model, 'ilustrador_id') ?>

    <?php // echo $form->field($model, 'traductor_id') ?>

    <?php // echo $form->field($model, 'editorial_id') ?>

    <?php // echo $form->field($model, 'genero_id') ?>

    <?php // echo $form->field($model, 'coleccion') ?>

    <?php // echo $form->field($model, 'idioma_id') ?>

    <?php // echo $form->field($model, 'clase_formato_id') ?>

    <?php // echo $form->field($model, 'paginas') ?>

    <?php // echo $form->field($model, 'imagen_id') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <?php // echo $form->field($model, 'terminado') ?>

    <?php // echo $form->field($model, 'fecha_terminacion') ?>

    <?php // echo $form->field($model, 'num_denuncias') ?>

    <?php // echo $form->field($model, 'fecha_denuncia1') ?>

    <?php // echo $form->field($model, 'bloqueado') ?>

    <?php // echo $form->field($model, 'fecha_bloqueo') ?>

    <?php // echo $form->field($model, 'notas_bloqueo') ?>

    <?php // echo $form->field($model, 'cerrado_comentar') ?>

    <?php // echo $form->field($model, 'sumaValores') ?>

    <?php // echo $form->field($model, 'totalVotos') ?>

    <?php // echo $form->field($model, 'cerrado_eventos') ?>

    <?php // echo $form->field($model, 'crea_usuario_id') ?>

    <?php // echo $form->field($model, 'crea_fecha') ?>

    <?php // echo $form->field($model, 'modi_usuario_id') ?>

    <?php // echo $form->field($model, 'modi_fecha') ?>

    <?php // echo $form->field($model, 'notas_admin') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
