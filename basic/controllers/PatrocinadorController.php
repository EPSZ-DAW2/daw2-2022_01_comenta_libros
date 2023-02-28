<?php

namespace app\controllers;

use app\models\Patrocinador;
use app\models\PatrocinadorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Anuncio;
use app\models\Usuarios;

/**
 * PatrocinadorController implements the CRUD actions for Patrocinador model.
 */
class PatrocinadorController extends Controller
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
     * Lists all Patrocinador models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PatrocinadorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
		$patrocinadores = $dataProvider->query->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'patrocinadores' => $patrocinadores,
        ]);
    }

    /**
     * Displays a single Patrocinador model.
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
     * Creates a new Patrocinador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Patrocinador();

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
     * Updates an existing Patrocinador model.
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
     * Deletes an existing Patrocinador model.
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
     * Finds the Patrocinador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Patrocinador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patrocinador::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


    // BUSCADOR DE ANUNCIOS POR NOMBRE DE PATROCINADOR
	/*
    public function actionAnuncioPatrocinador($id)
    {
        $usuario=Usuario::findOne(['id' => $id]);
        $patrocinador=Patrocinador::findOne(['usuario_id' => $usuario->id]);
        $anuncio = Anuncio::findAll(['patrocinador_id' => $patrocinador->id]);
		
        return $this->render('patrocinador_anuncios',array(
            "usuario"=>$usuario,
            "patrocinador"=>$patrocinador,
            "anuncio"=>$anuncio,
        ));
    }*/
}
