<?php

use app\models\Traductores;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TraductoresSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Traductores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traductores-index">

<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	<br/>

    <div class="row">
		<?php
		if(empty($traductores)){
			echo '<h2>No se ha encontrado ningun traductor</h2>';
		}else{
			foreach ($traductores as $traductor){?>
                <div class="col-4">
                    <br/>
                    <?= Html::a(Yii::t('app', $traductor->nombre), ['detalle', 'id'=>$traductor->id])?>
                    <br/>
                    <p><?= Html::encode($traductor->descripcion) ?></p>
                    <p>Url: <a href="<?= Html::encode($traductor->url) ?>"><?= Html::encode($traductor->url) ?></a></p>
                    <hr>
                </div>
            <?php 
			}
		} ?>
	</div>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>

    <?php
	echo "<h4>Filtro A-Z</h4>";
	foreach ($letra as $letra){				
        echo Html::a(Yii::t('app', $letra['letra']), ['letrafilter', 'filtroLetra'=>$letra['letra']], ['class' => 'btn btn-primary']);
    }	
    ?>

    <!-- ESTO ANTES ERA EL MANTENIMIENTO
         SE HA COMENTADO POR SI HAY QUE VOLVER
         A LO ANTERIOR-->
    <!-- <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Traductores'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'url:ntext',
            'descripcion:ntext',
            'revisado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Traductores $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
			
			[
			    'class' => 'yii\grid\ActionColumn',
                'template' => '{verDetalle}',  
                'buttons' => [
                    'verDetalle' => function($url, $model, $key) {    
                        return Html::a(Yii::t('app', 'Ver detalle'), ['detalle', 'id'=>$model->id], ['class' => 'btn btn-success']);
                    }
                ]
            ]
			
			
			
        ],
    ]); ?>

    <?php Pjax::end(); ?> -->

</div>
