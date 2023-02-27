<?php

use yii\bootstrap5\Html;
use app\widgets\Alert;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\models\Usuarios;


/**
 * @var $this \yii\base\View
 * @var $content string
 */
// $this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php echo Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
    
		<meta name="description" content="" />
		<meta name="HandheldFriendly" content="True" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl ?>/assets/font/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl ?>/assets/css/materialize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl ?>/assets/css/prism.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl ?>/assets/css/piezas.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl ?>/assets/css/style.css" />
		
</head>
<body class="post-template page-template page grey lighten-5">
  <?php $this->beginBody() ?>
	<nav>
		<div class="nav-wrapper cyan darken-3">
	  		<?php
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
						        ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
						    ],
						]);
					?>
			<a class="button-collapse" href="#" data-activates="nav-mobile"><i class="mdi-navigation-menu"></i></a>
		</div>
	</nav>
<main class="content" role="main">
	<section id="blog-intro" class="cyan section z-depth-1 article-intro" style="background-image:url('<?php echo $this->theme->baseUrl ?>/assets/images/post.jpg?v=b2f76a195e');"></section>
	
	<div class="menu_lateral">
		<div id="sidebar">
			<div class="sidebar-header"><h3>Ver libros:</h3></div>
				<ul>
					<p class="lista"><a href="">Más vistos</a></p>
					<p class="lista"><a href="">Menos vistos</a></p>
					<p class="lista"><a href="">Terminados</a></p>
					<p class="lista"><a href="">Suspendidos</a></p>
					<p class="lista"><a href="">Nuevos</a></p>
				</ul>
			<div class="sidebar-header"><h3>Enlaces:</h3></div>
		</div>
	</div>
	
	
	<section id="main-inner-container" class="container">
		<article class="post page card-panel z-depth-1 article-container">
			<header>
				<?php echo Html::img('@web/images/libros.jpg', ['alt' => 'Logo', 'class' => 'img-responsive']); ?>
				<h1>Comentalibros</h1>
			</header>
			
			<section class="post-content">
				<?php echo $content; ?>
			</section>
		</article>
	</section>
</main>


<footer class="site-footer clearfix">
	<section class="copyright grey-text darken-2"><?php echo Html::encode($this->title); ?></a> &copy; <?= date('Y') ?></section>
	<section class="poweredby grey-text darken-2">Proudly published with <a href="http://yiiframework.com" class="grey-text darken-5">Yii2</a></section>
</footer>

<script src="<?php echo $this->theme->baseUrl ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->theme->baseUrl ?>/assets/js/materialize.js"></script>
<script type="text/javascript" src="<?php echo $this->theme->baseUrl ?>/assets/js/prism.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage(); ?>