<?php

/** @var yii\web\View $this */
use \app\models\LibrosEventos;
use yii\helpers\Html;

$this->title = "Principal";
?>

<div class="site-index">
	<!-- Búsqueda simple -->
	<br/>
	<?php echo $this->render('_searchSimple', ['model' => $searchModel]); ?>
	<!-- Búsqueda avanzada -->
	<br/>
	<details>
		<summary>Búsqueda avanzada</summary>
		<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	</details>
    

    <div class="body-content">
		<?php
		if(empty($fichasresumen)){
			echo '<h2>No se ha encontrado ninguna ficha resumen</h2>';
		}else{
			foreach ($fichasresumen as $ficharesumen){
				echo $this->render('ficha_libro_resumen', ['ficharesumen'=>$ficharesumen]);
			}
		} ?>
        
    </div>
	
	<div class="col-lg-4">
		<!-- Visor Eventos -->
		<?php echo $this->render('visorEventos', ['evento'=>$evento]); ?>
	</div>
		
</div>	
