<?php

/** @var yii\web\View $this */
use yii\bootstrap5\LinkPager;
use \app\models\LibrosEventos;
use yii\helpers\Html;
use app\controllers\AdsController;

$this->title = "Principal";
?>
<hr>
<H3> Mira, busca y consulta libros para encontrar reseñas, recomendaciones y opiniones sobre ellos. </H3>

<p> Puedes realizar búsquedas por el catálogo de libros mediante un sistema de filtros por género literario, categorías, etiquetas, idiomas, más valorados, etc </p>
   
<p>Tambien puedes hacer búsquedas mediante un formulario simple donde cualquier palabra escrita será el origen de la búsqueda por los diversos datos del libro que sean textos donde se pueda buscar una parte, además de un formulario avanzado para búsquedas más detalladas. </p>



 <p>  Los usuarios registrados pueden mantener su perfil, crear recomendación (proponer libros nuevos), mantener sus preferencias de libros por géneros y/o etiquetas, crear comentarios, revisar los comentarios creados, mantener el seguimiento de libros, recibir avisos y notificaciones de los libros seguidos, enviar incidencias a los moderadores/administradores del portal, organizar eventos literarios (charlas, presentaciones, reuniones, ...), apuntarse a ellas, etc.
</p>
<br/>
<hr>
<br/>


<div class="site-index">
	<br/>
	<!-- Libros expuestos -->
	<h1><?php echo $mensaje; ?><hr></h1>
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
	
	<?php // Paginacion si la usa
		if(isset($pagination)){
			echo LinkPager::widget(['pagination' => $pagination]);
		}
	?>
	
	<div class="col-lg-4">
		<!-- Visor Eventos -->
		<?php echo $this->render('visorEventos', ['evento'=>$evento]); ?>
	</div>

	<?php
		$adsController = Yii::$app->createControllerByID('ads');
		$randomAd = $adsController->actionRandomAd();	
	?>
	<div class="col-lg-2"><!--ESte codigo donde quiera un anuncio-->
	<p>Anuncio en proceso</p>
    <?php echo $this->render('@app/views/ads/_ad', ['ad' => $randomAd]); ?>
	</div>
		
</div>	
