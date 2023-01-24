<?php

namespace app\controllers;
use app\models\LibrosEventos;
use app\models\LibrosEventosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use Yii;

class EventosLibrosOrganizadorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //$searchModel = new LibrosSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => LibrosEventos::find()->joinWith('libros')->joinWith('usuarios'),
        ]);
        //$dataProvider = $searchModel->getlibrosIlustradores(Yii::$app->request->queryParams);

        return $this->render('index', [
          //  'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,

        ]);
    }

}
