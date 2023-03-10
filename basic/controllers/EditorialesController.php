<?php

namespace app\controllers;

use app\models\Libros;
use app\models\Editorial;
use app\models\EditorialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Configuraciones;

/**
 * EditorialesController implements the CRUD actions for Editorial model.
 */
class EditorialesController extends Controller
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
     * Lists all Editorial models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EditorialSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
		$pagination = new Pagination([
			'defaultPageSize' => Configuraciones::getConfiguracion("numero_lineas_pagina"),
			'totalCount' => $dataProvider->query->count(),
		]);
		
		$editoriales=$dataProvider->query->offset($pagination->offset)->limit($pagination->limit)->all();
		// La consulta SQL es: "SELECT DISTINCT SUBSTRING(nombre, 1, 1) AS letra;"
		
        $dataLetras = $searchModel->search([]);
		$letra=$dataLetras->query->select(['SUBSTRING(nombre,1,1) as letra'])->distinct()->orderBy(['letra'=> SORT_ASC])->asArray()->all();
		//\Yii::trace( print_r("Letra ".$letra,true));
        return $this->render('index', [
            'searchModel' => $searchModel,
            'pagination' => $pagination,
            'editoriales' => $editoriales,
            'letra' => $letra,
        ]);
    }
	
	/*
	*
	*	Acción detalle para mostrar la ficha resumida de los libros de cada editorial
	*
	*/
	public function actionLibros_editorial($id)
    {
        $editorial=Editorial::findOne(['id' => $id]);
        $libro = Libros::findAll(['editorial_id' => $editorial->id]);
		
        return $this->render('libros_editorial',array(
            "editorial"=>$editorial,
            "libro"=>$libro,
        ));
    }// actionDetalle
	
	/*
	*
	*	Acción letra para filtar el nombre de una editorial por una letra seleccionada
	*
	*/
	public function actionLetrafilter($filtroLetra)
    {
		$searchModel = new EditorialSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
		$pagination = new Pagination([
			'defaultPageSize' => Configuraciones::getConfiguracion("numero_lineas_pagina"),
			'totalCount' => $dataProvider->query->count(),
		]);
		
        $editoriales=$dataProvider->query->where(['like','nombre',$filtroLetra.'%',false])->offset($pagination->offset)->limit($pagination->limit)->all();
  
		$dataLetras = $searchModel->search([]);
		$letra=$dataLetras->query->select(['SUBSTRING(nombre,1,1) as letra'])->distinct()->orderBy(['letra'=> SORT_ASC])->asArray()->all();
		
		return $this->render('index', [
            'searchModel' => $searchModel,
            'pagination' => $pagination,
            'editoriales' => $editoriales,
            'letra' => $letra,
        ]);
    }// actionLetra

    
}
