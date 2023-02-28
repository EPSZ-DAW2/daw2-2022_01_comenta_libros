<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\Usuarios;
use app\models\ContactForm;
use app\models\Configuraciones;
use app\models\LibrosEventos;
use app\models\LibrosSearch;
use app\controllers\Html;
use app\models\LibrosResumen;
use app\models\LibrosResumenSearch;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
		$searchModel = new LibrosSearch(); // Cambiar por fichas resumen mirar en las indicaciones
		
		$searModel = new LibrosResumenSearch();
		$dataProvider = $searModel->search($this->request->queryParams);
		$fichasresumen = $dataProvider->query->limit(6)->where(["visible" => 1])->all();
		
		// Y MOVER LAS VISTAS
		$evento=LibrosEventos::find()->where(['bloqueado'=>0]);
		
        return $this->render('index', [
			'searchModel' => $searchModel,
			'fichasresumen' => $fichasresumen,
			'evento'=>$evento->all(),
		]);
    }
	
	/**
	* Muestra ficha resumen de los libros que son visibles y están terminados
	*
	**/
	public function actionTerminados()
	{
		$searchModel = new LibrosSearch(); // Cambiar por fichas resumen mirar en las indicaciones
		
		$searModel = new LibrosResumenSearch();
		$dataProvider = $searModel->search($this->request->queryParams);
		
		$pagination = new Pagination([
			'defaultPageSize' => 4,
			'totalCount' => $dataProvider->query->where(["visible" => 1, "terminado" => 1])->count(),
		]);
		
		$fichasresumen = $dataProvider->query->where(["visible" => 1, "terminado" => 1])->offset($pagination->offset)->limit($pagination->limit)->all();
		
		$evento=LibrosEventos::find()->where(['bloqueado'=>0]);
		
        return $this->render('index', [
			'searchModel' => $searchModel,
			'pagination' => $pagination,
			'fichasresumen' => $fichasresumen,
			'evento'=>$evento->all(),
		]);
	}
	
	/**
	* Muestra ficha resumen de los libros que son visibles y son los más votados
	*
	**/
	public function actionMasvotados()
	{
		$searchModel = new LibrosSearch(); // Cambiar por fichas resumen mirar en las indicaciones
		
		$searModel = new LibrosResumenSearch();
		$dataProvider = $searModel->search($this->request->queryParams);
		
		$pagination = new Pagination([
			'defaultPageSize' => 4,
			'totalCount' => $dataProvider->query->where(["visible" => 1])->count(),
		]);
		
		$fichasresumen = $dataProvider->query->where(["visible" => 1])->orderBy(["totalVotos" => SORT_DESC])->offset($pagination->offset)->limit($pagination->limit)->all();
		
		$evento=LibrosEventos::find()->where(['bloqueado'=>0]);
		
        return $this->render('index', [
			'searchModel' => $searchModel,
			'pagination' => $pagination,
			'fichasresumen' => $fichasresumen,
			'evento'=>$evento->all(),
		]);
	}
	
	/**
	* Muestra ficha resumen de los libros que son visibles y son los menos votados
	*
	**/
	public function actionMenosvotados()
	{
		$searchModel = new LibrosSearch(); // Cambiar por fichas resumen mirar en las indicaciones
		
		$searModel = new LibrosResumenSearch();
		$dataProvider = $searModel->search($this->request->queryParams);
		
		$pagination = new Pagination([
			'defaultPageSize' => 4,
			'totalCount' => $dataProvider->query->where(["visible" => 1])->count(),
		]);
		
		$fichasresumen = $dataProvider->query->where(["visible" => 1])->orderBy(["totalVotos" => SORT_ASC])->offset($pagination->offset)->limit($pagination->limit)->all();
		
		$evento=LibrosEventos::find()->where(['bloqueado'=>0]);
		
        return $this->render('index', [
			'searchModel' => $searchModel,
			'pagination' => $pagination,
			'fichasresumen' => $fichasresumen,
			'evento'=>$evento->all(),
		]);
	}
	
	/**
	* Muestra ficha resumen de los libros que son visibles y están suspendidos
	*
	**/
	public function actionSuspendidos()
	{
		$searchModel = new LibrosSearch(); // Cambiar por fichas resumen mirar en las indicaciones
		
		$searModel = new LibrosResumenSearch();
		$dataProvider = $searModel->search($this->request->queryParams);
		
		$pagination = new Pagination([
			'defaultPageSize' => 4,
			'totalCount' => $dataProvider->query->where(["visible" => 1, "terminado" => 0])->count(),
		]);
		
		$fichasresumen = $dataProvider->query->where(["visible" => 1, "terminado" => 0])->offset($pagination->offset)->limit($pagination->limit)->all();
		
		$evento=LibrosEventos::find()->where(['bloqueado'=>0]);
		
        return $this->render('index', [
			'searchModel' => $searchModel,
			'pagination' => $pagination,
			'fichasresumen' => $fichasresumen,
			'evento'=>$evento->all(),
		]);
	}
	
	/**
	* Muestra ficha resumen de los libros que son visibles y están suspendidos
	*
	**/
	public function actionNuevos()
	{
		$searchModel = new LibrosSearch(); // Cambiar por fichas resumen mirar en las indicaciones
		
		$searModel = new LibrosResumenSearch();
		$dataProvider = $searModel->search($this->request->queryParams);
		
		$pagination = new Pagination([
			'defaultPageSize' => 4,
			'totalCount' => $dataProvider->query->where(["visible" => 1, "crea_fecha" => "not null"])->count(),
		]);
		
		$fichasresumen = $dataProvider->query->where(["visible" => 1, "crea_fecha" => "not null"])->orderBy(["crea_fecha" => SORT_ASC])->offset($pagination->offset)->limit($pagination->limit)->all();
		
		$evento=LibrosEventos::find()->where(['bloqueado'=>0]);
		
        return $this->render('index', [
			'searchModel' => $searchModel,
			'pagination' => $pagination,
			'fichasresumen' => $fichasresumen,
			'evento'=>$evento->all(),
		]);
	}
	
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        // Una vez se llena el formulario se cargan los datos en el modelo
        if ($model->load(Yii::$app->request->post())) {
            // Cargamos las configuraciones acerca del bloqueo de usuarios
            $max_intentos_log=Configuraciones::getConfiguracion("max_intentos_log"); // Número máximo de intentos de registro fallidos antes de bloquear un usuario
            $tmp_bloqueo_log=Configuraciones::getConfiguracion("tmp_bloqueo_log"); // Tiempo de bloqueo EN MINUTOS

            // Buscamos un ususario con el correo indicado
            $usuario=Usuarios::find()->where(['email'=>$model->email])->one();

            // Si se encuentra
            if(isset($usuario)){

                // Comprobamos que haya confirmado su email, si no lo ha hecho lo indicamos
                if($usuario->confirmado == 0){
                    $model->addError('email', 'Error, este email no ha sido verificado.');
                    return $this->render('login', [
                     'model' => $model,
                    ]);
                }

                // Comprobamos si el usuario está bloqueado
                if($usuario->bloqueado == 1){
                    $fecha_actual=date('Y-m-d H:i:s');
                    $fecha_bloqueo=$usuario->fecha_bloqueo;
                   
                   // En caso de estarlo calculamos el tiempo que lleva bloqueado
                    $minutos_diff=floor(abs((strtotime($fecha_actual) - strtotime($fecha_bloqueo))/60));

                    // Si se ha acabado el bloqueo lo configuramos en el modelo
                    if($minutos_diff > $tmp_bloqueo_log){
                        $usuario->fecha_bloqueo=null;
                        $usuario->bloqueado=0;
                        $usuario->num_accesos=0;
                        $usuario->update();

                        // Si no se ha acabdao el bloqueo lo indicamos
                    }else{
                        $model->addError('email', 'Error, este usuario está bloqueado por exceder el límite de intento de accesos. Será desbloqueado en '.($tmp_bloqueo_log - $minutos_diff). ' minutos.');
                        return $this->render('login', [
                        'model' => $model,
                      ]);
                    }
                }

                // Si se inicia sesión correctamente
                if($model->login()){
                        // Reestablecemos toda la configuración acerca del bloqueo
                        $usuario->fecha_bloqueo=null;
                        $usuario->bloqueado=0;
                        $usuario->num_accesos=0;
                        $usuario->update();

                        // Establecemos el nuevo "home"
                        Yii::$app->homeUrl=array('site/userindex');
                        // Redireccionamos al nuevo home
                        return $this->redirect(["site/userindex"]);
                    
                    // return $this->actionUserindex();
                // Si no se encuentra la contraseña está mal
                }else{
                    // Se añade un intento erroneo a la BD y si llega al límite de intentos se bloquea temporalmente al usuario
                    $usuario->num_accesos+=1;
                    if($usuario->num_accesos>=$max_intentos_log){
                        $usuario->bloqueado=1;
                        $usuario->fecha_bloqueo=date('Y-m-d H:i:s');
                    }

                    $usuario->update();
                }


            // Si no se ha encontrado
            }else{

            $model->addError('password', 'No existe un usuario con esa combinación de email y contraseña.');
             Yii::error('El email introducido no se encuentra en la BD.');
            }
        }
        

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->homeUrl=array('site/index');
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionUserindex()
    {
        return $this->render('userindex');
    }


 public function actionConfirm()
 {
    if (!Yii::$app->user->isGuest) {
        return $this->goHome();
    }

    // $datosUsuario = new Usuarios;
    if (Yii::$app->request->get())
    {
    $modelo = new Usuarios;
        //Obtenemos el valor de los parámetros get
        $id = $_GET["id"];
        $reg_token = $_GET["Reg_token"];
    
        if ((int) $id)
        {
            //Realizamos la consulta para obtener el registro
            $consulta = $modelo::find()->where("id=:id", [":id" => $id])->andWhere("reg_token=:reg_token", [":reg_token" => $reg_token]);
 
            //Si el registro existe
            if ($consulta->count() == 1)
            {
                $modelo=Usuarios::findIdentity($id);
                var_dump($modelo->id);
                $modelo->confirmado = 1;
                if ($modelo->update())
                {
                    echo("Enhorabuena, te has registrado correctamente! cargando el login...");
                    echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
                }
                else
                {
                    echo "Ha habido un error al realizar el registro, cargando el login...";
                    echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
                }
             }
            else //Si no existe redireccionamos a login
            {
                return $this->redirect(["site/login"]);
            }
        }
        else //Si id no es un número entero redireccionamos a login
        {
            return $this->redirect(["site/login"]);
        }
    }
 }
 
 public function actionRegister()
 {
    if (!Yii::$app->user->isGuest) {
        return $this->goHome();
    }
  // modelo de formulario de registro
  $regForm = new RegisterForm();

  // mensaje a mostrar en el registro según como se desarrolle
  $msg = "";

  // Cargamos el formulario de registro
  if ($regForm->load(Yii::$app->request->post()))
  {
   if($regForm->validate())
   {
    //Preparamos la consulta para guardar el usuario
    $datosUsuario = new Usuarios;
    $datosUsuario->email = $regForm->email;
    $datosUsuario->password = hash("sha1", $regForm->password);
    $datosUsuario->nick = $regForm->nick;
    $datosUsuario->nombre = $regForm->nombre;
    $datosUsuario->apellidos = $regForm->apellidos;
    $datosUsuario->fecha_nacimiento = $regForm->fecha_nacimiento;
    $datosUsuario->direccion = $regForm->direccion;
    $datosUsuario->fecha_registro = date('Y-m-d H:i:s');
    $datosUsuario->confirmado = 0;
    $datosUsuario->fecha_acceso = date('Y-m-d H:i:s');
    $datosUsuario->num_accesos=0;
    $datosUsuario->bloqueado=0;
    $datosUsuario->fecha_bloqueo=NULL;
    $datosUsuario->notas_bloqueo=NULL;
    $datosUsuario->rol="ROL_0";
    $datosUsuario->setAuthKey();
    $datosUsuario->setRegToken();

     
    //Si el registro es guardado correctamente
    if ($datosUsuario->insert())
    {

     $id=$datosUsuario->id;
     $reg_token=$datosUsuario->reg_token;
     // Generamos la URL para confirmar el correo del usuario
     $url=$url = Url::to(['site/confirm', 'id' => $id, 'Reg_token' => $reg_token]);
     $msg = "<p>Haz click en el siguiente enlace para confirmar tu registro ";
     $msg .= "<a href=".$url.">Confirmar</a></p>";

     $to_email = $datosUsuario->email;
     $subject = "Confirma tu registro";
     $body = $msg;
     $headers = "Comenta Libros";

     // Intentamos enviar por email la confirmación en caso de no ser posible se mostrará el contenido del email en la misma pantalla.
    if (mail($to_email, $subject, $body, $headers)) {
        $msg="Revisa tu correo para confirmar el registro!!";
    }
    }else{
     $msg = "Ha ocurrido un error al llevar a cabo tu registro";
    }// if $datosUsuario
   }
  }
  return $this->render("register", ["model" => $regForm, "msg" => $msg]);
 }

}
