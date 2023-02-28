<?php
use yii\helpers\Html;
use yii\web\View;



$this->registerJs(<<<JS
function getRandomColor() {
  const r = Math.floor(Math.random() * 256);
  const g = Math.floor(Math.random() * 256);
  const b = Math.floor(Math.random() * 256);
  return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
}

function getRandomLetterSize() {
  
  const randomIndex = Math.floor(Math.random() * 20)+30;
  return randomIndex + "px";
}


document.querySelectorAll('.tagcloud-tag').forEach(link => {
  const color = getRandomColor();
  const letterSize = getRandomLetterSize();
  link.style.fontSize = letterSize;
 
  link.style.color = color;
});
JS, View::POS_END);

?>

<div class="tagcloud">
    <?php foreach ($data as $tag): ?>
        
        <?= Html::a($tag[$etiqueta], 
    ['/libros', 'LibrosSearch[genero_id]' => $tag[$id]], 
    ['class' => 'tagcloud-tag'],
    
    ); ?>

    
    <?php endforeach; ?>
</div>
