<?php
use app\models\LibrosEventos;
use app\models\LibrosEventosSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\LibrosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Lista de Eventos relacionados con Libros y su usuario Organizador');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
		'id',
        'texto:ntext',
		'libro_id',
		'libros.titulo',
		'crea_usuario_id',
		'usuarios.nick',
        'fecha_desde',
        'fecha_hasta',
        
        
    ],
]); ?>

