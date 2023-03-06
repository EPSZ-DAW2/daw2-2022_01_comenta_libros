<?php

use app\models\Autores;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/** @var yii\web\View $this */
/** @var app\models\AutoresSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Autores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autores-index">

    <div class="row">
		<?php
		if(empty($autores)){
			echo '<h2>No se ha encontrado ningun autor</h2>';
		}else{
			foreach ($autores as $autor){?>
				<div class="grid container row">
                    <div class="col-4">
                        <br/>
                        <?php
                        echo Html::a(Yii::t('app', $autor->nombre), ['detalle', 'id'=>$autor->id], ['class' => 'btn btn-outline-secondary']);
                        ?>
                        <br/>
                        <p><?= Html::encode($autor->descripcion) ?></p>
                        <p>Url: <a href="<?= Html::encode($autor->url) ?>"><?= Html::encode($autor->url) ?></a></p>
                        <hr>
                    </div>
                </div><?php
			}
		} ?>
	</div>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>

    <!-- <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Autores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
                'urlCreator' => function ($action, Autores $model, $key, $index, $column) {
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
    ]); ?> -->


</div>
