<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
?>
<div class="grid container row">
    <div class="col-4">
        <h3><?= Html::encode($editorial->nombre) ?></h3>
        <h4><?= Html::encode($editorial->descripcion) ?></h4>
        <h4><?= Html::encode($editorial->url) ?></h4>
        <hr>
		<br/>
		<div class="row">
			<?php
			if($libro==null){
					$mensaje="No hay ningún libro asociado a esta Editorial";?>
					<p><?= Html::encode($mensaje) ?></p>	<!-- Mensaje de editorial sin libro -->
				<?php
			}else{
				foreach($libro as $libro){ 
				
				//echo $libro->id;?>
				<h5><?= Html::encode($libro->titulo) ?></h5> <!-- Titulo del libro -->
				<p><?= Html::encode($libro->resumen) ?></p>	<!-- Resumen del libro -->
				<p><?= Html::encode($libro->autor->nombre) ?></p>	<!-- Nombre del autor del libro -->
				<hr>
			<?php	
				}// foreach Libro
			}// if
			?>
			
    </div>
</div>