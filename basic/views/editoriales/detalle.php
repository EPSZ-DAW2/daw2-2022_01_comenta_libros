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
			<a href="<?= Url::toRoute(['/editoriales/detalle', 'id' => $editorial->id]); ?>" style=" font: bold 11px Arial;text-decoration: none;background-color: #EEEEEE;color: #333333;padding: 2px 6px 2px 6px;border-top: 1px solid #CCCCCC;border-right: 1px solid #333333;border-bottom: 1px solid #333333;border-left: 1px solid #CCCCCC;">
				Ver Detalles
			</a>
			<?php
			// Botón para Ver todos los libros asociados a la editorial seleccionada
			// Esto redirige al catálogo de libros, pero filtrando en el id de la editorial, por la seleccionada.
			?>
			 <a href="<?= Url::toRoute(['/libros/detalle', 'editorial_id' => $editorial->id]); ?>" style=" font: bold 11px Arial;text-decoration: none;background-color: #EEEEEE;color: #333333;padding: 2px 6px 2px 6px;border-top: 1px solid #CCCCCC;border-right: 1px solid #333333;border-bottom: 1px solid #333333;border-left: 1px solid #CCCCCC;">
				Ver Libros
			</a>
        <hr>
	</div>
</div>