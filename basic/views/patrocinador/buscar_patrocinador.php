<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */
use app\models\usuario;
use app\models\patrocinador;
use app\models\anuncio;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Patrocinadores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patrocinador-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
		<h2>Anuncios del patrocinador <?= Html::encode($patrocinador->nick) ?></h2><hr>
		<!-- Lista de anuncios -->
		<br/>
		<div class="row">
			<?php
			if(empty($anuncios)){
				echo '<h2>Este patrocinador no tiene anuncios</h2>';
			} else {
				foreach ($anuncios as $anuncio){
					echo $this->render('ficha_anuncio', ['anuncio'=>$anuncio]);
				}
			}
			?>
		</div>
	</div>
</div>