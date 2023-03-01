<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ConfiguracionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Configuraciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuraciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
	<p><?= Html::a('Crear copia seguridad', ['configuraciones/copiaseguridad'], ['class' => 'btn btn-primary']) ?></p>
	<br/>
    <p><?= Html::a(Yii::t('app', 'Crear Configuración'), ['create'], ['class' => 'btn btn-success']) ?></p>
    
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'variable',
            'valor:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'variable' => $model->variable]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
