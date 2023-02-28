<?php
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\helpers\Html;

$this->title = 'Resultados de búsqueda para "' . Html::encode($searchModel->titulo) . '"';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>


<?php Pjax::begin(['id' => 'libros-grid-view']); ?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_libro', // Nombre de la plantilla parcial que se utilizará para cada libro
    'summary' => 'Mostrando {count} libros de un total de {totalCount}',
]) ?>

<?php Pjax::end(); ?>
