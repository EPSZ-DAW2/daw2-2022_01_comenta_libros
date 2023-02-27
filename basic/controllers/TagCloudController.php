<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\TagCloudModel;



class TagCloudController extends Controller
{
    public function actionIndex($etiqueta = 'nombre', $id='id')
    {
        $data = TagCloudModel::getTagCloudData($id,$etiqueta);
        

        return $this->render('index', [//no me detecta bien la vista
            'data' => $data,
            'etiqueta' => $etiqueta,
            'id' => $id
        ]);
    }
}

?>
