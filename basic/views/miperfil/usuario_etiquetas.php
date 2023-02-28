<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Etiquetas que sigues';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>


<?php
    if(!$data){?><h2>Todavía no sigues ninguna etiqueta</h2><?php
    }else{
?>
<h2>Marca las etiquetas que quieras dejar de seguir</h2>
<?php $form = ActiveForm::begin(['method' => 'post']) ?>
    <?php foreach($data as $item): ?>
        <div>
            <?= Html::checkbox('idsToDelete[]', false, ['value'=>$item->etiqueta_id,'style' => 'font-size: 16px;font-weight: bold;']) ?>
            <?php
                foreach($etiqueta as $t){?>
                <?php
                    if($t->id == $item->etiqueta_id) print($t->nombre);?><?php
                }
            ?>
        </div>
    <?php endforeach; ?>
    
    <?= Html::submitButton('Aceptar',['class' => 'btn btn-primary','style' => 'font-size: 16px; margin-top: 10px;',])  ?>
<?php ActiveForm::end(); 
    }
        
?>