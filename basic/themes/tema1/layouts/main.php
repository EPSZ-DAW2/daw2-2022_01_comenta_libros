<?php

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use app\widgets\Alert;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\models\Usuarios;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

/**
 * @var $this \yii\base\View
 * @var $content string
 */
// $this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
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
			if(Yii::$app->user->isGuest){
				require_once('nav_invitado.php');
			}else{
				$rol=Usuarios::getSessionRol();
				switch($rol){
					case "ROL_0":
						require_once('nav_normal.php');
					break;

					case "ROL_1":
						require_once('nav_moderador.php');
					break;

					case "ROL_2":
						require_once('nav_patrocinador.php');
					break;

					case "ROL_3":
						require_once('nav_admin.php');
					break;

					case "ROL_4":
						require_once('nav_sysadmin.php');
					break;
				}
			}

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
					<p class="lista"><?= Html::a('Más votados', ['site/masvotados']) ?></p>
					<p class="lista"><?= Html::a('Menos votados', ['site/menosvotados']) ?></p>
					<p class="lista"><?= Html::a('Terminados', ['site/terminados']) ?></p>
					<p class="lista"><?= Html::a('Suspendidos', ['site/suspendidos']) ?></p>
					<p class="lista"><?= Html::a('Nuevos', ['site/nuevos']) ?></p>
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