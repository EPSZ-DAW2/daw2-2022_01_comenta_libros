<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

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
		<?php $form = ActiveForm::begin([
		    'action' => ['buscar_patrocinador'],
		    'method' => 'get',
		]); ?>
		    <?= $form->field($searchModel, 'nick')->textInput(['placeholder' => 'Buscar por nombre'])->label(false) ?>
		    <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
		<?php ActiveForm::end(); ?>
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
	</div>


</div>
