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
<?= LinkPager::widget(['pagination' => $pagination]) ?>
<?php
	echo "<h4>Filtro A-Z</h4>";
	foreach ($letra as $letra){
				//var_dump( $letra);
				echo $letra['letra']." - ";
				
			}
 ?>

