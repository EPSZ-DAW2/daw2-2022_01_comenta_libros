<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\LibrosResumen $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros Resumens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="libros-resumen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'terminado',
            'fecha_terminacion',
            'num_denuncias',
            'fecha_denuncia1',
            'bloqueado',
            'fecha_bloqueo',
            'notas_bloqueo:ntext',
            'cerrado_comentar',
            'sumaValores',
            'totalVotos',
            'cerrado_eventos',
            'crea_usuario_id',
            'crea_fecha',
            'modi_usuario_id',
            'modi_fecha',
            'notas_admin:ntext',
        ],
    ]) ?>

</div>
