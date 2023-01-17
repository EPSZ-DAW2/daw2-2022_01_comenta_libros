<?php

use app\models\Libros;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
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
            'editorial_id',
            'genero_id',
            'coleccion:ntext',
            'idioma_id',
            'clase_formato_id',
            'paginas',
            'imagen_id',
            'visible',
            //'terminado',
            //'fecha_terminacion',
            //'num_denuncias',
            //'fecha_denuncia1',
          //  'bloqueado',
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
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
