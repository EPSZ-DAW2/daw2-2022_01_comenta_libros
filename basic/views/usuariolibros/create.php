<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UsuarioLibros $model */

$this->title = Yii::t('app', 'Create Usuario Libros');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuario Libros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-libros-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
