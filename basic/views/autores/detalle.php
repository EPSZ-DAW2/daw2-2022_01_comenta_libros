<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
?>
<div class="grid container row">
    <div class="col-4">
		<h3><?= Html::encode($autor->nombre) ?></h3>
		<h4><?= Html::encode($autor->descripcion) ?></h4>
		<hr>
		<br/>
		<div class="row">
			<?php
			
			if($libro==null){
					$mensaje="Este autor no tiene libros";?>
					<p><?= Html::encode($mensaje) ?></p>	<!-- Mensaje de editorial sin libro -->
				<?php
			}else{
			
				foreach($libro as $libro) //mostramos cada libro del autor
				{ 
					//echo $libro->id;?>
					<h5><?= Html::encode($libro->titulo) ?></h5> <!-- Titulo del libro -->
					<p><?= Html::encode($libro->resumen) ?></p>	<!-- Resumen del libro -->
					<p>El autor terminó de escribir este libro en: <?= Html::encode($libro->fecha_terminacion) ?></p>	<!-- Nombre del autor del libro -->
					<hr>
				<?php	
				} //foreach
			}// else
			?>
			
    </div>
</div>