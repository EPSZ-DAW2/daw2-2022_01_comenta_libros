<?php

namespace app\controllers;

use app\models\Libros;
use app\models\Editorial;
use app\models\EditorialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

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
			'defaultPageSize' => 3,
			'totalCount' => $dataProvider->query->count(),
		]);
		
		$editoriales=$dataProvider->query->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'pagination' => $pagination,
            'editoriales' => $editoriales,
        ]);
    }
	
	/*
	*
	*	Acción detalle para mostrar la ficha resumida de los libros de cada editorial
	*
	*/
	public function actionDetalle($id)
    {
        $editorial=Editorial::findOne(['id' => $id]);
        //$libro = Libros::findAll(['editorial_id' => $editorial->id]);
		
        return $this->render('ficha_resumen',array(
            "editorial"=>$editorial,
            //"libro"=>$libro,
            //"titulo"=>$libro->titulo

        ));
    }// actionDetalle
}
