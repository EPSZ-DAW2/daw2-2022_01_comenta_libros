<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
?>

<h3><?= $msg ?></h3>

<h1>Register</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
	'id' => 'formulario',
	// 'enableClientValidation' => false,
 // 	'enableAjaxValidation' => true,
	// 'options' => ['enctype' => 'multipart/form-data'],
]);
?>
<div class="form-group">
 <?= $form->field($model, "email")->input("email") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "nick")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password")->input("password") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password_repeat")->input("password") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "nombre")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "apellidos")->input("text") ?>   
</div>

<div class="form-group">
	<?= $form->field($model, 'fecha_nacimiento')->widget(DatePicker::className(),
	  [ 'dateFormat' => 'php:Y-m-d',
		'language' => 'es',
		'clientOptions' => [
		'changeYear' => true,
		'changeMonth' => true,
		'yearRange' => '-50:-12',
		'altFormat' => 'dd/mm/yyyy',
		]],['placeholder' => 'dd/mm/yyyy'])
		->textInput(['placeholder' => \Yii::t('app', 'dd/mm/yyyy')])?>  
</div>

<div class="form-group">
 <?= $form->field($model, "direccion")->input("text") ?>   
</div>

<?= Html::submitButton("Registrarse", ["class" => "btn btn-primary", "name"=>"register-button"]) ?>

<?php $form->end() ?>