<?php

use yii\helpers\Html;
use yii\helpers\Url;
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
	<br/>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<!-- Lista de anuncios -->
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
    <p>
        <?= Html::a(Yii::t('app', 'Create Patrocinador'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'usuario_id',
            'nif_cif',
            'razon_social',
            'telefono_comercial',
            //'telefono_contacto',
            //'url:ntext',
            //'fecha_alta',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
