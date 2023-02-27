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
        <?php
		echo Html::a(Yii::t('app', $editorial->nombre), ['libros_editorial', 'id'=>$editorial->id], ['class' => 'btn btn-outline-secondary']);
		?>
        <p><?= Html::encode($editorial->descripcion) ?></p>
        <p>Url: <a href="<?= Html::encode($editorial->url) ?>"><?= Html::encode($editorial->url) ?></a></p>
			<?php
			// Botón para ver la ficha resumida de la editorial seleccionada
			?>
			<a href="<?= Url::toRoute(['/editoriales/detalle', 'id' => $editorial->id, 'class' => 'btn btn-primary']); ?>" style=" background-color: #4CAF50;  border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;">
				Ver Detalles
			</a>
        <hr>
	</div>
</div>