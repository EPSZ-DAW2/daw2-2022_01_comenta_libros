<?php

namespace app\controllers;

use app\models\Autores;
use app\models\Libros;
use app\models\LibrosImagenes;
use app\models\LibrosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibrosController implements the CRUD actions for Libros model.
 */
class LibrosController extends Controller
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
     * Lists all Libros models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LibrosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Libros model.
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
     * Creates a new Libros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Libros();

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
     * Updates an existing Libros model.
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
     * Deletes an existing Libros model.
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
     * Finds the Libros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Libros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Libros::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    public function actionDenunciar($id, $ruta)
    {
        $tipoUsuario=0; //Cambiar cuando haya usuarios
        $libro=Libros::findOne(['id' => $id]);
        if ($tipoUsuario === 1) {
            if ($libro->num_denuncias === 0) {
                $fecha=new \DateTime('now', new \DateTimeZone('Europe/Amsterdam'));
                $libro->fecha_denuncia1=$fecha->format('Y-m-d H:i:s'); 
            }
            $libro->num_denuncias++;
        } else if ($tipoUsuario === 0) {
            $libro->bloqueado = 2;
            $fecha=new \DateTime('now', new \DateTimeZone('Europe/Amsterdam'));
            $libro->fecha_bloqueo=$fecha->format('Y-m-d H:i:s');
        }

        if ($libro->num_denuncias === 50) {
            $libro->bloqueado = 1;
            $fecha=new \DateTime('now', new \DateTimeZone('Europe/Amsterdam'));
            $libro->fecha_bloqueo=$fecha->format('Y-m-d H:i:s');
        }
        
        $libro->save(false);
        
        return $this->redirect([$ruta, 'id'=>$libro->id]);
    }

    public function actionDesbloquear($id)
    {
        $tipoUsuario=0; //Cambiar cuando haya usuarios
        $libro=Libros::findOne(['id' => $id]);
        if ($tipoUsuario === 0) {
            $libro->num_denuncias = 0;
            $libro->bloqueado = 0;
            $libro->fecha_denuncia1 = null;
            $libro->save(false);
        } else {
            $error = "No está autorizado para entrar en esta página";           
            $this->render('error',array(
                "message"=>$error
            ));
        }
        
        return $this->redirect(['index']);
    }

    public function actionDetalle($id)
    {
        $libro = Libros::findOne(['id' => $id]);
        $autor = Autores::findOne(['id' => $libro->autor_id]);
        $imagenes = LibrosImagenes::findAll(['libro_id'=>$id]);
        $estado = Libros::LISTA_BLOQUEO[$libro->bloqueado];
        $terminacion = Libros::LISTA_TERMINADO[$libro->terminado];
        return $this->render('detalle',array(
            "libro"=>$libro,
            "autor"=>$autor,
            "imagenes"=>$imagenes,
            "estado"=>$estado,
            "terminacion"=>$terminacion
        ));
    }
}
