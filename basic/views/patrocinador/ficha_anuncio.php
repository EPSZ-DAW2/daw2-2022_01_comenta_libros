<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */ 

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="grid container row">
	<div class="pieza1">
		<div class="col-4">
			<p><?= Html::encode($anuncio->titulo) ?></p>
			<p>Descripción: <?= Html::encode($anuncio->descripcion) ?></p>
		</div>
	</div>
</div>