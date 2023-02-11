<?php

/** @var yii\web\View $this */
use yii\bootstrap5\LinkPager;

$this->title = 'Editoriales';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Editoriales</h1>
<div class="container">
	<!-- Búsqueda simple -->
	<br/>
	<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<!-- Lista de editoriales -->
	<br/>
	<div class="row">
		<?php
		if(empty($editoriales)){
			echo '<h2>No se ha encontrado ninguna editorial</h2>';
		}else{
			foreach ($editoriales as $editorial){
				echo $this->render('detalle', ['editorial'=>$editorial]);
			}
		} ?>
	</div>
</div>
<div style="margin-top: 2%">
	<?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>

<div style="margin-top: 2%">
	<?php echo "Filtro a-z"; ?>
</div>
