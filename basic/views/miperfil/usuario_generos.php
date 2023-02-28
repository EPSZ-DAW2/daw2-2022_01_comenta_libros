<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Géneros que sigues';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>


<?php
    if(!$data){?><h2>Todavía no sigues ningún género</h2><?php
    }else{
?>
<h2>Marca los géneros que quieras dejar de seguir</h2>
<?php $form = ActiveForm::begin(['method' => 'post']) ?>
    <?php foreach($data as $item): ?>
        <div>
            <?= Html::checkbox('idsToDelete[]', false, ['value' => $item->id]) ?>
            <?= $item->genero_id ?>
        </div>
    <?php endforeach; ?>
    
    <?= Html::submitButton('Accept') ?>
<?php ActiveForm::end(); 
    }
        
?>