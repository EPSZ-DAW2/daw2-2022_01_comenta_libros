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
			<p>Nick: <?= Html::encode($patrocinador->nick) ?></p>
			<p>Teléfono comercial: <?= Html::encode($patrocinador->telefono_comercial) ?></p>
			<p>Enlace: <?= Html::encode($patrocinador->url) ?></p>
			<a class="acceso" href="<?= Url::toRoute(['/patrocinador/anuncios_patrocinador', 'id' => $patrocinador->id, 'class' => 'btn btn-primary']); ?>">Acceder a los anuncios</a>
		</div>
	</div>
</div>