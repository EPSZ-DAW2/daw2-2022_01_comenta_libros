<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Usuarios;
use app\models\CambiarcontraForm;
use app\models\EditarperfilForm;
use app\models\UsuarioGeneros;
use app\models\Generos;

class MiperfilController extends Controller
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
    	$usuario= Usuarios::getSessionUser();
    	if(!isset($usuario)){
    		return $this->redirect(['site/index']);
    	}

    	return $this->render('index', ['usuario' => $usuario,]);
    }

    public function actionBorrarperfil()
    {
    	$usuario= Usuarios::getSessionUser();
    	if(!isset($usuario)){
    		return $this->redirect(['site/index']);
    	}

    	return $this->render('confirmar_borrado', ['usuario' => $usuario,]);
    }

    public function actionConfirmarborrado()
    {
    	$usuario= Usuarios::getSessionUser();
    	if(!isset($usuario)){
    		return $this->redirect(['site/index']);
    	}

    	if(isset($_GET["desdeboton"])){
    		$desdeboton = $_GET["desdeboton"];
	    	
	    	if($desdeboton == 1){
	    		$usuario->delete();
	    		return $this->redirect(['site/index']);
	    	}
    	}

    	return $this->redirect(['miperfil/index']);
    }

    public function actionEditarperfil()
    {
    	$usuario= Usuarios::getSessionUser();
    	$model= new EditarperfilForm;
    	if(!isset($usuario)){
    		return $this->redirect(['site/index']);
    	}

    	$msg='';
    	if ($model->load(Yii::$app->request->post())) {
    		$usuario->nick=$model->nick;
			$usuario->nombre=$model->nombre;
			$usuario->apellidos=$model->apellidos;
			$usuario->fecha_nacimiento=$model->fecha_nacimiento;
			$usuario->direccion=$model->direccion;

    		if($usuario->update()){
    			$msg="Perfil actualizado con éxito!";
    		}else{
    			$msg="Ha ocurrido algún problema al actualizar tu perfil. Vuelve a intentarlo mas tarde.";
    		}
    	}

    	$model->nick=$usuario->nick;
		$model->nombre=$usuario->nombre;
		$model->apellidos=$usuario->apellidos;
		$model->fecha_nacimiento=$usuario->fecha_nacimiento;
		$model->direccion=$usuario->direccion;

    	return $this->render('editar_perfil', ['usuario' => $usuario, 'model'=>$model, 'msg'=>$msg,]);

    }

    public function actionCambiarcontra()
    {
    	$usuario= Usuarios::getSessionUser();
    	$model= new CambiarcontraForm;
    	if(!isset($usuario)){
    		return $this->redirect(['site/index']);
    	}

    	$msg="";

    	if ($model->load(Yii::$app->request->post())) {
    		$usuario->password=hash('sha1', $model->password);
    		if($usuario->update()){
    			$msg="Contraseña actualizada con éxito!";
    		}else{
    			$msg="Ha ocurrido algún problema al actualizar tu contraseña. Vuelve a intentarlo mas tarde.";
    		}
    	}


    	return $this->render('cambiar_contra', ['usuario' => $usuario, 'model'=>$model, 'msg'=>$msg]);
    }

	public function actionUsuariogeneros()
    {
		$usuario= Usuarios::getSessionUser();
		$id_curr=$usuario->getId();
        $model = new UsuarioGeneros();
		
        $data = $model->find()->distinct()->where(['usuario_id'=> $id_curr])->all();

		/*$genero=[];
		foreach($data as $gender){
       	 array_push($genero,Generos::find()->distinct()->where(['ID' => $gender])->all());
		}*/
        if(Yii::$app->request->post()) {
            $idsToDelete = Yii::$app->request->post('idsToDelete', []);//Cuando esten marcados se borraran
            
            if(!empty($idsToDelete)) {
                foreach($idsToDelete as $id) {
                    $model->findOne($id)->delete();
                }
            }
            
            return $this->redirect(['usuario_generos']);
        }
        
        return $this->render('usuario_generos', ['data' => $data,]);
    }

}