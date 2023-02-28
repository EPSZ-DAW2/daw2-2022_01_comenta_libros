<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Mi Perfil';

// var_dump($usuario);
?>
<h3>Cambiar contraseña:</h3>
<?php $form = ActiveForm::begin([
    'method' => 'post',
	'id' => 'formulario',
	// 'enableClientValidation' => false,
 // 	'enableAjaxValidation' => true,
	// 'options' => ['enctype' => 'multipart/form-data'],
]);
?>
<div class="form-group">
 <?= $form->field($model, "password_old")->input("password")->label("Introduce tu anterior contraseña"); ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password")->input("password")->label("Introduce la nueva contraseña"); ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password_repeat")->input("password")->label("Repite la nueva contraseña"); ?>   
</div>

<?= Html::submitButton("Cambiar contraseña", ["class" => "btn btn-primary", "name"=>"register-button"]) ?>

<?php $form->end() ?>

<h5><?php echo $msg ?></h5>