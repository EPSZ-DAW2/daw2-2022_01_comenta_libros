<?php

namespace app\controllers;

use app\models\Configuraciones;
use app\models\Libros;
use app\models\Traductores;
use app\models\TraductoresSearch;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;;
use app\models\LibrosSearch;
use yii;
/**
 * TraductoresController implements the CRUD actions for Traductores model.
 */
class TraductoresController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Traductores models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TraductoresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $pagination = new Pagination([
			'defaultPageSize' => Configuraciones::getConfiguracion("numero_lineas_pagina"),
			'totalCount' => $dataProvider->query->count(),
		]);        
		$traductores=$dataProvider->query->offset($pagination->offset)->limit($pagination->limit)->all();

        $dataLetras = $searchModel->search([]);
		$letra=$dataLetras->query->select(['SUBSTRING(nombre,1,1) as letra'])->distinct()->orderBy(['letra'=> SORT_ASC])->asArray()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'traductores' => $traductores,
            'pagination' => $pagination,
            'letra'=>$letra
        ]);
    }

    /**
     * Displays a single Traductores model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Traductores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Traductores();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Traductores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Traductores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Traductores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Traductores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Traductores::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
	
	/*
	*
	*	Acción detalle para mostrar los libros que ha traducido una persona
	*
	*/
	public function actionDetalle($id)
    {
        $traductor=Traductores::findOne(['id' => $id]);
        $libro = Libros::findAll(['traductor_id' => $traductor->id]);
		
		$searchModel = new LibrosSearch();
        $dataProvider = $searchModel->buscadorTrad(Yii::$app->request->queryParams);
		
		
        return $this->render('detalle',array(
            "traductor"=>$traductor,
            "libro"=>$libro,
			"searchModel" => $searchModel,
            "dataProvider" => $dataProvider,
        ));
    }// actionDetalle
	
		public function actionBuscar($id)
    {
    $traductor=Traductores::findOne(['id' => $id]);
    $searchModel = new LibrosSearch();
    $libro = Libros::findAll(['traductor_id' => $traductor->id]);
    $dataProvider = $searchModel->buscadorTrad(Yii::$app->request->queryParams);

    return $this->render('resultadoBusqueda',array(
        "traductor" => $traductor,
        "searchModel" => $searchModel,
        "libro"=>$libro,
        "dataProvider" => $dataProvider,
    ));
	}
	
	public function actionLetrafilter($filtroLetra)
    {
		$searchModel = new TraductoresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
		$pagination = new Pagination([
			'defaultPageSize' => Configuraciones::getConfiguracion("numero_lineas_pagina"),
			'totalCount' => $dataProvider->query->count(),
		]);
		
        $traductores=$dataProvider->query->where(['like','nombre',$filtroLetra.'%',false])->offset($pagination->offset)->limit($pagination->limit)->all();
  
		$dataLetras = $searchModel->search([]);
		$letra=$dataLetras->query->select(['SUBSTRING(nombre,1,1) as letra'])->distinct()->orderBy(['letra'=> SORT_ASC])->asArray()->all();
		
		return $this->render('index', [
            'searchModel' => $searchModel,
            'pagination' => $pagination,
            'traductores' => $traductores,
            'letra' => $letra,
        ]);
    }// actionLetra
}
