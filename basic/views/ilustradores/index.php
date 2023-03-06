<?php

use app\models\Ilustradores;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\IlustradoresSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Ilustradores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ilustradores-index">

<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	<br/>

    <div class="row">
		<?php
		if(empty($ilustradores)){
			echo '<h2>No se ha encontrado ningun ilustrador</h2>';
		}else{
			foreach ($ilustradores as $ilustrador){?>
                <div class="col-4">
                    <br/>
                    <?= Html::a(Yii::t('app', $ilustrador->nombre), ['detalle', 'id'=>$ilustrador->id])?>
                    <br/>
                    <p><?= Html::encode($ilustrador->descripcion) ?></p>
                    <p>Url: <a href="<?= Html::encode($ilustrador->url) ?>"><?= Html::encode($ilustrador->url) ?></a></p>
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
        <?= Html::a(Yii::t('app', 'Create Ilustradores'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'urlCreator' => function ($action, Ilustradores $model, $key, $index, $column) {
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
