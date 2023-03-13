<?php

use app\models\Usuarios;
use app\models\UsuarioLibros;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\UsuarioLibrosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Usuario Libros');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="usuario-libros-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Usuario Libros'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    
 
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'usuario_id',
            
            //meter nombre de usuario

            [
            'attribute' => 'usuario',
            'label' => 'Usuario',

            ],
            // 'local_id',
            [
                'attribute' => 'local_id',
                'label' => 'Libro ID',

            ],
            [
                'attribute' => 'libro',
                'label' => 'Libro',

            ],
     
            'fecha_seguimiento',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UsuarioLibros $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{verDetalle}',  
                'buttons' => [
                    'verDetalle' => function($url, $model, $key) {    
                        return Html::a(Yii::t('app', 'Ver detalle libro'), ['detalle', 'id'=>$model->id], ['class' => 'btn btn-success']);
                    }
                ]
            ],

        
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{verDetalle}',  
                'buttons' => [
                    'verDetalle' => function($url, $model, $key) {    
                        return Html::a(Yii::t('app', 'Ver detalle usuario'), ['usuario', 'id'=>$model->id], ['class' => 'btn btn-success']);
                    }
                ]
            ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
