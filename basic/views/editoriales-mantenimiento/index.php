<?php

use app\models\EditorialMantenimiento;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\EditorialMantenimientoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Editorial Mantenimiento');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editorial-mantenimiento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Editorial Mantenimiento'), ['create'], ['class' => 'btn btn-success']) ?>
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
				'attribute'=>'estado',
				'content'=>function($model, $key, $index, $column){
					return $model->descripcionEstado;
				},
				'filter'=> \app\models\EditorialMantenimiento::listaEstados(),
			],
			
			[
			    'class' => 'yii\grid\ActionColumn',
                'template' => '{verDetalle}',  
                'buttons' => [
                    'verDetalle' => function($url, $model, $key) {    
                        return Html::a(Yii::t('app', 'Ver detalle'), ['detalle', 'id'=>$model->id], ['class' => 'btn btn-success']);
                    }
                ]
            ],
			
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, EditorialMantenimiento $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
			
			
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
