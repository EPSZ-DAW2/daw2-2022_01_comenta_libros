<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "idiomas".
 *
 * @property int $id
 * @property string $nombre Nombre del idioma.
 * @property string|null $codigo Codigo ISO del idioma o NULL si no es necesario.
 * @property int $revisado Indicador de idioma aceptado o no por los moderadores/administradores: 0=No, 1=Si.
 */
class Idioma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'idiomas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['revisado'], 'integer'],
            [['nombre'], 'string', 'max' => 25],
            [['codigo'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'codigo' => Yii::t('app', 'Codigo'),
            'revisado' => Yii::t('app', 'Revisado'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return IdiomasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IdiomasQuery(get_called_class());
    }
	
	/* --------------------------------------------------------------------------------------------------------
	*	Lista de los estados de los idiomas, aceptados o no por moderadores/administradores SI=1 y NO=0
	*/
	public static function listaEstados()
	{
		$estado=array(
			0=>'NO ACEPTADO',
			1=>'SI ACEPTADO',
		);
		return $estado;
	} // listaEstados
	
	
	/* --------------------------------------------------------------------------------------------------------
	*	Obtener el nombre de un posible estado según su identificador clave
	*/
	public static function nombreEstado($id)
	{
		$lista= self::listaEstados();
		$estado= (isset($lista[$id]) ? $lista[$id] : '<Estado_Idioma_'.$id.'>');
		return $estado;
	} // nombreEstado
	
	/* --------------------------------------------------------------------------------------------------------
	*	Atributo virtual "Descripcion Estado"
	*/
	public function getDescripcionEstado()
	{
		return static::nombreEstado($this->revisado);
	}// getDescripcionEstado
}
