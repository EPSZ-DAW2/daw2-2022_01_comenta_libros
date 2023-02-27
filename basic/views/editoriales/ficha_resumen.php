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
        <h3><?= Html::encode($editorial->nombre) ?></h3>
        <p>Descripción: <?= Html::encode($editorial->descripcion) ?></p>
        <p>Url: <a href="<?= Html::encode($editorial->url) ?>"><?= Html::encode($editorial->url) ?></a></p>
		<p>Estado: <?php if($editorial->revisado == 1) echo "Aceptada"; else echo "No aceptada";?></p>
	</div>
</div>