<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
?>
<div class="grid container row">
    <div class="col-4">
        <h3><?= Html::encode($editorial->nombre) ?></h3>
        <h4><?= Html::encode($editorial->descripcion) ?></h4>
        <hr>
		<div class="row">
			<?php
			foreach($libro as $libro)
			{
				echo $libro->titulo;
				echo '<br/>';
				echo $libro->resumen;
				echo'<hr>';
			}
			?>
			
    </div>
</div>