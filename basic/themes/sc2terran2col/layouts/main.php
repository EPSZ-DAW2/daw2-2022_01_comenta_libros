<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\debug\Toolbar;
use app\assets\AppAsset;
use app\widgets\Alert;

// You can use the registerAssetBundle function if you'd like
//$this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Html::encode($this->title); ?></title>
<link href="<?php echo $this->theme->baseUrl; ?>/css/style1.css" rel="stylesheet" type="text/css">

<?php $this->head(); ?>
</head>

<body>
<?php $this->beginBody(); ?>
<div id="everything">

    <div id="header">
      <h1><?php echo Html::encode(\Yii::$app->name); ?></h1>
    </div>

    <div id="middle">
      <div id="left_column">
       	  <div id="navigation">
            <?php echo Menu::widget(array(
              'options' => array('class' => 'nav'),
              'items' => array(
                array('label' => 'Home', 'url' => array('/site/index')),
                array('label' => 'About', 'url' => array('/site/about')),
                array('label' => 'Contact', 'url' => array('/site/contact')),
                Yii::$app->user->isGuest ?
                  array('label' => 'Login', 'url' => array('/site/login')) :
                  array('label' => 'Logout (' . Yii::$app->user->identity->username .')' , 'url' => array('/site/logout')),
              ),
            )); ?>            
          </div>
          <div id="more_information">
       	  <div class="box">Poll:</div>
            <div class="box">Features:</div>
          <div class="box">Links:</div>
        </div>
      </div>
        <div id="middle_column" class="two_column">
		  <div class="date_break">News for 01/02/07</div>
          <div class="post">
            <?php echo $content; ?>
          </div>
          <div class="post">
            <h1>Title</h1>
            <div class="post_body">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam non  urna. Phasellus id diam at diam fermentum pulvinar. Donec quis nibh non  nibh semper aliquet. Cras sed nisl. Pellentesque habitant morbi  tristique senectus et netus et malesuada fames ac turpis egestas.  Vestibulum ultricies, nisi at mattis facilisis, dolor arcu feugiat  velit, eu vehicula leo justo at neque. Nunc quis augue id dolor varius  tristique. Ut tempor lacinia justo. Vestibulum eu magna. Nullam porta.  Duis hendrerit ornare magna. Suspendisse potenti. Phasellus et eros.  Integer et nibh. Pellentesque ac felis a nibh porttitor fringilla.  Fusce imperdiet arcu vitae mauris.</p>
            </div>
          
          </div>
          <div class="post">
            <h1>Title</h1>
            <div class="post_body"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam non  urna. Phasellus id diam at diam fermentum pulvinar. Donec quis nibh non  nibh semper aliquet. Cras sed nisl. Pellentesque habitant morbi  tristique senectus et netus et malesuada fames ac turpis egestas.  Vestibulum ultricies, nisi at mattis facilisis, dolor arcu feugiat  velit, eu vehicula leo justo at neque. Nunc quis augue id dolor varius  tristique. Ut tempor lacinia justo. Vestibulum eu magna. Nullam porta.  Duis hendrerit ornare magna. Suspendisse potenti. Phasellus et eros.  Integer et nibh. Pellentesque ac felis a nibh porttitor fringilla.  Fusce imperdiet arcu vitae mauris.</p></div>
          
          </div>
          <div class="post">
            <h1>Title</h1>
            <div class="post_body"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam non  urna. Phasellus id diam at diam fermentum pulvinar. Donec quis nibh non  nibh semper aliquet. Cras sed nisl. Pellentesque habitant morbi  tristique senectus et netus et malesuada fames ac turpis egestas.  Vestibulum ultricies, nisi at mattis facilisis, dolor arcu feugiat  velit, eu vehicula leo justo at neque. Nunc quis augue id dolor varius  tristique. Ut tempor lacinia justo. Vestibulum eu magna. Nullam porta.  Duis hendrerit ornare magna. Suspendisse potenti. Phasellus et eros.  Integer et nibh. Pellentesque ac felis a nibh porttitor fringilla.  Fusce imperdiet arcu vitae mauris.</p></div>
          
          </div>
        </div>
        
    </div>
    
</div>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>