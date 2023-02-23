<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "generos".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $descripcion Texto adicional que describe al género o clasificación.
 * @property string|null $icono Nombre del icono relacionado de entre los disponibles en la aplicación (carpeta iconos posibles).
 * @property int|null $genero_id Categoria relacionada, para poder realizar la jerarquía de géneros. Nodo padre de la jerarquía de género, o CERO si es nodo raiz (como si fuera NULL).
 * @property int $revisado Indicador de género aceptado o no por los moderadores/administradores: 0=No, 1=Si.
 */
class Generos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['genero_id', 'revisado'], 'integer'],
            [['nombre', 'icono'], 'string', 'max' => 25],
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
            'icono' => Yii::t('app', 'Icono'),
            'genero_id' => Yii::t('app', 'Genero ID'),
            'revisado' => Yii::t('app', 'Revisado'),
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
