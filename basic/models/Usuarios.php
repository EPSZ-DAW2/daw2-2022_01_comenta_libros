<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $email Correo Electronico y "login" del usuario.
 * @property string $password
 * @property string $nick
 * @property string $nombre
 * @property string $apellidos
 * @property string|null $fecha_nacimiento Fecha de nacimiento del usuario o NULL si no lo quiere informar.
 * @property string|null $direccion Direccion del usuario o NULL si no quiere informar.
 * @property string|null $fecha_registro Fecha y Hora de registro del usuario o NULL si no se conoce por algún motivo (que no debería ser).
 * @property int $confirmado Indicador de usuario ha confirmado su registro o no.
 * @property string|null $fecha_acceso Fecha y Hora del ultimo acceso del usuario. Debería estar a NULL si no ha accedido nunca.
 * @property int $num_accesos Contador de accesos fallidos del usuario o CERO si no ha tenido o se ha reiniciado por un acceso valido o por un administrador.
 * @property int $bloqueado Indicador de usuario bloqueado: 0=No, 1=Si(bloqueada por accesos), 2=Si(bloqueada por administrador), ...
 * @property string|null $fecha_bloqueo Fecha y Hora del bloqueo del usuario. Debería estar a NULL si no está bloqueado o si se desbloquea.
 * @property string|null $notas_bloqueo Notas visibles sobre el motivo del bloqueo del usuario o NULL si no hay -se muestra por defecto según indique "bloqueado"-.
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'nick', 'nombre', 'apellidos', 'confirmado', 'rol', 'auth_key', 'reg_token'], 'required'],
            [['fecha_nacimiento', 'fecha_registro', 'fecha_acceso', 'fecha_bloqueo'], 'safe'],
            [['direccion', 'notas_bloqueo'], 'string'],
            [['confirmado', 'num_accesos', 'bloqueado'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 60],
            [['nick'], 'string', 'max' => 25],
            [['nombre'], 'string', 'max' => 50],
            [['apellidos'], 'string', 'max' => 100],
            [['rol'], 'string', 'max' => 20],
            [['auth_key'], 'string', 'max' => 200],
            [['reg_token'], 'string', 'max' => 200],
            [['email'], 'unique'],
            [['nick'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'nick' => Yii::t('app', 'Nick'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellidos' => Yii::t('app', 'Apellidos'),
            'fecha_nacimiento' => Yii::t('app', 'Fecha Nacimiento'),
            'direccion' => Yii::t('app', 'Direccion'),
            'fecha_registro' => Yii::t('app', 'Fecha Registro'),
            'confirmado' => Yii::t('app', 'Confirmado'),
            'fecha_acceso' => Yii::t('app', 'Fecha Acceso'),
            'num_accesos' => Yii::t('app', 'Num Accesos'),
            'bloqueado' => Yii::t('app', 'Bloqueado'),
            'fecha_bloqueo' => Yii::t('app', 'Fecha Bloqueo'),
            'notas_bloqueo' => Yii::t('app', 'Notas Bloqueo'),
            'rol' => Yii::t('app', 'Rol'),
            'reg_token' => Yii::t('app', 'reg_token'),
            'auth_key' => Yii::t('app', 'auth_key'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UsuariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuariosQuery(get_called_class());
    }

    private function genKey()
    {
        $len=200;
        $key = "";
        $str = str_split("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
        $max = count($str)-1;
        for($i=0; $i<$len; $i++)
        {
            $key .= $str[rand(0, $max)];
        }
        return $key;
    }

    public function setAuthKey(){
        $this->auth_key=$this->genKey();
    }
	
    public function setRegToken(){
        $this->reg_token=$this->genKey();
    }

    public function getAuthKey(){
        return $this->auth_key;
    }

    public function getRegToken(){
        return $this->reg_token;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validateRegToken($regToken)
    {
        return $this->reg_token === $regToken;
    }

    public static function findIdentity($id)
    {
        return self::find()->where(['id'=>$id])->one();
    }

    public static function findByEmail($email){
        return self::find()->where(['email'=>$email])->one();
    }
	
	public function getComentarios(){
		
		return $this->hasMany(LibrosComentarios::class,['crea_usuario_id'=>'id'])->inverseOf('usuario');
		
	}

    public function validatePassword($_password){
        return $this->password === hash('sha1', $_password);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function getRol($id){
        $usuario=self::find()->where(['id'=>$id])->one();
        return $usuario['rol'];
    }

    public static function getSessionRol(){
        return self::getRol(Yii::$app->user->id);
    }

    public static function getSessionUser(){
        return self::findIdentity(Yii::$app->user->id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['auth_key'=>$token])->one()['id'];
    }


    public static function getNombre($id){

        $usuario = self::findOne($id);
        return $usuario ? $usuario->nombre : null;

    }
}
