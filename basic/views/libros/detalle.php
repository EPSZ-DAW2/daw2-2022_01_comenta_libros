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
		<img height="700px" width="250px" src='<?=Yii::$app->request->getBaseUrl(true)?>/images/<?=$imagenes[0]->nombre?>' />
    </div>
    <div class="col-8" style="margin-top:15vh; text-align: justify;">
        <p>Estado: <?= Html::encode($estado) ?>. <?= Html::encode($terminacion) ?>.</p>
        <p>Puntuación: <?= Html::encode($libro->sumaValores) ?> con <?= Html::encode($libro->totalVotos) ?> votos.</p>
        <p><?= Html::encode($libro->resumen) ?></p>
        <?= Html::a(Yii::t('app', 'Denunciar'), ['denunciar', 'id'=>$libro->id, 'ruta'=>'detalle'], ['class' => 'btn btn-danger']);?>
	
	
		<?php $form = ActiveForm::begin([
        'action' => ['comentario'],
        'method' => 'post',
        'options' => [
        'data-pjax' => 1
        ],
		]); ?>		
		<?= $form->field($nuevoComentario, 'libro_id')->hiddenInput(['value'=> $libro->id])->label(false) ?>
		<?= $form->field($nuevoComentario, 'texto')->textarea(['rows' => 3]) ?>
		<?= $form->field($nuevoComentario, 
			  'valoracion')->dropDownList([0,1,2,3,4,5,6,7,8,9,10], 
			  ['prompt' => 'Indique una valoración']);?>
		<?= Html::submitButton(Yii::t('app', 'Enviar Comentario'), ['class' => 'btn btn-primary']) ?>									
		<?php ActiveForm::end(); ?>

	
	
	<?php
	
	foreach($comentarios as $comentario) //mostramos cada comentario del autor
	{ 
		if($comentario->comentario_id ===0){
			//echo $libro->id;?>
			<hr>
			<h5><?= Html::encode($comentario->usuario->nick) ?></h5> <!-- Nombre del usuario-->
			<p><?= Html::encode($comentario->valoracion) ?></p>	<!-- Valoración del usuario-->
			<p><?= Html::encode($comentario->texto) ?></p>	<!-- Resumen del comentario -->
			
			<?php $form = ActiveForm::begin([
			'action' => ['comentario'],
			'method' => 'post',
			'options' => [
			'data-pjax' => 1
			],
			]); ?>		
			<?= $form->field($nuevoComentario, 'libro_id')->hiddenInput(['value'=> $libro->id])->label(false) ?>
			<?= $form->field($nuevoComentario, 'comentario_id')->hiddenInput(['value'=> $comentario->id])->label(false) ?>
			<?= $form->field($nuevoComentario, 'texto')->textarea(['rows' => 1]) ?>
			</br>
			<?= Html::submitButton(Yii::t('app', 'Responder al Comentario'), ['class' => 'btn btn-primary']) ?>									
			<?php ActiveForm::end(); ?>
			
			<?= Html::a(Yii::t('app', 'Denunciar Comentario'), ['denunciarcomentario', 'id'=>$comentario->id], ['class' => 'btn btn-danger']);?>

			<?php
			foreach($comentarios as $comentarioInterno) // cada comentario anidado de los comentarios originales
			{
				if($comentarioInterno->comentario_id ===$comentario->id){
				//echo $libro->id;?>
				<p><?= Html::encode($comentarioInterno->usuario->nick) ?> <!-- Nombre del usuario-->
				ha comentado:
				<?= Html::encode($comentarioInterno->texto) ?></p>	<!-- Resumen del comentario -->		
	<?php
				}//if 	
			}//foreach
		}//if
	} //foreach
	?>

	<?php
		foreach($imagenes as $imagen) 
		{
			if($imagen->orden!=1 || $imagen->orden>5){
				?><img height="200px" width="150px" style="object-fit: cover; margin-right: 10px;" src='<?=Yii::$app->request->getBaseUrl(true)?>/images/<?=$imagen->nombre?>' /><?php
			}
		}
	?>
   </div>
</div>