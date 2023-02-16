<?php

/** @var yii\web\View $this */
use yii\bootstrap5\LinkPager;
use yii\helpers\Url;
use yii\helpers\Html;

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
				//echo $letra['letra']." - ";
				
				echo Html::a(Yii::t('app', $letra['letra']), ['letrafilter', 'filtroLetra'=>$letra['letra']], ['class' => 'btn btn-success']);
			}
	
 ?>
  
  <?= Html::a('Inicio', '?r=editoriales', ['class' => 'btn btn-outline-secondary']) ?>
 </form>
 <?php
 /*if(isset($_POST['btnLetra'])){
					echo "Pulsado letra ".$_POST['btnLetra'];
				}
 ?>*/

