<?php if ($ad) : ?>
    <div class="panel panel-default">
        <div class="panel-heading"><?= $ad->titulo ?></div>
        <div class="panel-body">
             <?= $ad->descripcion ?>
        </div>
    </div>
<?php endif; ?>