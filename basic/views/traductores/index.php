<?php

use app\models\Traductores;
use yii\bootstrap5\LinkPager;
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

<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	<br/>

    <div class="row">
		<?php
		if(empty($traductores)){
			echo '<h2>No se ha encontrado ningun traductor</h2>';
		}else{
			foreach ($traductores as $traductor){?>
                <div class="col-4">
                    <br/>
                    <?= Html::a(Yii::t('app', $traductor->nombre), ['detalle', 'id'=>$traductor->id])?>
                    <br/>
                    <p><?= Html::encode($traductor->descripcion) ?></p>
                    <p>Url: <a href="<?= Html::encode($traductor->url) ?>"><?= Html::encode($traductor->url) ?></a></p>
                    <hr>
                </div>
            <?php 
			}
		} ?>
	</div>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>

    <?php
	echo "<h4>Filtro A-Z</h4>";
	foreach ($letra as $letra){				
        echo Html::a(Yii::t('app', $letra['letra']), ['letrafilter', 'filtroLetra'=>$letra['letra']], ['class' => 'btn btn-primary']);
    }	
    ?>

</div>
