<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "generos".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $descripcion Texto adicional que describe al género o clasificación.
 * @property int $revisada Indicador de género aceptado o no por los moderadores/administradores: 0=No, 1=Si.
 */
class Etiquetas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'etiquetas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion','nombre'], 'string'],
            [['revisado'], 'integer'],
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
            'descripcion' => Yii::t('app', 'Descripcion'),
            'revisada' => Yii::t('app', 'Revisada'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return GenerosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GenerosQuery(get_called_class());
    }
}
