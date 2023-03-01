<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap5\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Patrocinadores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patrocinador-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
	<!-- Búsqueda simple -->
	<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<br/>
	
	<!-- Lista de patrocinadores -->
	<br/>
	<div class="row">
		<?php
		if(empty($patrocinadores)){
			echo '<h2>No se ha encontrado ningún patrocinador</h2>';
		} else {
			foreach ($patrocinadores as $patrocinador){
				echo $this->render('ficha_patrocinador', ['patrocinador'=>$patrocinador]);
			}
		}
		?>
	</div>
	
	<?php echo LinkPager::widget(['pagination' => $pagination]); ?>
</div>


</div>
