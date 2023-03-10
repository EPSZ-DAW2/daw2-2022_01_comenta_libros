<?php

namespace app\controllers;

use app\models\LibrosComentarios;
use app\models\LibrosComentariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibrosComentariosController implements the CRUD actions for LibrosComentarios model.
 */
class LibroscomentariosController extends Controller
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
     * Lists all LibrosComentarios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LibrosComentariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LibrosComentarios model.
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
     * Creates a new LibrosComentarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new LibrosComentarios();

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
     * Updates an existing LibrosComentarios model.
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
     * Deletes an existing LibrosComentarios model.
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
     * Finds the LibrosComentarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return LibrosComentarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LibrosComentarios::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionDenunciarcomentario($id)
    {
        $tipoUsuario=1; //Cambiar cuando haya usuarios
        $comentario=LibrosComentarios::findOne(['id' => $id]);
        if ($tipoUsuario === 1) {
            $comentario->num_denuncias++;
        } else if ($tipoUsuario === 0) {
            $comentario->bloqueado = 2;
        }

        if ($comentario->num_denuncias === 50) {
            $comentario->bloqueado = 1;
        }
        $comentario->save();
		return $this->redirect(["detalle", 'id'=>comentario->libro_id]);
    }

    public function actionDesbloquear($id)
    {
        $tipoUsuario=1; //Cambiar cuando haya usuarios
        $comentario=LibrosComentarios::findOne(['id' => $id]);
        if ($tipoUsuario === 0) {
            $comentario->bloqueado = 0;
        } else {
            $error = "No est?? autorizado para entrar en esta p??gina";           
            $this->render('error',array(
                "message"=>$error
            ));
        }
        $comentario->save();

        return $this->redirect(['index']);
    }
}
