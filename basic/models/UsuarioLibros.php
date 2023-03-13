<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios_libros".
 *
 * @property int $id
 * @property int $usuario_id Usuario relacionado, seguidor del libro.
 * @property int $local_id Libro relacionado.
 * @property string $fecha_seguimiento Fecha y Hora de activación del seguimiento del libro por parte del usuario.
 */
class UsuarioLibros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios_libros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'local_id', 'fecha_seguimiento'], 'required'],
            [['usuario_id', 'local_id'], 'integer'],
            [['fecha_seguimiento'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'usuario_id' => Yii::t('app', 'Usuario ID'),
            'local_id' => Yii::t('app', 'Libro ID'),
            'fecha_seguimiento' => Yii::t('app', 'Fecha Seguimiento'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UsuarioLibrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuarioLibrosQuery(get_called_class());
    }

    public function getFechaFormateada()
    {
    return Yii::$app->formatter->asDate($this->fecha_seguimiento, 'dd/MM/yyyy');
    }
    public function getUsuarioname(){
        return $this->hasOne(Usuarios::class, ['id' => 'usuario_id']);
    }// getAutores
	
	public function getUsuario(){
		return $this->usuarioname->nombre;
	}

    public function getLibroname(){
        return $this->hasOne(Libros::class, ['id' => 'local_id']);
    }// getAutores
	
	public function getLibro(){
		return $this->libroname->titulo;
	}
}
