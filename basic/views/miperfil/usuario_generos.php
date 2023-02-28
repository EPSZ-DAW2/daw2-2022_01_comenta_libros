<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Géneros que sigues';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(['method' => 'post']) ?>
    <?php foreach($data as $item): ?>
        <div>
            <?= Html::checkbox('idsToDelete[]', false, ['value' => $item->id]) ?>
            <?= $item->column1 ?>
        </div>
    <?php endforeach; ?>
    
    <?= Html::submitButton('Accept') ?>
<?php ActiveForm::end() ?>