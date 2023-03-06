<?php

namespace app\controllers;

use app\models\Configuraciones;
use app\models\Libros;
use app\models\LibrosSearch;
use app\models\Autores;
use app\models\AutoresSearch;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * AutoresController implements the CRUD actions for Autores model.
 */
class AutoresController extends Controller
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
     * Lists all Autores models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AutoresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $pagination = new Pagination([
			'defaultPageSize' => Configuraciones::getConfiguracion("numero_lineas_pagina"),
			'totalCount' => $dataProvider->query->count(),
		]);        
		$autores=$dataProvider->query->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'autores' => $autores,
            'pagination' => $pagination
        ]);
    }

    /**
     * Displays a single Autores model.
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
     * Creates a new Autores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Autores();

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
     * Updates an existing Autores model.
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
     * Deletes an existing Autores model.
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
     * Finds the Autores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Autores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Autores::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	
	/*
	*
	*	Acción detalle para mostrar los libros escritos por un autor
	*
	*/
	public function actionDetalle($id)
    {
        $autor=Autores::findOne(['id' => $id]);
        $libro = Libros::findAll(['autor_id' => $autor->id]);
        $searchModel = new LibrosSearch();
        $dataProvider = $searchModel->buscadorAutor(Yii::$app->request->queryParams);
		
        return $this->render('detalle',array(
            "autor"=>$autor,
            "libro"=>$libro,
            "searchModel" => $searchModel,
            "dataProvider" => $dataProvider,
        ));
    }// actionDetalle
	
	public function actionBuscar($id)
    {
    $autor=Autores::findOne(['id' => $id]);
    $searchModel = new LibrosSearch();
    $libro = Libros::findAll(['autor_id' => $autor->id]);
    $dataProvider = $searchModel->buscadorAutor(Yii::$app->request->queryParams);

    return $this->render('resultadoBusqueda',array(
        "autor" => $autor,
        "searchModel" => $searchModel,
        "libro"=>$libro,
        "dataProvider" => $dataProvider,
    ));
	}
	
}
