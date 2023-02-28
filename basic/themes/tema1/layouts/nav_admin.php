<?php

use yii\widgets\Menu;
echo Menu::widget([
    'options' => ['id' => "nav-mobile", 'class' => 'left side-nav'],
    'items' => [
        ['label' => 'Principal', 'url' => ['site/index']],
        ['label' => 'Nube', 'url' => ['/tag-cloud']],
        ['label' => 'Libros', 'url' => ['/libros']],
        ['label' => 'Autores', 'url' => ['/autores']],
        ['label' => 'Editoriales', 'url' => ['/editoriales']],
        ['label' => 'Ilustradores', 'url' => ['/ilustradores']],
        ['label' => 'Patrocinadores', 'url' => ['/patrocinador']],
        ['label' => 'Traductores', 'url' => ['/traductores']],
        ['label' => 'Configuraciones', 'url' => ['/configuraciones']],
        ['label' => 'Generos', 'url' => ['/generos']],
        ['label' => 'Mi perfil', 'url' => ['/miperfil']],
        ['label' => 'Logout ('.Yii::$app->user->identity->nick.')', 'url' => ['/site/logout']],
    ],
]);