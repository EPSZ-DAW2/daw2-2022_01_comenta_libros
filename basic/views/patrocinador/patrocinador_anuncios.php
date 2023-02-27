<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */
use app\models\usuario;
use app\models\patrocinador;
use app\models\anuncio;
use yii\helpers\Html;
?>
<div class="grid container row">
    <div class="col-4">
        <h3><?php echo "Anuncios del patrocinador: <br/>".Html::encode($usuario->nick) ?></h3>
        <h4><?php echo "Pagina web del patrocinador: <br/>".Html::encode($patrocinador->url) ?></h4>
        <h4><?php echo "Telefeno de contacto: <br/>".Html::encode($patrocinador->telefono_comercial) ?></h4>
        <hr>
		<br/>
		<div class="row">
			<?php
			if ($anuncio==null) {
					$mensaje="Este patrocinador no tiene anuncios";?>
					<p><?= Html::encode($mensaje) ?></p>	
				<?php
			} else {
				foreach($anuncio as $anuncio){ 
				
				//echo $libro->id;?>
				<h5><?= Html::encode($anuncio->titulo) ?></h5> <!-- Titulo del libro -->
				<p><?= Html::encode($anuncio->descripcion) ?></p>	<!-- Resumen del libro -->
				
				<hr>
			<?php	
				}
			}
			?>
			
    </div>
</div>