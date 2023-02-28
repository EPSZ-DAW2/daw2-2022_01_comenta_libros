
<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use app\models\LibrosSearch;

$this->title = 'Libros de ' . Html::encode($ilustrador->nombre);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grid container row">
    <div class="col-4">
		<h3><?= Html::encode($ilustrador->nombre) ?></h3>
		<h4><?= Html::encode($ilustrador->descripcion) ?></h4>
		<hr>
		<br/>
		<?php $form = ActiveForm::begin([
		    'action' => ['buscar', 'id' => $ilustrador->id],
		    'method' => 'get',
		]); ?>
		    <?= $form->field($searchModel, 'titulo')->textInput(['placeholder' => 'Buscar por título'])->label(false) ?>
		    <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
		<?php ActiveForm::end(); ?>
		<hr>
		<br/>
		<h5>Lista de libros de <?= Html::encode($ilustrador->nombre) ?></h5>
		<?php if($libro==null): ?>
		    <p>Este ilustrador no tiene libros</p>
		<?php else: ?>
		    <?php foreach($libro as $libro): ?>
		        <h5><?= Html::encode($libro->titulo) ?></h5>
		        <p><?= Html::encode($libro->resumen) ?></p>
		        <p>El ilustrador terminó de escribir este libro en: <?= Html::encode($libro->fecha_terminacion) ?></p>
		        <hr>
		    <?php endforeach; ?>
		<?php endif; ?>
    </div>
</div>
