<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros_autores".
 *
 * @property int $id
 * @property int $libro_id Libro relacionado.
 * @property int $autor_id Autor relacionado.
 * @property int $orden Orden de aparición del autor dentro del grupo de autores del libro. Opcional.
 */
class LibrosAutores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros_autores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['libro_id', 'autor_id'], 'required'],
            [['libro_id', 'autor_id', 'orden'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'libro_id' => 'Libro ID',
            'autor_id' => 'Autor ID',
            'orden' => 'Orden',
        ];
    }
}
