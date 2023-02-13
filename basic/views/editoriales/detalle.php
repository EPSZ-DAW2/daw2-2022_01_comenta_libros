<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="grid container row">
    <div class="col-4">
		<br/>
        <h3><?= Html::encode($editorial->nombre) ?></h3>
        <p><?= Html::encode($editorial->descripcion) ?></p>
        <p>Url: <a href="<?= Html::encode($editorial->url) ?>"><?= Html::encode($editorial->url) ?></a></p>
			<?php
			// Botón para ver la ficha resumida de la editorial seleccionada
			?>
			<a href="<?= Url::toRoute(['/editoriales/detalle', 'id' => $editorial->id, 'class' => 'btn btn-primary']); ?>" style=" background-color: #4CAF50;  border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;">
				Ver Detalles
			</a>
			<?php
			// Botón para Ver todos los libros asociados a la editorial seleccionada
			// Esto redirige al catálogo de libros, pero filtrando en el id de la editorial, por la seleccionada.
			?>
			 <a href="<?= Url::toRoute(['/libros/detalle', 'editorial_id' => $editorial->id]); ?>" style=" background-color: #4CAF50;  border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;">
				Ver Libros
			</a>
        <hr>
	</div>
</div>