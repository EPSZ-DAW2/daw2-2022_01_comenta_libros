<?php

namespace app\controllers;

use app\models\Ilustradores;
use app\models\IlustradoresSearch;
use app\models\Libros;
use app\models\LibrosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;


/**
 * IlustradoresController implements the CRUD actions for Ilustradores model.
 */
class IlustradoresController extends Controller
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
     * Lists all Ilustradores models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new IlustradoresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ilustradores model.
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
     * Creates a new Ilustradores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Ilustradores();

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
     * Updates an existing Ilustradores model.
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
     * Deletes an existing Ilustradores model.
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
     * Finds the Ilustradores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Ilustradores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ilustradores::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
	
	
	/*
	*
	*	Acción detalle para mostrar los libros ilustrados por el ilustrador elegido
	*
	*/
	public function actionDetalle($id)
    {
        $ilustrador=Ilustradores::findOne(['id' => $id]);
        $libro = Libros::findAll(['ilustrador_id' => $ilustrador->id]);
		$searchModel = new LibrosSearch();
        $dataProvider = $searchModel->buscadorIlu(Yii::$app->request->queryParams);
		
        return $this->render('detalle',array(
            "ilustrador"=>$ilustrador,
            "libro"=>$libro,
			"searchModel" => $searchModel,
            "dataProvider" => $dataProvider,
        ));
    }// actionDetalle
	
		public function actionBuscar($id)
    {
    $ilustrador=Ilustradores::findOne(['id' => $id]);
    $searchModel = new LibrosSearch();
    $libro = Libros::findAll(['ilustrador_id' => $ilustrador->id]);
    $dataProvider = $searchModel->buscadorIlu(Yii::$app->request->queryParams);

    return $this->render('resultadoBusqueda',array(
        "ilustrador" => $ilustrador,
        "searchModel" => $searchModel,
        "libro"=>$libro,
        "dataProvider" => $dataProvider,
    ));
	}
	
	
	
	
}
