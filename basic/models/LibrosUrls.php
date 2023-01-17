<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros_urls".
 *
 * @property int $id
 * @property int $libro_id Libro relacionado.
 * @property int $orden Orden de aparición de la URL dentro del grupo de URLs del libro. Opcional.
 * @property string $url La dirección URL, supuestamente válida.
 * @property string|null $titulo Título de la URL. Opcioinal.
 */
class LibrosUrls extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros_urls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['libro_id', 'url'], 'required'],
            [['libro_id', 'orden'], 'integer'],
            [['url', 'titulo'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'libro_id' => Yii::t('app', 'Libro ID'),
            'orden' => Yii::t('app', 'Orden'),
            'url' => Yii::t('app', 'Url'),
            'titulo' => Yii::t('app', 'Titulo'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return LibrosUrlsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibrosUrlsQuery(get_called_class());
    }
}
