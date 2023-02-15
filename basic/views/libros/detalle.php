<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="grid container row">
    <div class="col-4">
        <h3><?= Html::encode($libro->titulo) ?></h3>
        <h5><?= Html::encode($autor->nombre) ?></h5>
        <img src="" style="width=:'10px', height: 10px">
    </div>
    <div class="col-8" style="margin-top:15vh; text-align: justify;">
        <p>Estado: <?= Html::encode($estado) ?>. <?= Html::encode($terminacion) ?>.</p>
        <p>Puntuación: <?= Html::encode($libro->sumaValores) ?> con <?= Html::encode($libro->totalVotos) ?> votos.</p>
        <p><?= Html::encode($libro->resumen) ?></p>
        <?= Html::a(Yii::t('app', 'Denunciar'), ['denunciar', 'id'=>$libro->id, 'ruta'=>'detalle'], ['class' => 'btn btn-danger']);?>
	
	
		<?php $form = ActiveForm::begin(); ?>
		
		<?= $form->field($nuevoComentario, 'libro_id')->hiddenInput(['value'=> $libro->id])->label(false) ?>

		
		<?= $form->field($nuevoComentario, 'texto')->textarea(['rows' => 3]) ?>
		<?= $form->field($nuevoComentario, 
			  'valoracion')->dropDownList([0,1,2,3,4,5,6,7,8,9,10], 
			  ['prompt' => 'Indique una valoración']);?>
		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary',
										  'data' => [
											'method' => 'post',
											'params' => ['action' => 'crearComentario']
											]]) ?>
		<?php ActiveForm::end(); ?>

	
	
	<?php
	
	foreach($comentarios as $comentario) //mostramos cada libro del autor
	{ 
		//echo $libro->id;?>
		<h5><?= Html::encode($comentario->usuario->nick) ?></h5> <!-- Nombre del usuario-->
		<p><?= Html::encode($comentario->valoracion) ?></p>	<!-- Valoración del usuario-->
		<p><?= Html::encode($comentario->texto) ?></p>	<!-- Resumen del comentario -->
		<hr>
	<?php	
	} //foreach
	?>



   </div>
</div>