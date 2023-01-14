<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Autores".
 *
 * @property int $id
 * @property string|null $nombre Texto Nombre o Razón Social de la Entidad.
 * @property string|null $url Dirección web externa (opcional) que enlaza con la página "oficial" de la Entidad o NULL si no hay o no se conoce.
 * @property string|null $descripcion Texto adicional que describe a la entidad.
 * @property int $revisado Indicador de entidad aceptada o no por los moderadores/administradores: 0=No, 1=Si.
 */
class Autores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Autores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'descripcion'], 'string'],
            [['revisado'], 'integer'],
            [['nombre'], 'string', 'max' => 150],
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
            'url' => Yii::t('app', 'Url'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'revisado' => Yii::t('app', 'Revisado'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return AutoresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutoresQuery(get_called_class());
    }
}
