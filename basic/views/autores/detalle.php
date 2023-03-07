
<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use app\models\LibrosSearch;

$this->title = 'Libros de ' . Html::encode($autor->nombre);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grid container row">
    <div>
		<h3><?= Html::encode($autor->nombre) ?></h3>
		<h4><?= Html::encode($autor->descripcion) ?></h4>
		<hr>
		<br/>
		<?php $form = ActiveForm::begin([
		    'action' => ['buscar', 'id' => $autor->id],
		    'method' => 'get',
		]); ?>
		    <?= $form->field($searchModel, 'titulo')->textInput(['placeholder' => 'Buscar por título'])->label(false) ?>
		    <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
		<?php ActiveForm::end(); ?>
		<hr>
		<br/>
		<h5>Lista de libros de <?= Html::encode($autor->nombre) ?></h5>
		<?php if($libro==null): ?>
		    <p>Este autor no tiene libros</p>
		<?php else: ?>
		    <?php foreach($libro as $libro): ?>
		        <h5><?= Html::encode($libro->titulo) ?></h5>
		        <p><?= Html::encode($libro->resumen) ?></p>
		        <p>El autor terminó de escribir este libro en: <?= Html::encode($libro->fecha_terminacion) ?></p>
		        <hr>
		    <?php endforeach; ?>
		<?php endif; ?>
    </div>
</div>
