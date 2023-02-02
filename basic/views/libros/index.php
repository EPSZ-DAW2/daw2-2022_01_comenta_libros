<?php

use app\models\Libros;
use yii\bootstrap5\Button;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
/** @var yii\web\View $this */
/** @var app\models\LibrosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Libros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Libros'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo:ntext',
            'resumen:ntext',
            'autor_id',
            'ilustrador_id',
            'traductor_id',
           // 'editorial_id',
            'genero_id',
            //'coleccion:ntext',
            'idioma_id',
            //'clase_formato_id',
            //'paginas',
            'imagen_id',
            'visible',
            [
                'attribute' => 'terminado',
                'value' => function ($model) use ($controller) {
                    return $controller->estadoTerminado($model->terminado);
                },
            ],
            //'fecha_terminacion',
            //'num_denuncias',
            //'fecha_denuncia1',
            [
                'attribute' => 'bloqueado',
                'value' => function ($model) use ($controller) {
                    return $controller->estadoBloqueo($model->bloqueado);
                },
            ],
           // 'fecha_bloqueo',
           // 'notas_bloqueo:ntext',
            //'cerrado_comentar',
           // 'sumaValores',
           // 'totalVotos',
           // 'cerrado_eventos',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
            //'notas_admin:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Libros $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ], 
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{bloquearLibro}, {desbloquearLibro}',  
                'buttons' => [
                    'bloquearLibro' => function($url, $model, $key) {    
                        return Html::a(Yii::t('app', 'Bloquear'), ['denunciar', 'id'=>$model->id, 'ruta'=>'index'], ['class' => 'btn btn-danger']);
                    },
                    'desbloquearLibro' => function($url, $model, $key) {    
                        return Html::a(Yii::t('app', 'Desbloquear'), ['desbloquear', 'id'=>$model->id], ['class' => 'btn btn-success mt-1']);
                    }
                ]
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
 
    <?php 
         LinkPager::widget([
        'pagination' =>$dataProvider->pagination,
         ]);
     ?>

    <?php Pjax::end(); ?>

</div>
