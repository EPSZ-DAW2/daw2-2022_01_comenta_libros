<?php

use app\models\Traductores;
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

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?php Pjax::end(); ?>

</div>
