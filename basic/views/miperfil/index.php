<?php
use yii\helpers\Html;

$this->title = 'Mi Perfil';

// var_dump($usuario);
?>
<h3>Tus datos:</h3>
Email:
<?php echo $usuario['email'];?>
<br>
Nick:
<?php echo $usuario['nick'];?>
<br>
Nombre:
<?php echo $usuario['nombre'];?>
<br>
Apellidos:
<?php echo $usuario['apellidos'];?>
<br>
Fecha de nacimiento:
<?php echo $usuario['fecha_nacimiento'];?>
<br>
Dirección:
<?php echo $usuario['direccion'];?>
<br>
Fecha registro:
<?php echo $usuario['fecha_registro'];?>
<br>

<?php ?>
<br>
<?= Html::a(Yii::t('app', 'Editar datos'), ['editarperfil'], ['class' => 'btn btn-outline-primary']); ?>
<?php ?>
<br>
<?= Html::a(Yii::t('app', 'Cambiar contraseña'), ['cambiarcontra'], ['class' => 'btn btn-outline-primary']); ?>
<?php ?>
<br>
<?= Html::a(Yii::t('app', 'Eliminar perfil'), ['borrarperfil'], ['class' => 'btn btn-outline-danger']); ?>
<?php ?>
<br>