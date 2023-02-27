<?php
/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use \app\models\LibrosEventos;
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pieza2">
	<h1>Visor de Eventos</h1>
	<hr>
			<?php
			foreach($evento as $evento){
				echo $this->render('fichaEventos', ['evento'=>$evento]);
			}
			?>
</div>