<?php

namespace app\controllers;
use app\models\Libros;
use app\models\LibrosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use Yii;

class LibrostraductoresController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //$searchModel = new LibrosSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => Libros::find()->joinWith('traductores'),
        ]);
        //$dataProvider = $searchModel->getlibrosIlustradores(Yii::$app->request->queryParams);

        return $this->render('index', [
          //  'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,

        ]);
    }

}
