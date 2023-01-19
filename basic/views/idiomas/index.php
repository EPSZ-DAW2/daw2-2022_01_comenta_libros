<?php

use app\models\Idioma;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\IdiomaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Idiomas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="idioma-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Idioma'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'codigo',
            'revisado',
			
			[
				'attribute'=>'estado',
				'content'=>function($model, $key, $index, $column){
					return $model->descripcionEstado;
				},
				'filter'=> \app\models\Idioma::listaEstados(),
			],
			
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Idioma $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
