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

	<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	<br/>

    <div class="row">
		<?php
		if(empty($autores)){
			echo '<h2>No se ha encontrado ningun autor</h2>';
		}else{
			foreach ($autores as $autor){?>
                <div class="col-4">
                    <br/>
                    <?= Html::a(Yii::t('app', $autor->nombre), ['detalle', 'id'=>$autor->id])?>
                    <br/>
                    <p><?= Html::encode($autor->descripcion) ?></p>
                    <p>Url: <a href="<?= Html::encode($autor->url) ?>"><?= Html::encode($autor->url) ?></a></p>
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
