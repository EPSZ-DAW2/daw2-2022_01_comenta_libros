<?php
use yii\widgets\Menu;

echo Menu::widget([
    'options' => ['id' => "nav-mobile", 'class' => 'left side-nav'],
    'items' => [
        ['label' => 'Home', 'url' => ['site/index']],
        ['label' => 'Nube', 'url' => ['/tag-cloud']],
        ['label' => 'About', 'url' => ['site/about']],
        ['label' => 'Contact', 'url' => ['site/contact']],
        ['label' => 'Libros', 'url' => ['/libros']],
        ['label' => 'Autores', 'url' => ['/autores']],
        ['label' => 'Editoriales', 'url' => ['/editoriales']],
        ['label' => 'Ilustradores', 'url' => ['/ilustradores']],
        ['label' => 'Patrocinadores', 'url' => ['/patrocinador']],
        ['label' => 'Traductores', 'url' => ['/traductores']],
        ['label' => 'Configuraciones', 'url' => ['/configuraciones']],
        ['label' => 'Generos', 'url' => ['/generos']],
        ['label' => 'Login', 'url' => ['site/login']],
        ['label' => 'Registro', 'url' => ['site/register']],
    ],
]);