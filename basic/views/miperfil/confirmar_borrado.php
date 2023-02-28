<?php
use yii\helpers\Html;

$this->title = 'Mi Perfil';

// var_dump($usuario);
?>
<h3>Confirmar borrado</h3>
<p>¿Estás seguro de que deseas eliminar tu perfil? Toda la información almacenada será perdida.</p>

<?= Html::a(Yii::t('app', 'Confirmar borrado'), ['confirmarborrado', 'desdeboton'=>'1'], ['class' => 'btn btn-danger']); ?>
<?php ?>
<br>