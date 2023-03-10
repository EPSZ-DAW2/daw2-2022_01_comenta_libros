<?php

namespace app\controllers;
use app\models\Libros;
use app\models\LibrosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use Yii;

class LibrosilustradoresController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //$searchModel = new LibrosSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => Libros::find()->joinWith('ilustradores'),
        ]);
        //$dataProvider = $searchModel->getlibrosIlustradores(Yii::$app->request->queryParams);

        return $this->render('index', [
          //  'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,

        ]);
    }

}
