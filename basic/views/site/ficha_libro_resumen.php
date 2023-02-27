<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */ 

use yii\helpers\Html;
use yii\helpers\Url;


//
?>
<div class="grid container row">
	<div class="pieza1">
    <div class="col-4">
        <p>Titulo: <?= Html::encode($ficharesumen->titulo) ?></p>
		<p>Autor: <?= Html::encode($ficharesumen->autor) ?></p>
		<p>Genero: <?= Html::encode($ficharesumen->genero) ?></p>
        <p>Resumen: <?= Html::encode($ficharesumen->resumen) ?></p>
		<p>Editorial: <?= Html::encode($ficharesumen->editorial) ?></p>
		<a class="acceso" href="<?= Url::toRoute(['/libros/detalle', 'id' => $ficharesumen->id, 'class' => 'btn btn-primary']); ?>">Acceder al libro</a>
	</div>
	</div>
</div>

