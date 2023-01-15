<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "traductores".
 *
 * @property int $id
 * @property string|null $nombre Texto Nombre o Razón Social de la Entidad.
 * @property string|null $url Dirección web externa (opcional) que enlaza con la página "oficial" de la Entidad o NULL si no hay o no se conoce.
 * @property string|null $descripcion Texto adicional que describe a la entidad.
 * @property int $revisado Indicador de entidad aceptada o no por los moderadores/administradores: 0=No, 1=Si.
 */
class Traductores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'traductores';
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
            'id' => 'ID',
            'nombre' => 'Nombre',
            'url' => 'Url',
            'descripcion' => 'Descripcion',
            'revisado' => 'Revisado',
        ];
    }
}
