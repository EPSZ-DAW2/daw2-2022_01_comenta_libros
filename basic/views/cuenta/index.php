<?php

use yii\helpers\Html;

echo Html::tag('h1', 'Ajustes');//POdría añadir el nick del usuario


echo Html::beginTag('div', ['class' => 'card-grid']);

foreach ($options as $option) {
    echo Html::tag('div',Html::a($option->getName()), ['style' => 'display: block','url' => $option->getName()]);
}
//TODO añadir la url bien, se puede hacer con el html::a pero no pilla bien las direcciones
//lo de 'url' => no va
?>