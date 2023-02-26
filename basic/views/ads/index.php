<?php

use yii\helpers\Html;

$this->title = 'Ads';

?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="fila-ads">
    <?php foreach ($ads as $ad): ?>
        <div class="col"><!--Añade automaticamente el grid-->
            <div class="card"><!--Al llamarse card añade css por defecto-->
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center"><?= $ad->titulo ?></h5>
                    <p class="card-text"><?= $ad->descripcion ?></p>
                    <p class="card-text">Id Anuncio<?= $ad->id ?></p>
                    <p class="card-text">Patrocinador: <?= $ad->patrocinador_id ?></p>
                    <p class="card-text">Prioridad: <?= $ad->prioridad ?></p>
                    <p class="card-text">Id Editorial: <?= $ad->editorial_id ?></p>
                    <p class="card-text">Visible: <?= $ad->visible ?></p>
                    <p class="card-text">Id Libro: <?= $ad->libro_id ?></p>
                    <p class="card-text">Id Género: <?= $ad->genero_id ?></p>
                    <p class="card-text">Id Evento: <?= $ad->evento_id ?></p>
                    <p class="card-text">Id Crea Usuario: <?= $ad->crea_usuario_id ?></p>
                    <p class="card-text">Id Crea Fecha: <?= $ad->crea_fecha ?></p>
                    <p class="card-text">Fecha Modificación Usuario<?= $ad->modi_usuario_id ?></p>
                    <p class="card-text">Fecha Modificación Registro<?= $ad->modi_fecha ?></p>
                
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    </div>


                 