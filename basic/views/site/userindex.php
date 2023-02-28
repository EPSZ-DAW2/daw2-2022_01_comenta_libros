<?php

/** @var yii\web\View $this */
use yii\helpers\Html;

$this->title = 'My Yii Application';

echo 'SESION:<br>';
var_dump(Yii::$app->user);


        $rol=Yii::$app->user->id;
echo'<br><br>';
var_dump($rol);
?>

