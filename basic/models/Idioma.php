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
}
