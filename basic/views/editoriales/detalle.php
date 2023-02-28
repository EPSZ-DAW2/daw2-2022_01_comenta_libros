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
		<br/>
        <p><?= Html::encode($editorial->descripcion) ?></p>
        <p>Url: <a href="<?= Html::encode($editorial->url) ?>"><?= Html::encode($editorial->url) ?></a></p>
        <hr>
	</div>
</div>