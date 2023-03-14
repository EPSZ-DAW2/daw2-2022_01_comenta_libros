<?php

namespace app\controllers;

use app\models\Configuraciones;
use app\models\ConfiguracionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * ConfiguracionesController implements the CRUD actions for Configuraciones model.
 */
class ConfiguracionesController extends Controller
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
     * Lists all Configuraciones models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ConfiguracionesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Configuraciones model.
     * @param string $variable Variable
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($variable)
    {
        return $this->render('view', [
            'model' => $this->findModel($variable),
        ]);
    }

    /**
     * Creates a new Configuraciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Configuraciones();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'variable' => $model->variable]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Configuraciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $variable Variable
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($variable)
    {
        $model = $this->findModel($variable);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'variable' => $model->variable]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Configuraciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $variable Variable
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($variable)
    {
        $this->findModel($variable)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Configuraciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $variable Variable
     * @return Configuraciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($variable)
    {
        if (($model = Configuraciones::findOne(['variable' => $variable])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionCopiaseguridad() {

        // Directorio que se desea copiar
        $dir = \Yii::getAlias('@app');
        //die($dir);

        // Directorio donde se guardará la copia de seguridad
        $backupDir = $dir .'/copia';

        // Excluir la carpeta 'exclude' de la copia de seguridad
        $excludeDir = $dir.'/vendor';
        $excludeDir2 = $dir.'/copia';

        // Nombre del archivo de copia de seguridad
        $backupName = 'backup_' . date('Ymd_His') . '.zip';

        // Crear la ruta completa al archivo de copia de seguridad
        $backupPath = $backupDir . '/' . $backupName;

        // Crear un objeto ZipArchive para crear el archivo ZIP
        $zip = new \ZipArchive();
        $zip->open($backupPath, \ZipArchive::CREATE);

        // Iterar sobre los archivos y carpetas del directorio
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir), \RecursiveIteratorIterator::SELF_FIRST);

        foreach ($iterator as $file) {
print_r($file);
            // Comprobar que el archivo o carpeta no es la carpeta a excluir
            if ( ($file->getPathname() != $excludeDir) && ($file->getPathname() != $excludeDir2)) {
                // Comprobar si el archivo es un archivo regular
                if ($file->isFile()) {
                    // Añadir el archivo al archivo ZIP
                    $zip->addFile($file->getPathname(), $file->getPathname());
                } elseif ($file->isDir()) {
                    // Añadir la carpeta al archivo ZIP
                    $zip->addEmptyDir($file->getPathname());
                }
            }
        }

        // Cerrar el archivo ZIP
        $zip->close();
            
            $searchModel = new ConfiguracionesSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
    
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }
}
