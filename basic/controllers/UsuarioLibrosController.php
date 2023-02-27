<?php

namespace app\controllers;

use app\models\Libros;
use app\models\LibrosComentarios;
use app\models\Autores;
use app\models\LibrosImagenes;
use app\models\Usuarios;
use app\models\UsuarioLibros;
use app\models\UsuarioLibrosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioLibrosController implements the CRUD actions for UsuarioLibros model.
 */
class UsuariolibrosController extends Controller
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
     * Lists all UsuarioLibros models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioLibrosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single UsuarioLibros model.
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
     * Creates a new UsuarioLibros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UsuarioLibros();

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
     * Updates an existing UsuarioLibros model.
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
     * Deletes an existing UsuarioLibros model.
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
     * Finds the UsuarioLibros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return UsuarioLibros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UsuarioLibros::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionDetalle($id)
    {
        $libro = Libros::findOne(['id' => $id]);

        $comentarios = LibrosComentarios::findAll(['libro_id' => $libro->id]);
		
        $autor = Autores::findOne(['id' => $libro->autor_id]);
        $imagenes = LibrosImagenes::findAll(['libro_id'=>$id]);
        $estado = Libros::LISTA_BLOQUEO[$libro->bloqueado];
        $terminacion = Libros::LISTA_TERMINADO[$libro->terminado];
		$nuevoComentario = new LibrosComentarios;
        return $this->render('detalle',array(
            "libro"=>$libro,
            "autor"=>$autor,
            "imagenes"=>$imagenes,
            "estado"=>$estado,
            "terminacion"=>$terminacion,
			"comentarios"=>$comentarios,
			"nuevoComentario"=>$nuevoComentario
        ));
    }

    public function actionUsuario($id){
        $usuario = Usuarios::findOne(['id' => $this->findModel($id)->usuario_id]);

        $model = UsuarioLibros::find()->where(['usuario_id' => $usuario->id])->one();
        $fecha= $model->getFechaFormateada();

        return $this->render('usuario',array(
            "usuario" => $usuario,
            "fecha" => $fecha,
        ));

    }
   
}
