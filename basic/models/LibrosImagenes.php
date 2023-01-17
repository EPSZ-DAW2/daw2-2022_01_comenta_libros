<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros_imagenes".
 *
 * @property int $id
 * @property string|null $nombre Nombre identificativo (fichero externo en carpeta custodiada) con la imagen del libro.
 * @property int $libro_id Libro relacionado.
 * @property int $orden Orden de aparición de la imagen dentro del grupo de imagenes del libro. Opcional.
 */
class LibrosImagenes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros_imagenes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['libro_id'], 'required'],
            [['libro_id', 'orden'], 'integer'],
            [['nombre'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre identificativo (fichero externo en carpeta custodiada) con la imagen del libro.'),
            'libro_id' => Yii::t('app', 'Libro relacionado.'),
            'orden' => Yii::t('app', 'Orden de aparición de la imagen dentro del grupo de imagenes del libro. Opcional.'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return LibrosImagenesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibrosImagenesQuery(get_called_class());
    }
}
